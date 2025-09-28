<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $connection = 'mongodb';
    protected $collection = 'barangs';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'stok',
        'total_dimiliki',
        'kategori',
        'gambar',
        'is_paid',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'stok' => 'integer',
        'total_dimiliki' => 'integer',
        'is_paid' => 'boolean',
    ];
}
