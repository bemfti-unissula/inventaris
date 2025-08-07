<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Inertia\Inertia;
use Inertia\Response;

class BarangController extends Controller
{
    public function index(Request $request): Response
    {
        $query = Barang::query();
        
        // Current filters for maintaining state
        $currentFilters = [
            'search' => $request->search,
            'kategori' => $request->kategori,
        ];

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // Get unique categories for filter dropdown
        $kategoris = Barang::raw(function ($collection) {
            return $collection->distinct('kategori', [], ['sort' => ['kategori' => 1]]);
        });

        // Paginate results with 9 items per page
        $barangs = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        return Inertia::render('Inventaris', [
            'barangs' => $barangs,
            'kategoris' => $kategoris,
            'currentFilters' => $currentFilters,
        ]);
    }
}
