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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
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
                        class="premium-button inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/25 group flex-shrink-0">
                        <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:rotate-90" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Barang Baru
                    </a>

                    <!-- Search Form (Right) - Full Width -->
                    <form action="{{ route('admin.barang.index') }}" method="GET" class="flex-1">
                        <div class="flex flex-col sm:flex-row gap-4 w-full">
                            <!-- Search Input -->
                            <div class="flex-1">
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="premium-input w-full bg-gradient-to-r from-gray-800/60 to-gray-900/60 backdrop-blur-sm rounded-lg px-4 py-3 text-white border border-gray-700/50 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500/50 hover:border-red-400/70 hover:shadow-lg hover:shadow-red-500/10 transition-all duration-300 transform hover:scale-[1.02]"
                                        placeholder="🔍 Cari nama barang...">
                                    @if (request('search'))
                                        <button type="button"
                                            onclick="document.querySelector('input[name=search]').value=''; this.closest('form').submit();"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-200 transition-colors duration-200">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div class="w-full sm:w-56 flex-shrink-0">
                                <div class="relative dropdown-wrapper">
                                    <select name="category" id="category" onchange="this.form.submit()"
                                        class="premium-dropdown w-full bg-gradient-to-r from-gray-800/60 to-gray-900/60 backdrop-blur-sm rounded-lg pl-4 pr-10 py-3 border border-gray-700/50 text-white focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500/50 hover:border-red-400/70 hover:shadow-lg hover:shadow-red-500/10 transition-all duration-300 cursor-pointer appearance-none transform">
                                        <option value="" class="bg-gray-800 text-gray-300">📦 Semua Kategori
                                        </option>
                                        @foreach ($categories as $cat)
                                            @php
                                                $categoryEmojis = [
                                                    'elektronik' => '🔌',
                                                    'furniture' => '🪑',
                                                    'komputer' => '💻',
                                                    'alat tulis' => '✏️',
                                                    'olahraga' => '⚽',
                                                    'kendaraan' => '🚗',
                                                    'peralatan' => '🔧',
                                                    'medis' => '🩺',
                                                    'laboratorium' => '🧪',
                                                    'kebersihan' => '🧹',
                                                    'keamanan' => '🔒',
                                                    'musik' => '🎵',
                                                    'fotografi' => '📸',
                                                    'dapur' => '🍳',
                                                    'perlengkapan kantor' => '📋',
                                                ];
                                                $emoji = $categoryEmojis[strtolower(trim($cat))] ?? '📄';
                                            @endphp
                                            <option value="{{ $cat }}"
                                                {{ request()->get('category') == $cat ? 'selected' : '' }}
                                                class="bg-gray-800 text-white hover:bg-gray-700 py-2">
                                                {{ $emoji }} {{ $cat }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <div class="dropdown-arrow-wrapper">
                                            <svg class="h-4 w-4 text-gray-400 dropdown-arrow transition-all duration-300"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Active Filters -->
                @if ($currentFilters['search'] || $currentFilters['category'])
                    <div
                        class="flex flex-wrap items-center gap-3 p-4 mb-4 bg-gray-800/30 rounded-lg border border-gray-700/50">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z">
                                </path>
                            </svg>
                            <span class="text-sm text-white">Filter Aktif:</span>
                        </div>
                        @if ($currentFilters['search'])
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30 hover:bg-blue-500/30 transition-all duration-300 cursor-default">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                🔍 Pencarian: "{{ $currentFilters['search'] }}"
                            </span>
                        @endif
                        @if ($currentFilters['category'])
                            @php
                                // Use same color system for filter badge
                                $categoryColors = [
                                    'elektronik' => 'bg-blue-500/20 text-blue-300 border-blue-400/30',
                                    'furniture' => 'bg-amber-500/20 text-amber-300 border-amber-400/30',
                                    'komputer' => 'bg-cyan-500/20 text-cyan-300 border-cyan-400/30',
                                    'alat tulis' => 'bg-green-500/20 text-green-300 border-green-400/30',
                                    'olahraga' => 'bg-red-500/20 text-red-300 border-red-400/30',
                                    'kendaraan' => 'bg-purple-500/20 text-purple-300 border-purple-400/30',
                                    'peralatan' => 'bg-orange-500/20 text-orange-300 border-orange-400/30',
                                    'medis' => 'bg-pink-500/20 text-pink-300 border-pink-400/30',
                                    'laboratorium' => 'bg-indigo-500/20 text-indigo-300 border-indigo-400/30',
                                    'kebersihan' => 'bg-emerald-500/20 text-emerald-300 border-emerald-400/30',
                                    'keamanan' => 'bg-slate-500/20 text-slate-300 border-slate-400/30',
                                    'musik' => 'bg-violet-500/20 text-violet-300 border-violet-400/30',
                                    'fotografi' => 'bg-fuchsia-500/20 text-fuchsia-300 border-fuchsia-400/30',
                                    'dapur' => 'bg-yellow-500/20 text-yellow-300 border-yellow-400/30',
                                    'perlengkapan kantor' => 'bg-teal-500/20 text-teal-300 border-teal-400/30',
                                ];

                                $filterCategoryKey = strtolower(trim($currentFilters['category']));
                                $filterColorClass =
                                    $categoryColors[$filterCategoryKey] ??
                                    'bg-gray-500/20 text-gray-300 border-gray-400/30';
                            @endphp
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs {{ $filterColorClass }} border hover:scale-105 transition-all duration-300 cursor-default">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                @php
                                    $categoryEmojis = [
                                        'elektronik' => '🔌',
                                        'furniture' => '🪑',
                                        'komputer' => '💻',
                                        'alat tulis' => '✏️',
                                        'olahraga' => '⚽',
                                        'kendaraan' => '🚗',
                                        'peralatan' => '🔧',
                                        'medis' => '🩺',
                                        'laboratorium' => '🧪',
                                        'kebersihan' => '🧹',
                                        'keamanan' => '🔒',
                                        'musik' => '🎵',
                                        'fotografi' => '📸',
                                        'dapur' => '🍳',
                                        'perlengkapan kantor' => '📋',
                                    ];
                                    $filterEmoji =
                                        $categoryEmojis[strtolower(trim($currentFilters['category']))] ?? '📄';
                                @endphp
                                {{ $filterEmoji }} Kategori: {{ $currentFilters['category'] }}
                            </span>
                        @endif
                        <span
                            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-gray-700/50 text-gray-300 border border-gray-600/50 hover:bg-gray-600/50 transition-all duration-300 cursor-default">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            📊 Total: {{ $currentFilters['total_items'] }} barang
                        </span>
                        <a href="{{ route('admin.barang.index') }}"
                            class="inline-flex items-center gap-1 px-3 py-1.5 text-xs text-gray-400 hover:text-red-300 bg-gray-800/30 hover:bg-red-500/20 border border-gray-600/50 hover:border-red-400/50 rounded-lg transition-all duration-300 transform hover:scale-105 group">
                            <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-90"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            🗑️ Hapus Filter
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
                                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Daftar Inventaris</h3>
                                <p class="text-sm text-gray-300">{{ $barangs->count() }} dari {{ $barangs->total() }}
                                    barang</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Halaman {{ $barangs->currentPage() }} dari
                                {{ $barangs->lastPage() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Items Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                    @foreach ($barangs as $barang)
                        <div
                            class="relative bg-gray-800/30 border border-gray-700/50 rounded-xl overflow-hidden hover:border-gray-600/50 hover:bg-gray-800/50 transition-all duration-200 group">
                            <!-- Status Indicator -->
                            <div class="absolute top-3 right-3 z-10">
                                @if ($barang->stok > 0)
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
                                        <div
                                            class="w-20 h-20 overflow-hidden rounded-xl border-2 border-gray-600/50 group-hover:border-gray-500/50 transition-colors duration-200">
                                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-200"
                                                src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}">
                                        </div>
                                    @elseif (is_string($barang->gambar) && $barang->gambar)
                                        <div
                                            class="w-20 h-20 overflow-hidden rounded-xl border-2 border-gray-600/50 group-hover:border-gray-500/50 transition-colors duration-200">
                                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-200"
                                                src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}">
                                        </div>
                                    @else
                                        <div
                                            class="w-20 h-20 rounded-xl bg-gray-700/50 border-2 border-gray-600/50 group-hover:border-gray-500/50 flex items-center justify-center transition-colors duration-200">
                                            <svg class="h-10 w-10 text-gray-400 group-hover:text-gray-300 transition-colors duration-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Title and Description -->
                                <div class="text-center mb-4">
                                    <h3
                                        class="text-lg font-bold text-white group-hover:text-gray-200 transition-colors duration-200 mb-2">
                                        {{ $barang->nama_barang }}
                                    </h3>
                                    <p
                                        class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors duration-200 line-clamp-2">
                                        {{ Str::limit($barang->deskripsi, 80) }}
                                    </p>
                                </div>

                                <!-- Info Cards -->
                                <div class="grid grid-cols-2 gap-3 mb-4">
                                    <!-- Kategori Card -->
                                    <div
                                        class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200">
                                        <div class="flex items-center gap-2 mb-1">
                                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                </path>
                                            </svg>
                                            <span class="text-xs text-gray-400">Kategori</span>
                                        </div>
                                        @php
                                            // Generate consistent colors for categories
                                            $categoryColors = [
                                                'elektronik' => 'bg-blue-500/20 text-blue-300 border-blue-400/30',
                                                'furniture' => 'bg-amber-500/20 text-amber-300 border-amber-400/30',
                                                'komputer' => 'bg-cyan-500/20 text-cyan-300 border-cyan-400/30',
                                                'alat tulis' => 'bg-green-500/20 text-green-300 border-green-400/30',
                                                'olahraga' => 'bg-red-500/20 text-red-300 border-red-400/30',
                                                'kendaraan' => 'bg-purple-500/20 text-purple-300 border-purple-400/30',
                                                'peralatan' => 'bg-orange-500/20 text-orange-300 border-orange-400/30',
                                                'medis' => 'bg-pink-500/20 text-pink-300 border-pink-400/30',
                                                'laboratorium' =>
                                                    'bg-indigo-500/20 text-indigo-300 border-indigo-400/30',
                                                'kebersihan' =>
                                                    'bg-emerald-500/20 text-emerald-300 border-emerald-400/30',
                                                'keamanan' => 'bg-slate-500/20 text-slate-300 border-slate-400/30',
                                                'musik' => 'bg-violet-500/20 text-violet-300 border-violet-400/30',
                                                'fotografi' =>
                                                    'bg-fuchsia-500/20 text-fuchsia-300 border-fuchsia-400/30',
                                                'dapur' => 'bg-yellow-500/20 text-yellow-300 border-yellow-400/30',
                                                'perlengkapan kantor' =>
                                                    'bg-teal-500/20 text-teal-300 border-teal-400/30',
                                            ];

                                            $categoryKey = strtolower(trim($barang->kategori));
                                            $colorClass =
                                                $categoryColors[$categoryKey] ??
                                                'bg-gray-500/20 text-gray-300 border-gray-400/30';
                                        @endphp
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs {{ $colorClass }}">
                                            {{ $barang->kategori }}
                                        </span>
                                    </div>

                                    <!-- Stok Card -->
                                    <div
                                        class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-{{ $barang->stok > 0 ? 'green' : 'red' }}-500/50 transition-colors duration-200">
                                        <div class="flex items-center gap-2 mb-1">
                                            <svg class="w-3 h-3 text-{{ $barang->stok > 0 ? 'green' : 'red' }}-400"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                </path>
                                            </svg>
                                            <span class="text-xs text-gray-400">Stok</span>
                                        </div>
                                        <span
                                            class="text-lg font-bold text-{{ $barang->stok > 0 ? 'green' : 'red' }}-400">
                                            {{ $barang->stok }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Total Dimiliki -->
                                <div
                                    class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200 mb-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                </path>
                                            </svg>
                                            <span class="text-sm text-gray-400">Total Dimiliki</span>
                                        </div>
                                        <span
                                            class="text-lg font-bold text-white">{{ $barang->total_dimiliki }}</span>
                                    </div>
                                </div>

                                <!-- Status Pembayaran -->
                                <div
                                    class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200 mb-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                            <span class="text-sm text-gray-400">Status Pembayaran</span>
                                        </div>
                                        @if (isset($barang->is_paid) && $barang->is_paid)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-green-500/20 text-green-300 border border-green-400/30">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Berbayar
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Gratis
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <a href="{{ route('barang.show', $barang) }}"
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-blue-600/20 hover:bg-blue-600/30 text-blue-300 hover:text-blue-200 text-sm rounded-lg border border-blue-500/30 hover:border-blue-400/50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.barang.edit', $barang) }}"
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-yellow-600/20 hover:bg-yellow-600/30 text-yellow-300 hover:text-yellow-200 text-sm rounded-lg border border-yellow-500/30 hover:border-yellow-400/50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit
                                    </a>
                                    <div class="flex-1">
                                        <form id="deleteFormdeleteModal{{ $barang->id }}"
                                            action="{{ route('admin.barang.destroy', $barang) }}" method="POST"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button"
                                            onclick="openDeleteModaldeleteModal('{{ $barang->id }}', '{{ $barang->nama_barang }}')"
                                            class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-red-600/20 hover:bg-red-600/30 text-red-300 hover:text-red-200 text-sm rounded-lg border border-red-500/30 hover:border-red-400/50 transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 10h6m-6 4h6">
                            </path>
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

    <!-- Delete Confirmation Modal -->
    <x-delete-confirmation-modal modal-id="deleteModal" title="Konfirmasi Hapus Barang"
        subtitle="Tindakan ini tidak dapat dibatalkan" item-type="barang"
        warning-text="Data barang yang sudah dihapus tidak dapat dikembalikan lagi. Pastikan barang tidak sedang digunakan dalam transaksi aktif."
        confirm-button-text="Ya, Hapus Barang" cancel-button-text="Batal" />

    <script>
        const dropdowns = document.querySelectorAll('.premium-dropdown');

        dropdowns.forEach(dropdown => {
            // Add focus and blur effects
            dropdown.addEventListener('focus', function() {
                this.parentNode.classList.add('dropdown-focused');
            });

            dropdown.addEventListener('blur', function() {
                this.parentNode.classList.remove('dropdown-focused');
            });

            // Add hover effects to arrow
            dropdown.addEventListener('mouseenter', function() {
                const arrow = this.parentNode.querySelector('.dropdown-arrow');
                if (arrow) {
                    arrow.style.transform = 'rotate(180deg) scale(1.1)';
                    arrow.style.color = '#ef4444';
                }
            });

            dropdown.addEventListener('mouseleave', function() {
                const arrow = this.parentNode.querySelector('.dropdown-arrow');
                if (arrow) {
                    arrow.style.transform = 'rotate(0deg) scale(1)';
                    arrow.style.color = '#9ca3af';
                }
            });

            // Add change effect for dropdowns
            dropdown.addEventListener('change', function() {
                if (this.value) {
                    this.classList.add('has-value');
                    this.style.background =
                        'linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(185, 28, 28, 0.05))';
                    this.style.borderColor = 'rgba(220, 38, 38, 0.5)';
                } else {
                    this.classList.remove('has-value');
                    this.style.background = '';
                    this.style.borderColor = '';
                }
            });

            // Initialize dropdown state
            if (dropdown.value) {
                dropdown.style.background =
                    'linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(185, 28, 28, 0.05))';
                dropdown.style.borderColor = 'rgba(220, 38, 38, 0.5)';
            }
        });

        // Search input enhancements
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            // Add input event listener for real-time effects
            searchInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.classList.add('has-value');
                    this.style.background =
                        'linear-gradient(135deg, rgba(220, 38, 38, 0.15), rgba(185, 28, 28, 0.1))';
                    this.style.borderColor = 'rgba(220, 38, 38, 0.6)';
                    this.style.boxShadow = '0 0 0 1px rgba(220, 38, 38, 0.1)';
                } else {
                    this.classList.remove('has-value');
                    this.style.background = '';
                    this.style.borderColor = '';
                    this.style.boxShadow = '';
                }
            });

            // Initialize search input state
            if (searchInput.value) {
                searchInput.classList.add('has-value');
                searchInput.style.background =
                    'linear-gradient(135deg, rgba(220, 38, 38, 0.15), rgba(185, 28, 28, 0.1))';
                searchInput.style.borderColor = 'rgba(220, 38, 38, 0.6)';
                searchInput.style.boxShadow = '0 0 0 1px rgba(220, 38, 38, 0.1)';
            }

            // Add focus and blur effects
            searchInput.addEventListener('focus', function() {
                this.style.transform = 'scale(1.02)';
            });

            searchInput.addEventListener('blur', function() {
                this.style.transform = 'scale(1)';
            });
        }
        });
    </script>

    <style>
        /* Premium Dropdown Styling */
        .premium-dropdown {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.6), rgba(17, 24, 39, 0.6));
            border: 1px solid rgba(107, 114, 128, 0.5);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-dropdown:hover {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.8), rgba(17, 24, 39, 0.8));
            border-color: rgba(239, 68, 68, 0.7);
            box-shadow: 0 10px 25px -3px rgba(239, 68, 68, 0.1), 0 4px 6px -2px rgba(239, 68, 68, 0.05);
            transform: translateY(-1px) scale(1.02);
        }

        .premium-dropdown:focus {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.9), rgba(17, 24, 39, 0.9));
            border-color: rgba(239, 68, 68, 0.8);
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2), 0 10px 25px -3px rgba(239, 68, 68, 0.1);
            transform: scale(1.02);
        }

        .dropdown-wrapper.dropdown-focused {
            filter: drop-shadow(0 0 20px rgba(239, 68, 68, 0.3));
        }

        .dropdown-arrow {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-dropdown option {
            padding: 8px 12px;
            background-color: #1f2937;
            color: #ffffff;
            border-bottom: 1px solid rgba(107, 114, 128, 0.2);
        }

        .premium-dropdown option:hover {
            background-color: #374151;
            color: #ef4444;
        }

        .premium-dropdown option:checked {
            background-color: #ef4444;
            color: #ffffff;
            font-weight: 600;
        }

        /* Custom scrollbar for dropdown options */
        .premium-dropdown::-webkit-scrollbar {
            width: 8px;
        }

        .premium-dropdown::-webkit-scrollbar-track {
            background: rgba(17, 24, 39, 0.5);
            border-radius: 4px;
        }

        .premium-dropdown::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border-radius: 4px;
        }

        .premium-dropdown::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }

        /* Animated border effect */
        @keyframes borderGlow {

            0%,
            100% {
                border-color: rgba(107, 114, 128, 0.5);
            }

            50% {
                border-color: rgba(239, 68, 68, 0.8);
            }
        }

        .premium-dropdown:focus {
            animation: borderGlow 2s ease-in-out infinite;
        }

        /* Enhanced hover effects */
        .dropdown-wrapper:hover .dropdown-arrow-wrapper {
            background: radial-gradient(circle, rgba(239, 68, 68, 0.1), transparent);
            border-radius: 50%;
        }

        /* Premium Button Styling */
        .premium-button {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .premium-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .premium-button:hover::before {
            left: 100%;
        }

        .premium-button:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 15px 35px -5px rgba(239, 68, 68, 0.25), 0 5px 15px rgba(239, 68, 68, 0.1);
        }

        .premium-button:active {
            transform: translateY(-1px) scale(1.02);
        }

        /* Premium Input Field Styling */
        .premium-input {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-input:hover {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.8), rgba(17, 24, 39, 0.8)) !important;
            border-color: rgba(239, 68, 68, 0.7) !important;
            box-shadow: 0 10px 25px -3px rgba(239, 68, 68, 0.1), 0 4px 6px -2px rgba(239, 68, 68, 0.05);
            transform: translateY(-1px) scale(1.02);
        }

        .premium-input:focus {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.9), rgba(17, 24, 39, 0.9)) !important;
            border-color: rgba(239, 68, 68, 0.8) !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2), 0 10px 25px -3px rgba(239, 68, 68, 0.1);
            transform: scale(1.02);
        }

        .premium-input.has-value {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.15), rgba(185, 28, 28, 0.1)) !important;
            border-color: rgba(220, 38, 38, 0.6) !important;
            box-shadow: 0 0 0 1px rgba(220, 38, 38, 0.1);
        }

        /* Animated glow effect */
        @keyframes inputGlow {

            0%,
            100% {
                box-shadow: 0 0 5px rgba(239, 68, 68, 0.2);
            }

            50% {
                box-shadow: 0 0 20px rgba(239, 68, 68, 0.4), 0 0 30px rgba(239, 68, 68, 0.1);
            }
        }

        .premium-input:focus {
            animation: inputGlow 2s ease-in-out infinite;
        }
    </style>
</x-app-layout>
