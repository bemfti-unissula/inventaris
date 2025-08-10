<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Services\ImageKitService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Barang\CreateRequest;
use App\Http\Requests\Barang\UpdateRequest;

class BarangController extends Controller
{
    protected $imageKitService;

    public function __construct(ImageKitService $imageKitService)
    {
        $this->imageKitService = $imageKitService;
    }

    // Metode alternatif menggunakan Storage facade dengan ImageKit adapter
    // protected function uploadImageWithStorage($file)
    // {
    //     try {
    //         // Generate unique filename
    //         $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

    //         // Get file contents
    //         $fileContents = file_get_contents($file->getRealPath());

    //         // Upload file menggunakan Storage facade dengan disk imagekit
    //         // Menggunakan put() method yang tersedia di Flysystem
    //         $path = $filename; // Define path where file will be stored
    //         Storage::disk('imagekit')->put($path, $fileContents);

    //         // Dapatkan URL publik dari file yang diupload
    //         $url = Storage::disk('imagekit')->url($path);

    //         $optimizedUrl = $url . '?tr=w-500,h-500,f-auto,q-50';

    //         return ['url' => $url, 'path' => $path, 'optimizedUrl' => $optimizedUrl];
    //     } catch (\Exception $e) {
    //         \Log::error('Storage ImageKit upload failed:', [
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);

    //         return ['error' => $e->getMessage()];
    //     }
    // }

    // // Metode alternatif untuk menghapus file menggunakan Storage facade
    // protected function deleteImageWithStorage($path)
    // {
    //     try {
    //         if (Storage::disk('imagekit')->exists($path)) {
    //             Storage::disk('imagekit')->delete($path);
    //             return true;
    //         }
    //         return false;
    //     } catch (\Exception $e) {
    //         \Log::error('Storage ImageKit delete failed:', [
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);
    //         return false;
    //     }
    // }

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

        // Paginate results
        $barangs = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        // Get current filter status
        $currentFilters = [
            'search' => $request->search ?? '',
            'category' => $request->category ?? '',
            'total_items' => $totalItems
        ];

        return view('admin.barang.index', compact('barangs', 'categories', 'currentFilters'));
    }

    public function create()
    {
        return view('admin.barang.create');
    }

    public function store(CreateRequest $request)
    {
        try {
            $data = $request->validated();
            // Handle image upload using Storage facade with ImageKit adapter
            if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
                try {
                    // Menggunakan metode Storage facade dengan ImageKit adapter
                    $uploadResult = $this->imageKitService->uploadImageWithStorage($request->file('gambar'), 'inventaris');

                    if (isset($uploadResult['error']) && $uploadResult['error']) {
                        throw new \Exception($uploadResult['error']);
                    }

                    if (!isset($uploadResult['url'])) {
                        throw new \Exception('No URL returned from ImageKit');
                    }

                    // Create gambar object with path and url
                    $gambar = new stdClass;
                    $gambar->path = $uploadResult['path'];
                    $gambar->url = $uploadResult['url'];
                    $data['gambar'] = $gambar;
                } catch (\Exception $e) {

                    // Pesan error yang lebih informatif berdasarkan jenis error
                    $errorMessage = $e->getMessage();
                    if (strpos($errorMessage, 'timed out') !== false || strpos($errorMessage, 'timeout') !== false) {
                        $errorMessage = 'Koneksi ke server ImageKit timeout. Silakan coba lagi atau gunakan gambar dengan ukuran lebih kecil.';
                    } elseif (strpos($errorMessage, 'cURL error') !== false) {
                        $errorMessage = 'Terjadi masalah koneksi saat mengupload gambar. Silakan periksa koneksi internet Anda dan coba lagi.';
                    }

                    return redirect()->route('admin.barang.index')
                        ->with('error', 'Gagal mengupload gambar: ' . $errorMessage);
                }
            } elseif ($request->hasFile('gambar')) {
                return redirect()->route('admin.barang.index')
                    ->with('error', 'File gambar tidak valid: ' . $request->file('gambar')->getErrorMessage());
            }
            // $result = Barang::create($data);
            $barang = new Barang();
            $barang->nama_barang = $request->validated('nama_barang');
            $barang->deskripsi = $request->validated('deskripsi');
            $barang->kategori = $request->validated('kategori');
            $barang->stok = (int) $request->validated('stok');
            $barang->total_dimiliki = (int) $request->validated('total_dimiliki');
            $barang->gambar = $gambar;
            $barang->save();
            // if (!$result) {
            //     return redirect()->route('admin.barang.index')
            //         ->with('error', 'Gagal menambahkan barang');
            // }

            return redirect()->route('admin.barang.index')
                ->with('success', 'Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('admin.barang.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        if (!$barang) {
            return redirect()->route('inventaris')->with('error', 'Barang tidak ditemukan');
        }
        return view('admin.barang.create', compact('barang'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $barang = Barang::findOrFail($id);

            if (!$barang) {
                return redirect()->route('admin.barang.index')->with('error', 'Barang tidak ditemukan');
            }

            // Handle image upload using Storage facade with ImageKit adapter
            if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
                try {
                    if (!empty($barang->gambar) && is_array($barang->gambar) && isset($barang->gambar['path'])) {
                        $this->imageKitService->deleteImageWithStorage($barang->gambar['path']);
                    }

                    // Upload gambar baru menggunakan Storage facade dengan ImageKit adapter
                    $uploadResult = $this->imageKitService->uploadImageWithStorage($request->file('gambar'), 'inventaris');

                    if (isset($uploadResult['error']) && $uploadResult['error']) {
                        throw new \Exception($uploadResult['error']);
                    }

                    if (!isset($uploadResult['url'])) {
                        throw new \Exception('No URL returned from ImageKit');
                    }

                    // Create gambar object with path and url
                    $gambar = new stdClass;
                    $gambar->path = $uploadResult['path'];
                    $gambar->url = $uploadResult['url'];
                    $data['gambar'] = $gambar;
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                    if (strpos($errorMessage, 'timed out') !== false || strpos($errorMessage, 'timeout') !== false) {
                        $errorMessage = 'Koneksi ke server ImageKit timeout. Silakan coba lagi atau gunakan gambar dengan ukuran lebih kecil.';
                    } elseif (strpos($errorMessage, 'cURL error') !== false) {
                        $errorMessage = 'Terjadi masalah koneksi saat mengupload gambar. Silakan periksa koneksi internet Anda dan coba lagi.';
                    }

                    return redirect()->route('admin.barang.index')
                        ->with('error', 'Gagal mengupload gambar: ' . $errorMessage);
                }
            } elseif ($request->hasFile('gambar')) {
                return redirect()->route('admin.barang.index')
                    ->with('error', 'File gambar tidak valid: ' . $request->file('gambar')->getErrorMessage());
            }

            // Ensure integer values for stok and total_dimiliki
            $data['stok'] = (int) $data['stok'];
            $data['total_dimiliki'] = (int) $data['total_dimiliki'];
            $result = $barang->update($data);
            if (!$result) {
                return redirect()->route('admin.barang.index')
                    ->with('error', 'Gagal mengubah barang');
            }

            return redirect()->route('admin.barang.index')
                ->with('success', 'Barang berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('admin.barang.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);

            if (!$barang) {
                return redirect()->route('admin.barang.index')->with('error', 'Barang tidak ditemukan');
            }

            if (!empty($barang->gambar) && is_array($barang->gambar) && isset($barang->gambar['path'])) {
                try {
                    $this->imageKitService->deleteImageWithStorage($barang->gambar['path']);
                } catch (\Exception $e) {
                    // Continue with deletion even if image deletion fails
                }
            }

            $result = $barang->delete();
            if (!$result) {
                return redirect()->route('admin.barang.index')
                    ->with('error', 'Gagal menghapus barang');
            }

            return redirect()->route('admin.barang.index')
                ->with('success', 'Barang berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.barang.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
