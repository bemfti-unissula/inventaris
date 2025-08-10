<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

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
        if ($request->has('category') && $request->category != '') {
            $query->where('kategori', $request->category);
        }

        // Get unique categories for filter dropdown
        $categories = Barang::raw(function ($collection) {
            return $collection->distinct('kategori', [], ['sort' => ['kategori' => 1]]);
        });

        // Get total items for current filter
        $totalItems = $query->count();

        // Paginate results with 9 items per page
        $barangs = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        // Get current filter status
        $currentFilters = [
            'search' => $request->search ?? '',
            'category' => $request->category ?? '',
            'total_items' => $totalItems
        ];

        return view('dashboard', compact('barangs', 'categories', 'currentFilters'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }
}
