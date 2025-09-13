@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<x-app-layout>
    <div class="py-6 px-4 bg-gradient-to-br from-pink-100 to-red-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div
                class="relative mb-16 bg-gradient-to-br from-red-600 to-red-800 border border-red-600 rounded-3xl overflow-hidden shadow-xl red-glow">
                <!-- Subtle Background Pattern -->
                <div class="absolute inset-0 bg-[url('/grid.svg')] bg-center opacity-[0.05] filter hue-rotate-[350deg]"></div>

                <!-- Hero Content -->
                <div class="relative px-8 py-20 lg:py-28">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <!-- Left Content -->
                        <div class="space-y-8">
                            <!-- Main Heading -->
                            <div class="space-y-4">
                                <h1 class="text-5xl lg:text-6xl font-poppins font-bold text-white leading-tight drop-shadow-lg">
                                    Inventaris
                                    <span class="block text-red-100 mt-2 font-poppins">
                                        BEM FTI
                                    </span>
                                </h1>
                                <div class="w-24 h-1 bg-gradient-to-r from-white to-red-200 rounded-full shadow-lg"></div>
                            </div>

                            <!-- Description -->
                            <p class="text-lg lg:text-xl text-white/90 leading-relaxed max-w-lg drop-shadow-md">
                                Kelola inventaris Badan Eksekutif Mahasiswa Fakultas Teknologi Industri dengan sistem
                                yang modern, efisien, dan terintegrasi.
                            </p>

                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                <a href="#inventory-section"
                                    class="inline-flex items-center justify-center px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-poppins font-semibold rounded-xl transition-all duration-200 shadow-lg transform hover:scale-105 red-glow border-2 border-red-600 hover:border-red-500">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Jelajahi Inventaris
                                </a>
                                @auth
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('admin.barang.index') }}"
                                            class="inline-flex items-center justify-center px-8 py-4 bg-gray-900 hover:bg-black text-red-400 font-poppins font-semibold rounded-xl border-2 border-red-600 hover:border-red-500 transition-all duration-200 shadow-lg red-glow">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            Kelola Barang
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>

                        <!-- Right Content - Enhanced Image Gallery -->
                        <div class="relative">
                            <!-- Main Featured Image -->
                            <div class="relative group">
                                <!-- Glowing Border Effect -->
                                <div
                                    class="absolute -inset-2 bg-gradient-to-r from-white via-red-200 to-white rounded-3xl blur-lg opacity-50 group-hover:opacity-70 transition duration-1000 group-hover:duration-200 animate-pulse">
                                </div>
                                <!-- Card Container -->
                                <div
                                    class="relative bg-gradient-to-br from-white via-red-50 to-red-100 backdrop-blur-sm rounded-2xl overflow-hidden shadow-2xl red-glow">
                                    <!-- Logo Container -->
                                    <div class="relative p-8">
                                        <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI"
                                            class="w-full h-64 object-contain drop-shadow-2xl red-glow">
                                        <!-- Decorative Elements -->
                                        <div
                                            class="absolute top-4 right-4 w-4 h-4 bg-white rounded-full animate-ping shadow-lg">
                                        </div>
                                    </div>
                                    <!-- Enhanced Text Section -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900/90 to-transparent p-6">
                                        <h3 class="text-white font-poppins font-bold text-xl drop-shadow-lg">BEM FTI UNISSULA</h3>
                                        <p class="text-red-300 text-sm font-medium drop-shadow-md font-poppins">Badan Eksekutif
                                            Mahasiswa</p>
                                    </div>
                                </div>

                                <!-- Subtle Background Elements -->
                                <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-red-100 rounded-full opacity-40">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Scroll Indicator -->
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce ">
                    <div class="bg-white/30 backdrop-blur-sm rounded-full p-3 border border-white/50 red-glow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Professional Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Items Card -->
                <div class="bg-white/95 backdrop-blur-sm border border-red-200 rounded-xl p-6 group hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-600 text-sm font-medium font-poppins">Total Barang</p>
                            <p class="text-2xl font-bold text-red-800 font-poppins">{{ $barangs->total() }}</p>
                        </div>
                        <div class="p-3 bg-red-600 rounded-lg red-glow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Items Card -->
                <div
                class="bg-white/95 backdrop-blur-sm border border-red-200 rounded-xl p-6 group hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-600 text-sm font-medium font-poppins">Tersedia</p>
                            <p class="text-2xl font-bold text-red-800 font-poppins">{{ $barangs->where('stok', '>', 0)->count() }}
                            </p>
                        </div>
                        <div class="p-3 bg-red-600 rounded-lg red-glow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Categories Card -->
                <div
                    class="bg-white/95 backdrop-blur-sm border border-red-200 rounded-xl p-6 group hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-600 text-sm font-medium font-poppins">Kategori</p>
                            <p class="text-2xl font-bold text-red-800 font-poppins">{{ count($categories) }}</p>
                        </div>
                        <div class="p-3 bg-red-600 rounded-lg red-glow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white/95 backdrop-blur-sm rounded-xl border border-red-200 p-6 mb-8 shadow-lg red-glow">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center red-glow">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-red-800 font-poppins">Pencarian & Filter</h3>
                </div>

                <form action="{{ route('inventaris') }}" method="GET" class="space-y-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Search Input -->
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-red-600 mb-2 font-poppins">Cari Barang</label>
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="w-full h-12 bg-white rounded-lg pl-12 pr-4 py-3 text-red-800 border border-red-300 placeholder-red-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 group-hover:border-red-400 red-glow"
                                    placeholder="Masukkan nama barang...">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500 group-hover:text-red-400 transition-colors"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="w-full md:w-64">
                            <label class="block text-sm font-medium text-red-600 mb-2 font-poppins">Filter Kategori</label>
                            <div class="relative">
                                <select name="category" id="category" onchange="this.form.submit()"
                                    class="w-full h-12 bg-white rounded-lg px-4 py-3 border border-red-300 text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 cursor-pointer appearance-none red-glow">
                                    <option class="bg-white text-red-800" value="">Semua Kategori</option>
                                    @foreach ($categories as $cat)
                                        <option class="bg-white text-red-800" value="{{ $cat }}"
                                            {{ request()->get('category') == $cat ? 'selected' : '' }}>
                                            {{ $cat }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <div class="w-full md:w-auto">
                            <label class="block text-sm font-medium text-transparent mb-2">Action</label>
                            <button type="submit"
                                class="w-full md:w-auto h-12 px-6 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-poppins font-medium rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500/50 red-glow">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Active Filters -->
                @if ($currentFilters['search'] || $currentFilters['category'])
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="text-sm text-red-600 font-poppins">Filter Aktif:</span>
                        @if ($currentFilters['search'])
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white font-poppins">
                                Pencarian: {{ $currentFilters['search'] }}
                            </span>
                        @endif
                        @if ($currentFilters['category'])
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white font-poppins">
                                Kategori: {{ $currentFilters['category'] }}
                            </span>
                        @endif
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white font-poppins">
                            Total: {{ $currentFilters['total_items'] }} barang
                        </span>
                    </div>
                @endif
            </div>

            <!-- Items Grid Header -->
            <div id="inventory-section" class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center red-glow">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-red-800 font-poppins">Daftar Inventaris</h3>
                        <p class="text-sm text-red-600 font-poppins">{{ $barangs->total() }} barang ditemukan</p>
                    </div>
                </div>

                <!-- View Toggle -->
                <div class="flex items-center gap-2 bg-white rounded-lg p-1 border border-red-300 red-glow">
                    <button id="gridViewBtn"
                        class="view-toggle active flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 font-poppins">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="font-semibold">Grid</span>
                    </button>
                    <button id="listViewBtn"
                        class="view-toggle flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 font-poppins">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="font-semibold">List</span>
                    </button>
                </div>
            </div>

            <!-- Skeleton Loader -->
            <x-skeleton-loader />

            <!-- Grid View -->
            <div id="gridView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @forelse ($barangs as $barang)
                    <div class="transform transition-all duration-300 hover:scale-105">
                        <a href="{{ route('barang.show', $barang) }}" class="block">
                            <div
                                class="bg-white/95 backdrop-blur-sm rounded-xl border border-red-200 p-6 hover:bg-white transition-all duration-300 hover:border-red-400 group shadow-lg red-glow hover:shadow-red-500/20">
                                <!-- Image -->
                                <div class="w-full h-48 rounded-lg overflow-hidden mb-4 bg-gray-700">
                                    @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                        <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                            class="w-full h-full object-cover">
                                    @elseif (is_string($barang->gambar) && $barang->gambar)
                                        <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <h3
                                    class="text-lg font-semibold text-red-800 mb-2 group-hover:text-red-600 transition-colors font-poppins">
                                    {{ $barang->nama_barang }}</h3>
                                <p class="text-red-600 text-sm mb-3 line-clamp-2 font-poppins">
                                    {{ $barang->deskripsi }}
                                </p>

                                <div class="flex items-center justify-between mb-3">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white border border-red-500 red-glow font-poppins">
                                        {{ $barang->kategori }}
                                    </span>
                                    <span class="text-sm text-red-700">
                                        <span class="font-medium font-poppins">Stok:</span>
                                        <span
                                            class="{{ $barang->stok > 0 ? 'text-green-600' : 'text-red-600' }} font-poppins">{{ $barang->stok }}</span>
                                    </span>
                                </div>

                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-red-600 font-poppins">Klik untuk detail</span>
                                    <svg class="w-4 h-4 text-red-600 group-hover:text-red-500 transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div
                            class="bg-white/90 backdrop-blur-sm rounded-xl border border-red-300 p-12 text-center shadow-lg red-glow">
                            <div
                                class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 red-glow">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-red-800 mb-2 font-superline">Tidak Ada Barang Ditemukan</h3>
                            <p class="text-red-600 mb-4">Coba ubah kata kunci pencarian atau filter kategori</p>
                            <a href="{{ route('inventaris') }}"
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors font-superline red-glow">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>
                                </svg>
                                Reset Filter
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- List View -->
            <div id="listView" class="hidden space-y-4 mb-8">
                @forelse ($barangs as $barang)
                    <a href="{{ route('barang.show', $barang) }}" class="block">
                        <div
                            class="bg-white/90 backdrop-blur-sm rounded-xl border border-red-200 p-6 hover:bg-white transition-all duration-300 hover:border-red-400 shadow-lg red-glow hover:shadow-red-500/20">
                            <div class="flex items-center gap-6">
                                <!-- Image -->
                                <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100">
                                    @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                        <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                            class="w-full h-full object-cover">
                                    @elseif (is_string($barang->gambar) && $barang->gambar)
                                        <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('images/logo-bem-fti.png') }}"
                                            alt="{{ $barang->nama_barang }}" class="w-full h-full object-cover">
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-semibold text-red-800 mb-1 truncate font-poppins">
                                                {{ $barang->nama_barang }}</h3>
                                            <p class="text-red-600 text-sm mb-2 font-poppins">
                                                <span class="description-text-list">{{ $barang->deskripsi }}</span>
                                            </p>
                                            <div class="flex items-center gap-4">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200 red-glow font-poppins">
                                                    {{ $barang->kategori }}
                                                </span>
                                                <span class="text-sm text-red-700">
                                                    <span class="font-medium font-poppins">Stok:</span>
                                                    <span
                                                        class="{{ $barang->stok > 0 ? 'text-green-600' : 'text-red-600' }} font-poppins">{{ $barang->stok }}</span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Arrow -->
                                        <div class="ml-4 flex-shrink-0 flex items-center">
                                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div
                        class="bg-white/90 backdrop-blur-sm rounded-xl border border-red-300 p-12 text-center shadow-lg red-glow">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 red-glow">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-red-800 mb-2 font-poppins">Tidak Ada Barang Ditemukan</h3>
                        <p class="text-red-600 mb-4 font-poppins">Coba ubah kata kunci pencarian atau filter kategori</p>
                        <a href="{{ route('inventaris') }}"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors font-poppins red-glow">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Reset Filter
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Enhanced Pagination -->
            <div class="mt-8 bg-white/90 backdrop-blur-sm shadow-lg rounded-xl border border-red-300 p-6 red-glow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 10h6m-6 4h6">
                            </path>
                        </svg>
                        <div class="text-sm text-red-600 font-poppins">
                            <span class="font-medium text-red-800 font-poppins">{{ $barangs->firstItem() ?? 0 }}</span>
                            -
                            <span class="font-medium text-red-800 font-poppins">{{ $barangs->lastItem() ?? 0 }}</span>
                            dari
                            <span class="font-medium text-red-800 font-poppins">{{ $barangs->total() }}</span>
                            barang
                        </div>
                    </div>

                    <div class="flex items-center space-x-1">
                        @if ($barangs->onFirstPage())
                            <span
                                class="px-3 py-2 text-sm font-medium text-red-400 bg-red-100 border border-red-200 rounded-l-lg cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $barangs->previousPageUrl() }}"
                                class="px-3 py-2 text-sm font-medium text-red-600 bg-white border border-red-300 rounded-l-lg hover:bg-red-50 hover:text-red-700 transition-colors red-glow">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                        @endif

                        @foreach ($barangs->getUrlRange(1, $barangs->lastPage()) as $page => $url)
                            @if ($page == $barangs->currentPage())
                                <span
                                    class="px-3 py-2 text-sm font-medium text-white bg-red-600 border border-red-600 font-poppins red-glow">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-2 text-sm font-medium text-red-700 bg-white border border-red-300 hover:bg-red-50 hover:text-red-900 transition-colors font-poppins red-glow">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        @if ($barangs->hasMorePages())
                            <a href="{{ $barangs->nextPageUrl() }}"
                                class="px-3 py-2 text-sm font-medium text-red-600 bg-white border border-red-300 rounded-r-lg hover:bg-red-50 hover:text-red-700 transition-colors red-glow">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @else
                            <span
                                class="px-3 py-2 text-sm font-medium text-red-400 bg-red-100 border border-red-200 rounded-r-lg cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .pagination {
            @apply flex items-center space-x-1;
        }

        .pagination .page-link {
            @apply px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-white rounded-lg hover:bg-red-50 hover:text-red-600 hover:border-red-300 transition-all duration-300;
        }

        .pagination .page-item.active .page-link {
            @apply bg-gradient-to-r from-red-600 to-red-700 text-white border-red-600 shadow-lg shadow-red-500/25;
        }

        .pagination .page-item.disabled .page-link {
            @apply text-gray-400 cursor-not-allowed hover:bg-white hover:text-gray-400 hover:border-gray-300;
        }

        .pagination .page-link:focus {
            @apply outline-none ring-2 ring-red-500/50;
        }

        /* Custom pagination arrows */
        .pagination .page-link[rel="prev"],
        .pagination .page-link[rel="next"] {
            @apply px-4;
        }

        /* View Toggle Styles */
        .view-toggle {
            @apply text-gray-600 hover:text-red-600 bg-transparent hover:bg-red-50 border-2 border-transparent;
        }

        .view-toggle.active {
            @apply bg-red-100 text-red-700 border-2 border-red-300 shadow-lg;
            box-shadow: 0 0 0 1px rgba(239, 68, 68, 0.3);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gridViewBtn = document.getElementById('gridViewBtn');
            const listViewBtn = document.getElementById('listViewBtn');
            const gridView = document.getElementById('gridView');
            const listView = document.getElementById('listView');
            const gridSkeleton = document.getElementById('gridViewSkeleton');
            const listSkeleton = document.getElementById('listViewSkeleton');

            // Show skeleton loader initially
            showSkeletonLoader();

            // Hide skeleton after 1.5 seconds and show content
            setTimeout(function() {
                hideSkeletonLoader();

                // Load saved view preference
                const savedView = localStorage.getItem('inventoryView') || 'grid';
                if (savedView === 'list') {
                    showListView();
                } else {
                    showGridView();
                }
            }, 1500);

            gridViewBtn.addEventListener('click', function() {
                showGridView();
                localStorage.setItem('inventoryView', 'grid');
            });

            listViewBtn.addEventListener('click', function() {
                showListView();
                localStorage.setItem('inventoryView', 'list');
            });

            function showSkeletonLoader() {
                // Hide actual content
                if (gridView) gridView.style.display = 'none';
                if (listView) listView.style.display = 'none';

                // Show skeleton based on current view
                const currentView = localStorage.getItem('inventoryView') || 'grid';

                if (currentView === 'grid') {
                    if (gridSkeleton) gridSkeleton.style.display = 'grid';
                    if (listSkeleton) listSkeleton.style.display = 'none';
                } else {
                    if (gridSkeleton) gridSkeleton.style.display = 'none';
                    if (listSkeleton) listSkeleton.style.display = 'block';
                }
            }

            function hideSkeletonLoader() {
                // Hide skeleton loaders
                if (gridSkeleton) gridSkeleton.style.display = 'none';
                if (listSkeleton) listSkeleton.style.display = 'none';
            }

            function showGridView() {
                if (gridView) {
                    gridView.classList.remove('hidden');
                    gridView.style.display = 'grid';
                }
                if (listView) {
                    listView.classList.add('hidden');
                    listView.style.display = 'none';
                }
                gridViewBtn.classList.add('active');
                listViewBtn.classList.remove('active');
            }

            function showListView() {
                if (gridView) {
                    gridView.classList.add('hidden');
                    gridView.style.display = 'none';
                }
                if (listView) {
                    listView.classList.remove('hidden');
                    listView.style.display = 'block';
                }
                listViewBtn.classList.add('active');
                gridViewBtn.classList.remove('active');
            }
        });
    </script>

    <style>
        .description-text-list {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
        }
    </style>
</x-app-layout>
