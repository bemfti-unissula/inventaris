<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(Request $request): Response
    {
        $user = $request->user();
        
        // Hitung total barang
        $totalBarang = Barang::count();
        
        // Hitung total user (hanya untuk admin)
        $totalUser = $user->role === 'admin' ? User::count() : 0;
        
        // Hitung total pinjaman (placeholder - sesuaikan dengan model pinjaman Anda)
        $totalPinjaman = 0; // TODO: Implementasi setelah model pinjaman dibuat
        
        // Ambil 6 barang terbaru
        $barangTerbaru = Barang::orderBy('created_at', 'desc')
            ->take(6)
            ->get()
            ->map(function ($barang) {
                return [
                    'id' => $barang->_id,
                    'nama_barang' => $barang->nama_barang,
                    'kategori' => $barang->kategori,
                    'stok' => $barang->stok,
                    'gambar' => $barang->gambar,
                    'deskripsi' => $barang->deskripsi,
                    'total_dipinjam' => $barang->total_dipinjam ?? 0,
                ];
            });
        
        return Inertia::render('Dashboard', [
            'totalBarang' => $totalBarang,
            'totalUser' => $totalUser,
            'totalPinjaman' => $totalPinjaman,
            'barangTerbaru' => $barangTerbaru,
        ]);
    }
}