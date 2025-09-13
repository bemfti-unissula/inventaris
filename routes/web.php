<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Admin\BarangController as AdminBarangController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'create'])->name('register.create');
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
    Route::get('/verify-email', [AuthController::class, 'verifyEmail'])->name('email.verify');
    Route::get('/email-sent', [AuthController::class, 'emailSent'])->name('email.sent');
    Route::get('/resend-verification', [AuthController::class, 'resendVerificationEmail'])->name('email.resend');
});


Route::get('/', [BarangController::class, 'index'])->name('inventaris');
Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
Route::get('/pinjaman', [BarangController::class, 'index'])->name('pinjaman');
Route::get('/riwayat', [TransaksiController::class, 'getByUser'])->name('riwayat');

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile.edit');
    Route::patch('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/profile/password', [AuthController::class, 'updatePassword'])->name('profile.password.update');

    // Transaksi peminjaman (user)
    Route::get('/peminjaman/{barang_id}', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/peminjaman/{barang_id}', [TransaksiController::class, 'peminjaman'])->name('transaksi.store');

    // Halaman pinjaman untuk user
    Route::get('/pinjaman', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'getDetail'])->name('transaksi.detail');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/barang', [AdminBarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [AdminBarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [AdminBarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{barang}/edit', [AdminBarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{barang}', [AdminBarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{barang}', [AdminBarangController::class, 'destroy'])->name('barang.destroy');
});
