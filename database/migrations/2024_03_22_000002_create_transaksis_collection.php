<?php

use Illuminate\Support\Facades\Schema;
//use Illuminate\Database\Schema\Blueprint;
use Mongodb\Laravel\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $collection) {
            // Membuat indeks untuk pencarian yang lebih cepat
            $collection->index('barang_id');
            $collection->index('user_id');
            $collection->index('tipe');
            $collection->index('tanggal_peminjaman');
            $collection->index('tanggal_pengembalian');
            $collection->index('gambar_id');
            $collection->index('url_gambar');
            
            
            // Membuat compound index untuk pencarian berdasarkan tipe dan tanggal
            $collection->index(['tipe' => 1, 'tanggal_peminjaman' => 1]);
            
            // Membuat compound index untuk pencarian berdasarkan user dan tanggal
            $collection->index(['user_id' => 1, 'tanggal_peminjaman' => 1]);
            
            // Membuat compound index untuk pencarian berdasarkan barang dan tanggal
            $collection->index(['barang_id' => 1, 'tanggal_peminjaman' => 1]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
}; 