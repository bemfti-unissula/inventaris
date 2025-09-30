
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jumlahInput = document.getElementById('jumlah');
        const maxJumlah = {{ $transaksi->jumlah }};

        jumlahInput.addEventListener('input', function() {
            let value = parseInt(this.value);
            if (isNaN(value) || value < 1) {
                this.value = 1;
                return;
            }
            if (value > maxJumlah) {
                this.value = maxJumlah;
                showJumlahNotification();
            }
        });

        jumlahInput.addEventListener('paste', function(e) {
            setTimeout(() => {
                let value = parseInt(this.value);
                if (value > maxJumlah) {
                    this.value = maxJumlah;
                    showJumlahNotification();
                }
            }, 10);
        });

        jumlahInput.addEventListener('keydown', function(e) {
            if ([46, 8, 9, 27, 13].indexOf(e.keyCode) !== -1 ||
                (e.keyCode === 65 && e.ctrlKey === true) ||
                (e.keyCode === 67 && e.ctrlKey === true) ||
                (e.keyCode === 86 && e.ctrlKey === true) ||
                (e.keyCode === 88 && e.ctrlKey === true) ||
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        function showJumlahNotification() {
            const existingNotif = document.querySelector('.jumlah-notification');
            if (existingNotif) {
                existingNotif.remove();
            }
            const notification = document.createElement('div');
            notification.className =
                'jumlah-notification fixed top-4 right-4 bg-yellow-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-opacity duration-300';
            notification.innerHTML = `
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.864-.833-2.634 0L4.2 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <span>Maksimal ${maxJumlah} unit dikembalikan</span>
                </div>
            `;
            document.body.appendChild(notification);
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
    });
</script>
<x-app-layout>
    <x-slot name="title">{{ isset($returnTransaksi) ? 'Edit Pengembalian' : 'Kembalikan Barang' }}</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ route('transaksi.detail', $transaksi->id) }}"
                    class="flex items-center justify-center w-10 h-10 bg-gray-800/50 rounded-lg text-gray-300 hover:text-white hover:bg-gray-700/50 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-white">{{ isset($returnTransaksi) ? 'Edit Pengembalian' : 'Kembalikan Barang' }}</h1>
                    <p class="text-gray-300 mt-1">{{ $barang->nama_barang }}</p>
                </div>
            </div>

            <div class="space-y-8">
                <!-- Info Transaksi -->
                <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white">Informasi Peminjaman</h3>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                            <span class="text-gray-400">Nama Barang:</span>
                            <span class="text-white font-medium">{{ $barang->nama_barang }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                            <span class="text-gray-400">Jumlah Dipinjam:</span>
                            <span class="text-white font-medium">{{ $transaksi->jumlah }} unit</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-800/50">
                            <span class="text-gray-400">Tanggal Peminjaman:</span>
                            <span class="text-white font-medium">
                                {{ isset($transaksi->tanggal['peminjaman']) ? \Carbon\Carbon::parse($transaksi->tanggal['peminjaman'])->format('d F Y') : '-' }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-400">Tenggat Kembali:</span>
                            <span class="text-white font-medium">
                                {{ isset($transaksi->tanggal['pengembalian']) ? \Carbon\Carbon::parse($transaksi->tanggal['pengembalian'])->format('d F Y') : '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-white">Form Pengembalian</h2>
                            <p class="text-gray-400">Isi data pengembalian barang</p>
                        </div>
                    </div>


                    <form action="{{ isset($returnTransaksi) ? route('transaksi.return.update', $transaksi->id) : route('transaksi.return.store', $transaksi->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($returnTransaksi))
                            @method('PUT')
                        @endif

                        <!-- Jumlah yang dikembalikan dan Tanggal Pengembalian -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="jumlah" class="block text-sm font-medium text-gray-300 mb-2">
                                    Jumlah yang Dikembalikan
                                </label>
                                <input type="number" id="jumlah" name="jumlah"
                                    value="{{ old('jumlah', isset($returnTransaksi) ? $returnTransaksi->jumlah : $transaksi->jumlah) }}" max="{{ $transaksi->jumlah }}"
                                    min="1" required
                                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700/50 text-white placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-green-500/50 focus:border-green-500/50 transition-all duration-200">
                                @error('jumlah')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-400">Maksimal: {{ $transaksi->jumlah }} unit</p>
                            </div>

                            <div>
                                <label for="tanggal_kembali" class="block text-sm font-medium text-gray-300 mb-2">
                                    Tanggal Pengembalian
                                </label>
                                <div class="relative">
                                    <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                                        value="{{ old('tanggal_kembali', isset($returnTransaksi) && isset($returnTransaksi->tanggal['pengembalian']) ? \Carbon\Carbon::parse($returnTransaksi->tanggal['pengembalian'])->format('Y-m-d') : date('Y-m-d')) }}" required
                                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700/50 text-white placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-green-500/50 focus:border-green-500/50 transition-all duration-200"
                                        style="color-scheme: dark;">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @error('tanggal_kembali')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Upload Gambar -->
                        <div>
                            <label for="gambar" class="block text-sm font-medium text-gray-300 mb-2">
                                Foto bukti pengembalian
                            </label>
                            <input type="file" id="gambar" name="gambar" accept="image/*" {{ isset($returnTransaksi) ? '' : 'required' }}
                                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700/50 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-600 file:text-white hover:file:bg-green-700 rounded-lg focus:ring-2 focus:ring-green-500/50 focus:border-green-500/50 transition-all duration-200">
                            @error('gambar')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-400">Format: JPG, PNG, JPEG. Maksimal 2MB</p>

                            @if(isset($returnTransaksi) && isset($returnTransaksi->return['gambar']['url']))
                                <div class="mt-4 p-4 bg-gray-800/50 border border-gray-700/50 rounded-lg">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $returnTransaksi->return['gambar']['url'] }}" alt="Bukti Pengembalian" class="w-16 h-16 object-cover rounded-lg">
                                        <div>
                                            <span class="text-white text-sm font-medium">Foto Saat Ini</span>
                                            <p class="text-xs text-gray-400">Upload file baru untuk mengganti</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Keterangan -->
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-300 mb-2">
                                Keterangan (Opsional)
                            </label>
                            <textarea id="keterangan" name="keterangan" rows="4"
                                placeholder="Tambahkan keterangan kondisi barang yang dikembalikan..."
                                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700/50 text-white placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-green-500/50 focus:border-green-500/50 transition-all duration-200">{{ old('keterangan', isset($returnTransaksi) ? $returnTransaksi->return['keterangan'] ?? '' : '') }}</textarea>
                            @error('keterangan')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex gap-4 pt-4">
                            <a href="{{ route('transaksi.detail', $transaksi->id) }}"
                                class="flex-1 bg-gray-600 hover:bg-gray-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200 text-center">
                                Batal
                            </a>
                            <button type="submit"
                                class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6">
                                    </path>
                                </svg>
                                {{ isset($returnTransaksi) ? 'Update Pengembalian' : 'Kembalikan Barang' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
