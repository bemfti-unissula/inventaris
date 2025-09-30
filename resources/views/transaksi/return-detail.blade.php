<x-app-layout>
    <x-slot name="title">Detail Pengembalian {{ $transaksi->id }}</x-slot>

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
                    <h1 class="text-3xl font-bold text-white">Detail Pengembalian</h1>
                    <p class="text-gray-300 mt-1">Informasi lengkap pengembalian barang</p>
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
                        <!-- Left Column: Return Info -->
                        <div class="space-y-6">
                            <!-- Informasi Pengembalian -->
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                    <div class="w-6 h-6 bg-green-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6">
                                            </path>
                                        </svg>
                                    </div>
                                    Informasi Pengembalian
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Jumlah Dikembalikan:</span>
                                        <span class="text-white font-medium">{{ $transaksi->jumlah }} unit</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Tanggal Pengembalian:</span>
                                        <span class="text-white font-medium">
                                            {{ isset($transaksi->tanggal['pengembalian']) ? \Carbon\Carbon::parse($transaksi->tanggal['pengembalian'])->format('d F Y') : '-' }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Status:</span>
                                        <span
                                            class="inline-flex items-center px-2 py-1 text-xs rounded-full border {{ $statusColors[$transaksi->status] ?? 'bg-gray-500/20 text-gray-300 border-gray-400/30' }}">
                                            @if ($transaksi->status === 'pending')
                                                Menunggu Konfirmasi
                                            @elseif($transaksi->status === 'accepted')
                                                Accepted
                                            @elseif($transaksi->status === 'rejected')
                                                Rejected
                                            @else
                                                {{ ucfirst($transaksi->status) }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center py-2">
                                        <span class="text-gray-400">Dikembalikan pada:</span>
                                        <span
                                            class="text-white font-medium">{{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Foto Bukti Pengembalian -->
                            @if (isset($transaksi->return) && isset($transaksi->return['gambar']) && isset($transaksi->return['gambar']['url']))
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-3 lg:mt-18 flex items-center gap-2">
                                        <div class="w-6 h-6 bg-purple-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        Foto Bukti Pengembalian
                                    </h3>
                                    <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg overflow-hidden">
                                        <img src="{{ $transaksi->return['gambar']['url'] }}"
                                            alt="Foto Bukti Pengembalian" class="w-full h-64 object-cover">
                                    </div>
                                </div>
                            @endif

                            <!-- Keterangan Pengembalian -->
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-3 flex items-center gap-2">
                                    <div class="w-6 h-6 bg-blue-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    Keterangan Kondisi Barang
                                </h3>
                                <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg p-4">
                                    <p class="text-gray-300 break-words whitespace-normal">
                                        @if (empty($transaksi->return['keterangan']))
                                            -
                                        @else
                                            {{ $transaksi->return['keterangan'] }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Timeline Status -->
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-3 flex items-center gap-2">
                                    <div class="w-6 h-6 bg-orange-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    Timeline Status
                                </h3>
                                <div class="space-y-3">
                                    <div
                                        class="flex items-center gap-3 p-3 bg-green-500/10 border border-green-400/30 rounded-lg">
                                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                        <div>
                                            <p class="text-green-300 font-medium text-sm">Barang Dikembalikan</p>
                                            <p class="text-green-400 text-xs">
                                                {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    @if ($transaksi->status === 'accepted')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-green-500/10 border border-green-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                            <div>
                                                <p class="text-green-300 font-medium text-sm">Dikonfirmasi Admin</p>
                                                <p class="text-green-400 text-xs">Pengembalian telah dikonfirmasi</p>
                                            </div>
                                        </div>
                                    @elseif ($transaksi->status === 'pending')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-yellow-500/10 border border-yellow-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                            <div>
                                                <p class="text-yellow-300 font-medium text-sm">Menunggu Konfirmasi</p>
                                                <p class="text-yellow-400 text-xs">Menunggu admin mengkonfirmasi
                                                    pengembalian</p>
                                            </div>
                                        </div>
                                    @elseif ($transaksi->status === 'rejected')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-red-500/10 border border-red-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                            <div>
                                                <p class="text-red-300 font-medium text-sm">Ditolak</p>
                                                <p class="text-red-400 text-xs">Pengembalian ditolak oleh admin</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status === 'canceled')
                                        <div
                                            class="flex items-center gap-3 p-3 bg-gray-500/10 border border-gray-400/30 rounded-lg">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                            <div>
                                                <p class="text-gray-300 font-medium text-sm">Dibatalkan</p>
                                                <p class="text-gray-400 text-xs">Pengembalian dibatalkan</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Item Details -->
                        <div class="space-y-6">
                            <!-- Informasi Barang -->
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                    <div class="w-6 h-6 bg-indigo-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                            </path>
                                        </svg>
                                    </div>
                                    Informasi Barang
                                </h3>
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
                                        <span class="text-gray-400">Stok Saat Ini:</span>
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
                                    <h3 class="text-lg font-semibold text-white mb-3 flex items-center gap-2">
                                        <div class="w-6 h-6 bg-pink-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        Foto Barang
                                    </h3>
                                    <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg overflow-hidden">
                                        @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                            <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-50 object-cover">
                                        @elseif(is_string($barang->gambar) && $barang->gambar)
                                            <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-64 object-cover">
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Catatan Admin (jika ada) -->
                            @if (isset($transaksi->catatan_admin) && $transaksi->catatan_admin)
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-3 flex items-center gap-2">
                                        <div class="w-6 h-6 bg-red-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.268 16.5c-.77.833.192 2.5 1.732 2.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        Catatan Admin
                                    </h3>
                                    <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4">
                                        <p class="text-red-200">{{ $transaksi->catatan_admin }}</p>
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
                            <a href="{{ route('transaksi.return.edit', $transaksi->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600/50 hover:bg-blue-500/50 text-white text-sm font-medium rounded-lg border border-blue-500/30 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit Pengembalian
                            </a>
                        @endif

                        @if ($transaksi->status === 'pending')
                            <div
                                class="text-sm text-gray-400 px-4 py-2 bg-gray-800/50 rounded-lg border border-gray-700/50">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin text-yellow-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    Menunggu konfirmasi admin
                                </span>
                            </div>
                        @elseif ($transaksi->status === 'accepted')
                            <div
                                class="text-sm text-green-400 px-4 py-2 bg-green-500/10 rounded-lg border border-green-500/20">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                    Pengembalian dikonfirmasi
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
