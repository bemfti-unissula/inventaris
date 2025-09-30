<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/Logo-BEM-FTI.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Black & Red Theme with Poppins Font -->
    <style>
        /* Black & Red Theme Variables */
        :root {
            --red-primary: #dc2626;
            --red-secondary: #b91c1c;
            --red-dark: #991b1b;
            --red-light: #ef4444;
            --black-primary: #000000;
            --black-secondary: #1a1a1a;
            --gray-dark: #111827;
        }

        /* Poppins Font Classes */
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* Black & Red Gradient Backgrounds */
        .bg-black-red-gradient {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 50%, #991b1b 100%);
        }

        .bg-red-black-gradient {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 50%, #000000 100%);
        }

        .bg-black-gradient {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        }

        /* Red Glow Effects */
        .red-glow {
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
        }

        .red-glow-strong {
            box-shadow: 0 0 30px rgba(220, 38, 38, 0.6);
        }

        /* Modern Black & Red Glassmorphism */
        .glass-black-red {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(220, 38, 38, 0.3);
        }
    </style>
</head>

<body class="font-poppins antialiased bg-black-gradient">
    <div class="min-h-screen bg-black-gradient relative">
        <!-- Black & Red Pattern Background -->
        <div class="absolute inset-0 bg-red-black-gradient opacity-10">
        </div>
        <div
            class="absolute inset-0 bg-[url('/grid.svg')] bg-center [mask-image:linear-gradient(180deg,rgba(220,38,38,0.2),rgba(0,0,0,0))]">
        </div>

        <!-- Navbar -->
        <nav class="bg-black-red-gradient border-b border-red-600 shadow-lg red-glow relative z-50"
            x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('inventaris') }}" class="flex items-center space-x-3">
                            <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI"
                                class="block h-10 w-auto red-glow">
                            <div class="flex flex-col items-start -space-y-1">
                                <span class="text-xl font-poppins font-bold text-white drop-shadow-lg">BEM FTI</span>
                                <span class="text-sm font-poppins font-medium text-red-300">Inventaris</span>
                            </div>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-2 ml-8">
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('inventaris') }}"
                                    class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('inventaris') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                        </svg>
                                        Dashboard
                                    </span>
                                </a>
                                <a href="{{ route('admin.barang.index') }}"
                                    class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('admin.barang.*') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                        Kelola Inventaris
                                    </span>
                                </a>
                                <a href="{{ route('admin.transaksi.index') }}"
                                    class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('admin.transaksi.*') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Kelola Transaksi
                                    </span>
                                </a>
                                <a href="{{ route('admin.user.index') }}"
                                    class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('admin.user.*') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                            </path>
                                        </svg>
                                        Kelola User
                                    </span>
                                </a>
                            @else
                                <a href="{{ route('inventaris') }}"
                                    class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('inventaris') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                        </svg>
                                        Dashboard
                                    </span>
                                </a>
                                <a href="{{ route('transaksi.index') }}"
                                    class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('transaksi.index') || request()->routeIs('transaksi.detail') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Pinjaman Saya
                                    </span>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('inventaris') }}"
                                class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('inventaris') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                    </svg>
                                    Dashboard
                                </span>
                            </a>
                        @endauth
                    </div>

                    <!-- Right Side - Profile/Login -->
                    <div class="hidden md:flex items-center ml-auto">
                        @auth
                            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white hover:text-red-200 focus:outline-none transition duration-150 ease-in-out">
                                    <div class="font-poppins font-medium">{{ Auth::user()->name }}</div>
                                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-48 rounded-lg shadow-lg py-1 bg-gray-900 border border-red-500 red-glow"
                                    style="display: none;">
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-red-600 hover:text-white transition duration-150 ease-in-out">
                                        Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-red-600 hover:text-white transition duration-150 ease-in-out">
                                            Log Out
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login.page') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white hover:text-red-300 transition-colors duration-200 bg-red-600 hover:bg-red-700 rounded-lg red-glow">
                                <span class="font-poppins font-medium">Log in</span>
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        @endauth
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-red-200 hover:bg-red-800 focus:outline-none transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }"
                                    class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }"
                                    class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="md:hidden" x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" x-cloak>
                <div class="pt-2 pb-3 space-y-2 bg-black-red-gradient border-t border-red-600 px-4">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('inventaris') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('inventaris') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('admin.barang.index') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('admin.barang.*') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                Kelola Inventaris
                            </a>
                            <a href="{{ route('admin.transaksi.index') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('admin.transaksi.*') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Kelola Transaksi
                            </a>
                            <a href="{{ route('admin.user.index') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('admin.user.*') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                    </path>
                                </svg>
                                Kelola User
                            </a>
                        @else
                            <a href="{{ route('inventaris') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('inventaris') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('transaksi.index') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('transaksi.index') || request()->routeIs('transaksi.detail') || request()->routeIs('transaksi.create') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Pinjaman Saya
                            </a>
                        @endif
                    @else
                        <a href="{{ route('inventaris') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('inventaris') ? 'bg-red-500/20 text-red-200 border border-red-400/30 shadow-lg' : 'text-white hover:text-red-200 hover:bg-red-600/10' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                            Dashboard
                        </a>
                    @endauth
                </div>

                <!-- Mobile Profile -->
                <div class="pt-4 pb-3 border-t border-red-600 bg-black-red-gradient">
                    @auth
                        <div class="px-4">
                            <div class="font-poppins font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-base font-medium text-white hover:text-red-300 hover:bg-red-600">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block px-4 py-2 text-base font-medium text-white hover:text-red-300 hover:bg-red-600">
                                    Log Out
                                </a>
                            </form>
                        </div>
                    @else
                        <div class="px-4">
                            <a href="{{ route('login.page') }}"
                                class="inline-flex items-center px-4 py-2 text-base font-medium text-white hover:text-red-300 transition-colors duration-200 bg-red-600 hover:bg-red-700 rounded-lg red-glow">
                                <span class="font-poppins font-medium">Log in</span>
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-gray-900/95 shadow-lg red-glow relative z-40">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="relative text-white">
                        {{ $header }}
                    </div>
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-red-500 to-transparent">
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="relative z-30">
            {{ $slot }}
        </main>
    </div>

    <!-- Global Alerts -->
    @if (session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif

    @if (session('error'))
        <x-alert type="error">
            {{ session('error') }}
        </x-alert>
    @endif

    @if (session('warning'))
        <x-alert type="warning">
            {{ session('warning') }}
        </x-alert>
    @endif

    @if (session('info'))
        <x-alert type="info">
            {{ session('info') }}
        </x-alert>
    @endif

    @if (session('status'))
        <x-alert type="success">
            {{ session('status') }}
        </x-alert>
    @endif

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-red-600 relative z-40 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Logo dan Deskripsi -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI" class="h-10 w-auto">
                        <div>
                            <h3 class="text-white font-poppins font-semibold text-lg">Inventaris BEM FTI</h3>
                            <p class="text-gray-300 font-poppins text-sm">Universitas Islam Sultan Agung</p>
                        </div>
                    </div>
                    <p class="text-gray-300 font-poppins text-sm leading-relaxed">
                        Sistem manajemen inventaris untuk Badan Eksekutif Mahasiswa Fakultas Teknologi Industri
                        Universitas Islam Sultan Agung.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-white font-poppins font-semibold text-base">Quick Links</h4>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('inventaris') }}"
                                class="text-gray-300 hover:text-red-400 font-poppins transition-colors duration-200 text-sm">
                                Dashboard
                            </a>
                        </li>
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.barang.index') }}"
                                        class="text-gray-300 hover:text-red-400 font-poppins transition-colors duration-200 text-sm">
                                        Kelola Inventaris
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('transaksi.index') }}"
                                        class="text-gray-300 hover:text-red-400 font-poppins transition-colors duration-200 text-sm">
                                        Pinjaman Saya
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <li>
                            <a href="#"
                                class="text-gray-300 hover:text-red-400 font-poppins transition-colors duration-200 text-sm">
                                Bantuan
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4">
                    <h4 class="text-white font-poppins font-semibold text-base">Kontak</h4>
                    <div class="space-y-2">
                        <div class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-300 font-poppins text-sm leading-relaxed">Jl. Kaligawe Raya No.Km.4,
                                Terboyo
                                Kulon, Kec. Genuk, Kota Semarang, Jawa Tengah 50112</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span class="text-gray-300 font-poppins text-sm">bemfti@unissula.ac.id</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                </path>
                            </svg>
                            <span class="text-gray-300 font-poppins text-sm">(0331) 123456</span>
                        </div>
                    </div>
                </div>

                <!-- Maps -->
                <div class="space-y-4">
                    <h4 class="text-white font-poppins font-semibold text-base">Lokasi</h4>
                    <div class="w-full h-31 rounded-lg overflow-hidden border border-red-500">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0!2d110.4601599!3d-6.9542522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f33d6b563227%3A0x46597d1bdae2f728!2sFakultas%20Teknologi%20Industri%20Unissula!5e0!3m2!1sid!2sid!4v1699999999999!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="mt-8 pt-6 border-t border-red-600">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-gray-300 font-poppins text-sm">
                        © {{ date('Y') }} BEM FTI Universitas Islam Sultan Agung. All rights reserved.
                    </div>
                    <div class="flex space-x-6">
                        <a href="https://www.instagram.com/bemftiunissula?igsh=em5lZDFmajk3dHFv"
                            class="text-gray-400 hover:text-red-400 group transition-colors duration-200">
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
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-red-500 to-transparent">
        </div>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mobileMenu', () => ({
                mobileMenuOpen: false
            }))
        })
    </script>

    @stack('modals')
</body>

</html>
