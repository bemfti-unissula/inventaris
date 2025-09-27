<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'semua'); // semua, peminjaman, pengembalian

        $query = Transaksi::query();

        // Filter berdasarkan type
        if ($type === 'peminjaman') {
            $query->where('tipe', 'peminjaman');
        } elseif ($type === 'pengembalian') {
            $query->where('tipe', 'pengembalian');
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('keterangan', 'like', "%{$search}%")
                    ->orWhereHas('barang', function ($q) use ($search) {
                        $q->where('nama_barang', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Status filter
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // jumlah filter
        if ($request->has('min_jumlah') && $request->min_jumlah != '') {
            $query->where('jumlah', '>=', $request->min_jumlah);
        }
        if ($request->has('max_jumlah') && $request->max_jumlah != '') {
            $query->where('jumlah', '<=', $request->max_jumlah);
        }

        // tanggal peminjaman filter
        if ($request->has('min_tanggal_peminjaman') && $request->min_tanggal_peminjaman != '') {
            $query->where('tanggal.peminjaman', '>=', $request->min_tanggal_peminjaman);
        }
        if ($request->has('max_tanggal_peminjaman') && $request->max_tanggal_peminjaman != '') {
            $query->where('tanggal.peminjaman', '<=', $request->max_tanggal_peminjaman);
        }

        // tanggal pengembalian filter
        if ($request->has('min_tanggal_pengembalian') && $request->min_tanggal_pengembalian != '') {
            $query->where('tanggal.pengembalian', '>=', $request->min_tanggal_pengembalian);
        }
        if ($request->has('max_tanggal_pengembalian') && $request->max_tanggal_pengembalian != '') {
            $query->where('tanggal.pengembalian', '<=', $request->max_tanggal_pengembalian);
        }

        // Get total items for current filter
        $totalItems = $query->count();

        // MongoDB compatible sorting: pending terlama dulu, kemudian yang lain berdasarkan updated_at terbaru
        $allTransaksis = $query->get();

        // Separate pending and non-pending transactions
        $pendingTransaksis = $allTransaksis->where('status', 'pending')->sortBy('updated_at');
        $otherTransaksis = $allTransaksis->where('status', '!=', 'pending')->sortByDesc('updated_at');

        // Merge with pending first (oldest first), then others (newest first)
        $sortedTransaksis = $pendingTransaksis->merge($otherTransaksis);

        // Manual pagination
        $currentPage = request()->get('page', 1);
        $perPage = 15;
        $total = $sortedTransaksis->count();
        $startIndex = ($currentPage - 1) * $perPage;
        $itemsForCurrentPage = $sortedTransaksis->slice($startIndex, $perPage);

        // Create paginator
        $transaksis = new \Illuminate\Pagination\LengthAwarePaginator(
            $itemsForCurrentPage->values(),
            $total,
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'pageName' => 'page',
            ]
        );
        $transaksis->withQueryString();

        // Get current filter status
        $currentFilters = [
            'search' => $request->search ?? '',
            'type' => $type,
            'status' => $request->status ?? '',
            'min_jumlah' => $request->min_jumlah ?? '',
            'max_jumlah' => $request->max_jumlah ?? '',
            'min_tanggal_peminjaman' => $request->min_tanggal_peminjaman ?? '',
            'max_tanggal_peminjaman' => $request->max_tanggal_peminjaman ?? '',
            'min_tanggal_pengembalian' => $request->min_tanggal_pengembalian ?? '',
            'max_tanggal_pengembalian' => $request->max_tanggal_pengembalian ?? '',
            'total_items' => $totalItems
        ];

        return view('admin.transaksi.index', compact('transaksis', 'currentFilters', 'type'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Get related models
        $barang = Barang::find($transaksi->barang_id);
        $user = User::find($transaksi->user_id);

        return view('admin.transaksi.detail', compact('transaksi', 'barang', 'user'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
            'catatan_admin' => 'nullable|string|max:500'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $oldStatus = $transaksi->status;

        // Update status barang jika diperlukan
        if ($request->status === 'accepted' && $transaksi->tipe === 'peminjaman') {
            $barang = Barang::find($transaksi->barang_id);
            if ($barang && $barang->stok >= $transaksi->jumlah) {
                $barang->decrement('stok', $transaksi->jumlah);
            } else {
                // Jika stok barang tidak cukup, kembalikan status transaksi dan berikan pesan error
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi untuk peminjaman ini.');
            }
        } elseif ($oldStatus === 'accepted' && $request->status === 'rejected' && $transaksi->tipe === 'peminjaman') {
            // Jika status diubah dari accepted ke rejected, kembalikan jumlah barang
            $barang = Barang::find($transaksi->barang_id);
            if ($barang) {
                $barang->increment('stok', $transaksi->jumlah);
            }
        } elseif ($oldStatus === 'accepted' && $request->status === 'pending' && $transaksi->tipe === 'peminjaman') {
            // Jika status diubah dari accepted ke rejected, kembalikan jumlah barang
            $barang = Barang::find($transaksi->barang_id);
            if ($barang) {
                $barang->increment('stok', $transaksi->jumlah);
            }
        } elseif ($request->status === 'accepted' && $transaksi->tipe === 'pengembalian') {
            // Jika pengembalian selesai, tambah kembali jumlah barang
            $barang = Barang::find($transaksi->barang_id);
            if ($barang) {
                $barang->increment('stok', $transaksi->jumlah);
            }
        } elseif ($oldStatus === 'accepted' && $request->status === 'pending' && $transaksi->tipe === 'pengembalian') {
            // Jika pengembalian selesai, tambah kembali jumlah barang
            $barang = Barang::find($transaksi->barang_id);
            if ($barang) {
                $barang->decrement('stok', $transaksi->jumlah);
            }
        }

        $transaksi->status = $request->status;
        $transaksi->catatan_admin = $request->catatan_admin;
        $transaksi->save();

        return redirect()->route('admin.transaksi.index')->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
