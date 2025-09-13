<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('inventaris') }}"
                    class="text-red-400 hover:text-red-200 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h2 class="font-superline text-lg text-red-100 leading-tight drop-shadow-lg">
                    {{ __('Daftar Pinjaman Saya') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Stats Summary -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                @php
                    $totalPinjaman = $transaksis->count();
                    $menungguApproval = $transaksis->where('status', 'menunggu approval')->count();
                    $disetujui = $transaksis->where('status', 'disetujui')->count();
                    $dipinjam = $transaksis->where('status', 'dipinjam')->count();
                    $dikembalikan = $transaksis->where('status', 'dikembalikan')->count();
                @endphp

                <div
                    class="bg-gradient-to-br from-blue-600/20 to-blue-800/10 backdrop-blur-sm rounded-xl border border-blue-300/20 p-6 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-300 text-sm font-superline-line">Total Pinjaman</p>
                            <p class="text-2xl font-superline text-blue-100">{{ $totalPinjaman }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-yellow-600/20 to-yellow-800/10 backdrop-blur-sm rounded-xl border border-yellow-300/20 p-6 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-yellow-300 text-sm font-superline-line">Menunggu Approval</p>
                            <p class="text-2xl font-superline text-yellow-100">{{ $menungguApproval }}</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-green-600/20 to-green-800/10 backdrop-blur-sm rounded-xl border border-green-300/20 p-6 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-300 text-sm font-superline-line">Dipinjam</p>
                            <p class="text-2xl font-superline text-green-100">{{ $dipinjam }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-purple-600/20 to-purple-800/10 backdrop-blur-sm rounded-xl border border-purple-300/20 p-6 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-300 text-sm font-superline-line">Dikembalikan</p>
                            <p class="text-2xl font-superline text-purple-100">{{ $dikembalikan }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            @if ($transaksis->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($transaksis as $transaksi)
                        @php
                            $barang = \App\Models\Barang::find($transaksi->barang_id);
                            $statusColors = [
                                'menunggu approval' => 'border-yellow-400/30 bg-yellow-600/10',
                                'disetujui' => 'border-green-400/30 bg-green-600/10',
                                'dipinjam' => 'border-blue-400/30 bg-blue-600/10',
                                'dikembalikan' => 'border-purple-400/30 bg-purple-600/10',
                                'ditolak' => 'border-red-400/30 bg-red-600/10',
                            ];
                            $statusTextColors = [
                                'menunggu approval' => 'text-yellow-300',
                                'disetujui' => 'text-green-300',
                                'dipinjam' => 'text-blue-300',
                                'dikembalikan' => 'text-purple-300',
                                'ditolak' => 'text-red-300',
                            ];
                        @endphp

                        <div
                            class="bg-gradient-to-br from-red-900/20 to-red-800/10 backdrop-blur-sm rounded-xl border {{ $statusColors[$transaksi->status] ?? 'border-red-300/20' }} shadow-2xl overflow-hidden red-glow hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300">
                            <!-- Header -->
                            <div class="p-6 border-b border-red-300/20">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="text-lg font-superline text-red-100 mb-1">
                                            {{ $barang->nama_barang ?? 'Barang Tidak Ditemukan' }}</h3>
                                        <p class="text-sm text-red-300 font-superline-line">
                                            {{ $barang->kategori ?? '-' }}</p>
                                    </div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-superline-line {{ $statusTextColors[$transaksi->status] ?? 'text-red-300' }} border border-current">
                                        {{ ucfirst($transaksi->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-4">
                                <!-- Informasi Peminjaman -->
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <span class="text-red-400 font-superline-line">Jumlah:</span>
                                        <p class="text-red-100 font-superline">{{ $transaksi->jumlah }} unit</p>
                                    </div>
                                    <div>
                                        <span class="text-red-400 font-superline-line">Tanggal Pinjam:</span>
                                        <p class="text-red-100 font-superline">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman)->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-2 text-sm">
                                    <div>
                                        <span class="text-red-400 font-superline-line">Tanggal Kembali:</span>
                                        <p class="text-red-100 font-superline">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_pengembalian)->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>

                                @if ($transaksi->keterangan)
                                    <div>
                                        <span class="text-red-400 font-superline-line text-sm">Keterangan:</span>
                                        <p class="text-red-200 text-sm mt-1 line-clamp-2">{{ $transaksi->keterangan }}
                                        </p>
                                    </div>
                                @endif

                                <!-- File Download -->
                                @if ($transaksi->file && isset($transaksi->file['url']))
                                    <div class="flex items-center gap-2 text-sm">
                                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <a href="{{ $transaksi->file['url'] }}" target="_blank"
                                            class="text-red-300 hover:text-red-100 font-superline-line">Lihat Surat
                                            Peminjaman</a>
                                    </div>
                                @endif
                            </div>

                            <!-- Footer -->
                            <div class="px-6 py-4 bg-red-900/10 border-t border-red-300/20">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-red-400 font-superline-line">
                                        Dibuat:
                                        {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d/m/Y H:i') }}
                                    </span>
                                    <a href="{{ route('transaksi.detail', $transaksi->_id) }}"
                                        class="inline-flex items-center text-sm text-red-300 hover:text-red-100 font-superline-line transition-colors">
                                        Detail
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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
                            class="w-20 h-20 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-red-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-superline text-red-100 mb-2">Belum Ada Pinjaman</h3>
                        <p class="text-red-300 font-superline-line mb-6">Anda belum memiliki riwayat peminjaman barang.
                        </p>
                        <a href="{{ route('inventaris') }}"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-superline rounded-lg transition duration-200 shadow-lg hover:shadow-red-500/25">
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
</x-app-layout>
