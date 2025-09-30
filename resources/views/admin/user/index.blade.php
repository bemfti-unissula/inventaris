<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-800/50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                                {{ __('Kelola User') }}
                            </h1>
                            <p class="text-gray-300">Manajemen data pengguna sistem inventaris</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Total User</p>
                            <p class="text-lg font-bold text-white">{{ $users->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <!-- Search and Filter Section -->
                <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 px-6 py-4 mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-gray-700/50 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-white">Pencarian & Filter</h2>
                            <p class="text-sm text-gray-400">Cari berdasarkan nama, email, atau fakultas</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.user.index') }}" method="GET" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <!-- Search Input -->
                            <div class="md:col-span-2">
                                <div class="relative group dropdown-container">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="w-full bg-gradient-to-r from-gray-800/60 to-gray-900/60 backdrop-blur-sm rounded-lg px-4 py-3 pl-10 text-white border border-gray-700/50 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500/70 focus:border-red-500/70 hover:border-gray-600/70 transition-all duration-300 group-hover:shadow-lg group-hover:shadow-red-500/10 text-sm font-medium"
                                        placeholder="🔍 Cari nama, email, atau telepon...">
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-red-400 group-hover:text-red-300 transition-colors duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <!-- Decorative element -->
                                    <div
                                        class="absolute inset-0 rounded-lg bg-gradient-to-r from-red-500/5 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                            </div>

                            <!-- Faculty Filter -->
                            <div>
                                <div class="relative group dropdown-container">
                                    <select name="fakultas" id="fakultas"
                                        class="w-full bg-gradient-to-r from-gray-800/60 to-gray-900/60 backdrop-blur-sm rounded-lg pl-4 pr-10 py-3 border border-gray-700/50 text-white focus:outline-none focus:ring-2 focus:ring-red-500/70 focus:border-red-500/70 hover:border-gray-600/70 transition-all duration-300 cursor-pointer appearance-none group-hover:shadow-lg group-hover:shadow-red-500/10 text-sm font-medium">
                                        <option value="" class="bg-gray-900 text-gray-300">🏛️ Semua Fakultas
                                        </option>
                                        @foreach ($fakultasList as $fakultas)
                                            <option value="{{ $fakultas }}"
                                                class="bg-gray-900 text-white hover:bg-red-600/20"
                                                {{ request()->get('fakultas') == $fakultas ? 'selected' : '' }}>
                                                📚 {{ $fakultas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-red-400 group-hover:text-red-300 transition-colors duration-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                    <!-- Decorative element -->
                                    <div
                                        class="absolute inset-0 rounded-lg bg-gradient-to-r from-red-500/5 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                            </div>

                            <!-- Role Filter -->
                            <div>
                                <div class="relative group dropdown-container">
                                    <select name="role" id="role"
                                        class="w-full bg-gradient-to-r from-gray-800/60 to-gray-900/60 backdrop-blur-sm rounded-lg pl-4 pr-10 py-3 border border-gray-700/50 text-white focus:outline-none focus:ring-2 focus:ring-red-500/70 focus:border-red-500/70 hover:border-gray-600/70 transition-all duration-300 cursor-pointer appearance-none group-hover:shadow-lg group-hover:shadow-red-500/10 text-sm font-medium">
                                        <option value="" class="bg-gray-900 text-gray-300">👥 Semua Role</option>
                                        <option value="user" class="bg-gray-900 text-white hover:bg-blue-600/20"
                                            {{ request()->get('role') == 'user' ? 'selected' : '' }}>👤 User</option>
                                        <option value="admin" class="bg-gray-900 text-white hover:bg-red-600/20"
                                            {{ request()->get('role') == 'admin' ? 'selected' : '' }}>🔑 Admin</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-red-400 group-hover:text-red-300 transition-colors duration-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                    <!-- Decorative element -->
                                    <div
                                        class="absolute inset-0 rounded-lg bg-gradient-to-r from-red-500/5 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3">
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/25 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                            @if (request()->hasAny(['search', 'fakultas', 'role']))
                                <a href="{{ route('admin.user.index') }}"
                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-gray-500/25 active:scale-95">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Reset Filter
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Filter Status -->
                @if ($currentFilters['search'] || $currentFilters['fakultas'] || $currentFilters['role'])
                    <div class="flex flex-wrap items-center gap-3 text-sm">
                        @if ($currentFilters['search'])
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Pencarian: {{ $currentFilters['search'] }}
                            </span>
                        @endif
                        @if ($currentFilters['fakultas'])
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-green-500/20 text-green-300 border border-green-400/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                Fakultas: {{ $currentFilters['fakultas'] }}
                            </span>
                        @endif
                        @if ($currentFilters['role'])
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-purple-500/20 text-purple-300 border border-purple-400/30">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Role: {{ ucfirst($currentFilters['role']) }}
                            </span>
                        @endif
                        <span
                            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs bg-gray-700/50 text-gray-300 border border-gray-600/50">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Total: {{ $currentFilters['total_items'] }} user
                        </span>
                        <a href="{{ route('admin.user.index') }}"
                            class="inline-flex items-center gap-1 px-2 py-1 text-xs text-gray-400 hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Hapus Filter
                        </a>
                    </div>
                @endif
            </div>

            <!-- Users Grid Section -->
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 overflow-hidden">
                <!-- Grid Header -->
                <div class="bg-gray-800/50 px-6 py-4 border-b border-gray-800/50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-700/50 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-7.425a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Daftar User</h3>
                                <p class="text-sm text-gray-300">{{ $users->count() }} dari {{ $users->total() }}
                                    user</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Halaman {{ $users->currentPage() }} dari
                                {{ $users->lastPage() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Custom Dropdown Styling -->
                <style>
                    /* Modern Dropdown Styling */
                    select option {
                        padding: 12px 16px;
                        margin: 2px 0;
                        border-radius: 6px;
                        transition: all 0.2s ease;
                    }

                    select option:hover {
                        background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(185, 28, 28, 0.1)) !important;
                        color: #fecaca !important;
                    }

                    select option:checked {
                        background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
                        color: white !important;
                        font-weight: 600;
                    }

                    /* Custom Scrollbar for Dropdown */
                    select::-webkit-scrollbar {
                        width: 8px;
                    }

                    select::-webkit-scrollbar-track {
                        background: #1f2937;
                        border-radius: 4px;
                    }

                    select::-webkit-scrollbar-thumb {
                        background: linear-gradient(135deg, #dc2626, #b91c1c);
                        border-radius: 4px;
                    }

                    select::-webkit-scrollbar-thumb:hover {
                        background: linear-gradient(135deg, #b91c1c, #991b1b);
                    }

                    /* Enhanced Focus State */
                    select:focus {
                        transform: translateY(-1px);
                        box-shadow: 0 10px 25px rgba(220, 38, 38, 0.15), 0 0 0 2px rgba(220, 38, 38, 0.3);
                    }

                    /* Animated Border Effect */
                    .dropdown-container {
                        position: relative;
                        overflow: hidden;
                    }

                    .dropdown-container::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: -100%;
                        width: 100%;
                        height: 2px;
                        background: linear-gradient(90deg, transparent, #dc2626, transparent);
                        transition: left 0.5s ease;
                    }

                    .dropdown-container:hover::before {
                        left: 100%;
                    }
                </style>

                @if ($users->count() > 0)
                    <!-- Users Grid Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                        @foreach ($users as $user)
                            <div
                                class="relative bg-gray-800/30 border border-gray-700/50 rounded-xl overflow-hidden hover:border-gray-600/50 hover:bg-gray-800/50 transition-all duration-200 group">
                                <!-- Role Badge -->
                                <div class="absolute top-3 right-3 z-10">
                                    @if ($user->role === 'admin')
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-red-500/20 text-red-300 border border-red-400/30">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 8a6 6 0 01-7.743 5.743L10 14l-4 1-1-4 .257-.257A6 6 0 1118 8zm-6-2a1 1 0 11-2 0 1 1 0 012 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Admin
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            User
                                        </span>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="relative p-6">
                                    <!-- User Avatar -->
                                    <div class="flex justify-center mb-4">
                                        <div
                                            class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                    </div>

                                    <!-- User Info -->
                                    <div class="text-center mb-4">
                                        <h3
                                            class="text-lg font-bold text-white group-hover:text-gray-200 transition-colors duration-200 mb-1">
                                            {{ $user->name }}
                                        </h3>
                                        <p
                                            class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors duration-200">
                                            {{ $user->email }}
                                        </p>
                                    </div>

                                    <!-- Info Cards -->
                                    <div class="space-y-3 mb-4">
                                        <!-- Fakultas -->
                                        <div
                                            class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200">
                                            <div class="flex items-center gap-2 mb-1">
                                                <svg class="w-3 h-3 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                    </path>
                                                </svg>
                                                <span class="text-xs text-gray-400">Fakultas</span>
                                            </div>
                                            <span
                                                class="text-sm text-white">{{ $user->fakultas ?? 'Tidak ada' }}</span>
                                        </div>

                                        <!-- Phone -->
                                        <div
                                            class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200">
                                            <div class="flex items-center gap-2 mb-1">
                                                <svg class="w-3 h-3 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                <span class="text-xs text-gray-400">Telepon</span>
                                            </div>
                                            <span class="text-sm text-white">{{ $user->phone ?? 'Tidak ada' }}</span>
                                        </div>

                                        <!-- Registration Date -->
                                        <div
                                            class="bg-gray-700/30 rounded-lg p-3 border border-gray-600/30 group-hover:border-gray-500/50 transition-colors duration-200">
                                            <div class="flex items-center gap-2 mb-1">
                                                <svg class="w-3 h-3 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span class="text-xs text-gray-400">Terdaftar</span>
                                            </div>
                                            <span
                                                class="text-sm text-white">{{ $user->created_at ? $user->created_at->format('d M Y') : 'Tidak ada' }}</span>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.user.show', $user->_id) }}"
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
                                        @if ($user->_id !== auth()->id())
                                            <div class="flex-1">
                                                <form id="deleteFormdeleteUserModal{{ $user->_id }}"
                                                    action="{{ route('admin.user.destroy', $user->_id) }}"
                                                    method="POST" class="hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button"
                                                    onclick="openDeleteModaldeleteUserModal('{{ $user->_id }}', '{{ $user->name }}')"
                                                    class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-red-600/20 hover:bg-red-600/30 text-red-300 hover:text-red-200 text-sm rounded-lg border border-red-500/30 hover:border-red-400/50 transition-all duration-200">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-800/50">
                        {{ $users->links('components.pagination-gray') }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-7.425a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Tidak ada user ditemukan</h3>
                        <p class="text-gray-400 mb-6">
                            @if ($currentFilters['search'] || $currentFilters['fakultas'] || $currentFilters['role'])
                                Tidak ada user yang sesuai dengan filter yang dipilih.
                            @else
                                Belum ada user yang terdaftar dalam sistem.
                            @endif
                        </p>
                        @if ($currentFilters['search'] || $currentFilters['fakultas'] || $currentFilters['role'])
                            <a href="{{ route('admin.user.index') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Reset Filter
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-delete-confirmation-modal 
        modal-id="deleteUserModal"
        title="Konfirmasi Hapus User"
        subtitle="Tindakan ini tidak dapat dibatalkan"
        item-type="user"
        warning-text="Data user yang sudah dihapus tidak dapat dikembalikan lagi. Semua data transaksi user akan tetap tersimpan."
        confirm-button-text="Ya, Hapus User"
        cancel-button-text="Batal" />

    <script>
            const dropdowns = document.querySelectorAll('select');

            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('change', function() {
                    // Add selected effect
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

                // Initialize state
                if (dropdown.value) {
                    dropdown.style.background =
                        'linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(185, 28, 28, 0.05))';
                    dropdown.style.borderColor = 'rgba(220, 38, 38, 0.5)';
                }
            });

            // Search input enhancements
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.background =
                            'linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(185, 28, 28, 0.05))';
                        this.style.borderColor = 'rgba(220, 38, 38, 0.5)';
                    } else {
                        this.style.background = '';
                        this.style.borderColor = '';
                    }
                });

                // Initialize search input state
                if (searchInput.value) {
                    searchInput.style.background =
                        'linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(185, 28, 28, 0.05))';
                    searchInput.style.borderColor = 'rgba(220, 38, 38, 0.5)';
                }
            }
        });
    </script>
</x-app-layout>
