<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::query();

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

        // Category filter
        if ($request->has('tipe') && $request->tipe != '') {
            $query->where('tipe', $request->tipe);
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

        // Dynamic sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        // Dynamic pagination
        $perPage = $request->get('per_page', 10);
        
        // Paginate results
        $transaksis = $query->orderBy($sortBy, $sortOrder)->paginate($perPage)->withQueryString();

        // Get current filter status
        $currentFilters = [
            'search' => $request->search ?? '',
            'tipe' => $request->tipe ?? '',
            'status' => $request->status ?? '',
            'min_jumlah' => $request->min_jumlah ?? '',
            'max_jumlah' => $request->max_jumlah ?? '',
            'min_tanggal_peminjaman' => $request->min_tanggal_peminjaman ?? '',
            'max_tanggal_peminjaman' => $request->max_tanggal_peminjaman ?? '',
            'min_tanggal_pengembalian' => $request->min_tanggal_pengembalian ?? '',
            'max_tanggal_pengembalian' => $request->max_tanggal_pengembalian ?? '',
            'total_items' => $totalItems
        ];
        
        // Separate sorting and pagination options
        $sortingOptions = [
            'sort_by' => $sortBy,
            'sort_order' => $sortOrder,
            'per_page' => $perPage
        ];

        return view('admin.transaksi.index', compact('transaksis', 'currentFilters', 'sortingOptions'));    
    }
}
