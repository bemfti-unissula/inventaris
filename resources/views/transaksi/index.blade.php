<x-app-layout>
    <x-slot name="title">Daftar Pinjaman Saya</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('inventaris') }}"
                            class="w-10 h-10 bg-gray-800/50 rounded-lg flex items-center justify-center text-gray-300 hover:text-white hover:bg-gray-700/50 transition-all duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        <div class="w-10 h-10 bg-gray-800/50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                                {{ __('Daftar Pinjaman Saya') }}
                            </h1>
                            <p class="text-gray-300">Kelola dan pantau semua pinjaman Anda</p>
                        </div>
                    </div>
                    @php
                        $totalPinjaman = $transaksis->count();
                    @endphp
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Total Pinjaman</p>
                            <p class="text-lg font-bold text-white">{{ $totalPinjaman }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats Summary -->
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 px-6 pt-4 mb-8">
                <!-- Header Section -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gray-800/50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Statistik Pinjaman</h3>
                        <p class="text-sm text-gray-300">Ringkasan status pinjaman Anda</p>
                    </div>
                </div>

                @php
                    $totalPinjaman = $transaksis->count();
                    $menungguApproval = $transaksis->where('status', 'pending')->count();
                    $disetujui = $transaksis->where('status', 'accepted')->count();
                    $dipinjam = $transaksis->where('tipe', 'peminjaman')->where('status', 'accepted')->count();
                    $dikembalikan = $transaksis->where('tipe', 'pengembalian')->count();
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pb-6">
                    <!-- Total Pinjaman Filter -->
                    <div class="filter-card cursor-pointer bg-gradient-to-br from-blue-900/70 to-blue-800/50 border border-blue-700/40 rounded-xl p-4 hover:border-blue-600/60 hover:from-blue-800/80 hover:to-blue-700/60 transition-all duration-200 shadow-lg hover:shadow-blue-500/20 hover:scale-105 active:scale-95"
                        onclick="filterTransaksi('all')" data-filter="all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-200 text-sm">Total Pinjaman</p>
                                <p class="text-2xl font-bold text-white">{{ $totalPinjaman }}</p>
                            </div>
                            <div class="w-10 h-10 bg-blue-600/30 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Menunggu Approval Filter -->
                    <div class="filter-card cursor-pointer bg-gradient-to-br from-yellow-900/70 to-yellow-800/50 border border-yellow-700/40 rounded-xl p-4 hover:border-yellow-600/60 hover:from-yellow-800/80 hover:to-yellow-700/60 transition-all duration-200 shadow-lg hover:shadow-yellow-500/20 hover:scale-105 active:scale-95"
                        onclick="filterTransaksi('pending')" data-filter="pending">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-yellow-200 text-sm">Menunggu Approval</p>
                                <p class="text-2xl font-bold text-white">{{ $menungguApproval }}</p>
                            </div>
                            <div class="w-10 h-10 bg-yellow-600/30 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-yellow-200" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Dipinjam Filter -->
                    <div class="filter-card cursor-pointer bg-gradient-to-br from-green-900/70 to-green-800/50 border border-green-700/40 rounded-xl p-4 hover:border-green-600/60 hover:from-green-800/80 hover:to-green-700/60 transition-all duration-200 shadow-lg hover:shadow-green-500/20 hover:scale-105 active:scale-95"
                        onclick="filterTransaksi('peminjaman')" data-filter="peminjaman">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-200 text-sm">Dipinjam</p>
                                <p class="text-2xl font-bold text-white">{{ $dipinjam }}</p>
                            </div>
                            <div class="w-10 h-10 bg-green-600/30 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-200" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Dikembalikan Filter -->
                    <div class="filter-card cursor-pointer bg-gradient-to-br from-purple-900/70 to-purple-800/50 border border-purple-700/40 rounded-xl p-4 hover:border-purple-600/60 hover:from-purple-800/80 hover:to-purple-700/60 transition-all duration-200 shadow-lg hover:shadow-purple-500/20 hover:scale-105 active:scale-95"
                        onclick="filterTransaksi('pengembalian')" data-filter="pengembalian">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-200 text-sm">Dikembalikan</p>
                                <p class="text-2xl font-bold text-white">{{ $dikembalikan }}</p>
                            </div>
                            <div class="w-10 h-10 bg-purple-600/30 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-200" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pinjaman List Section -->
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 overflow-hidden">
                <!-- Grid Header -->
                <div class="bg-gray-800/50 px-6 py-4 border-b border-gray-800/50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-700/50 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Daftar Pinjaman</h3>
                                <p class="text-sm text-gray-300" id="filter-info">
                                    <span id="visible-count">{{ $transaksis->count() }}</span> pinjaman ditemukan
                                    <span id="filter-status" class="text-blue-400 ml-2"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cards Grid -->
                @if ($transaksis->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                        @foreach ($transaksis as $transaksi)
                            @php
                                $barang = \App\Models\Barang::find($transaksi->barang_id);
                                $statusTextColors = [
                                    'pending' => 'bg-yellow-500/20 text-yellow-300 border-yellow-400/30',
                                    'accepted' => 'bg-green-500/20 text-green-300 border-green-400/30',
                                    'rejected' => 'bg-red-500/20 text-red-300 border-red-400/30',
                                ];
                            @endphp

                            <div class="transaksi-card bg-gray-800/50 hover:bg-gray-800/80 border border-gray-700/50 hover:border-gray-600/50 rounded-xl overflow-hidden transition-all duration-300 shadow-lg hover:shadow-xl hover:shadow-gray-900/25"
                                data-status="{{ $transaksi->status }}"
                                data-tipe="{{ $transaksi->tipe ?? 'peminjaman' }}">
                                <!-- Header -->
                                <div class="p-6 border-b border-gray-700/50">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-white mb-1">
                                                {{ $barang->nama_barang ?? 'Barang Tidak Ditemukan' }}</h3>
                                            <p class="text-sm text-gray-400">{{ $barang->kategori ?? '-' }}</p>
                                        </div>
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium border {{ $statusTextColors[$transaksi->status] ?? 'bg-gray-500/20 text-gray-300 border-gray-400/30' }}">
                                            {{ ucfirst($transaksi->status) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-6 space-y-4">
                                    <!-- Informasi Peminjaman -->
                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <span class="text-gray-400">Jumlah:</span>
                                            <p class="text-white font-medium">{{ $transaksi->jumlah }} unit</p>
                                        </div>
                                        <div>
                                            <span class="text-gray-400">Tanggal Pinjam:</span>
                                            <p class="text-white font-medium">
                                                {{ \Carbon\Carbon::parse($transaksi->tanggal['peminjaman'])->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-2 text-sm">
                                        <div>
                                            <span class="text-gray-400">Tanggal Kembali:</span>
                                            <p class="text-white font-medium">
                                                {{ \Carbon\Carbon::parse($transaksi->tanggal['pengembalian'])->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>

                                    @if ($transaksi->keterangan)
                                        <div>
                                            <span class="text-gray-400 text-sm">Keterangan:</span>
                                            <p class="text-gray-300 text-sm mt-1 line-clamp-2">
                                                {{ $transaksi->keterangan }}</p>
                                        </div>
                                    @endif

                                    <!-- File Download -->
                                    @if ($transaksi->file && isset($transaksi->file['url']))
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <a href="{{ $transaksi->file['url'] }}" target="_blank"
                                                class="text-gray-300 hover:text-white transition-colors">Lihat Surat
                                                Peminjaman</a>
                                        </div>
                                    @endif
                                </div>

                                <!-- Footer -->
                                <div class="px-6 py-4 bg-gray-800/80 border-t border-gray-700/50">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-400">
                                            Dibuat:
                                            {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d/m/Y H:i') }}
                                        </span>
                                        <a href="{{ route('transaksi.detail', $transaksi->_id) }}"
                                            class="inline-flex items-center text-sm text-gray-300 hover:text-white transition-colors group">
                                            Detail
                                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-0.5 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="max-w-md mx-auto">
                            <div
                                class="w-20 h-20 bg-gray-700/50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Belum Ada Pinjaman</h3>
                            <p class="text-gray-300 mb-6">Anda belum memiliki riwayat peminjaman barang.</p>
                            <a href="{{ route('inventaris') }}"
                                class="inline-flex items-center px-6 py-3 bg-gray-700/50 hover:bg-gray-600/50 text-white font-medium rounded-lg border border-gray-600/30 hover:border-gray-500/50 transition-all duration-200 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Mulai Meminjam
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        let currentFilter = 'all';

        function filterTransaksi(filterType) {
            currentFilter = filterType;
            const cards = document.querySelectorAll('.transaksi-card');
            const filterCards = document.querySelectorAll('.filter-card');
            const visibleCountEl = document.getElementById('visible-count');
            const filterStatusEl = document.getElementById('filter-status');
            let visibleCount = 0;

            // Remove active state from all filter cards
            filterCards.forEach(card => {
                card.classList.remove('ring-2', 'ring-white/20', 'scale-105');
                card.classList.add('hover:scale-105');
            });

            // Add active state to current filter card
            const activeCard = document.querySelector(`[data-filter="${filterType}"]`);
            if (activeCard) {
                activeCard.classList.add('ring-2', 'ring-white/20', 'scale-105');
                activeCard.classList.remove('hover:scale-105');
            }

            // Filter cards with smooth animation
            cards.forEach(card => {
                const status = card.dataset.status;
                const tipe = card.dataset.tipe;
                let shouldShow = false;

                switch (filterType) {
                    case 'all':
                        shouldShow = true;
                        break;
                    case 'pending':
                        shouldShow = (status === 'pending');
                        break;
                    case 'peminjaman':
                        shouldShow = (tipe === 'peminjaman');
                        break;
                    case 'pengembalian':
                        shouldShow = (tipe === 'pengembalian');
                        break;
                }

                if (shouldShow) {
                    card.style.display = 'block';
                    // Add entrance animation
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.transition = 'all 0.3s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, visibleCount * 50); // Stagger animation
                    visibleCount++;
                } else {
                    card.style.transition = 'all 0.2s ease';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 200);
                }
            });

            // Update counter and status
            setTimeout(() => {
                visibleCountEl.textContent = visibleCount;

                switch (filterType) {
                    case 'all':
                        filterStatusEl.textContent = '(Semua)';
                        filterStatusEl.className = 'text-blue-400 ml-2';
                        break;
                    case 'pending':
                        filterStatusEl.textContent = '(Menunggu Approval)';
                        filterStatusEl.className = 'text-yellow-400 ml-2';
                        break;
                    case 'peminjaman':
                        filterStatusEl.textContent = '(Sedang Dipinjam)';
                        filterStatusEl.className = 'text-green-400 ml-2';
                        break;
                    case 'pengembalian':
                        filterStatusEl.textContent = '(Sudah Dikembalikan)';
                        filterStatusEl.className = 'text-purple-400 ml-2';
                        break;
                }
            }, 300);
        }

        // Initialize with all filter on page load
        document.addEventListener('DOMContentLoaded', function() {
            filterTransaksi('all');
        });

        // Add keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch (e.key) {
                    case '1':
                        e.preventDefault();
                        filterTransaksi('all');
                        break;
                    case '2':
                        e.preventDefault();
                        filterTransaksi('pending');
                        break;
                    case '3':
                        e.preventDefault();
                        filterTransaksi('peminjaman');
                        break;
                    case '4':
                        e.preventDefault();
                        filterTransaksi('pengembalian');
                        break;
                }
            }
        });
    </script>
</x-app-layout>
