<?php

use Illuminate\Support\Facades\Schema;
//use Illuminate\Database\Schema\Blueprint;
use Mongodb\Laravel\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Schema structure:
     * - _id: ObjectId (auto-generated)
     * - nama_barang: string
     * - deskripsi: string (nullable)
     * - stok: integer (default: 0)
     * - total_dimiliki: integer (default: 0)
     * - kategori: string (nullable)
     * - gambar: string (nullable)
     * - imagekit:
     *   - fileId: string (ImageKit file ID)
     *   - url: string (ImageKit URL)
     *   - thumbnailUrl: string (ImageKit thumbnail URL)
     *   - name: string (Original filename)
     *   - size: integer (File size in bytes)
     *   - filePath: string (Path in ImageKit)
     *   - fileType: string (MIME type)
     *   - height: integer (Image height)
     *   - width: integer (Image width)
     * - created_at: timestamp
     * - updated_at: timestamp
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $collection) {
            // Membuat indeks untuk pencarian yang lebih cepat
            
            $collection->unique('nama_barang');
            $collection->index('kategori');
            $collection->index('stok');
            $collection->index('total_dimiliki');
            
            // Membuat unique index untuk nama_barang
            
            // Membuat compound index untuk pencarian berdasarkan kategori dan stok
            $collection->index(['kategori' => 1, 'stok' => 1]);
            
            // Membuat compound index untuk pencarian berdasarkan stok dan total_dimiliki
            $collection->index(['stok' => 1, 'total_dimiliki' => 1]);

            // Membuat indeks untuk pencarian berdasarkan imagekit fileId
            $collection->index('gambar_id');
            $collection->index('url_gambar');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
}; 