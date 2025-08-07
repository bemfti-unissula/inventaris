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
        Schema::create('users', function (Blueprint $collection) {
            // Membuat indeks untuk pencarian yang lebih cepat
            $collection->index('name');
            $collection->index('role');
            
            // Membuat unique index untuk email dan phone
            $collection->unique('contacts.email');
            $collection->unique('contacts.phone');
            
            // Membuat compound index untuk pencarian berdasarkan role dan name
            $collection->index(['role' => 1, 'name' => 1]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}; 