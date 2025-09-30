<x-app-layout>
    <x-slot name="title">Detail Transaksi {{ $transaksi->id }}</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Back Icon -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ route('transaksi.index') }}"
                    class="flex items-center justify-center w-10 h-10 bg-gray-800/50 rounded-lg text-gray-300 hover:text-white hover:bg-gray-700/50 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-white">Detail Pinjaman</h1>
                    <p class="text-gray-300 mt-1">Informasi lengkap transaksi Anda</p>
                </div>
            </div>

            @php
                $barang = \App\Models\Barang::find($transaksi->barang_id);
            @endphp

            <!-- Main Card Container -->
            <div
                class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-800/50 shadow-2xl overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gray-800/50 px-6 py-4 border-b border-gray-800/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-white">
                                {{ $barang->nama_barang ?? 'Barang Tidak Ditemukan' }}</h2>
                            <p class="text-sm text-gray-400 mt-1">{{ $barang->kategori ?? '-' }}</p>
                        </div>
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-500/20 text-yellow-300 border-yellow-400/30',
                                'accepted' => 'bg-green-500/20 text-green-300 border-green-400/30',
                                'rejected' => 'bg-red-500/20 text-red-300 border-red-400/30',
                                'canceled' => 'bg-gray-500/20 text-gray-300 border-gray-400/30',
                            ];
                        @endphp
                        <span
                            class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium border {{ $statusColors[$transaksi->status] ?? 'bg-gray-500/20 text-gray-300 border-gray-400/30' }}">
                            {{ ucfirst($transaksi->status) }}
                        </span>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column: Transaction Info -->
                        <div class="space-y-6">
                            <!-- Informasi Peminjaman -->
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-4">Informasi Peminjaman</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Jumlah:</span>
                                        <span class="text-white font-medium">{{ $transaksi->jumlah }} unit</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Tanggal Peminjaman:</span>
                                        <span class="text-white font-medium">
                                            {{ isset($transaksi->tanggal['peminjaman']) ? \Carbon\Carbon::parse($transaksi->tanggal['peminjaman'])->format('d F Y') : '-' }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Tanggal Pengembalian:</span>
                                        <span class="text-white font-medium">
                                            {{ isset($transaksi->tanggal['pengembalian']) ? \Carbon\Carbon::parse($transaksi->tanggal['pengembalian'])->format('d F Y') : '-' }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center py-2">
                                        <span class="text-gray-400">Dibuat:</span>
                                        <span
                                            class="text-white font-medium">{{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            @if ($transaksi->keterangan)
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-3">Keterangan</h3>
                                    <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg p-4">
                                        <p class="text-gray-300">{{ $transaksi->keterangan }}</p>
                                    </div>
                                </div>
                            @endif

                            <!-- File Surat Peminjaman -->
                            @if ($transaksi->file && isset($transaksi->file['url']))
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-3 lg:mt-19">Surat Peminjaman</h3>
                                    <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg p-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-gray-700/50 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-white font-medium text-sm">
                                                    {{ $transaksi->file['name'] ?? 'Surat Peminjaman.pdf' }}</p>
                                                <p class="text-gray-400 text-xs">PDF Document</p>
                                            </div>
                                            <a href="{{ $transaksi->file['url'] }}" target="_blank"
                                                class="inline-flex items-center px-3 py-1.5 bg-gray-700/50 hover:bg-gray-600/50 text-white text-sm font-medium rounded-lg border border-gray-600/30 transition-colors">
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Timeline Status -->
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-3">Timeline Status</h3>
                                <div class="space-y-3">
                                    <div
                                        class="flex items-center gap-3 p-3 bg-yellow-500/10 border border-yellow-400/30 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                        <div>
                                            <p class="text-yellow-300 font-medium text-sm">Menunggu Approval</p>
                                            <p class="text-yellow-400 text-xs">
                                                {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    @if ($transaksi->status === 'accepted')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-green-500/10 border border-green-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                            <div>
                                                <p class="text-green-300 font-medium text-sm">Disetujui</p>
                                                <p class="text-green-400 text-xs">Disetujui oleh admin</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status === 'rejected')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-red-500/10 border border-red-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                            <div>
                                                <p class="text-red-300 font-medium text-sm">Ditolak</p>
                                                <p class="text-red-400 text-xs">Peminjaman ditolak</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status === 'canceled')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-gray-500/10 border border-gray-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                            <div>
                                                <p class="text-gray-300 font-medium text-sm">Dibatalkan</p>
                                                <p class="text-gray-400 text-xs">Transaksi dibatalkan oleh user</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Item Details & Status -->
                        <div class="space-y-6">
                            <!-- Informasi Barang -->
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-4">Informasi Barang</h3>
                                <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg p-4 space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-700/50">
                                        <span class="text-gray-400">Nama Barang:</span>
                                        <span class="text-white font-medium">{{ $barang->nama_barang ?? '-' }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-700/50">
                                        <span class="text-gray-400">Kategori:</span>
                                        <span class="text-white font-medium">{{ $barang->kategori ?? '-' }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-700/50">
                                        <span class="text-gray-400">Stok Tersedia:</span>
                                        <span class="text-white font-medium">{{ $barang->stok ?? 0 }} unit</span>
                                    </div>
                                    @if ($barang->deskripsi)
                                        <div class="pt-2">
                                            <span class="text-gray-400 text-sm">Deskripsi:</span>
                                            <p class="text-gray-300 text-sm mt-1">{{ $barang->deskripsi }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Foto Barang -->
                            @if (
                                $barang &&
                                    ((is_array($barang->gambar) && isset($barang->gambar['url'])) ||
                                        (is_string($barang->gambar) && $barang->gambar)))
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-3">Foto Barang</h3>
                                    <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg overflow-hidden">
                                        @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                            <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-50 object-cover">
                                        @elseif(is_string($barang->gambar) && $barang->gambar)
                                            <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-50 object-cover">
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="px-6 py-4 bg-gray-800/50 border-t border-gray-800/50 flex items-center justify-between">
                    <a href="{{ route('transaksi.index') }}"
                        class="inline-flex items-center text-sm text-gray-300 hover:text-white transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>

                    <div class="flex items-center gap-3">
                        @if ($barang)
                            <a href="{{ route('barang.show', $barang->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-700/50 hover:bg-gray-600/50 text-white text-sm font-medium rounded-lg border border-gray-600/30 transition-colors">
                                Lihat Detail Barang
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif

                        @if (in_array($transaksi->status, ['pending', 'rejected']) && $transaksi->status !== 'canceled')
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600/50 hover:bg-blue-500/50 text-white text-sm font-medium rounded-lg border border-blue-500/30 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit Transaksi
                            </a>

                            <button type="button"
                                onclick="openDeleteModaldeleteModal('{{ $transaksi->id }}', '{{ $transaksi->barang['nama_barang'] ?? 'transaksi ini' }}')"
                                class="inline-flex items-center px-4 py-2 bg-red-600/50 hover:bg-red-500/50 text-white text-sm font-medium rounded-lg border border-red-500/30 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12">
                                    </path>
                                </svg>
                                Batalkan
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden form for cancel transaction -->
    <form action="{{ route('transaksi.cancel', $transaksi->id) }}" method="POST"
        id="deleteFormdeleteModal{{ $transaksi->id }}" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Delete Confirmation Modal -->
    <x-delete-confirmation-modal modal-id="deleteModal" title="Konfirmasi Batalkan Transaksi"
        subtitle="Tindakan ini akan membatalkan transaksi" item-type="transaksi untuk barang"
        warning-text="Transaksi yang sudah dibatalkan tidak dapat dikembalikan. Stok barang akan dikembalikan jika transaksi masih dalam status pending."
        confirm-button-text="Ya, Batalkan Transaksi" cancel-button-text="Tidak, Kembali" />
</x-app-layout>
