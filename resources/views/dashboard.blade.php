@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-lg text-gray-200 leading-tight">
                {{ __('Daftar Barang') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Items Card -->
                <div class="bg-gradient-to-br from-blue-600/20 to-blue-800/20 backdrop-blur-sm rounded-xl border border-blue-400/30 p-6 group hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-200 text-sm font-medium">Total Barang</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $barangs->total() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Items Card -->
                <div class="bg-gradient-to-br from-green-600/20 to-green-800/20 backdrop-blur-sm rounded-xl border border-green-400/30 p-6 group hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-200 text-sm font-medium">Tersedia</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $barangs->where('stok', '>', 0)->count() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="bg-gradient-to-br from-purple-600/20 to-purple-800/20 backdrop-blur-sm rounded-xl border border-purple-400/30 p-6 group hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-200 text-sm font-medium">Kategori</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ count($categories) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center group-hover:bg-purple-500/30 transition-colors">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-gradient-to-r from-black/60 via-black/50 to-black/60 backdrop-blur-sm rounded-xl border border-white/10 p-6 mb-8 shadow-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-sky-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white">Pencarian & Filter</h3>
                </div>
                
                <form action="{{ route('inventaris') }}" method="GET" class="space-y-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Search Input -->
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Cari Barang</label>
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="w-full h-12 bg-black/40 rounded-lg pl-12 pr-4 py-3 text-white border border-white/20 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition-all duration-300 group-hover:border-white/30"
                                    placeholder="Masukkan nama barang...">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-300 transition-colors" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="w-full md:w-64">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Filter Kategori</label>
                            <div class="relative">
                                <select name="category" id="category" onchange="this.form.submit()"
                                    class="w-full h-12 bg-black/40 rounded-lg px-4 py-3 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition-all duration-300 cursor-pointer appearance-none">
                                    <option class="bg-black text-white" value="">Semua Kategori</option>
                                    @foreach ($categories as $cat)
                                        <option class="bg-black text-white" value="{{ $cat }}"
                                            {{ request()->get('category') == $cat ? 'selected' : '' }}>
                                            {{ $cat }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Search Button -->
                        <div class="w-full md:w-auto">
                            <label class="block text-sm font-medium text-transparent mb-2">Action</label>
                            <button type="submit" class="w-full md:w-auto h-12 px-6 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-sky-500/50">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Active Filters -->
                @if ($currentFilters['search'] || $currentFilters['category'])
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="text-sm text-gray-400">Filter Aktif:</span>
                        @if ($currentFilters['search'])
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                                Pencarian: {{ $currentFilters['search'] }}
                            </span>
                        @endif
                        @if ($currentFilters['category'])
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                                Kategori: {{ $currentFilters['category'] }}
                            </span>
                        @endif
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                            Total: {{ $currentFilters['total_items'] }} barang
                        </span>
                    </div>
                @endif
            </div>

            <!-- Items Grid Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Daftar Inventaris</h3>
                        <p class="text-sm text-gray-400">{{ $barangs->total() }} barang ditemukan</p>
                    </div>
                </div>
                
                <!-- View Toggle -->
                <div class="flex items-center gap-2 bg-black/30 rounded-lg p-1 border border-white/10">
                    <button id="gridViewBtn" class="view-toggle active flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300" style="color: white !important;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span style="color: white !important; font-weight: bold;">Grid</span>
                    </button>
                    <button id="listViewBtn" class="view-toggle flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300" style="color: white !important;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span style="color: white !important; font-weight: bold;">List</span>
                    </button>
                </div>
            </div>

            <!-- Grid View -->
            <div id="gridView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @forelse ($barangs as $barang)
                    <div class="transform transition-all duration-300 hover:scale-105">
                        <a href="{{ route('barang.show', $barang) }}" class="block">
                            @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                <x-item-card name="{{ $barang->nama_barang }}" count="{{ $barang->stok }}"
                                    icon="fas fa-chair" image="{{ $barang->gambar['url'] }}"
                                    description="{{ $barang->deskripsi }}" category="{{ $barang->kategori }}" />
                            @elseif (is_string($barang->gambar) && $barang->gambar)
                                <x-item-card name="{{ $barang->nama_barang }}" count="{{ $barang->stok }}"
                                    icon="fas fa-chair" image="{{ asset($barang->gambar) }}"
                                    description="{{ $barang->deskripsi }}" category="{{ $barang->kategori }}" />
                            @else
                                <x-item-card name="{{ $barang->nama_barang }}" count="{{ $barang->stok }}"
                                    icon="fas fa-chair" image="{{ asset('images/logo-bem-fti.png') }}"
                                    description="{{ $barang->deskripsi }}" category="{{ $barang->kategori }}" />
                            @endif
                        </a>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-black/30 backdrop-blur-sm rounded-xl border border-white/10 p-12 text-center">
                            <div class="w-16 h-16 bg-gray-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Tidak Ada Barang Ditemukan</h3>
                            <p class="text-gray-400 mb-4">Coba ubah kata kunci pencarian atau filter kategori</p>
                            <a href="{{ route('inventaris') }}" class="inline-flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
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
                        <div class="bg-black/30 backdrop-blur-sm rounded-xl border border-white/15 p-6 hover:bg-black/40 transition-all duration-300 hover:border-white/25">
                            <div class="flex items-center gap-6">
                                <!-- Image -->
                                <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-black/50">
                                    @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                        <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}" class="w-full h-full object-cover">
                                    @elseif (is_string($barang->gambar) && $barang->gambar)
                                        <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}" class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('images/logo-bem-fti.png') }}" alt="{{ $barang->nama_barang }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                
                                <!-- Content -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-semibold text-white mb-1 truncate">{{ $barang->nama_barang }}</h3>
                                            <p class="text-gray-400 text-sm mb-2">
                                <span class="description-text-list">{{ $barang->deskripsi }}</span>
                            </p>
                                            <div class="flex items-center gap-4">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-500/20 text-sky-300 border border-sky-500/30">
                                                    {{ $barang->kategori }}
                                                </span>
                                                <span class="text-sm text-gray-300">
                                                    <span class="font-medium">Stok:</span> 
                                                    <span class="{{ $barang->stok > 0 ? 'text-green-400' : 'text-red-400' }}">{{ $barang->stok }}</span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="ml-4 flex-shrink-0 flex items-center">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="bg-black/30 backdrop-blur-sm rounded-xl border border-white/10 p-12 text-center">
                        <div class="w-16 h-16 bg-gray-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Tidak Ada Barang Ditemukan</h3>
                        <p class="text-gray-400 mb-4">Coba ubah kata kunci pencarian atau filter kategori</p>
                        <a href="{{ route('inventaris') }}" class="inline-flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset Filter
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($barangs->hasPages())
                <div class="mt-8 mb-4">
                    {{ $barangs->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>

    <style>
        .pagination {
            @apply flex items-center space-x-1;
        }

        .pagination .page-link {
            @apply px-3 py-2 text-sm font-medium text-gray-300 bg-black/40 border border-white/20 rounded-lg hover:bg-sky-500/20 hover:text-sky-300 hover:border-sky-400/50 transition-all duration-300;
        }

        .pagination .page-item.active .page-link {
            @apply bg-gradient-to-r from-sky-500 to-blue-600 text-white border-sky-400 shadow-lg shadow-sky-500/25;
        }

        .pagination .page-item.disabled .page-link {
            @apply text-gray-500 cursor-not-allowed hover:bg-black/40 hover:text-gray-500 hover:border-white/20;
        }
        
        .pagination .page-link:focus {
            @apply outline-none ring-2 ring-sky-500/50;
        }
        
        /* Custom pagination arrows */
         .pagination .page-link[rel="prev"],
         .pagination .page-link[rel="next"] {
             @apply px-4;
         }
         
         /* View Toggle Styles */
         .view-toggle {
             @apply text-white hover:text-sky-300 bg-transparent hover:bg-sky-500/10 border-2 border-transparent;
         }
         
         .view-toggle.active {
             @apply bg-sky-500/20 text-sky-300 border-2 border-white shadow-lg;
             box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.5);
         }
         

     </style>
     
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             const gridViewBtn = document.getElementById('gridViewBtn');
             const listViewBtn = document.getElementById('listViewBtn');
             const gridView = document.getElementById('gridView');
             const listView = document.getElementById('listView');
             
             // Load saved view preference
             const savedView = localStorage.getItem('inventoryView') || 'grid';
             if (savedView === 'list') {
                 showListView();
             } else {
                 showGridView();
             }
             
             gridViewBtn.addEventListener('click', function() {
                 showGridView();
                 localStorage.setItem('inventoryView', 'grid');
             });
             
             listViewBtn.addEventListener('click', function() {
                 showListView();
                 localStorage.setItem('inventoryView', 'list');
             });
             
             function showGridView() {
                 gridView.classList.remove('hidden');
                 listView.classList.add('hidden');
                 gridViewBtn.classList.add('active');
                 listViewBtn.classList.remove('active');
             }
             
             function showListView() {
                 gridView.classList.add('hidden');
                 listView.classList.remove('hidden');
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
