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

                        <div class="space-y-4">
                            <!-- Jenis Transaksi dan Status dalam 1 row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Jenis Transaksi -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Jenis Transaksi</label>
                                    @if ($transaksi->tipe === 'peminjaman')
                                        <span
                                            class="inline-flex items-center px-3 py-2 bg-blue-500/20 text-blue-300 rounded-lg font-medium">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4"></path>
                                            </svg>
                                            Peminjaman
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-2 bg-green-500/20 text-green-300 rounded-lg font-medium">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                            </svg>
                                            Pengembalian
                                        </span>
                                    @endif
                                </div>

                                <!-- Status -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                                    @php
                                        $statusConfig = [
                                            'pending' => [
                                                'color' => 'bg-yellow-500/20 text-yellow-300 border-yellow-400/30',
                                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                            ],
                                            'accepted' => [
                                                'color' => 'bg-green-500/20 text-green-300 border-green-400/30',
                                                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                            ],
                                            'canceled' => [
                                                'color' => 'bg-red-500/20 text-red-300 border-red-400/30',
                                                'icon' =>
                                                    'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                                            ],
                                        ];
                                        $config = $statusConfig[$transaksi->status] ?? $statusConfig['pending'];
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-3 py-2 border rounded-lg font-medium {{ $config['color'] }}">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $config['icon'] }}"></path>
                                        </svg>
                                        {{ ucfirst($transaksi->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Jumlah dan Tanggal dalam 1 row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Jumlah -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Jumlah</label>
                                    <div class="text-2xl font-bold text-white">{{ $transaksi->jumlah }}</div>
                                </div>

                                <!-- Tanggal -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">
                                        @if ($transaksi->tipe === 'peminjaman')
                                            Tanggal Peminjaman
                                        @else
                                            Tanggal Pengembalian
                                        @endif
                                    </label>
                                    <div class="text-white">
                                        @if ($transaksi->tipe === 'peminjaman')
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal['peminjaman'] ?? null)->format('d F Y') ?? '-' }}
                                        @else
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal['pengembalian'] ?? null)->format('d F Y') ?? '-' }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        @if ($transaksi->keterangan)
                            <div class="mt-6 pt-6 border-t border-gray-800">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Keterangan</label>
                                <div class="bg-gray-800/50 rounded-lg p-4">
                                    <p class="text-gray-200">{{ $transaksi->keterangan }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Catatan Admin -->
                        @if ($transaksi->catatan_admin)
                            <div class="mt-6 pt-6 border-t border-gray-800">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Catatan Admin</label>
                                <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4">
                                    <p class="text-red-200">{{ $transaksi->catatan_admin }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Informasi User -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Peminjam</h3>
                        </div>

                        @if ($user)
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm text-gray-400">Nama</label>
                                    <p class="text-white font-medium">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-400">Email</label>
                                    <p class="text-gray-300">{{ $user->email }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-400">Role</label>
                                    <span
                                        class="inline-block px-2 py-1 bg-gray-700 text-gray-200 text-xs rounded">{{ $user->role }}</span>
                                </div>
                            </div>
                        @else
                            <p class="text-red-400">Data user tidak ditemukan</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Full Width Cards -->
            <div class="space-y-6">
                <!-- Informasi Barang - Full Width -->
                <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white">Barang</h3>
                    </div>

                    @if ($barang)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kotak 1: Gambar Barang -->
                            <div>
                                @if ($barang->gambar)
                                    <div class="w-full h-50 rounded-lg overflow-hidden bg-gray-700">
                                        @if (is_array($barang->gambar) && isset($barang->gambar['url']))
                                            <img src="{{ $barang->gambar['url'] }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-full object-cover">
                                        @elseif(is_string($barang->gambar))
                                            <img src="{{ asset($barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                                class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                @else
                                    <div class="w-full h-50 bg-gray-700 rounded-lg flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Kotak 2: Info Barang -->
                            <div class="flex flex-wrap gap-6">
                                <!-- Nama Barang -->
                                <div class="flex-shrink-0">
                                    <label class="block text-sm text-gray-400 mb-2">Nama Barang</label>
                                    <p class="text-white font-medium text-lg">{{ $barang->nama_barang }}</p>
                                </div>

                                <!-- Kategori -->
                                <div class="flex-shrink-0">
                                    <label class="block text-sm text-gray-400 mb-2">Kategori</label>
                                    <span
                                        class="inline-block px-3 py-1 bg-red-500/20 text-red-300 text-sm rounded-full">{{ $barang->kategori }}</span>
                                </div>

                                <!-- Stok -->
                                <div class="flex-shrink-0">
                                    <label class="block text-sm text-gray-400 mb-2">Stok Tersedia</label>
                                    <p class="text-white font-semibold text-xl">{{ $barang->stok }}</p>
                                </div>

                                <!-- Deskripsi -->
                                <div class="flex-1 min-w-0">
                                    <label class="block text-sm text-gray-400 mb-2">Deskripsi</label>
                                    <p class="text-gray-300 text-sm leading-relaxed">{{ $barang->deskripsi }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-800">
                            <a href="{{ route('barang.show', $barang->id) }}"
                                class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 text-sm transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                                Lihat Detail Barang
                            </a>
                        </div>
                    @else
                        <p class="text-red-400">Data barang tidak ditemukan</p>
                    @endif
                </div>

                <!-- Timeline Status & Aksi Cepat - Grid Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Timeline Status - Left Side -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-white mb-6">Timeline Status</h3>

                        <div class="space-y-4">
                            <!-- Created -->
                            <div class="flex items-center gap-4">
                                <div class="w-4 h-4 bg-blue-500 rounded-full flex-shrink-0"></div>
                                <div class="flex-1">
                                    <p class="text-white font-medium">Transaksi Dibuat</p>
                                    <p class="text-gray-400 text-sm">
                                        {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d F Y, H:i') }}</p>
                                </div>
                            </div>

                            <!-- Updated -->
                            @if ($transaksi->updated_at != $transaksi->created_at)
                                <div class="flex items-center gap-4">
                                    <div class="w-4 h-4 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <p class="text-white font-medium">Status Terakhir Diupdate</p>
                                        <p class="text-gray-400 text-sm">
                                            {{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d F Y, H:i') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Aksi Cepat - Right Side -->
                    <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-white mb-4">Aksi Cepat</h3>

                        <button
                            onclick="openStatusModal('{{ $transaksi->id }}', '{{ $transaksi->status }}', '{{ $transaksi->catatan_admin ?? '' }}')"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 font-medium">
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
                        <option value="canceled">Canceled</option>
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
