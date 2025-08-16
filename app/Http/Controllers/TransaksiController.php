<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Services\ImageKitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Transaksi\CreateRequest;
use App\Http\Requests\Transaksi\ReturnRequest;

class TransaksiController extends Controller
{
    public function getByUser()
    {
        $transaksis = Transaksi::where('user_id', Auth::user()->id)->get();
        return view('transaksi.history', compact('transaksis'));
    }

    public function getDetail($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.getByUser')->with('error', 'Riwayat tidak ditemukan');
        }
        if ($transaksi->user_id != Auth::user()->id) {
            return redirect()->route('transaksi.getByUser')->with('error', 'Kamu tidak memiliki akses');
        }
        return view('transaksi.detail', compact('transaksi'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function peminjaman(CreateRequest $request, ImageKitService $imageKitService)
    {
        try {
            // Step 1: Cek barang dan stok terlebih dahulu
            $barang = Barang::find($request->validated('barang_id'));
            if (!$barang) {
                throw new \Exception('Barang tidak ditemukan');
            }

            if ($barang->stok < (int) $request->validated('jumlah')) {
                return redirect()->route('transaksi.getByUser')->with('error', 'Stok barang tidak cukup');
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
            $file = new stdClass;
            $file->path = $uploadResult['path'];
            $file->url = $uploadResult['url'];

            $tanggal = new stdClass;
            $tanggal->peminjaman = date('Y-m-d', strtotime($request->validated('tanggal_peminjaman')));
            $tanggal->pengembalian = date('Y-m-d', strtotime($request->validated('tanggal_pengembalian')));

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
            $transaksi->tipe = 'proses';
            $transaksi->status = 'pending';
            $transaksi->save();

            return redirect()->route('transaksi.getByUser')->with('success', 'Transaksi berhasil dibuat');
        } catch (\Exception $e) {
            if ($uploadResult && isset($uploadResult['path'])) {
                $imageKitService->deleteImageWithStorage($uploadResult['path']);
            }
            return redirect()->route('transaksi.getByUser')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function pengembalian(ReturnRequest $request, ImageKitService $imageKitService)
    {
        $transaksi = Transaksi::find($request->validated('id'));
        if (!$transaksi) {
            return redirect()->route('transaksi.getByUser')->with('error', 'Transaksi tidak ditemukan');
        }
        if ($transaksi->tipe != 'dipinjam') {
            return redirect()->route('transaksi.getByUser')->with('error', 'Transaksi tidak dapat dikembalikan');
        }
        if ($transaksi->status != 'accepted') {
            return redirect()->route('transaksi.getByUser')->with('error', 'Transaksi tidak dapat dikembalikan');
        }

        $return = new stdClass;
        $return->jumlah = (int) $request->validated('jumlah');
        $return->tanggal_kembali = date('Y-m-d', strtotime($request->validated('tanggal_kembali')));
        if ($request->validated('keterangan')) {
            $return->keterangan = $request->validated('keterangan');
        }
    }
}
