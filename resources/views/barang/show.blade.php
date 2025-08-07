<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('inventaris') }}" class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h2 class="font-medium text-lg text-gray-200 leading-tight">
                    {{ __('Detail Barang') }}
                </h2>
            </div>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.barang.edit', $barang) }}"
                        class="inline-flex items-center px-4 py-2 bg-sky-400 hover:bg-sky-300 text-white text-sm font-medium rounded-lg transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Barang
                    </a>
                </div>
            @endif
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
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Detail Informasi Barang</h3>
                            <p class="text-sm text-gray-400">Informasi lengkap tentang {{ $barang->nama_barang }}</p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Grid Layout for Information -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Left Column - Main Information -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Nama Barang -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-200 mb-2">
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
                                <div
                                    class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white flex items-center">
                                    {{ $barang->nama_barang }}
                                </div>
                            </div>

                            <!-- Grid for Kategori and Stok -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Kategori -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-200 mb-2">
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
                                    <div
                                        class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white flex items-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                                            {{ $barang->kategori }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Stok -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-200 mb-2">
                                        <span class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                            </svg>
                                            Stok
                                        </span>
                                    </label>
                                    <div
                                        class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white flex items-center">
                                        <span class="text-lg font-bold text-sky-400">{{ $barang->stok }}</span>
                                        <span class="ml-2 text-gray-400">unit</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Dimiliki -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-200 mb-2">
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
                                <div
                                    class="w-full h-12 px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white flex items-center">
                                    <span class="text-lg font-bold text-sky-400">{{ $barang->total_dimiliki }}</span>
                                    <span class="ml-2 text-gray-400">unit</span>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7"></path>
                                        </svg>
                                        Deskripsi
                                    </span>
                                </label>
                                <div
                                    class="w-full min-h-[120px] px-4 py-3 bg-black/40 border border-white/20 rounded-lg text-white">
                                    {{ $barang->deskripsi ?? 'Tidak ada deskripsi' }}
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Image -->
                        <div class="lg:col-span-1">
                            <div class="sticky top-6">
                                <label class="block text-sm font-semibold text-gray-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Foto Barang
                                    </span>
                                </label>

                                <div class="w-full bg-transparent border border-white/20 rounded-lg overflow-hidden">
                                    @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                        <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                            class="w-full h-64 object-contain bg-transparent rounded-lg">
                                    @elseif (is_string($barang->gambar) && $barang->gambar)
                                        <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                            class="w-full h-64 object-contain bg-transparent rounded-lg">
                                    @else
                                        <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI"
                                            class="w-full h-64 object-contain bg-transparent rounded-lg">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
