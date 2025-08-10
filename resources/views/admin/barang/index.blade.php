@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-sky-500/20 to-blue-600/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-semibold text-xl text-white leading-tight">
                        {{ __('Manajemen Inventaris') }}
                    </h2>
                    <p class="text-sm text-gray-400">Kelola dan pantau semua barang inventaris</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-sm text-gray-400">Total Barang</p>
                    <p class="text-lg font-bold text-white">{{ $barangs->total() }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="bg-gradient-to-r from-black/60 via-black/50 to-black/60 backdrop-blur-sm rounded-xl border border-white/10 px-6 pt-4 mb-8 shadow-2xl">
                <!-- Header Section -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-sky-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Pencarian & Filter</h3>
                        <p class="text-sm text-gray-400">Temukan barang dengan mudah</p>
                    </div>
                </div>
                
                <!-- Add Button and Search Row -->
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-4">
                    <!-- Add Button (Left) -->
                    <a href="{{ route('admin.barang.create') }}"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Barang Baru
                    </a>

                    <!-- Search Form (Right) -->
                    <form action="{{ route('admin.barang.index') }}" method="GET" class="flex-1 lg:flex-initial">
                        <div class="flex flex-col sm:flex-row gap-4 lg:w-96">
                            <!-- Search Input -->
                            <div class="flex-1">
                                <div class="relative group">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="w-full bg-black/40 rounded-lg pl-12 pr-4 py-3 text-white border border-white/20 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-400/50 focus:border-sky-400/50 transition-all duration-300 group-hover:border-white/30"
                                        placeholder="Cari nama barang...">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-sky-400 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    @if(request('search'))
                                        <button type="button" onclick="document.querySelector('input[name=search]').value=''; this.closest('form').submit();"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition-colors duration-300">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div class="w-full sm:w-48">
                                <div class="relative">
                                    <select name="category" id="category" onchange="this.form.submit()"
                                        class="w-full bg-black/40 rounded-lg pl-4 pr-10 py-3 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-sky-400/50 focus:border-sky-400/50 transition-all duration-300 cursor-pointer appearance-none">
                                        <option value="">Semua Kategori</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat }}"
                                                {{ request()->get('category') == $cat ? 'selected' : '' }}>
                                                {{ $cat }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Active Filters -->
                @if ($currentFilters['search'] || $currentFilters['category'])
                    <div class="flex flex-wrap items-center gap-3 p-4 mb-4 bg-black/30 rounded-lg border border-white/10">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"></path>
                            </svg>
                            <span class="text-sm font-medium text-white">Filter Aktif:</span>
                        </div>
                        @if ($currentFilters['search'])
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-medium bg-gradient-to-r from-green-500/20 to-emerald-500/20 text-green-300 border border-green-500/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Pencarian: "{{ $currentFilters['search'] }}"
                            </span>
                        @endif
                        @if ($currentFilters['category'])
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-medium bg-gradient-to-r from-purple-500/20 to-violet-500/20 text-purple-300 border border-purple-500/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Kategori: {{ $currentFilters['category'] }}
                            </span>
                        @endif
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-medium bg-gradient-to-r from-blue-500/20 to-sky-500/20 text-blue-300 border border-blue-500/30">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Total: {{ $currentFilters['total_items'] }} barang
                        </span>
                        <a href="{{ route('admin.barang.index') }}" class="inline-flex items-center gap-1 px-2 py-1 text-xs text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Hapus Filter
                        </a>
                    </div>
                @endif
            </div>


            <div>
                <div class="max-w-7xl mx-auto">
                    <!-- Alert Messages -->
                    @if (session('success'))
                        <div class="mb-4 bg-green-500/10 border border-green-500/20 text-green-500 px-4 py-3 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif


                    <!-- Items Grid Section -->
                    <div class="bg-gradient-to-br from-black/60 to-black/40 backdrop-blur-sm rounded-xl border border-white/10 overflow-hidden shadow-2xl">
                        <!-- Grid Header -->
                        <div class="bg-gradient-to-r from-sky-600/10 to-blue-600/10 px-6 py-4 border-b border-white/10">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-sky-500/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-white">Daftar Inventaris</h3>
                                        <p class="text-sm text-gray-400">{{ $barangs->count() }} dari {{ $barangs->total() }} barang</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-400">Halaman {{ $barangs->currentPage() }} dari {{ $barangs->lastPage() }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Items Grid Layout -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                            @foreach ($barangs as $barang)
                                <div class="relative bg-gradient-to-br from-black/60 to-black/40 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden shadow-lg hover:border-sky-400/50 hover:shadow-2xl transition-all duration-300 group transform hover:scale-[1.02]">
                                    <!-- Glow Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-sky-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    
                                    <!-- Status Indicator -->
                                    <div class="absolute top-3 right-3 z-10">
                                        @if($barang->stok > 0)
                                            <div class="w-3 h-3 bg-green-500 rounded-full shadow-lg animate-pulse"></div>
                                        @else
                                            <div class="w-3 h-3 bg-red-500 rounded-full shadow-lg"></div>
                                        @endif
                                    </div>

                                    <!-- Content -->
                                    <div class="relative p-6">
                                        <!-- Image Section -->
                                        <div class="flex justify-center mb-4">
                                            @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                                <div class="w-20 h-20 overflow-hidden rounded-xl border-2 border-white/20 group-hover:border-sky-400/50 transition-colors duration-300">
                                                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                        src="{{ $barang->gambar['url'] }}"
                                                        alt="{{ $barang->nama_barang }}">
                                                </div>
                                            @elseif (is_string($barang->gambar) && $barang->gambar)
                                                <div class="w-20 h-20 overflow-hidden rounded-xl border-2 border-white/20 group-hover:border-sky-400/50 transition-colors duration-300">
                                                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                        src="{{ asset($barang->gambar) }}"
                                                        alt="{{ $barang->nama_barang }}">
                                                </div>
                                            @else
                                                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-gray-600/20 to-gray-800/20 border-2 border-white/20 group-hover:border-sky-400/50 flex items-center justify-center transition-colors duration-300">
                                                    <svg class="h-10 w-10 text-gray-400 group-hover:text-sky-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Title and Description -->
                                        <div class="text-center mb-4">
                                            <h3 class="text-lg font-bold text-white group-hover:text-sky-200 transition-colors duration-300 mb-2">
                                                {{ $barang->nama_barang }}
                                            </h3>
                                            <p class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors duration-300 line-clamp-2">
                                                {{ Str::limit($barang->deskripsi, 80) }}
                                            </p>
                                        </div>

                                        <!-- Info Cards -->
                                        <div class="grid grid-cols-2 gap-3 mb-4">
                                            <!-- Kategori Card -->
                                            <div class="bg-black/30 rounded-lg p-3 border border-white/10 group-hover:border-purple-500/30 transition-colors duration-300">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <svg class="w-3 h-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                    <span class="text-xs text-gray-400">Kategori</span>
                                                </div>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-500/20 text-sky-300 border border-sky-500/30">
                                                    {{ $barang->kategori }}
                                                </span>
                                            </div>
                                            
                                            <!-- Stok Card -->
                                            <div class="bg-black/30 rounded-lg p-3 border border-white/10 group-hover:border-{{ $barang->stok > 0 ? 'green' : 'red' }}-500/30 transition-colors duration-300">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <svg class="w-3 h-3 text-{{ $barang->stok > 0 ? 'green' : 'red' }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                    </svg>
                                                    <span class="text-xs text-gray-400">Stok</span>
                                                </div>
                                                <span class="text-lg font-bold text-{{ $barang->stok > 0 ? 'green' : 'red' }}-400">
                                                    {{ $barang->stok }}
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Total Dimiliki -->
                                        <div class="bg-black/30 rounded-lg p-3 border border-white/10 group-hover:border-blue-500/30 transition-colors duration-300 mb-4">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-400">Total Dimiliki</span>
                                                </div>
                                                <span class="text-lg font-bold text-blue-400">{{ $barang->total_dimiliki }}</span>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex gap-2">
                                            <a href="{{ route('barang.show', $barang) }}"
                                                class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-gradient-to-r from-green-600/20 to-emerald-600/20 hover:from-green-600/30 hover:to-emerald-600/30 text-green-400 hover:text-green-300 text-sm font-medium rounded-lg border border-green-500/30 hover:border-green-400/50 transition-all duration-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Detail
                                            </a>
                                            <a href="{{ route('admin.barang.edit', $barang) }}"
                                                class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-gradient-to-r from-sky-600/20 to-blue-600/20 hover:from-sky-600/30 hover:to-blue-600/30 text-sky-400 hover:text-sky-300 text-sm font-medium rounded-lg border border-sky-500/30 hover:border-sky-400/50 transition-all duration-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.barang.destroy', $barang) }}" method="POST" class="flex-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-gradient-to-r from-red-600/20 to-rose-600/20 hover:from-red-600/30 hover:to-rose-600/30 text-red-400 hover:text-red-300 text-sm font-medium rounded-lg border border-red-500/30 hover:border-red-400/50 transition-all duration-300"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Enhanced Pagination -->
                    <div class="mt-8 bg-black/40 backdrop-blur-sm rounded-xl border border-white/10 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 10h6m-6 4h6"></path>
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
</x-app-layout>
