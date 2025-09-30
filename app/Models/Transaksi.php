<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Transaksi extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'barang_id',
        'user_id',
        'tanggal',
        'tipe',
        'jumlah',
        'gambar',
        'keterangan',
        'transaksi_terkait_id',
    ];

    /**
     * Relationship to Barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', '_id');
    }

    /**
     * Relationship to User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
