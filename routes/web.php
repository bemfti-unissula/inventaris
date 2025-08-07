<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Admin\BarangController as AdminBarangController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'create'])->name('register.create');
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', [BarangController::class, 'index'])->name('inventaris');
Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
Route::get('/pinjaman', [BarangController::class, 'index'])->name('pinjaman');
Route::get('/riwayat', [BarangController::class, 'index'])->name('riwayat');

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile.edit');
    Route::patch('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/profile/password', [AuthController::class, 'updatePassword'])->name('profile.password.update');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/barang', [AdminBarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [AdminBarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [AdminBarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{barang}/edit', [AdminBarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{barang}', [AdminBarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{barang}', [AdminBarangController::class, 'destroy'])->name('barang.destroy');
});
