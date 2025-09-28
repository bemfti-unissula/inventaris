@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-6 lg:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section with Refined Color Palette -->
            <div
                class="relative mb-12 lg:mb-16 bg-gradient-to-br from-rose-500/85 via-red-600/80 to-red-700/85 backdrop-blur-md border border-rose-400/30 rounded-3xl overflow-hidden shadow-2xl shadow-rose-500/20">
                <!-- Refined Background Pattern -->
                <div class="absolute inset-0 bg-[url('/grid.svg')] bg-center opacity-[0.02]"></div>
                
                <!-- Subtle Texture Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-white/[0.02] via-transparent to-black/[0.05]"></div>
                
                <!-- Elegant Floating Elements -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div class="absolute top-24 left-16 w-1.5 h-1.5 bg-white/40 rounded-full animate-pulse"></div>
                    <div class="absolute top-48 right-20 w-1 h-1 bg-rose-100/50 rounded-full animate-pulse" style="animation-delay: 1s"></div>
                    <div class="absolute bottom-40 left-24 w-2 h-2 bg-white/30 rounded-full animate-pulse" style="animation-delay: 2s"></div>
                    <div class="absolute top-72 right-40 w-1 h-1 bg-rose-200/60 rounded-full animate-pulse" style="animation-delay: 3s"></div>
                </div>

                <!-- Sophisticated Color Layers -->
                <div class="absolute inset-0 bg-gradient-to-br from-rose-400/20 via-transparent to-red-600/30"></div>
                <div class="absolute inset-0 bg-gradient-to-tl from-transparent via-rose-500/10 to-red-500/20"></div>
                
                <!-- Refined Ambient Lighting -->
                <div class="absolute top-0 left-1/3 w-80 h-80 bg-rose-300/15 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute bottom-0 right-1/3 w-72 h-72 bg-red-400/12 rounded-full blur-3xl opacity-50"></div>

                <!-- Hero Content -->
                <div class="relative px-6 sm:px-8 py-16 sm:py-20 lg:py-28">
                    <!-- Mobile Layout: Title First -->
                    <div class="lg:hidden space-y-6 sm:space-y-8">
                        <!-- Mobile: Main Heading -->
                        <div class="space-y-4 text-center">
                            <h1 class="text-3xl sm:text-4xl font-poppins font-bold text-white leading-tight drop-shadow-lg">
                                Inventaris
                                <span class="block text-gray-200 mt-1 sm:mt-2 font-poppins">
                                    BEM FTI
                                </span>
                            </h1>
                            <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-white to-gray-200 rounded-full shadow-lg mx-auto"></div>
                        </div>

                        <!-- Mobile: Logo Section -->
                        <div class="flex justify-center px-4">
                            <div class="relative group w-full max-w-xs sm:max-w-sm">
                                <!-- Glowing Border Effect -->
                                <div
                                    class="absolute -inset-2 bg-gradient-to-r from-white/20 via-gray-200/30 to-white/20 rounded-2xl blur-lg opacity-50 group-hover:opacity-70 transition duration-1000 group-hover:duration-200 animate-pulse">
                                </div>
                                <!-- Card Container -->
                                <div
                                    class="relative bg-white/10 backdrop-blur-sm rounded-xl overflow-hidden shadow-2xl border border-white/20">
                                    <!-- Logo Container -->
                                    <div class="relative p-4 sm:p-6">
                                        <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI"
                                            class="w-full h-40 sm:h-48 object-contain drop-shadow-2xl">
                                        <!-- Decorative Elements -->
                                        <div
                                            class="absolute top-3 right-3 w-2 h-2 sm:w-3 sm:h-3 bg-white rounded-full animate-ping shadow-lg">
                                        </div>
                                    </div>
                                    <!-- Enhanced Text Section -->
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900/90 to-transparent p-3 sm:p-4">
                                        <h3 class="text-white font-poppins font-bold text-base sm:text-lg drop-shadow-lg text-center">
                                            BEM FTI UNISSULA
                                        </h3>
                                        <p class="text-gray-200 text-xs sm:text-sm font-medium drop-shadow-md font-poppins text-center">
                                            Badan Eksekutif Mahasiswa
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile: Description -->
                        <div class="text-center px-2">
                            <p class="text-base sm:text-lg text-gray-200 leading-relaxed drop-shadow-md max-w-md mx-auto">
                                Kelola inventaris Badan Eksekutif Mahasiswa Fakultas Teknologi Industri dengan sistem
                                yang modern, efisien, dan terintegrasi.
                            </p>
                        </div>

                        <!-- Mobile: Optimized CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-4 px-2">
                            <a href="#inventory-section"
                                class="group premium-button flex-1 inline-flex items-center justify-center px-6 py-4 bg-white/95 hover:bg-white text-rose-700 font-poppins font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-white/20 border border-white/50 hover:border-white relative overflow-hidden">
                                <!-- Subtle Shine -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-500"></div>
                                
                                <svg class="w-4 h-4 mr-2 sm:w-5 sm:h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="relative z-10 text-sm sm:text-base font-medium">Jelajahi Inventaris</span>
                            </a>
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('admin.barang.index') }}"
                                        class="group premium-button flex-1 inline-flex items-center justify-center px-6 py-4 bg-white/15 hover:bg-white/25 backdrop-blur-sm text-white font-poppins font-medium rounded-xl border border-white/30 hover:border-white/50 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-white/10 relative">
                                        <svg class="w-4 h-4 mr-2 sm:w-5 sm:h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="relative z-10 text-sm sm:text-base">Kelola Barang</span>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <!-- Desktop Layout: Side by Side -->
                    <div class="hidden lg:grid lg:grid-cols-2 gap-16 items-center">
                        <!-- Left Content with Refined Layout -->
                        <div class="space-y-8">
                            <!-- Polished Main Heading -->
                            <div class="space-y-5">
                                <div class="space-y-3">
                                    <h1 class="text-5xl lg:text-6xl xl:text-7xl font-poppins font-bold leading-[0.95] tracking-tight">
                                        <span class="bg-gradient-to-br from-white via-gray-50 to-white bg-clip-text text-transparent drop-shadow-xl">
                                            Inventaris
                                        </span>
                                        <span class="block text-2xl lg:text-3xl xl:text-4xl bg-gradient-to-r from-rose-100 via-white to-rose-100 bg-clip-text text-transparent font-semibold mt-1 font-poppins tracking-wide">
                                            BEM FTI
                                        </span>
                                    </h1>
                                    
                                    <!-- Refined Divider -->
                                    <div class="flex items-center justify-center lg:justify-start space-x-3 pt-3">
                                        <div class="h-px bg-gradient-to-r from-transparent via-white/70 to-transparent w-16 shadow-sm"></div>
                                        <div class="w-2 h-2 bg-white/80 rounded-full shadow-md"></div>
                                        <div class="h-px bg-gradient-to-r from-transparent via-white/70 to-transparent w-16 shadow-sm"></div>
                                    </div>
                                </div>

                                <!-- Clean Status Badge -->
                                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 bg-white/15 backdrop-blur-md border border-white/25 rounded-full shadow-lg">
                                    <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse shadow-sm"></div>
                                    <span class="text-xs font-medium text-white/95 font-poppins tracking-wide">Sistem Terintegrasi</span>
                                </div>
                            </div>

                            <!-- Clean Description Section -->
                            <div class="space-y-6">
                                <p class="text-lg lg:text-xl text-white/95 leading-relaxed max-w-2xl font-normal">
                                    Kelola inventaris <span class="font-semibold text-white">Badan Eksekutif Mahasiswa</span> 
                                    Fakultas Teknologi Industri dengan sistem yang 
                                    <span class="font-semibold bg-gradient-to-r from-rose-100 to-white bg-clip-text text-transparent">modern, efisien, dan terintegrasi.</span>
                                </p>
                                
                                <!-- Refined Stats Preview -->
                                <div class="grid grid-cols-3 gap-4 max-w-md">
                                    <div class="flex flex-col items-center p-3 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                                        <div class="w-2 h-2 bg-emerald-400 rounded-full mb-2 shadow-sm"></div>
                                        <span class="text-xs font-medium text-white/90 text-center font-poppins">{{ $barangs->total() }}+ Barang</span>
                                    </div>
                                    <div class="flex flex-col items-center p-3 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                                        <div class="w-2 h-2 bg-sky-400 rounded-full mb-2 shadow-sm"></div>
                                        <span class="text-xs font-medium text-white/90 text-center font-poppins">{{ count($categories) }} Kategori</span>
                                    </div>
                                    <div class="flex flex-col items-center p-3 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                                        <div class="w-2 h-2 bg-amber-400 rounded-full mb-2 shadow-sm"></div>
                                        <span class="text-xs font-medium text-white/90 text-center font-poppins">Real-time</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Refined CTA Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3 pt-6">
                                <a href="#inventory-section"
                                    class="group premium-button inline-flex items-center justify-center px-8 py-4 bg-white/95 hover:bg-white text-rose-700 font-poppins font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-white/25 border border-white/50 hover:border-white relative overflow-hidden">
                                    <!-- Subtle Glow -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    
                                    <svg class="w-5 h-5 mr-2.5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <span class="relative z-10 font-medium">Jelajahi Inventaris</span>
                                </a>
                                
                                @auth
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('admin.barang.index') }}"
                                            class="group premium-button inline-flex items-center justify-center px-8 py-4 bg-white/15 hover:bg-white/25 backdrop-blur-sm text-white font-poppins font-medium rounded-xl border border-white/30 hover:border-white/50 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-white/15 relative">
                                            <svg class="w-5 h-5 mr-2.5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span class="relative z-10">Kelola Barang</span>
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>

                        <!-- Right Content - Refined Logo Showcase -->
                        <div class="relative">
                            <!-- Subtle Background Elements -->
                            <div class="absolute -top-8 -right-8 w-32 h-32 bg-white/8 rounded-full blur-2xl"></div>
                            <div class="absolute -bottom-12 -left-12 w-40 h-40 bg-rose-200/10 rounded-full blur-2xl"></div>
                            
                            <!-- Clean Logo Container -->
                            <div class="relative group">
                                <!-- Refined Glow -->
                                <div class="absolute -inset-3 bg-gradient-to-r from-white/20 via-rose-200/25 to-white/20 rounded-2xl blur-xl opacity-40 group-hover:opacity-60 transition duration-500"></div>
                                
                                <!-- Main Card -->
                                <div class="relative bg-white/12 backdrop-blur-xl rounded-2xl overflow-hidden shadow-xl border border-white/25 group-hover:border-white/40 transition-all duration-300 hover:shadow-white/10">
                                    <!-- Logo Area -->
                                    <div class="relative p-8 lg:p-10">
                                        <!-- Logo Image -->
                                        <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI"
                                            class="w-full h-64 lg:h-72 object-contain drop-shadow-xl group-hover:scale-105 transition-transform duration-500">
                                        
                                        <!-- Clean Decorative Dot -->
                                        <div class="absolute top-4 right-4 w-2 h-2 bg-white/60 rounded-full shadow-sm"></div>
                                    </div>
                                    
                                    <!-- Information Panel -->
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/70 to-transparent backdrop-blur-sm p-6">
                                        <!-- University Tag -->
                                        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-white/20 backdrop-blur-sm rounded-lg mb-3">
                                            <div class="w-1.5 h-1.5 bg-amber-400 rounded-full"></div>
                                            <span class="text-xs font-medium text-white/95 font-poppins">UNIVERSITAS SULTAN AGUNG</span>
                                        </div>
                                        
                                        <!-- Main Info -->
                                        <h3 class="text-white font-poppins font-bold text-xl lg:text-2xl drop-shadow-lg mb-1">
                                            BEM FTI UNISSULA
                                        </h3>
                                        <p class="text-white/90 text-sm lg:text-base font-medium font-poppins mb-3">
                                            Badan Eksekutif Mahasiswa
                                        </p>
                                        
                                        <!-- Clean Status Row -->
                                        <div class="flex items-center gap-4 text-sm">
                                            <div class="flex items-center gap-1.5">
                                                <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></div>
                                                <span class="text-white/80 font-poppins font-medium">Aktif</span>
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <div class="w-1.5 h-1.5 bg-sky-400 rounded-full"></div>
                                                <span class="text-white/80 font-poppins font-medium">2024/2025</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Clean Scroll Indicator -->
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2">
                    <div class="flex flex-col items-center space-y-3 group cursor-pointer" onclick="document.getElementById('inventory-section').scrollIntoView({behavior: 'smooth'})">
                        <!-- Simple Text -->
                        <span class="text-white/70 text-xs font-poppins font-medium opacity-0 group-hover:opacity-100 transition-all duration-200 transform translate-y-1 group-hover:translate-y-0">
                            Lihat Inventaris
                        </span>
                        
                        <!-- Clean Button -->
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-3 border border-white/30 group-hover:bg-white/30 group-hover:border-white/50 transition-all duration-300 animate-bounce">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8 lg:mb-12">
                <!-- Total Items Card -->
                <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-4 sm:p-6 group hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 hover:border-red-500/30">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-gray-400 text-xs sm:text-sm font-medium font-poppins mb-1">Total Barang</p>
                            <p class="text-xl sm:text-2xl font-bold text-white font-poppins">{{ $barangs->total() }}</p>
                        </div>
                        <div class="p-2 sm:p-3 bg-gradient-to-r from-red-600 to-red-700 rounded-lg group-hover:from-red-700 group-hover:to-red-800 transition-all duration-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Items Card -->
                <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-4 sm:p-6 group hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 hover:border-red-500/30">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-gray-400 text-xs sm:text-sm font-medium font-poppins mb-1">Tersedia</p>
                            <p class="text-xl sm:text-2xl font-bold text-white font-poppins">{{ $barangs->where('stok', '>', 0)->count() }}</p>
                        </div>
                        <div class="p-2 sm:p-3 bg-gradient-to-r from-green-600 to-green-700 rounded-lg group-hover:from-green-700 group-hover:to-green-800 transition-all duration-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-4 sm:p-6 group hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 hover:border-red-500/30 sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-gray-400 text-xs sm:text-sm font-medium font-poppins mb-1">Kategori</p>
                            <p class="text-xl sm:text-2xl font-bold text-white font-poppins">{{ count($categories) }}</p>
                        </div>
                        <div class="p-2 sm:p-3 bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg group-hover:from-blue-700 group-hover:to-blue-800 transition-all duration-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
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
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 p-4 sm:p-6 mb-6 lg:mb-8 shadow-lg">
                <div class="flex items-center gap-3 mb-4 sm:mb-6">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-red-600 to-red-700 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-white font-poppins">Pencarian & Filter</h3>
                </div>

                <form action="{{ route('inventaris') }}" method="GET" class="space-y-4">
                    <div class="flex flex-col lg:flex-row gap-4">
                        <!-- Search Input -->
                        <div class="flex-1">
                            <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-2 font-poppins">Cari Barang</label>
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="premium-input w-full h-10 sm:h-12 bg-gray-800/50 rounded-lg pl-10 sm:pl-12 pr-4 py-2 sm:py-3 text-sm sm:text-base text-white border border-gray-700/50 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-400/70"
                                    placeholder="Masukkan nama barang...">
                                <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-hover:text-red-400 transition-colors"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="w-full lg:w-64">
                            <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-2 font-poppins">Filter Kategori</label>
                            <div class="relative">
                                <select name="category" id="category" onchange="this.form.submit()"
                                    class="premium-dropdown w-full h-10 sm:h-12 bg-gray-800/50 rounded-lg px-3 sm:px-4 py-2 sm:py-3 border border-gray-700/50 text-sm sm:text-base text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 cursor-pointer appearance-none">
                                    <option class="bg-gray-800 text-white" value="">Semua Kategori</option>
                                    @foreach ($categories as $cat)
                                        <option class="bg-gray-800 text-white" value="{{ $cat }}"
                                            {{ request()->get('category') == $cat ? 'selected' : '' }}>
                                            {{ $cat }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <div class="w-full lg:w-auto">
                            <label class="block text-xs sm:text-sm font-medium text-transparent mb-2">Action</label>
                            <button type="submit"
                                class="premium-button w-full lg:w-auto h-10 sm:h-12 px-4 sm:px-6 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-poppins font-medium rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500/50">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="text-sm sm:text-base">Cari</span>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Active Filters -->
                @if ($currentFilters['search'] || $currentFilters['category'])
                    <div class="mt-3 sm:mt-4 flex flex-wrap gap-2">
                        <span class="text-xs sm:text-sm text-gray-300 font-poppins font-medium">Filter Aktif:</span>
                        @if ($currentFilters['search'])
                            <span
                                class="inline-flex items-center px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-red-600 to-red-700 text-white font-poppins">
                                Pencarian: {{ Str::limit($currentFilters['search'], 15) }}
                            </span>
                        @endif
                        @if ($currentFilters['category'])
                            <span
                                class="inline-flex items-center px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-blue-600 to-blue-700 text-white font-poppins">
                                Kategori: {{ $currentFilters['category'] }}
                            </span>
                        @endif
                        <span
                            class="inline-flex items-center px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-green-600 to-green-700 text-white font-poppins">
                            Total: {{ $currentFilters['total_items'] }} barang
                        </span>
                    </div>
                @endif
            </div>

            <!-- Items Grid Header -->
            <div id="inventory-section" class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-red-600 to-red-700 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-white font-poppins">Daftar Inventaris</h3>
                        <p class="text-xs sm:text-sm text-gray-300 font-poppins">{{ $barangs->total() }} barang ditemukan</p>
                    </div>
                </div>

                <!-- View Toggle -->
                <div class="flex items-center gap-1 bg-gray-800/50 rounded-lg p-1 border border-gray-700/50 w-fit">
                    <button id="gridViewBtn"
                        class="view-toggle active flex items-center gap-1 sm:gap-2 px-2 sm:px-3 py-1.5 sm:py-2 rounded-md text-xs sm:text-sm font-medium font-poppins"
                        style="color: white !important;">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: inherit !important;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="font-semibold hidden sm:inline" style="color: inherit !important;">Grid</span>
                    </button>
                    <button id="listViewBtn"
                        class="view-toggle flex items-center gap-1 sm:gap-2 px-2 sm:px-3 py-1.5 sm:py-2 rounded-md text-xs sm:text-sm font-medium font-poppins"
                        style="color: white !important;">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: inherit !important;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="font-semibold hidden sm:inline" style="color: inherit !important;">List</span>
                    </button>
                </div>
            </div>

            <!-- Skeleton Loader -->
            <x-skeleton-loader />

            <!-- Grid View -->
            <div id="gridView" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
                @forelse ($barangs as $barang)
                    <div class="transform transition-all duration-300 hover:scale-105">
                        <a href="{{ route('barang.show', $barang) }}" class="block">
                            <div
                                class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6 hover:bg-gray-800/50 transition-all duration-300 hover:border-gray-600/50 group shadow-lg hover:shadow-red-500/20">
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
                                    class="text-lg font-semibold text-white mb-2 group-hover:text-red-400 transition-colors font-poppins">
                                    {{ $barang->nama_barang }}</h3>
                                <p class="text-gray-300 text-sm mb-3 line-clamp-2 font-poppins">
                                    {{ $barang->deskripsi }}
                                </p>

                                <div class="flex items-center justify-between mb-3">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white border border-red-500 font-poppins">
                                        {{ $barang->kategori }}
                                    </span>
                                    <span class="text-sm text-gray-300">
                                        <span class="font-medium font-poppins">Stok:</span>
                                        <span
                                            class="{{ $barang->stok > 0 ? 'text-green-400' : 'text-red-400' }} font-poppins">{{ $barang->stok }}</span>
                                    </span>
                                </div>

                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-gray-400 font-poppins">Klik untuk detail</span>
                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-red-400 transition-colors"
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
                            class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-12 text-center shadow-lg">
                            <div
                                class="w-16 h-16 bg-gray-700/50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2 font-poppins">Tidak Ada Barang Ditemukan</h3>
                            <p class="text-gray-400 mb-4">Coba ubah kata kunci pencarian atau filter kategori</p>
                            <a href="{{ route('inventaris') }}"
                                class="premium-button inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors font-poppins">
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
                            class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6 hover:bg-gray-800/50 transition-all duration-300 hover:border-gray-600/50 shadow-lg hover:shadow-red-500/20">
                            <div class="flex items-center gap-6">
                                <!-- Image -->
                                <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-gray-700">
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
                                            <h3 class="text-lg font-semibold text-white mb-1 truncate font-poppins">
                                                {{ $barang->nama_barang }}
                                            </h3>
                                            <p class="text-gray-300 text-sm mb-2 font-poppins">
                                                <span class="description-text-list">{{ $barang->deskripsi }}</span>
                                            </p>
                                            <div class="flex items-center gap-4">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white border border-red-500 font-poppins">
                                                    {{ $barang->kategori }}
                                                </span>
                                                <span class="text-sm text-gray-300">
                                                    <span class="font-medium font-poppins">Stok:</span>
                                                    <span class="{{ $barang->stok > 0 ? 'text-green-400' : 'text-red-400' }} font-poppins">
                                                        {{ $barang->stok }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Arrow -->
                                        <div class="ml-4 flex-shrink-0 flex items-center">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div
                        class="bg-gray-800/30 backdrop-blur-sm rounded-xl border border-gray-700/50 p-12 text-center shadow-lg">
                        <div class="w-16 h-16 bg-gray-700/50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2 font-poppins">Tidak Ada Barang Ditemukan</h3>
                        <p class="text-gray-400 mb-4 font-poppins">Coba ubah kata kunci pencarian atau filter kategori</p>
                        <a href="{{ route('inventaris') }}"
                            class="premium-button inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors font-poppins">
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
            <div class="mt-8 bg-gray-800/30 backdrop-blur-sm shadow-lg rounded-xl border border-gray-700/50 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 10h6m-6 4h6">
                            </path>
                        </svg>
                        <div class="text-sm text-gray-300 font-poppins">
                            <span class="font-medium text-white font-poppins">{{ $barangs->firstItem() ?? 0 }}</span>
                            -
                            <span class="font-medium text-white font-poppins">{{ $barangs->lastItem() ?? 0 }}</span>
                            dari
                            <span class="font-medium text-white font-poppins">{{ $barangs->total() }}</span>
                            barang
                        </div>
                    </div>

                    <div class="flex items-center space-x-1">
                        @if ($barangs->onFirstPage())
                            <span class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-800/50 border border-gray-700 rounded-l-lg cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $barangs->previousPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-800/50 border border-gray-700 rounded-l-lg hover:bg-gray-700 hover:text-white hover:border-red-400 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                        @endif

                        @foreach ($barangs->getUrlRange(1, $barangs->lastPage()) as $page => $url)
                            @if ($page == $barangs->currentPage())
                                <span class="px-3 py-2 text-sm font-medium text-white bg-gradient-to-r from-red-600 to-red-700 border border-red-600 shadow-lg shadow-red-500/25 font-poppins">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-800/50 border border-gray-700 hover:bg-gray-700 hover:text-white hover:border-red-400 transition-all duration-300 font-poppins">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        @if ($barangs->hasMorePages())
                            <a href="{{ $barangs->nextPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-800/50 border border-gray-700 rounded-r-lg hover:bg-gray-700 hover:text-white hover:border-red-400 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @else
                            <span class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-800/50 border border-gray-700 rounded-r-lg cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        .pagination {
            @apply flex items-center space-x-1;
        }

        .pagination .page-link {
            @apply px-3 py-2 text-sm font-medium text-gray-300 bg-gray-800/50 border border-gray-700 rounded-lg hover:bg-gray-700 hover:text-white hover:border-red-400 transition-all duration-300;
        }

        .pagination .page-item.active .page-link {
            @apply bg-gradient-to-r from-red-600 to-red-700 text-white border-red-600 shadow-lg shadow-red-500/25;
        }

        .pagination .page-item.disabled .page-link {
            @apply text-gray-500 cursor-not-allowed hover:bg-gray-800/50 hover:text-gray-500 hover:border-gray-700;
        }

        .pagination .page-link:focus {
            @apply outline-none ring-2 ring-red-500/50;
        }

        /* View Toggle Styles */
        .view-toggle {
            color: #ffffff !important;
            background: transparent;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .view-toggle:hover {
            color: #ef4444 !important;
            background: rgba(55, 65, 81, 0.5);
        }

        .view-toggle.active {
            color: #ffffff !important;
            background: rgba(220, 38, 38, 0.2);
            border: 2px solid rgba(239, 68, 68, 0.5);
            box-shadow: 0 0 0 1px rgba(239, 68, 68, 0.3), 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .view-toggle svg {
            color: inherit !important;
        }

        .view-toggle span {
            color: inherit !important;
        }

        .description-text-list {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
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
</x-app-layout>
