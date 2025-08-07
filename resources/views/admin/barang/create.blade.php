<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.barang.index') }}"
                    class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h2 class="font-medium text-lg text-gray-200 leading-tight">
                    {{ isset($barang) ? __('Edit Barang') : __('Tambah Barang Baru') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div
                class="w-full bg-black/50 backdrop-blur-sm rounded-xl border border-white/10 shadow-2xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-sky-600/20 to-blue-600/20 px-6 py-4 border-b border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-sky-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">{{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h3>
                            <p class="text-sm text-gray-400">{{ isset($barang) ? 'Perbarui informasi barang' : 'Lengkapi informasi barang yang akan ditambahkan' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form action="{{ isset($barang) ? route('admin.barang.update', $barang) : route('admin.barang.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @if(isset($barang))
                            @method('PUT')
                        @endif

                        <!-- Grid Layout for Form Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Barang -->
                            <div class="md:col-span-2">
                                <label for="nama_barang" class="block text-sm font-semibold text-gray-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        Nama Barang
                                    </span>
                                </label>
                                <input type="text" name="nama_barang" id="nama_barang"
                                    value="{{ old('nama_barang', isset($barang) ? $barang->nama_barang : '') }}"
                                    class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                    placeholder="Masukkan nama barang...">
                                @error('nama_barang')
                                    <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label for="kategori" class="block text-sm font-semibold text-gray-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                        Kategori
                                    </span>
                                </label>
                                <input type="text" name="kategori" id="kategori" value="{{ old('kategori', isset($barang) ? $barang->kategori : '') }}"
                                    class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                    placeholder="Contoh: Elektronik, Furniture...">
                                @error('kategori')
                                    <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Gambar -->
                            <div>
                                <label for="gambar" class="block text-sm font-semibold text-gray-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Gambar
                                    </span>
                                </label>
                                
                                <div class="relative overflow-hidden rounded-lg">
                                    <input type="file" name="gambar" id="gambar" accept="image/*"
                                        class="w-full h-12 px-2 py-2 bg-black/40 border border-white/20 rounded-lg text-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:font-medium file:bg-sky-500 file:text-white hover:file:bg-sky-600 file:cursor-pointer cursor-pointer focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200">
                                </div>
                                @error('gambar')
                                    <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                
                                
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-semibold text-gray-200 mb-2">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Deskripsi
                                </span>
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="w-full px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200 resize-none"
                                placeholder="Masukkan deskripsi detail barang...">{{ old('deskripsi', isset($barang) ? $barang->deskripsi : '') }}</textarea>
                            @error('deskripsi')
                                <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Grid Layout for Numeric Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Stok -->
                            <div>
                                <label for="stok" class="block text-sm font-semibold text-gray-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                            </path>
                                        </svg>
                                        Stok
                                    </span>
                                </label>
                                <input type="number" name="stok" id="stok" value="{{ old('stok', isset($barang) ? $barang->stok : '') }}"
                                    min="0"
                                    class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                    placeholder="0">
                                @error('stok')
                                    <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Total Dimiliki -->
                            <div>
                                <label for="total_dimiliki" class="block text-sm font-semibold text-gray-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                        Total Dimiliki
                                    </span>
                                </label>
                                <input type="number" name="total_dimiliki" id="total_dimiliki"
                                    value="{{ old('total_dimiliki', isset($barang) ? $barang->total_dimiliki : '') }}" min="0"
                                    class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                    placeholder="0">
                                @error('total_dimiliki')
                                    <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @if(isset($barang) && $barang->gambar)
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-200 mb-2">
                                            <span class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Preview Foto
                                            </span>
                                        </label>
                                        <div class="rounded-lg">
                                            @if(is_array($barang->gambar) && isset($barang->gambar['url']))
                                                <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}" class="h-32 w-32 object-cover rounded-lg border border-white/20">
                                            @elseif(is_string($barang->gambar) && $barang->gambar)
                                                <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" class="h-32 w-32 object-cover rounded-lg border border-white/20">
                                            @endif
                                            <p class="text-xs text-gray-400 mt-2">Gambar saat ini</p>
                                        </div>
                                    </div>
                                @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between items-center gap-4 pt-6 border-t border-white/10">
                            <a href="{{ route('admin.barang.index') }}"
                                class="flex items-center justify-center px-6 py-3 bg-gray-700/50 border border-gray-600/50 rounded-lg font-medium text-gray-200 hover:bg-gray-600/50 hover:border-gray-500/50 focus:outline-none focus:ring-2 focus:ring-gray-500/50 transition duration-200 group min-w-[128px] h-12">
                                <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit"
                                class="flex items-center justify-center px-6 py-3 bg-gradient-to-r from-sky-600 to-sky-700 border border-sky-500/50 rounded-lg font-medium text-white hover:from-sky-500 hover:to-sky-600 hover:border-sky-400/50 focus:outline-none focus:ring-2 focus:ring-sky-500/50 transition duration-200 group shadow-lg shadow-sky-500/25 min-w-[128px] h-12">
                                @if(isset($barang))
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Update
                                @else
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Simpan
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
