<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('inventaris') }}"
                    class="text-red-400 hover:text-red-200 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h2 class="font-superline text-lg text-red-100 leading-tight drop-shadow-lg">
                    {{ __('Detail Barang') }}
                </h2>
            </div>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.barang.edit', $barang) }}"
                        class="inline-flex items-center px-4 py-2 bg-red-gradient hover:from-red-500 hover:to-red-600 text-white text-sm font-superline-line rounded-lg transition duration-200 red-glow shadow-lg hover:shadow-red-500/25">
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
                class="w-full bg-gradient-to-br from-red-900/20 to-red-800/10 backdrop-blur-sm rounded-xl border border-red-300/20 shadow-2xl overflow-hidden red-glow">
                <!-- Header -->
                <div
                    class="bg-gradient-to-r from-red-600/20 to-red-700/20 px-6 py-4 border-b border-red-300/20 red-glow">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center red-glow">
                            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-superline text-red-100 drop-shadow-lg">Detail Informasi Barang</h3>
                            <p class="text-sm text-red-300 font-superline-line">Informasi lengkap tentang
                                {{ $barang->nama_barang }}</p>
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
                                <label class="block text-sm font-superline-line text-red-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        Nama Barang
                                    </span>
                                </label>
                                <div
                                    class="w-full h-12 px-4 py-3 bg-red-900/20 border border-red-300/20 rounded-lg text-red-100 flex items-center red-glow font-superline-line">
                                    {{ $barang->nama_barang }}
                                </div>
                            </div>

                            <!-- Grid for Kategori and Stok -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Kategori -->
                                <div>
                                    <label class="block text-sm font-superline-line text-red-200 mb-2">
                                        <span class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                </path>
                                            </svg>
                                            Kategori
                                        </span>
                                    </label>
                                    <div
                                        class="w-full h-12 px-4 py-3 bg-red-900/20 border border-red-300/20 rounded-lg text-red-100 flex items-center red-glow">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-superline-line bg-red-500/20 text-red-300 border border-red-500/30 red-glow">
                                            {{ $barang->kategori }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Stok -->
                                <div>
                                    <label class="block text-sm font-superline-line text-red-200 mb-2">
                                        <span class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                            </svg>
                                            Stok
                                        </span>
                                    </label>
                                    <div
                                        class="w-full h-12 px-4 py-3 bg-red-900/20 border border-red-300/20 rounded-lg text-red-100 flex items-center red-glow">
                                        <span class="text-lg font-superline text-red-400">{{ $barang->stok }}</span>
                                        <span class="ml-2 text-red-300 font-superline-line">unit</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Dimiliki -->
                            <div>
                                <label class="block text-sm font-superline-line text-red-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                        Total Dimiliki
                                    </span>
                                </label>
                                <div
                                    class="w-full h-12 px-4 py-3 bg-red-900/20 border border-red-300/20 rounded-lg text-red-100 flex items-center red-glow">
                                    <span
                                        class="text-lg font-superline text-red-400">{{ $barang->total_dimiliki }}</span>
                                    <span class="ml-2 text-red-300 font-superline-line">unit</span>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-sm font-superline-line text-red-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7"></path>
                                        </svg>
                                        Deskripsi
                                    </span>
                                </label>
                                <div
                                    class="w-full min-h-[120px] px-4 py-3 bg-red-900/20 border border-red-300/20 rounded-lg text-red-100 red-glow font-superline-line">
                                    {{ $barang->deskripsi ?? 'Tidak ada deskripsi' }}
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Image -->
                        <div class="lg:col-span-1">
                            <div class="sticky top-6">
                                <label class="block text-sm font-superline-line text-red-200 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Foto Barang
                                    </span>
                                </label>

                                <div
                                    class="w-full bg-red-900/10 border border-red-300/20 rounded-lg overflow-hidden red-glow">
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

                    <!-- Tombol Pinjam -->
                    @if (Auth::check())
                        <div class="mt-6 pt-6 border-t border-red-300/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-superline text-red-100 mb-2">Peminjaman Barang</h4>
                                    <p class="text-sm text-red-300 font-superline-line">
                                        @if ($barang->stok > 0)
                                            Barang tersedia untuk dipinjam
                                        @else
                                            Barang sedang tidak tersedia
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    @if ($barang->stok > 0)
                                        <a href="{{ route('transaksi.create', $barang->_id) }}"
                                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white text-sm font-superline rounded-lg transition duration-200 shadow-lg hover:shadow-green-500/25 border border-green-500/30">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Pinjam Barang
                                        </a>
                                    @else
                                        <button disabled
                                            class="inline-flex items-center px-6 py-3 bg-gray-600 text-gray-300 text-sm font-superline rounded-lg cursor-not-allowed opacity-50">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728">
                                                </path>
                                            </svg>
                                            Tidak Tersedia
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mt-6 pt-6 border-t border-red-300/20">
                            <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-400 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.864-.833-2.634 0L4.2 16.5c-.77.833.192 2.5 1.732 2.5z">
                                        </path>
                                    </svg>
                                    <div>
                                        <h4 class="text-yellow-400 font-superline">Login Diperlukan</h4>
                                        <p class="text-yellow-300 text-sm font-superline-line">Silakan login terlebih
                                            dahulu untuk meminjam barang ini</p>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="{{ route('login') }}"
                                            class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-superline rounded-lg transition duration-200">
                                            Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
