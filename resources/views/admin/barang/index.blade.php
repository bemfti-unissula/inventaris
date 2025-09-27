@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<x-app-layout>
    <x-slot name="title">Kelola Inventaris</x-slot>
    
    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-800/50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                                {{ __('Manajemen Inventaris') }}
                            </h1>
                            <p class="text-gray-300">Kelola dan pantau semua barang inventaris</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Total Barang</p>
                            <p class="text-lg font-bold text-white">{{ $barangs->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 px-6 pt-4 mb-8">
                <!-- Header Section -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gray-800/50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Pencarian & Filter</h3>
                        <p class="text-sm text-gray-300">Temukan barang dengan mudah</p>
                    </div>
                </div>
                
                <!-- Add Button and Search Row -->
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-4">
                    <!-- Add Button (Left) -->
                    <a href="{{ route('admin.barang.create') }}"
                        class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
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
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="w-full bg-gray-800/50 rounded-lg px-4 py-3 text-white border border-gray-700/50 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500/50 transition-all duration-200"
                                        placeholder="Cari nama barang...">
                                    @if(request('search'))
                                        <button type="button" onclick="document.querySelector('input[name=search]').value=''; this.closest('form').submit();"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-200 transition-colors duration-200">
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
                                        class="w-full bg-gray-800/50 rounded-lg pl-4 pr-10 py-3 border border-gray-700/50 text-white focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500/50 transition-all duration-200 cursor-pointer appearance-none">
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
                    <div class="flex flex-wrap items-center gap-3 p-4 mb-4 bg-gray-800/30 rounded-lg border border-gray-700/50">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"></path>
                            </svg>
                            <span class="text-sm text-white">Filter Aktif:</span>
                        </div>
                        @if ($currentFilters['search'])
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Pencarian: "{{ $currentFilters['search'] }}"
                            </span>
                        @endif
                        @if ($currentFilters['category'])
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-green-500/20 text-green-300 border border-green-400/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Kategori: {{ $currentFilters['category'] }}
                            </span>
                        @endif
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-gray-700/50 text-gray-300 border border-gray-600/50">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Total: {{ $currentFilters['total_items'] }} barang
                        </span>
                        <a href="{{ route('admin.barang.index') }}" class="inline-flex items-center gap-1 px-2 py-1 text-xs text-gray-400 hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Hapus Filter
                        </a>
                    </div>
                @endif
            </div>

            <!-- Items Grid Section -->
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 overflow-hidden">
                <!-- Grid Header -->
                <div class="bg-gray-800/50 px-6 py-4 border-b border-gray-800/50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-700/50 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Daftar Inventaris</h3>
                                <p class="text-sm text-gray-300">{{ $barangs->count() }} dari {{ $barangs->total() }} barang</p>
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
                        <div class="relative bg-gray-800/30 border border-gray-700/50 rounded-xl overflow-hidden hover:border-gray-600/50 hover:bg-gray-800/50 transition-all duration-200 group">
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
                                        <div class="w-20 h-20 overflow-hidden rounded-xl border-2 border-gray-600/50 group-hover:border-gray-500/50 transition-colors duration-200">
                                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-200"
                                                src="{{ $barang->gambar['url'] }}"
                                                alt="{{ $barang->nama_barang }}">
                                        </div>
                                    @elseif (is_string($barang->gambar) && $barang->gambar)
                                        <div class="w-20 h-20 overflow-hidden rounded-xl border-2 border-gray-600/50 group-hover:border-gray-500/50 transition-colors duration-200">
                                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-200"
                                                src="{{ asset($barang->gambar) }}"
                                                alt="{{ $barang->nama_barang }}">
                                        </div>
                                    @else
                                        <div class="w-20 h-20 rounded-xl bg-gray-700/50 border-2 border-gray-600/50 group-hover:border-gray-500/50 flex items-center justify-center transition-colors duration-200">
                                            <svg class="h-10 w-10 text-gray-400 group-hover:text-gray-300 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Title and Description -->
                                <div class="text-center mb-4">
                                    <h3 class="text-lg font-bold text-white group-hover:text-gray-200 transition-colors duration-200 mb-2">
                                        {{ $barang->nama_barang }}
                                    </h3>
                                    <p class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors duration-200 line-clamp-2">
                                        {{ Str::limit($barang->deskripsi, 80) }}
                                    </p>
                                </div>

                                <!-- Info Cards -->
                                <div class="grid grid-cols-2 gap-3 mb-4">
                                    <!-- Kategori Card -->
                                    <div class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200">
                                        <div class="flex items-center gap-2 mb-1">
                                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            <span class="text-xs text-gray-400">Kategori</span>
                                        </div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30">
                                            {{ $barang->kategori }}
                                        </span>
                                    </div>
                                    
                                    <!-- Stok Card -->
                                    <div class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-{{ $barang->stok > 0 ? 'green' : 'red' }}-500/50 transition-colors duration-200">
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
                                <div class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200 mb-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-400">Total Dimiliki</span>
                                        </div>
                                        <span class="text-lg font-bold text-white">{{ $barang->total_dimiliki }}</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <a href="{{ route('barang.show', $barang) }}"
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-blue-600/20 hover:bg-blue-600/30 text-blue-300 hover:text-blue-200 text-sm rounded-lg border border-blue-500/30 hover:border-blue-400/50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.barang.edit', $barang) }}"
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-yellow-600/20 hover:bg-yellow-600/30 text-yellow-300 hover:text-yellow-200 text-sm rounded-lg border border-yellow-500/30 hover:border-yellow-400/50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.barang.destroy', $barang) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-red-600/20 hover:bg-red-600/30 text-red-300 hover:text-red-200 text-sm rounded-lg border border-red-500/30 hover:border-red-400/50 transition-all duration-200"
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
                <div class="mt-8 bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 10h6m-6 4h6"></path>
                            </svg>
                            <div class="text-sm text-gray-300">
                                <span class="font-bold text-white">{{ $barangs->firstItem() ?? 0 }}</span>
                                -
                                <span class="font-bold text-white">{{ $barangs->lastItem() ?? 0 }}</span>
                                dari
                                <span class="font-bold text-gray-400">{{ $barangs->total() }}</span>
                                barang
                            </div>
                        </div>
                        
                        <div class="pagination-wrapper">
                            <x-pagination-gray :paginator="$barangs->withQueryString()" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
