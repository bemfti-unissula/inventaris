<x-app-layout>
    <x-slot name="title">Detail Transaksi {{ $transaksi->id }}</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Back Icon -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ route('admin.transaksi.index') }}"
                    class="flex items-center justify-center w-10 h-10 text-white hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-white">Detail Transaksi</h1>
                </div>
            </div>

             <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Main Content -->
                <div class="space-y-6">
                    <!-- Informasi Transaksi -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-white">Informasi Transaksi</h2>
                                <p class="text-gray-400">Detail lengkap transaksi {{ $transaksi->tipe }}</p>
                            </div>
                        </div>

                        <!-- Informasi Pengembalian (if exists) -->
                        @if (!empty($transaksi->return))
                            <div class="mt-8">
                                <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                    <div class="w-6 h-6 bg-green-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                        </svg>
                                    </div>
                                    Informasi Pengembalian
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Jumlah Dikembalikan:</span>
                                        <span class="text-white font-medium">{{ $transaksi->return['jumlah'] ?? '-' }}
                                            unit</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Dikembalikan Pada:</span>
                                        <span class="text-white font-medium">
                                            {{ isset($transaksi->return['tanggal_kembali']) ? \Carbon\Carbon::parse($transaksi->return['tanggal_kembali'])->format('d F Y') : '-' }}
                                        </span>
                                    </div>
                                    @if (isset($transaksi->return['gambar']['url']))
                                        <div class="py-2">
                                            <h3
                                                class="text-lg font-semibold text-white mb-3 lg:mt-2 flex items-center gap-2">
                                                <div
                                                    class="w-6 h-6 bg-purple-600 rounded-lg flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                Foto Bukti Pengembalian
                                            </h3>
                                            <div
                                                class="bg-gray-800/50 border border-gray-700/50 rounded-lg overflow-hidden mb-3">
                                                <img src="{{ $transaksi->return['gambar']['url'] }}"
                                                    alt="Foto Bukti Pengembalian" class="w-full h-64 object-cover">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Keterangan Pengembalian -->
                            <div class="py-2">
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
                        @endif

                        <div class="space-y-6">
                            <!-- Informasi Peminjaman -->
                            <div class="py-2">
                                <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                    <div class="w-6 h-6 bg-blue-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3a4 4 0 118 0v4m-4 0V3m0 4h0m-4 0h8m-4 0v10m0 0l-3-3m3 3l3-3">
                                            </path>
                                        </svg>
                                    </div>
                                    Informasi Peminjaman
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Jumlah:</span>
                                        <span class="text-white font-medium">{{ $transaksi->jumlah }} unit</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Tanggal Peminjaman:</span>
                                        <span
                                            class="text-white font-medium">{{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman ?? ($transaksi->tanggal['peminjaman'] ?? null))->format('d F Y') ?? '-' }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Tanggal Pengembalian:</span>
                                        <span
                                            class="text-white font-medium">{{ \Carbon\Carbon::parse($transaksi->tanggal_pengembalian ?? ($transaksi->tanggal['pengembalian'] ?? null))->format('d F Y') ?? '-' }}</span>
                                    </div>

                                    @if ($transaksi->tipe === 'peminjaman')
                                        <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                            <span class="text-gray-400">Status:</span>
                                            @php
                                                $statusConfig = [
                                                    'pending' => [
                                                        'color' =>
                                                            'bg-yellow-500/20 text-yellow-300 border-yellow-400/30',
                                                        'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                                    ],
                                                    'accepted' => [
                                                        'color' => 'bg-green-500/20 text-green-300 border-green-400/30',
                                                        'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                                    ],
                                                    'rejected' => [
                                                        'color' => 'bg-red-500/20 text-red-300 border-red-400/30',
                                                        'icon' =>
                                                            'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                                                    ],
                                                ];
                                                $config = $statusConfig[$transaksi->status] ?? $statusConfig['pending'];
                                            @endphp
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs rounded-full border {{ $config['color'] }}">
                                                {{ ucfirst($transaksi->status) }}
                                            </span>
                                        </div>
                                    @endif

                                    <div class="flex justify-between items-center py-2">
                                        <span class="text-gray-400">Dibuat:</span>
                                        <span
                                            class="text-white font-medium">{{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- File Surat Peminjaman -->
                            @if ($transaksi->file && isset($transaksi->file['url']))
                                <div class="py-2">
                                    <h3 class="text-lg font-semibold text-white mb-3 flex items-center gap-2">
                                        <div class="w-6 h-6 bg-teal-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        Surat Peminjaman
                                    </h3>
                                    <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg p-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-gray-700/50 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
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

                            <!-- Keterangan Peminjam -->
                            @if ($transaksi->keterangan)
                                <div class="py-2">
                                    <h3 class="text-lg font-semibold text-white mb-3 flex items-center gap-2">
                                        <div class="w-6 h-6 bg-yellow-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        Keterangan Peminjaman
                                    </h3>
                                    <div class="bg-gray-800/50 border border-gray-700/50 rounded-lg p-4">
                                        <p class="text-gray-300 break-words">{{ $transaksi->keterangan }}</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Timeline Status -->
                            <div class="py-2">
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
                                    <!-- Pending -->
                                    <div
                                        class="flex items-center gap-3 p-3 rounded-lg border bg-yellow-500/10 border-yellow-400/30">
                                        <div
                                            class="w-2 h-2 rounded-full flex-shrink-0 {{ $transaksi->status == 'pending' ? 'bg-yellow-400 animate-pulse' : 'bg-yellow-400/50' }}">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-yellow-300 font-medium text-sm break-words">Menunggu Approval</p>
                                            <p class="text-yellow-400 text-xs break-words">
                                                {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Accepted -->
                                    @if ($transaksi->status == 'accepted' || !empty($transaksi->return))
                                        <div
                                            class="flex items-center gap-3 p-3 rounded-lg border bg-green-500/10 border-green-400/30">
                                            <div
                                                class="w-2 h-2 rounded-full flex-shrink-0 {{ $transaksi->status == 'accepted' && empty($transaksi->return) ? 'bg-green-400 animate-pulse' : 'bg-green-400' }}">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-green-300 font-medium text-sm break-words">Disetujui</p>
                                                <p class="text-green-400 text-xs break-words">
                                                    {{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d F Y, H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Rejected -->
                                    @if ($transaksi->status == 'rejected')
                                        <div
                                            class="flex items-center gap-3 p-3 rounded-lg border bg-red-500/10 border-red-400/30">
                                            <div class="w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-red-300 font-medium text-sm break-words">Ditolak</p>
                                                <p class="text-red-400 text-xs break-words">
                                                    {{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d F Y, H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Returned -->
                                    @if (!empty($transaksi->return))
                                        <div
                                            class="flex items-center gap-3 p-3 rounded-lg border bg-purple-500/10 border-purple-400/30">
                                            <div class="w-2 h-2 rounded-full bg-purple-400 flex-shrink-0"></div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-purple-300 font-medium text-sm break-words">Barang Dikembalikan</p>
                                                <p class="text-purple-400 text-xs break-words">
                                                    {{ isset($transaksi->return['tanggal_kembali']) ? \Carbon\Carbon::parse($transaksi->return['tanggal_kembali'])->format('d F Y, H:i') : '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Item Details & User Info -->
                <div class="space-y-6">
                    <!-- Informasi Barang -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Informasi Barang</h3>
                        </div>

                        @if ($barang)
                            <div class="space-y-4">
                                <!-- Info Barang -->
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Nama Barang:</span>
                                        <span class="text-white font-medium">{{ $barang->nama_barang }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Kategori:</span>
                                        <span class="text-white font-medium">{{ $barang->kategori }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                        <span class="text-gray-400">Stok Tersedia:</span>
                                        <span class="text-white font-medium">{{ $barang->stok }} unit</span>
                                    </div>
                                    @if ($barang->deskripsi)
                                        <div class="pt-2">
                                            <span class="text-gray-400 text-sm">Deskripsi:</span>
                                            <p class="text-gray-300 text-sm mt-1">{{ $barang->deskripsi }}</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Foto Barang -->
                                @if ((is_array($barang->gambar) && isset($barang->gambar['url'])) || (is_string($barang->gambar) && $barang->gambar))
                                    <div class="pt-4 border-t border-gray-800/50">
                                        <h3 class="text-lg font-semibold text-white mb-3 flex items-center gap-2">
                                            <div
                                                class="w-6 h-6 bg-pink-600 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            Foto Barang
                                        </h3>
                                        <div
                                            class="bg-gray-800/50 border border-gray-700/50 rounded-lg overflow-hidden">
                                            @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                                <img src="{{ $barang->gambar['url'] }}"
                                                    alt="{{ $barang->nama_barang }}"
                                                    class="w-full h-64 object-cover">
                                            @elseif(is_string($barang->gambar) && $barang->gambar)
                                                <img src="{{ asset($barang->gambar) }}"
                                                    alt="{{ $barang->nama_barang }}"
                                                    class="w-full h-64 object-cover">
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else
                            <p class="text-red-400">Data barang tidak ditemukan</p>
                        @endif
                    </div>

                    <!-- Informasi Peminjam -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Informasi Peminjam</h3>
                        </div>

                        @if ($user)
                            <div class="space-y-3">
                                <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                    <span class="text-gray-400">Nama:</span>
                                    <span class="text-white font-medium">{{ $user->name }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                                    <span class="text-gray-400">Email:</span>
                                    <span class="text-white font-medium">{{ $user->email }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-400">Role:</span>
                                    <span
                                        class="inline-flex items-center px-2 py-1 bg-gray-700/50 text-gray-200 text-xs rounded-full border border-gray-600/30">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <p class="text-red-400">Data user tidak ditemukan</p>
                        @endif
                    </div>

                    @if ($transaksi->catatan_admin)
                        <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.268 16.5c-.77.833.192 2.5 1.732 2.5z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white">Catatan Admin</h3>
                            </div>
                            <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4">
                                <p class="text-red-200 break-words break-all whitespace-normal">
                                    {{ $transaksi->catatan_admin }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Actions Section -->
            <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Aksi Admin</h3>
                        </div>
                        <p class="text-gray-400 text-sm">Update status transaksi dan tambahkan catatan untuk peminjam
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('admin.transaksi.index') }}"
                            class="inline-flex items-center justify-center px-4 py-2 bg-gray-700/50 hover:bg-gray-600/50 text-white text-sm font-medium rounded-lg border border-gray-600/30 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali ke Daftar
                        </a>

                        @if ($barang)
                            <a href="{{ route('barang.show', $barang->id) }}" target="_blank"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600/50 hover:bg-blue-500/50 text-white text-sm font-medium rounded-lg border border-blue-500/30 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                                Detail Barang
                            </a>
                        @endif

                        <button
                            onclick="openStatusModal('{{ $transaksi->id }}', '{{ $transaksi->status }}', '{{ $transaksi->catatan_admin ?? '' }}')"
                            class="inline-flex items-center justify-center gap-2 px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Update Status
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Update Modal (sama seperti di index) -->
    <div id="statusModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center">
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 w-full max-w-md mx-4">
            <h3 class="text-lg font-semibold text-white mb-4">Update Status Transaksi</h3>

            <form id="statusForm" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                    <select id="statusSelect" name="status"
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 text-white rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Catatan Admin (Opsional)</label>
                    <textarea id="catatanAdmin" name="catatan_admin" rows="3" placeholder="Tambahkan catatan untuk user..."
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 text-white placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg font-medium transition-colors duration-200">
                        Update Status
                    </button>
                    <button type="button" onclick="closeStatusModal()"
                        class="flex-1 bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg font-medium transition-colors duration-200">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openStatusModal(transaksiId, currentStatus, currentCatatan) {
            const modal = document.getElementById('statusModal');
            const form = document.getElementById('statusForm');
            const statusSelect = document.getElementById('statusSelect');
            const catatanAdmin = document.getElementById('catatanAdmin');

            // Set form action
            form.action = `/admin/transaksi/${transaksiId}/status`;

            // Set current values
            statusSelect.value = currentStatus;
            catatanAdmin.value = currentCatatan;

            // Move modal to body and set maximum z-index
            document.body.appendChild(modal);
            modal.style.zIndex = '2147483647'; // Maximum safe z-index value
            modal.style.position = 'fixed';

            // Show modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeStatusModal() {
            const modal = document.getElementById('statusModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');

            // Restore body scroll
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('statusModal');
            if (e.target === modal) {
                closeStatusModal();
            }
        });

        // Ensure modal is in the right place on page load
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('statusModal');
            if (modal && !modal.classList.contains('hidden')) {
                document.body.appendChild(modal);
            }
        });
    </script>
</x-app-layout>
