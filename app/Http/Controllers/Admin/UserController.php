<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('fakultas', 'like', "%{$search}%");
            });
        }

        // Faculty filter
        if ($request->has('fakultas') && $request->fakultas != '') {
            $query->where('fakultas', $request->fakultas);
        }

        // Role filter
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        // Get unique faculties for filter dropdown
        $fakultasList = User::raw(function ($collection) {
            return $collection->distinct('fakultas', [], ['sort' => ['fakultas' => 1]]);
        });

        // Remove null/empty values and sort
        $fakultasList = array_filter($fakultasList, function($value) {
            return !empty($value);
        });
        sort($fakultasList);

        // Get total items for current filter
        $totalItems = $query->count();

        // Paginate results
        $users = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        // Get current filter status
        $currentFilters = [
            'search' => $request->search ?? '',
            'fakultas' => $request->fakultas ?? '',
            'role' => $request->role ?? '',
            'total_items' => $totalItems
        ];

        return view('admin.user.index', compact('users', 'fakultasList', 'currentFilters'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            
            if (!$user) {
                return redirect()->route('admin.user.index')->with('error', 'User tidak ditemukan');
            }

            // Prevent admin from deleting themselves
            if ($user->id === auth()->id()) {
                return redirect()->route('admin.user.index')->with('error', 'Tidak dapat menghapus akun sendiri');
            }

            $result = $user->delete();
            if (!$result) {
                return redirect()->route('admin.user.index')
                    ->with('error', 'Gagal menghapus user');
            }

            return redirect()->route('admin.user.index')
                ->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
