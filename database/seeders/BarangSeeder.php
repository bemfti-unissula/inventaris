<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use MongoDB\Laravel\Eloquent\Model;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama jika ada
        Barang::truncate();

        $barangs = [
            [
                'nama_barang' => 'Meja Rapat',
                'deskripsi' => 'Meja rapat kayu jati dengan kapasitas 8 orang',
                'stok' => 5,
                'total_dimiliki' => 5,
                'kategori' => 'Furniture',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Kursi Lipat',
                'deskripsi' => 'Kursi lipat plastik dengan rangka besi',
                'stok' => 20,
                'total_dimiliki' => 20,
                'kategori' => 'Furniture',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Proyektor Epson',
                'deskripsi' => 'Proyektor Epson EB-X05 dengan resolusi HD',
                'stok' => 2,
                'total_dimiliki' => 2,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Speaker Portable',
                'deskripsi' => 'Speaker bluetooth JBL dengan bass booster',
                'stok' => 3,
                'total_dimiliki' => 3,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Tenda 3x4',
                'deskripsi' => 'Tenda lipat ukuran 3x4 meter',
                'stok' => 4,
                'total_dimiliki' => 4,
                'kategori' => 'Tenda',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Tenda 4x6',
                'deskripsi' => 'Tenda lipat ukuran 4x6 meter',
                'stok' => 2,
                'total_dimiliki' => 2,
                'kategori' => 'Tenda',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Papan Tulis',
                'deskripsi' => 'Papan tulis putih ukuran 120x90 cm',
                'stok' => 3,
                'total_dimiliki' => 3,
                'kategori' => 'Alat Tulis',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Spanduk 2x1',
                'deskripsi' => 'Spanduk flexy ukuran 2x1 meter',
                'stok' => 10,
                'total_dimiliki' => 10,
                'kategori' => 'Banner',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Banner 1x2',
                'deskripsi' => 'Banner flexy ukuran 1x2 meter',
                'stok' => 15,
                'total_dimiliki' => 15,
                'kategori' => 'Banner',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Mikrofon Wireless',
                'deskripsi' => 'Mikrofon wireless dengan receiver',
                'stok' => 2,
                'total_dimiliki' => 2,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Laptop Asus',
                'deskripsi' => 'Laptop Asus ROG untuk presentasi',
                'stok' => 1,
                'total_dimiliki' => 1,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Kamera DSLR',
                'deskripsi' => 'Kamera Canon EOS untuk dokumentasi',
                'stok' => 1,
                'total_dimiliki' => 1,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Tripod Kamera',
                'deskripsi' => 'Tripod aluminium untuk kamera',
                'stok' => 2,
                'total_dimiliki' => 2,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Meja Pameran',
                'deskripsi' => 'Meja lipat untuk pameran',
                'stok' => 8,
                'total_dimiliki' => 8,
                'kategori' => 'Furniture',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Stand Banner',
                'deskripsi' => 'Stand banner X-banner',
                'stok' => 5,
                'total_dimiliki' => 5,
                'kategori' => 'Banner',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Sound System',
                'deskripsi' => 'Set sound system lengkap dengan mixer',
                'stok' => 1,
                'total_dimiliki' => 1,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Kursi Pameran',
                'deskripsi' => 'Kursi lipat untuk pameran',
                'stok' => 15,
                'total_dimiliki' => 15,
                'kategori' => 'Furniture',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Layar Proyektor',
                'deskripsi' => 'Layar proyektor manual 72 inch',
                'stok' => 2,
                'total_dimiliki' => 2,
                'kategori' => 'Elektronik',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Tenda 6x8',
                'deskripsi' => 'Tenda lipat ukuran 6x8 meter',
                'stok' => 1,
                'total_dimiliki' => 1,
                'kategori' => 'Tenda',
                'gambar' => 'images/logo-bem-fti.png'
            ],
            [
                'nama_barang' => 'Papan Nama',
                'deskripsi' => 'Papan nama acrilic dengan stand',
                'stok' => 3,
                'total_dimiliki' => 3,
                'kategori' => 'Banner',
                'gambar' => 'images/logo-bem-fti.png'
            ],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
} 