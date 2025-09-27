<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('transaksi.index') }}"
                    class="text-red-400 hover:text-red-200 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h2 class="font-superline text-lg text-red-100 leading-tight drop-shadow-lg">
                    {{ __('Detail Pinjaman') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                    'pending' => 'text-yellow-300 bg-yellow-700',
                    'accepted' => 'text-green-300 bg-green-700',
                    'rejected' => 'text-red-300 bg-red-700',
                ];
            @endphp

            <!-- Main Card -->
            <div
                class="bg-gradient-to-br from-red-900/20 to-red-800/10 backdrop-blur-sm rounded-xl border {{ $statusColors[$transaksi->status] ?? 'border-red-300/20' }} shadow-2xl overflow-hidden red-glow">
                <!-- Header -->
                <div
                    class="bg-gradient-to-r from-red-600/20 to-red-700/20 px-6 py-4 border-b border-red-300/20 red-glow">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-superline text-red-100 drop-shadow-lg">
                                {{ $barang->nama_barang ?? 'Barang Tidak Ditemukan' }}</h3>
                            <p class="text-sm text-red-300 font-superline-line">{{ $barang->kategori ?? '-' }}</p>
                        </div>
                        <span
                            class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-superline {{ $statusTextColors[$transaksi->status] ?? 'text-red-300 bg-red-700' }}">
                            {{ ucfirst($transaksi->status) }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column - Transaction Details -->
                        <div class="space-y-6">
                            <!-- Informasi Peminjaman -->
                            <div>
                                <h4 class="text-lg font-superline text-red-100 mb-4">Informasi Peminjaman</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-red-300/10">
                                        <span class="text-red-400 font-superline-line">Jumlah:</span>
                                        <span class="text-red-100 font-superline">{{ $transaksi->jumlah }} unit</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-red-300/10">
                                        <span class="text-red-400 font-superline-line">Tanggal Peminjaman:</span>
                                        <span
                                            class="text-red-100 font-superline">{{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman)->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-red-300/10">
                                        <span class="text-red-400 font-superline-line">Tanggal Pengembalian:</span>
                                        <span
                                            class="text-red-100 font-superline">{{ \Carbon\Carbon::parse($transaksi->tanggal_pengembalian)->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-red-300/10">
                                        <span class="text-red-400 font-superline-line">Dibuat:</span>
                                        <span
                                            class="text-red-100 font-superline">{{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            @if ($transaksi->keterangan)
                                <div>
                                    <h4 class="text-lg font-superline text-red-100 mb-3">Keterangan</h4>
                                    <div class="bg-red-900/20 border border-red-300/20 rounded-lg p-4">
                                        <p class="text-red-200 font-superline-line">{{ $transaksi->keterangan }}</p>
                                    </div>
                                </div>
                            @endif

                            <!-- File Surat Peminjaman -->
                            @if ($transaksi->file && isset($transaksi->file['url']))
                                <div>
                                    <h4 class="text-lg font-superline text-red-100 mb-3 lg:pt-9">Surat Peminjaman</h4>
                                    <div class="bg-red-900/20 border border-red-300/20 rounded-lg p-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-red-100 font-superline text-sm">
                                                    {{ $transaksi->file['name'] ?? 'Surat Peminjaman.pdf' }}</p>
                                                <p class="text-red-400 text-xs font-superline-line">PDF Document</p>
                                            </div>
                                            <a href="{{ $transaksi->file['url'] }}" target="_blank"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm font-superline rounded-lg transition duration-200">
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Status History - Desktop only, setelah Surat Peminjaman -->
                            <div class="hidden lg:block">
                                <h4 class="text-lg font-superline text-red-100 mb-3">Timeline Status</h4>
                                <div class="space-y-3">
                                    <div
                                        class="flex items-center gap-3 p-3 bg-yellow-600/10 border border-yellow-400/30 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                        <div>
                                            <p class="text-yellow-300 font-superline text-sm">Menunggu Approval</p>
                                            <p class="text-yellow-400 text-xs font-superline-line">
                                                {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    @if (in_array($transaksi->status, ['disetujui', 'dipinjam', 'dikembalikan']))
                                        <div
                                            class="flex items-center gap-3 p-3 bg-green-600/10 border border-green-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                            <div>
                                                <p class="text-green-300 font-superline text-sm">Disetujui</p>
                                                <p class="text-green-400 text-xs font-superline-line">Disetujui oleh
                                                    admin</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if (in_array($transaksi->status, ['dipinjam', 'dikembalikan']))
                                        <div
                                            class="flex items-center gap-3 p-3 bg-blue-600/10 border border-blue-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                                            <div>
                                                <p class="text-blue-300 font-superline text-sm">Dipinjam</p>
                                                <p class="text-blue-400 text-xs font-superline-line">Barang sedang
                                                    dipinjam</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status === 'dikembalikan')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-purple-600/10 border border-purple-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                                            <div>
                                                <p class="text-purple-300 font-superline text-sm">Dikembalikan</p>
                                                <p class="text-purple-400 text-xs font-superline-line">Peminjaman
                                                    selesai</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status === 'ditolak')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-red-600/10 border border-red-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                            <div>
                                                <p class="text-red-300 font-superline text-sm">Ditolak</p>
                                                <p class="text-red-400 text-xs font-superline-line">Peminjaman ditolak
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Item Details -->
                        <div class="space-y-6">
                            <!-- Informasi Barang -->
                            <div>
                                <h4 class="text-lg font-superline text-red-100 mb-4">Informasi Barang</h4>
                                <div class="bg-red-900/20 border border-red-300/20 rounded-lg p-4 space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-red-300/10">
                                        <span class="text-red-400 font-superline-line">Nama Barang:</span>
                                        <span
                                            class="text-red-100 font-superline">{{ $barang->nama_barang ?? '-' }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-red-300/10">
                                        <span class="text-red-400 font-superline-line">Kategori:</span>
                                        <span class="text-red-100 font-superline">{{ $barang->kategori ?? '-' }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-red-300/10">
                                        <span class="text-red-400 font-superline-line">Stok Tersedia:</span>
                                        <span class="text-red-100 font-superline">{{ $barang->stok ?? 0 }} unit</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2">
                                        <span class="text-red-400 font-superline-line">Total Dimiliki:</span>
                                        <span class="text-red-100 font-superline">{{ $barang->total_dimiliki ?? 0 }}
                                            unit</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Foto Barang -->
                            @if (
                                $barang &&
                                    ((is_array($barang->gambar) && isset($barang->gambar['url'])) ||
                                        (is_string($barang->gambar) && $barang->gambar)))
                                <div>
                                    <h4 class="text-lg font-superline text-red-100 mb-3">Foto Barang</h4>
                                    <div class="bg-red-900/20 border border-red-300/20 rounded-lg overflow-hidden">
                                        @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                            <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-50.5 object-contain bg-transparent">
                                        @elseif(is_string($barang->gambar) && $barang->gambar)
                                            <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-50.5 object-contain bg-transparent">
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Status History - Mobile only -->
                            <div class="lg:hidden">
                                <h4 class="text-lg font-superline text-red-100 mb-3">Timeline Status</h4>
                                <div class="space-y-3">
                                    <div
                                        class="flex items-center gap-3 p-3 bg-yellow-600/10 border border-yellow-400/30 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                        <div>
                                            <p class="text-yellow-300 font-superline text-sm">Menunggu Approval</p>
                                            <p class="text-yellow-400 text-xs font-superline-line">
                                                {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    @if (in_array($transaksi->status, ['disetujui', 'dipinjam', 'dikembalikan']))
                                        <div
                                            class="flex items-center gap-3 p-3 bg-green-600/10 border border-green-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                            <div>
                                                <p class="text-green-300 font-superline text-sm">Disetujui</p>
                                                <p class="text-green-400 text-xs font-superline-line">Disetujui oleh
                                                    admin</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if (in_array($transaksi->status, ['dipinjam', 'dikembalikan']))
                                        <div
                                            class="flex items-center gap-3 p-3 bg-blue-600/10 border border-blue-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                                            <div>
                                                <p class="text-blue-300 font-superline text-sm">Dipinjam</p>
                                                <p class="text-blue-400 text-xs font-superline-line">Barang sedang
                                                    dipinjam</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status === 'dikembalikan')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-purple-600/10 border border-purple-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                                            <div>
                                                <p class="text-purple-300 font-superline text-sm">Dikembalikan</p>
                                                <p class="text-purple-400 text-xs font-superline-line">Peminjaman
                                                    selesai</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status === 'ditolak')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-red-600/10 border border-red-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                            <div>
                                                <p class="text-red-300 font-superline text-sm">Ditolak</p>
                                                <p class="text-red-400 text-xs font-superline-line">Peminjaman ditolak
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="px-6 py-4 bg-red-900/10 border-t border-red-300/20 flex items-center justify-between">
                    <a href="{{ route('transaksi.index') }}"
                        class="inline-flex items-center text-sm text-red-300 hover:text-red-100 font-superline-line transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>

                    @if ($barang)
                        <a href="{{ route('barang.show', $barang->_id) }}"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-superline rounded-lg transition duration-200">
                            Lihat Detail Barang
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
