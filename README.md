# Inventaris BEM FTI

## Description

Sistem Inventaris BEM FTI adalah aplikasi web untuk mengelola inventaris barang-barang milik Badan Eksekutif Mahasiswa Fakultas Teknologi Informasi. Aplikasi ini memungkinkan admin untuk mengelola data barang, melakukan transaksi peminjaman dan pengembalian, serta memantau stok barang secara real-time.

## Technologies Used

- **Laravel 12** - PHP Framework untuk backend
- **PHP** - Server-side programming language
- **MongoDB** - NoSQL Database untuk penyimpanan data
- **ImageKit** - Cloud storage untuk manajemen file dan gambar
- **Blade** - Template engine Laravel
- **Tailwind** - CSS framework untuk styling
- **JavaScript** - Client-side scripting

## Features

### 🔐 Authentication
- Login dan Register pengguna
- Sistem role-based access (Admin/User)
- Password reset functionality

### 📦 Manajemen Barang
- CRUD (Create, Read, Update, Delete) data barang
- Upload gambar barang dengan ImageKit
- Kategori dan klasifikasi barang
- Tracking stok barang real-time

### 📋 Transaksi
- **Peminjaman Barang**
  - Form peminjaman dengan validasi
  - Upload dokumen pendukung (PDF)
  - Pengurangan stok otomatis
  - Tracking tanggal peminjaman

- **Pengembalian Barang**
  - Proses pengembalian dengan validasi
  - Penambahan stok kembali
  - Tracking tanggal pengembalian

### 📊 Dashboard
- Overview statistik inventaris
- Monitoring transaksi terbaru
- Status stok barang

### 🎨 User Interface
- Responsive design
- Modern UI dengan tema hitam-merah
- Font Poppins untuk typography
- User-friendly navigation

## Setup Instructions

### Prerequisites
- PHP >= 8.1
- Composer
- MongoDB

### Installation

1. **Clone repository**
   ```bash
   git clone https://github.com/bemfti-unissula/inventaris.git
   cd inventaris
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   ```
   
   Edit file `.env` dan sesuaikan konfigurasi:
   ```env
   APP_NAME="Inventaris BEM FTI"
   APP_URL=http://localhost:8000
   
   DB_CONNECTION=mongodb
   DB_URI="your-mongodb-connection-string"
   
   IMAGEKIT_PUBLIC_KEY=your_imagekit_public_key
   IMAGEKIT_PRIVATE_KEY=your_imagekit_private_key
   IMAGEKIT_URL_ENDPOINT=your_imagekit_url_endpoint
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Run database migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed database (optional)**
   ```bash
   php artisan db:seed
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

   Aplikasi akan berjalan di `http://localhost:8000`

### Production Deployment

Untuk deployment production:

1. Set `APP_ENV=production` di file `.env`
2. Set `APP_DEBUG=false`
3. Optimize aplikasi:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Project Structure

```
inventarisBEMFTI/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/              # Eloquent Models
│   ├── Requests/            # Form Request Validation
│   └── Services/            # Business Logic Services
├── resources/
│   └── views/               # Blade Templates
├── routes/
│   └── web.php             # Web Routes
├── database/
│   ├── migrations/         # Database Migrations
│   └── seeders/           # Database Seeders
└── public/                # Public Assets
```

## Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## License

This project is licensed under the MIT License.

## AI Support Explanation

Proyek Inventaris BEM FTI dikembangkan dengan dukungan teknologi Artificial Intelligence yang memberikan kontribusi signifikan dalam berbagai aspek pengembangan:

### 🎨 **User Interface Development**
AI berperan dalam merancang dan mengoptimalkan antarmuka pengguna yang responsif dan intuitif. Dengan bantuan AI, kami dapat menciptakan desain yang konsisten dengan tema hitam-merah, implementasi font Poppins, dan pengalaman pengguna yang seamless across different devices.

### 🔧 **Technology Integration**
AI memfasilitasi integrasi yang efisien antara berbagai teknologi stack yang digunakan dalam proyek ini. Mulai dari konfigurasi Laravel dengan MongoDB, implementasi ImageKit untuk cloud storage, hingga optimasi performa aplikasi secara keseluruhan.

### 🚀 **Deployment Automation**
Penggunaan AI dalam proses deployment ke platform Vercel memungkinkan otomatisasi yang lebih efektif. AI membantu dalam konfigurasi environment variables, optimasi build process, dan troubleshooting deployment issues untuk memastikan aplikasi dapat diakses secara stabil.

### ⚙️ **Backend Development**
AI memberikan dukungan komprehensif dalam pengembangan backend, termasuk optimasi database queries, implementasi business logic yang robust, error handling yang efektif, dan security best practices untuk memastikan aplikasi yang aman dan performant.

## Contact

BEM FTI - Fakultas Teknologi Informasi

Project Link: [https://github.com/bemfti-unissula/inventaris](https://github.com/bemfti-unissula/inventaris)
