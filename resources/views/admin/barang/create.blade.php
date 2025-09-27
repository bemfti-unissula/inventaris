<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Back Icon -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ route('admin.barang.index') }}"
                    class="flex items-center justify-center w-10 h-10 text-white hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-white">{{ isset($barang) ? 'Edit Barang' : 'Tambah Barang Baru' }}</h1>
                    <p class="text-gray-400">{{ isset($barang) ? 'Perbarui informasi barang inventaris' : 'Lengkapi informasi barang yang akan ditambahkan' }}</p>
                </div>
            </div>

            <!-- Form Container -->
            <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="{{ isset($barang) ? 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' : 'M12 6v6m0 0v6m0-6h6m-6 0H6' }}">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-white">{{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h2>
                        <p class="text-gray-400">{{ isset($barang) ? 'Perbarui informasi barang' : 'Lengkapi data barang inventaris' }}</p>
                    </div>
                </div>

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
                            <label for="nama_barang" class="block text-sm font-medium text-gray-300 mb-2">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang"
                                value="{{ old('nama_barang', isset($barang) ? $barang->nama_barang : '') }}"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200"
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
                            <label for="kategori" class="block text-sm font-medium text-gray-300 mb-2">Kategori</label>
                            <input type="text" name="kategori" id="kategori" value="{{ old('kategori', isset($barang) ? $barang->kategori : '') }}"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200"
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
                            <label for="gambar" class="block text-sm font-medium text-gray-300 mb-2">Gambar</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="w-full px-3 py-1.5 bg-gray-800 border border-gray-700 rounded-lg text-white file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-red-600 file:text-white hover:file:bg-red-700 file:cursor-pointer cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200">
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
                        <label for="deskripsi" class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 resize-none"
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
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Stok -->
                        <div>
                            <label for="stok" class="block text-sm font-medium text-gray-300 mb-2">Stok Tersedia</label>
                            <input type="number" name="stok" id="stok" value="{{ old('stok', isset($barang) ? $barang->stok : '') }}"
                                min="0"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200"
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
                            <label for="total_dimiliki" class="block text-sm font-medium text-gray-300 mb-2">Total Dimiliki</label>
                            <input type="number" name="total_dimiliki" id="total_dimiliki"
                                value="{{ old('total_dimiliki', isset($barang) ? $barang->total_dimiliki : '') }}" min="0"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200"
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

                        <!-- Status Pembayaran -->
                        <div>
                            <label for="is_paid" class="block text-sm font-medium text-gray-300 mb-2">Status Pembayaran</label>
                            <div class="relative">
                                <select name="is_paid" id="is_paid"
                                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 appearance-none cursor-pointer">
                                    <option value="0" {{ old('is_paid', isset($barang) && $barang->is_paid ? '0' : '0') == '0' ? 'selected' : '' }}>
                                        Gratis
                                    </option>
                                    <option value="1" {{ old('is_paid', isset($barang) && $barang->is_paid ? '1' : '0') == '1' ? 'selected' : '' }}>
                                        Berbayar
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('is_paid')
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

                    <!-- Image Preview Section (for Edit Mode) -->
                    @if(isset($barang) && $barang->gambar)
                        <div class="bg-gray-800/30 border border-gray-700/50 rounded-xl pt-4 p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-gray-700/50 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white">Preview Gambar</h3>
                                    <p class="text-sm text-gray-400">Gambar yang sedang digunakan</p>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                @if(is_array($barang->gambar) && isset($barang->gambar['url']))
                                    <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}" 
                                        class="w-48 h-48 object-cover rounded-lg border border-gray-600/50">
                                @elseif(is_string($barang->gambar) && $barang->gambar)
                                    <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" 
                                        class="w-48 h-48 object-cover rounded-lg border border-gray-600/50">
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center gap-4 pt-6 border-t border-gray-800">
                        <a href="{{ route('admin.barang.index') }}"
                            class="flex items-center gap-2 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                        <button type="submit"
                            class="flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                            @if(isset($barang))
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Update Barang
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Simpan Barang
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
