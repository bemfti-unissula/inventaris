<x-app-layout>


    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Back Icon -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ route('inventaris') }}"
                    class="flex items-center justify-center w-10 h-10 text-white hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-white">Detail Barang</h1>
                    <p class="text-gray-400">{{ $barang->nama_barang }}</p>
                </div>
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('admin.barang.edit', $barang) }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-medium transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Barang
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column - Main Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Informasi Barang -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-white">Informasi Barang</h2>
                                <p class="text-gray-400">Detail lengkap barang inventaris</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Nama Barang -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Barang</label>
                                <div class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white">
                                    {{ $barang->nama_barang }}
                                </div>
                            </div>

                            <!-- Grid for Kategori and Stok -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Kategori -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Kategori</label>
                                    <div class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white flex items-center">
                                        <span class="inline-flex items-center px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-sm">
                                            {{ $barang->kategori }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Stok -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Stok Tersedia</label>
                                    <div class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white flex items-center">
                                        <span class="text-lg font-semibold text-red-400">{{ $barang->stok }}</span>
                                        <span class="ml-2 text-gray-400">unit</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Dimiliki -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Total Dimiliki</label>
                                <div class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white flex items-center">
                                    <span class="text-lg font-semibold text-red-400">{{ $barang->total_dimiliki }}</span>
                                    <span class="ml-2 text-gray-400">unit</span>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                                <div class="w-full min-h-[120px] px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-300 leading-relaxed">
                                    {{ $barang->deskripsi ?? 'Tidak ada deskripsi' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Image -->
                <div class="lg:col-span-1">
                    <!-- Gambar Barang -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-white">Gambar Barang</h2>
                                <p class="text-gray-400">Foto barang inventaris</p>
                            </div>
                        </div>

                        <div class="w-full bg-gray-800 rounded-lg overflow-hidden">
                            @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                    class="w-full h-64 object-cover">
                            @elseif (is_string($barang->gambar) && $barang->gambar)
                                <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                    class="w-full h-64 object-cover">
                            @else
                                <div class="w-full h-64 bg-gray-700 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Pinjam -->
            @if (Auth::check())
                <div class="mt-6">
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white">Peminjaman Barang</h3>
                                    <p class="text-gray-400">
                                        @if ($barang->stok > 0)
                                            Barang tersedia untuk dipinjam
                                        @else
                                            Barang sedang tidak tersedia
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex-shrink-0">
                                @if ($barang->stok > 0)
                                    <a href="{{ route('transaksi.create', $barang->_id) }}"
                                        class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Pinjam Barang
                                    </a>
                                @else
                                    <button disabled
                                        class="inline-flex items-center gap-2 px-6 py-3 bg-gray-600 text-gray-400 rounded-lg cursor-not-allowed opacity-50">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                </div>
            @else
                <div class="mt-6">
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-yellow-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-lg font-semibold text-white">Login Diperlukan</h4>
                                <p class="text-gray-400">Silakan login terlebih dahulu untuk meminjam barang ini</p>
                            </div>
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-medium transition-colors duration-200">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
