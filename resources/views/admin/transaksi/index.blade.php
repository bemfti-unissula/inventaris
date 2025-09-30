<x-app-layout>
    <x-slot name="title">Kelola Transaksi</x-slot>
    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-800/50 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                                {{ __('Kelola Transaksi') }}
                            </h1>
                            <p class="text-gray-300">Kelola semua transaksi peminjaman dan pengembalian barang</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Total Transaksi</p>
                            <p class="text-lg font-bold text-white">{{ $transaksis->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="mb-6">
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.transaksi.index', ['type' => 'semua']) }}"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ $type === 'semua' ? 'bg-red-500/20 text-red-200 border border-red-400/30' : 'bg-gray-800/50 text-gray-300 border border-gray-700/50 hover:bg-red-500/10 hover:text-red-200' }}">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Semua Transaksi
                        </span>
                    </a>
                    <a href="{{ route('admin.transaksi.index', ['type' => 'peminjaman']) }}"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ $type === 'peminjaman' ? 'bg-blue-500/20 text-blue-200 border border-blue-400/30' : 'bg-gray-800/50 text-gray-300 border border-gray-700/50 hover:bg-blue-500/10 hover:text-blue-200' }}">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Peminjaman
                        </span>
                    </a>
                    <a href="{{ route('admin.transaksi.index', ['type' => 'pengembalian']) }}"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ $type === 'pengembalian' ? 'bg-green-500/20 text-green-200 border border-green-400/30' : 'bg-gray-800/50 text-gray-300 border border-gray-700/50 hover:bg-green-500/10 hover:text-green-200' }}">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                            </svg>
                            Pengembalian
                        </span>
                    </a>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="mb-6">
                <form method="GET" action="{{ route('admin.transaksi.index') }}" class="flex gap-3">
                    <input type="hidden" name="type" value="{{ $type }}">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ $currentFilters['search'] }}"
                            placeholder="Cari berdasarkan nama barang, user, atau keterangan..."
                            class="w-full px-4 py-2 bg-gray-800/50 border border-gray-700/50 text-white placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-red-500/50 focus:border-red-500/50">
                    </div>
                    <button type="submit"
                        class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                        Cari
                    </button>
                    @if ($currentFilters['search'])
                        <a href="{{ route('admin.transaksi.index', ['type' => $type]) }}"
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors duration-200">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <!-- Transactions Table -->
            <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl overflow-hidden">
                @if ($transaksis->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-800/50">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        User</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Barang</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Jenis</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Jumlah</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800/50">
                                @foreach ($transaksis as $transaksi)
                                    <tr class="hover:bg-gray-800/30 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $user = \App\Models\User::find($transaksi->user_id);
                                            @endphp
                                            <div class="text-sm font-medium text-white">{{ $user->name ?? 'N/A' }}
                                            </div>
                                            <div class="text-sm text-gray-400">{{ $user->email ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $barang = \App\Models\Barang::find($transaksi->barang_id);
                                            @endphp
                                            <div class="text-sm font-medium text-white">
                                                {{ $barang->nama_barang ?? 'N/A' }}</div>
                                            <div class="text-sm text-gray-400">{{ $transaksi->keterangan ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($transaksi->tipe === 'peminjaman')
                                                <span
                                                    class="px-2 py-1 text-xs font-medium bg-blue-500/20 text-blue-300 rounded-full">
                                                    Peminjaman
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-300 rounded-full">
                                                    Pengembalian
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                            {{ $transaksi->jumlah }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-yellow-500/20 text-yellow-300',
                                                    'accepted' => 'bg-green-500/20 text-green-300',
                                                    'rejected' => 'bg-red-500/20 text-red-300',
                                                    'canceled' => 'bg-gray-500/20 text-gray-300',
                                                ];
                                            @endphp
                                            <span
                                                class="px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$transaksi->status] ?? 'bg-gray-500/20 text-gray-300' }}">
                                                {{ ucfirst($transaksi->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            @if ($transaksi->tipe === 'peminjaman')
                                                {{ \Carbon\Carbon::parse($transaksi->tanggal['peminjaman'] ?? null)->format('d/m/Y') ?? '-' }}
                                            @else
                                                {{ \Carbon\Carbon::parse($transaksi->tanggal['pengembalian'] ?? null)->format('d/m/Y') ?? '-' }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('admin.transaksi.detail', $transaksi->id) }}"
                                                    class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg>
                                                    Detail
                                                </a>
                                                @if ($transaksi->status !== 'canceled')
                                                    <span class="text-gray-600">|</span>
                                                    <button
                                                        onclick="openStatusModal('{{ $transaksi->id }}', '{{ $transaksi->status }}', '{{ $transaksi->catatan_admin ?? '' }}')"
                                                        class="text-red-400 hover:text-red-300 transition-colors duration-200 flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                        Update
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Enhanced Pagination -->
                    <div class="px-6 py-4 border-t border-gray-800/50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 10h6m-6 4h6">
                                    </path>
                                </svg>
                                <div class="text-sm text-gray-400 font-poppins">
                                    <span class="font-medium text-gray-300">{{ $transaksis->firstItem() ?? 0 }}</span>
                                    -
                                    <span class="font-medium text-gray-300">{{ $transaksis->lastItem() ?? 0 }}</span>
                                    dari
                                    <span class="font-medium text-gray-300">{{ $transaksis->total() }}</span>
                                    transaksi
                                </div>
                            </div>

                            <div class="flex items-center space-x-1">
                                @if ($transaksis->onFirstPage())
                                    <span
                                        class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-800 border border-gray-700 rounded-l-lg cursor-not-allowed">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $transaksis->previousPageUrl() }}"
                                        class="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-800 border border-gray-700 rounded-l-lg hover:bg-gray-700 hover:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </a>
                                @endif

                                @foreach ($transaksis->getUrlRange(1, $transaksis->lastPage()) as $page => $url)
                                    @if ($page == $transaksis->currentPage())
                                        <span
                                            class="px-3 py-2 text-sm font-medium text-white bg-red-600 border border-red-600 font-poppins">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-800 border border-gray-700 hover:bg-gray-700 hover:text-white transition-colors font-poppins">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                @if ($transaksis->hasMorePages())
                                    <a href="{{ $transaksis->nextPageUrl() }}"
                                        class="px-3 py-2 text-sm font-medium text-gray-300 bg-gray-800 border border-gray-700 rounded-r-lg hover:bg-gray-700 hover:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @else
                                    <span
                                        class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-800 border border-gray-700 rounded-r-lg cursor-not-allowed">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="px-6 py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-300">Tidak ada transaksi</h3>
                        <p class="mt-1 text-sm text-gray-400">Belum ada transaksi yang tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Status Update Modal -->
    <div id="statusModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
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

            // Show modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeStatusModal() {
            const modal = document.getElementById('statusModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('statusModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStatusModal();
            }
        });
    </script>
</x-app-layout>
