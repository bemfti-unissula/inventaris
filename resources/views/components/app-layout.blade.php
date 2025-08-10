<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/Logo-BEM-FTI.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white relative">
        <!-- Grid Pattern Background -->
        <div
            class="absolute inset-0 bg-[url('/grid.svg')] bg-center [mask-image:linear-gradient(180deg,black,rgba(0,0,0,0))]">
        </div>

        <!-- Navbar -->
        <nav class="bg-white/90 border-b border-gray-200 backdrop-blur-sm relative z-50" x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('inventaris') }}">
                                <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI"
                                    class="block h-9 w-auto">
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-black">
                            <x-nav-link href="{{ route('inventaris') }}" :active="request()->routeIs('inventaris')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <x-nav-link href="{{ route('admin.barang.index') }}" :active="request()->routeIs('admin.barang.*')">
                                        {{ __('Kelola Inventaris') }}
                                    </x-nav-link>
                                    <x-nav-link href="{{ route('inventaris') }}" :active="request()->routeIs('admin.users')">
                                        {{ __('Kelola User') }}
                                    </x-nav-link>
                                @else
                                    <x-nav-link href="{{ route('pinjaman') }}" :active="request()->routeIs('pinjaman')">
                                        {{ __('Pinjaman') }}
                                    </x-nav-link>
                                    <x-nav-link href="{{ route('riwayat') }}" :active="request()->routeIs('riwayat')">
                                        {{ __('Riwayat Pinjaman') }}
                                    </x-nav-link>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <!-- Profile -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @auth
                            <div class="relative z-[9999]" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white/50 hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white backdrop-blur-sm border border-gray-200"
                                    style="display: none;">
                                    <a href="{{ route('profile.edit') }}"
                                        class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        {{ __('Profile') }}
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="flex space-x-3">
                                <a href="{{ route('login.page') }}"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-transparent hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-150 ease-in-out">
                                    {{ __('Login') }}
                                </a>
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-900 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }"
                                    class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }"
                                    class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="sm:hidden" x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" x-cloak>
                <div class="pt-2 pb-3 space-y-1 bg-white/90 backdrop-blur-sm">
                    <x-nav-link href="{{ route('inventaris') }}" :active="request()->routeIs('inventaris')" class="block pl-3 pr-4 py-2">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <x-nav-link href="{{ route('admin.barang.index') }}" :active="request()->routeIs('admin.barang.*')"
                                class="block pl-3 pr-4 py-2">
                                {{ __('Kelola Inventaris') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('inventaris') }}" :active="request()->routeIs('admin.users.*')" class="block pl-3 pr-4 py-2">
                                {{ __('Kelola User') }}
                            </x-nav-link>
                        @else
                            <x-nav-link href="{{ route('pinjaman') }}" :active="request()->routeIs('pinjaman')" class="block pl-3 pr-4 py-2">
                                {{ __('Pinjaman') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('riwayat') }}" :active="request()->routeIs('riwayat')" class="block pl-3 pr-4 py-2">
                                {{ __('Riwayat Pinjaman') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>

                <!-- Mobile Profile -->
                <div class="pt-4 pb-3 border-t border-gray-300 bg-white/90 backdrop-blur-sm">
                    @auth
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-900">{{ Auth::user()->name }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                                {{ __('Profile') }}
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block px-4 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    @else
                        <div class="px-4 space-y-3">
                            <a href="{{ route('login.page') }}"
                                class="block w-full px-4 py-2 text-base font-medium text-gray-700 border border-gray-300 bg-transparent hover:bg-gray-100 rounded-md transition duration-150 ease-in-out text-center">
                                {{ __('Login') }}
                            </a>
                            <a href="{{ route('register') }}"
                                class="block w-full px-4 py-2 text-base font-medium text-white border border-gray-800 bg-gray-800 hover:bg-gray-700 rounded-md transition duration-150 ease-in-out text-center">
                                {{ __('Register') }}
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white/90 shadow relative z-40">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="relative">
                        {{ $header }}
                    </div>
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gray-400 to-transparent">
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="relative z-30">
            {{ $slot }}
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 relative z-40 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Logo dan Deskripsi -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI" class="h-10 w-auto">
                        <div>
                            <h3 class="text-gray-900 font-semibold text-lg">Inventaris BEM FTI</h3>
                            <p class="text-gray-600 text-sm">Universitas Islam Sultan Agung</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Sistem manajemen inventaris untuk Badan Eksekutif Mahasiswa Fakultas Teknologi Industri
                        Universitas Islam Sultan Agung.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-gray-900 font-semibold text-base">Quick Links</h4>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('inventaris') }}"
                                class="text-gray-700 hover:text-gray-900 transition-colors duration-200 text-sm">
                                Dashboard
                            </a>
                        </li>
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.barang.index') }}"
                                        class="text-gray-700 hover:text-gray-900 transition-colors duration-200 text-sm">
                                        Kelola Inventaris
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('pinjaman') }}"
                                        class="text-gray-700 hover:text-gray-900 transition-colors duration-200 text-sm">
                                        Pinjaman
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <li>
                            <a href="#"
                                class="text-gray-700 hover:text-gray-900 transition-colors duration-200 text-sm">
                                Bantuan
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4">
                    <h4 class="text-gray-900 font-semibold text-base">Kontak</h4>
                    <div class="space-y-2">
                        <div class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-gray-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700 text-sm leading-relaxed">Jl. Kaligawe Raya No.Km.4, Terboyo
                                Kulon, Kec. Genuk, Kota Semarang, Jawa Tengah 50112</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span class="text-gray-700 text-sm">bem.fti@unej.ac.id</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                </path>
                            </svg>
                            <span class="text-gray-700 text-sm">(0331) 123456</span>
                        </div>
                    </div>
                </div>

                <!-- Maps -->
                <div class="space-y-4">
                    <h4 class="text-gray-900 font-semibold text-base">Lokasi</h4>
                    <div class="w-full h-31 rounded-lg overflow-hidden border border-gray-300">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0!2d110.4601599!3d-6.9542522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f33d6b563227%3A0x46597d1bdae2f728!2sFakultas%20Teknologi%20Industri%20Unissula!5e0!3m2!1sid!2sid!4v1699999999999!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="mt-8 pt-6 border-t border-gray-300">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-gray-600 text-sm">
                        © {{ date('Y') }} BEM FTI Universitas Islam Sultan Agung. All rights reserved.
                    </div>
                    <div class="flex space-x-6">
                        <a href="https://www.instagram.com/bemftiunissula?igsh=em5lZDFmajk3dHFv"
                            class="text-gray-600 group transition-colors duration-200">
                            <svg class="w-5 h-5 group-hover:text-transparent" fill="currentColor"
                                viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="instagram-gradient" x1="0%" y1="0%"
                                        x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#833ab4;stop-opacity:1" />
                                        <stop offset="50%" style="stop-color:#fd1d1d;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#fcb045;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                    class="group-hover:fill-[url(#instagram-gradient)]" />
                            </svg>
                        </a>
                        <a href="https://www.tiktok.com/@bemfti_unissula?_t=ZS-8ydhYT5b2d5&_r=1"
                            class="text-gray-400 hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer gradient line -->
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-300 to-transparent">
        </div>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mobileMenu', () => ({
                mobileMenuOpen: false
            }))
        })
    </script>
</body>

</html>
