<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Services\ImageKitService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Transaksi\CreateRequest;
use App\Http\Requests\Transaksi\ReturnRequest;
use App\Http\Requests\transaksi\UpdatePeminjamanRequest;
use App\Http\Requests\Transaksi\UpdatePengembalianRequest;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('user_id', Auth::user()->id)->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function getDetail($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Riwayat tidak ditemukan');
        }
        if ($transaksi->user_id != Auth::user()->id) {
            return abort(403);
        }
        return view('transaksi.detail', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak ditemukan');
        }
        if ($transaksi->user_id != Auth::user()->id) {
            return abort(403);
        }
        if ($transaksi->tipe != 'peminjaman' || $transaksi->status == 'accepted' || $transaksi->status == 'canceled') {
            return redirect()->route('transaksi.detail', $id)->with('error', 'Transaksi tidak dapat diedit');
        }

        $barang = Barang::find($transaksi->barang_id);
        if (!$barang) {
            return redirect()->route('transaksi.index')->with('error', 'Barang tidak ditemukan');
        }

        return view('transaksi.create', compact('transaksi', 'barang'));
    }

    public function create($barang_id)
    {
        $barang = Barang::find($barang_id);
        if (!$barang) {
            return redirect()->route('inventaris')->with('error', 'Barang tidak ditemukan');
        }

        return view('transaksi.create', compact('barang'));
    }

    public function peminjaman(CreateRequest $request, ImageKitService $imageKitService)
    {
        try {
            // Step 1: Cek barang dan stok terlebih dahulu
            $barang = Barang::find($request->validated('barang_id'));
            if (!$barang) {
                return redirect()->route('transaksi.index')->with('error', 'Barang tidak ditemukan');
            }

            if ($barang->total_dimiliki < (int) $request->validated('jumlah')) {
                return redirect()->route('transaksi.index')->with('error', 'Jumlah barang tidak cukup');
            }

            // Step 2: Upload file
            $uploadResult = $imageKitService->uploadImageWithStorage($request->file('file'), 'inventaris/transaksi/peminjaman');

            if (isset($uploadResult['error']) && $uploadResult['error']) {
                throw new \Exception($uploadResult['error']);
            }

            if (!isset($uploadResult['url'])) {
                throw new \Exception('No URL returned from ImageKit');
            }

            // Create file object
            $file = [
                'path' => $uploadResult['path'],
                'url' => $uploadResult['url']
            ];

            $tanggal = [
                'peminjaman' => date('Y-m-d', strtotime($request->validated('tanggal_peminjaman'))),
                'pengembalian' => date('Y-m-d', strtotime($request->validated('tanggal_pengembalian')))
            ];

            // Step 3: Save transaksi
            $transaksi = new Transaksi();
            $transaksi->barang_id = $barang->id;
            $transaksi->user_id = Auth::user()->id;
            $transaksi->tanggal = $tanggal;
            $transaksi->file = $file;
            $transaksi->jumlah = (int) $request->validated('jumlah');
            if ($request->validated('keterangan')) {
                $transaksi->keterangan = $request->validated('keterangan');
            }
            $transaksi->tipe = 'peminjaman';
            $transaksi->status = 'pending';
            $transaksi->save();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat');
        } catch (\Exception $e) {
            if ($uploadResult && isset($uploadResult['path'])) {
                $imageKitService->deleteImageWithStorage($uploadResult['path']);
            }
            return redirect()->route('transaksi.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updatePeminjaman(UpdatePeminjamanRequest $request, ImageKitService $imageKitService)
    {
        $uploadResult = null;
        try {
            // Ambil transaksi yang sudah divalidasi dari Form Request
            $transaksi = $request->transaksi;
            if ($transaksi->tipe != 'peminjaman' || $transaksi->status == 'accepted' || $transaksi->status == 'canceled') {
                return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak dapat diupdate');
            }

            // Get barang data for validation
            $barang = Barang::find($transaksi->barang_id);
            if (!$barang) {
                return redirect()->route('transaksi.index')->with('error', 'Barang tidak ditemukan');
            }

            // Validasi stok barang - tambahkan jumlah yang sedang dipinjam kembali ke stok tersedia
            $stokTersedia = $barang->stok + $transaksi->jumlah;
            if ($stokTersedia < (int) $request->validated('jumlah')) {
                return redirect()->back()->with('error', 'Jumlah barang tidak cukup untuk jumlah yang diminta.')->withInput();
            }

            // Update tanggal
            $tanggal = $transaksi->tanggal ?? [];
            $tanggal['peminjaman'] = date('Y-m-d', strtotime($request->validated('tanggal_peminjaman')));
            $tanggal['pengembalian'] = date('Y-m-d', strtotime($request->validated('tanggal_pengembalian')));
            $transaksi->tanggal = $tanggal;

            // Update detail lainnya
            $transaksi->jumlah = (int) $request->validated('jumlah');
            if ($request->validated('keterangan')) {
                $transaksi->keterangan = $request->validated('keterangan');
            }

            // Handle file upload jika ada file baru
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if (isset($transaksi->file['path'])) {
                    $imageKitService->deleteImageWithStorage($transaksi->file['path']);
                }

                // Upload file baru
                $uploadResult = $imageKitService->uploadImageWithStorage($request->file('file'), 'inventaris/transaksi/peminjaman');
                if (isset($uploadResult['error']) && $uploadResult['error']) {
                    throw new \Exception($uploadResult['error']);
                }

                $transaksi->file = [
                    'path' => $uploadResult['path'],
                    'url' => $uploadResult['url']
                ];
            }

            $transaksi->status = 'pending';
            $transaksi->save();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi peminjaman berhasil diupdate.');
        } catch (\Exception $e) {
            // Rollback: Hapus file yang baru diupload jika terjadi error
            if ($uploadResult && isset($uploadResult['path'])) {
                $imageKitService->deleteImageWithStorage($uploadResult['path']);
            }
            return redirect()->route('transaksi.index')->with('error', 'Gagal mengupdate transaksi: ' . $e->getMessage());
        }
    }

    public function pengembalian(ReturnRequest $request, ImageKitService $imageKitService)
    {
        $uploadResult = null;
        try {
            // Ambil transaksi yang sudah divalidasi dari Form Request
            $transaksi = $request->transaksi;
            if ($transaksi->tipe != 'peminjaman' || $transaksi->status != 'accepted' || $transaksi->status == 'canceled') {
                return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak dapat dikembalikan');
            }

            // Upload file gambar
            $uploadResult = $imageKitService->uploadImageWithStorage($request->file('gambar'), 'inventaris/transaksi/pengembalian');

            if (isset($uploadResult['error']) && $uploadResult['error']) {
                throw new \Exception($uploadResult['error']);
            }

            if (!isset($uploadResult['url'])) {
                throw new \Exception('No URL returned from ImageKit');
            }

            // Create file object
            $gambar = [
                'path' => $uploadResult['path'],
                'url' => $uploadResult['url']
            ];

            // Create return object
            $return = [
                'jumlah' => (int) $request->validated('jumlah'),
                'tanggal_kembali' => date('Y-m-d', strtotime($request->validated('tanggal_kembali')))
            ];
            if ($request->validated('keterangan')) {
                $return->keterangan = $request->validated('keterangan');
            }
            $return->gambar = $gambar;

            // Update transaksi
            $transaksi->return = $return;
            $transaksi->tipe = 'pengembalian';
            $transaksi->status = 'pending';
            $transaksi->save();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dikembalikan');
        } catch (\Exception $e) {
            // Rollback: Hapus gambar yang baru diupload jika terjadi error saat save
            if ($uploadResult && isset($uploadResult['path'])) {
                $imageKitService->deleteImageWithStorage($uploadResult['path']);
            }
            return redirect()->route('transaksi.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updatePengembalian(UpdatePengembalianRequest $request, ImageKitService $imageKitService)
    {
        $uploadResult = null;
        try {
            // Ambil transaksi yang sudah divalidasi dari Form Request
            $transaksi = $request->transaksi;
            // Cek kondisi tambahan yang tidak bisa divalidasi di Form Request
            if ($transaksi->tipe != 'pengembalian' || $transaksi->status == 'accepted' || $transaksi->status == 'canceled') {
                return redirect()->route('transaksi.index')->with('error', 'Transaksi ini tidak dapat diupdate.');
            }

            // Buat atau update objek 'return'
            $return = $transaksi->return;
            $return->jumlah = (int) $request->validated('jumlah');
            $return->tanggal_kembali = date('Y-m-d', strtotime($request->validated('tanggal_kembali')));
            if ($request->validated('keterangan')) {
                $return->keterangan = $request->validated('keterangan');
            }

            // Handle file upload jika ada file baru
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if (isset($return['gambar']['path'])) {
                    $imageKitService->deleteImageWithStorage($return['gambar']['path']);
                }

                // Upload gambar baru
                $uploadResult = $imageKitService->uploadImageWithStorage($request->file('gambar'), 'inventaris/transaksi/pengembalian');
                if (isset($uploadResult['error']) && $uploadResult['error']) {
                    throw new \Exception($uploadResult['error']);
                }

                $return['gambar'] = [
                    'path' => $uploadResult['path'],
                    'url' => $uploadResult['url']
                ];
            }

            $transaksi->status = 'pending';
            $transaksi->return = $return;
            $transaksi->save();

            return redirect()->route('transaksi.index')->with('success', 'Data pengembalian berhasil diupdate.');
        } catch (\Exception $e) {
            // Rollback: Hapus gambar yang baru diupload jika terjadi error saat save
            if ($uploadResult && isset($uploadResult['path'])) {
                $imageKitService->deleteImageWithStorage($uploadResult['path']);
            }
            return redirect()->route('transaksi.index')->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }

    public function statusCancel($id)
    {
        try {
            $transaksi = Transaksi::find($id);
            if (!$transaksi) {
                return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak ditemukan');
            }

            if ($transaksi->user_id != Auth::user()->id) {
                return abort(403);
            }

            if ($transaksi->status == 'accepted') {
                return redirect()->route('transaksi.index')->with('error', 'Transaksi sudah diterima dan tidak dapat dibatalkan');
            }

            if ($transaksi->status == 'canceled') {
                return redirect()->route('transaksi.index')->with('error', 'Transaksi sudah dibatalkan sebelumnya');
            }

            // Kembalikan stok barang jika status sebelumnya pending
            if ($transaksi->status == 'pending') {
                $barang = Barang::find($transaksi->barang_id);
                if ($barang) {
                    $barang->stok += $transaksi->jumlah;
                    $barang->save();
                }
            }

            $transaksi->status = 'canceled';
            $transaksi->save();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibatalkan');
        } catch (\Exception $e) {
            return redirect()->route('transaksi.index')->with('error', 'Gagal membatalkan transaksi: ' . $e->getMessage());
        }
    }
}
