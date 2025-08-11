@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-lg text-gray-800 leading-tight">
                {{ __('Daftar Barang') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 px-4 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div
                class="relative mb-16 bg-gradient-to-br from-slate-50 to-white border border-slate-200 rounded-3xl overflow-hidden shadow-xl">
                <!-- Subtle Background Pattern -->
                <div class="absolute inset-0 bg-[url('/grid.svg')] bg-center opacity-[0.02]"></div>

                <!-- Hero Content -->
                <div class="relative px-8 py-20 lg:py-28">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <!-- Left Content -->
                        <div class="space-y-8">
                            <!-- Main Heading -->
                            <div class="space-y-4">
                                <h1 class="text-5xl lg:text-6xl font-bold text-slate-900 leading-tight">
                                    Inventaris
                                    <span class="block text-red-600 mt-2">
                                        BEM FTI
                                    </span>
                                </h1>
                                <div class="w-24 h-1 bg-gradient-to-r from-red-500 to-red-600 rounded-full"></div>
                            </div>

                            <!-- Description -->
                            <p class="text-lg lg:text-xl text-slate-600 leading-relaxed max-w-lg">
                                Kelola inventaris Badan Eksekutif Mahasiswa Fakultas Teknologi Industri dengan sistem
                                yang modern, efisien, dan terintegrasi.
                            </p>

                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                <a href="#inventory-section"
                                    class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg transform hover:scale-105 hover:shadow-red-500/25">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Jelajahi Inventaris
                                </a>
                                @auth
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('admin.barang.index') }}"
                                            class="inline-flex items-center justify-center px-8 py-4 bg-white hover:bg-slate-50 text-slate-700 font-semibold rounded-xl border-2 border-slate-200 hover:border-slate-300 transition-all duration-200">
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
                                    class="absolute -inset-2 bg-gradient-to-r from-red-400 via-red-500 to-red-400 rounded-3xl blur-lg opacity-30 group-hover:opacity-50 transition duration-1000 group-hover:duration-200 animate-pulse">
                                </div>
                                <!-- Card Container -->
                                <div
                                    class="relative bg-gradient-to-br from-white via-red-50 to-red-50 backdrop-blur-sm rounded-2xl overflow-hidden shadow-2xl">
                                    <!-- Logo Container -->
                                    <div class="relative p-8">
                                        <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI"
                                            class="w-full h-64 object-contain drop-shadow-2xl">
                                        <!-- Decorative Elements -->
                                        <div
                                            class="absolute top-4 right-4 w-4 h-4 bg-red-400 rounded-full animate-ping">
                                        </div>
                                    </div>
                                    <!-- Enhanced Text Section -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-red-400/80 to-transparent p-6">
                                        <h3 class="text-white font-bold text-xl drop-shadow-lg">BEM FTI UNISSULA</h3>
                                        <p class="text-white text-sm font-medium drop-shadow-md">Badan Eksekutif
                                            Mahasiswa</p>
                                    </div>
                                </div>

                                <!-- Subtle Background Elements -->
                                <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-slate-100 rounded-full opacity-40">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Scroll Indicator -->
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce ">
                    <div class="bg-gray-400/20 backdrop-blur-sm rounded-full p-3 border border-gray-300/30">
                        <svg class="w-6 h-6 text-black-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Professional Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Items Card -->
                <div
                    class="bg-white border border-gray-200 rounded-xl p-6 group hover:shadow-lg hover:shadow-gray-500/10 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Barang</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $barangs->total() }}</p>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Items Card -->
                <div
                    class="bg-white border border-gray-200 rounded-xl p-6 group hover:shadow-lg hover:shadow-gray-500/10 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Tersedia</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $barangs->where('stok', '>', 0)->count() }}
                            </p>
                        </div>
                        <div class="p-3 bg-green-50 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Categories Card -->
                <div
                    class="bg-white border border-gray-200 rounded-xl p-6 group hover:shadow-lg hover:shadow-gray-500/10 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Kategori</p>
                            <p class="text-2xl font-bold text-gray-900">{{ count($categories) }}</p>
                        </div>
                        <div class="p-3 bg-indigo-50 rounded-lg">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
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
            <div class="bg-white/90 backdrop-blur-sm rounded-xl border border-gray-300 p-6 mb-8 shadow-lg">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Pencarian & Filter</h3>
                </div>

                <form action="{{ route('inventaris') }}" method="GET" class="space-y-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Search Input -->
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cari Barang</label>
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="w-full h-12 bg-white rounded-lg pl-12 pr-4 py-3 text-gray-900 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 group-hover:border-gray-400"
                                    placeholder="Masukkan nama barang...">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-600 transition-colors"
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">Filter Kategori</label>
                            <div class="relative">
                                <select name="category" id="category" onchange="this.form.submit()"
                                    class="w-full h-12 bg-white rounded-lg px-4 py-3 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 cursor-pointer appearance-none">
                                    <option class="bg-white text-gray-900" value="">Semua Kategori</option>
                                    @foreach ($categories as $cat)
                                        <option class="bg-white text-gray-900" value="{{ $cat }}"
                                            {{ request()->get('category') == $cat ? 'selected' : '' }}>
                                            {{ $cat }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
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
                                class="w-full md:w-auto h-12 px-6 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500/50">
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
                        <span class="text-sm text-gray-600">Filter Aktif:</span>
                        @if ($currentFilters['search'])
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Pencarian: {{ $currentFilters['search'] }}
                            </span>
                        @endif
                        @if ($currentFilters['category'])
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Kategori: {{ $currentFilters['category'] }}
                            </span>
                        @endif
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Total: {{ $currentFilters['total_items'] }} barang
                        </span>
                    </div>
                @endif
            </div>

            <!-- Items Grid Header -->
            <div id="inventory-section" class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Daftar Inventaris</h3>
                        <p class="text-sm text-gray-600">{{ $barangs->total() }} barang ditemukan</p>
                    </div>
                </div>

                <!-- View Toggle -->
                <div class="flex items-center gap-2 bg-gray-100 rounded-lg p-1 border border-gray-300">
                    <button id="gridViewBtn"
                        class="view-toggle active flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="font-semibold">Grid</span>
                    </button>
                    <button id="listViewBtn"
                        class="view-toggle flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300">
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
                                class="bg-white/90 backdrop-blur-sm rounded-xl border border-gray-300 p-6 hover:bg-white transition-all duration-300 hover:border-gray-400 group shadow-lg">
                                <!-- Image -->
                                <div class="w-full h-48 rounded-lg overflow-hidden mb-4 bg-gray-100">
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
                                    class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-red-600 transition-colors">
                                    {{ $barang->nama_barang }}</h3>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                    {{ $barang->deskripsi }}
                                </p>

                                <div class="flex items-center justify-between mb-3">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                        {{ $barang->kategori }}
                                    </span>
                                    <span class="text-sm text-gray-700">
                                        <span class="font-medium">Stok:</span>
                                        <span
                                            class="{{ $barang->stok > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $barang->stok }}</span>
                                    </span>
                                </div>

                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-gray-500">Klik untuk detail</span>
                                    <svg class="w-4 h-4 text-gray-500 group-hover:text-red-600 transition-colors"
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
                            class="bg-white/90 backdrop-blur-sm rounded-xl border border-gray-300 p-12 text-center shadow-lg">
                            <div
                                class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak Ada Barang Ditemukan</h3>
                            <p class="text-gray-600 mb-4">Coba ubah kata kunci pencarian atau filter kategori</p>
                            <a href="{{ route('inventaris') }}"
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
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
                            class="bg-white/90 backdrop-blur-sm rounded-xl border border-gray-300 p-6 hover:bg-white transition-all duration-300 hover:border-gray-400 shadow-lg">
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
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1 truncate">
                                                {{ $barang->nama_barang }}</h3>
                                            <p class="text-gray-600 text-sm mb-2">
                                                <span class="description-text-list">{{ $barang->deskripsi }}</span>
                                            </p>
                                            <div class="flex items-center gap-4">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                                    {{ $barang->kategori }}
                                                </span>
                                                <span class="text-sm text-gray-700">
                                                    <span class="font-medium">Stok:</span>
                                                    <span
                                                        class="{{ $barang->stok > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $barang->stok }}</span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Arrow -->
                                        <div class="ml-4 flex-shrink-0 flex items-center">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
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
                        class="bg-white/90 backdrop-blur-sm rounded-xl border border-gray-300 p-12 text-center shadow-lg">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak Ada Barang Ditemukan</h3>
                        <p class="text-gray-600 mb-4">Coba ubah kata kunci pencarian atau filter kategori</p>
                        <a href="{{ route('inventaris') }}"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
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
            <div class="mt-8 bg-black/40 backdrop-blur-sm rounded-xl border border-white/10 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 10h6m-6 4h6">
                            </path>
                        </svg>
                        <div class="text-sm text-gray-300">
                            <span class="font-medium text-white">{{ $barangs->firstItem() ?? 0 }}</span>
                            -
                            <span class="font-medium text-white">{{ $barangs->lastItem() ?? 0 }}</span>
                            dari
                            <span class="font-medium text-sky-400">{{ $barangs->total() }}</span>
                            barang
                        </div>
                    </div>

                    <div class="pagination-wrapper">
                        <x-pagination :paginator="$barangs->withQueryString()" />
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
            @apply px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-red-50 hover:text-red-600 hover:border-red-300 transition-all duration-300;
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
