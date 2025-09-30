<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('transaksi.detail', $transaksi->id) }}"
                    class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h2 class="font-medium text-lg text-gray-200 leading-tight">
                    {{ __('Edit Form Peminjaman') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-24 px-4 bg-gradient-to-br from-pink-100 to-red-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-gradient-to-br from-black/95 to-gray-900/95 backdrop-blur-sm rounded-xl border border-gray-600/60 shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-gray-900/90 to-gray-800/90 px-6 py-4 border-b border-gray-500/60">
                    <h3 class="text-white font-semibold">Edit Form Peminjaman Barang</h3>
                    <p class="text-gray-300 text-sm mt-1">{{ $barang->nama_barang }}</p>
                </div>

                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST"
                    enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="barang_id" value="{{ $barang->_id }}">

                    <!-- Informasi Barang -->
                    <div
                        class="bg-gradient-to-br from-red-900/40 to-red-800/30 border border-red-500/40 rounded-lg p-4">
                        <h4 class="text-white font-medium mb-3 flex items-center gap-2">
                            Informasi Barang
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-red-300">Nama:</span>
                                <span class="text-white ml-2">{{ $barang->nama_barang }}</span>
                            </div>
                            <div>
                                <span class="text-red-300">Kategori:</span>
                                <span class="text-white ml-2">{{ $barang->kategori }}</span>
                            </div>
                            <div>
                                <span class="text-red-300">Stok Tersedia:</span>
                                <span class="text-white ml-2">{{ $barang->stok }} unit</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-300 mb-2">Tanggal
                            Peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" required
                            value="{{ $transaksi->tanggal->peminjaman ?? '' }}"
                            class="w-full rounded-md bg-gray-900/80 border border-gray-500/60 text-white p-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200">
                        @error('tanggal_peminjaman')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-300 mb-2">Tanggal
                            Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" required
                            value="{{ $transaksi->tanggal->pengembalian ?? '' }}"
                            class="w-full rounded-md bg-gray-900/80 border border-gray-500/60 text-white p-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200">
                        @error('tanggal_pengembalian')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Surat Peminjaman (PDF, maks
                            2MB)</label>

                        @if (isset($transaksi->file->url))
                            <div class="mb-3 p-3 bg-gray-800/50 border border-gray-600 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <span class="text-gray-300 text-sm">File saat ini</span>
                                    </div>
                                    <a href="{{ $transaksi->file->url }}" target="_blank"
                                        class="text-blue-400 hover:text-blue-300 text-sm underline">
                                        Lihat File
                                    </a>
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Upload file baru jika ingin mengganti</p>
                            </div>
                        @endif

                        <input type="file" name="file" accept="application/pdf"
                            class="w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-600 file:text-white hover:file:bg-red-700">
                        @error('file')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jumlah" class="block text-sm font-medium text-gray-300 mb-2">
                            Jumlah
                        </label>
                        <input type="number" name="jumlah" id="jumlah" min="1"
                            max="{{ $barang->stok + $transaksi->jumlah }}" required
                            value="{{ $transaksi->jumlah ?? '' }}"
                            class="w-full rounded-md bg-gray-900/80 border border-gray-500/60 text-white p-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200">
                        @error('jumlah')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-400 mt-1">Stok tersedia: <span
                                class="text-green-400 font-semibold">{{ $barang->stok }} unit</span> (+
                            {{ $transaksi->jumlah }} unit dari peminjaman ini)</p>
                    </div>

                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-300 mb-2">Keterangan
                            (opsional)</label>
                        <textarea id="keterangan" name="keterangan" rows="3"
                            placeholder="{{ $transaksi->keterangan ? 'Keterangan sebelumnya: ' . $transaksi->keterangan : 'Tambahkan keterangan jika diperlukan...' }}"
                            class="w-full rounded-md bg-gray-900/80 border border-gray-500/60 text-white p-3 focus:outline-none focus:ring-2 focus:ring-red-500">{{ $transaksi->keterangan ?? '' }}</textarea>
                        @if ($transaksi->keterangan)
                            <p class="text-xs text-blue-300 mt-1">Keterangan sebelumnya sudah terisi</p>
                        @else
                            <p class="text-xs text-gray-400 mt-1">Sebelumnya tidak ada keterangan</p>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('transaksi.detail', $transaksi->id) }}"
                            class="px-4 py-2 text-sm text-gray-400 hover:text-white">Batal</a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Peminjaman
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Styling untuk icon kalender menjadi putih */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        /* Untuk Firefox */
        input[type="date"]::-moz-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahInput = document.getElementById('jumlah');
            const maxStok = {{ $barang->stok + $transaksi->jumlah }};

            // Event listener untuk input change
            jumlahInput.addEventListener('input', function() {
                let value = parseInt(this.value);

                // Jika value kosong atau bukan angka, set ke 1
                if (isNaN(value) || value < 1) {
                    this.value = 1;
                    return;
                }

                // Jika value melebihi stok maksimal, set ke stok maksimal
                if (value > maxStok) {
                    this.value = maxStok;

                    // Tampilkan notifikasi visual
                    showStokNotification();
                }
            });

            // Event listener untuk paste
            jumlahInput.addEventListener('paste', function(e) {
                setTimeout(() => {
                    let value = parseInt(this.value);
                    if (value > maxStok) {
                        this.value = maxStok;
                        showStokNotification();
                    }
                }, 10);
            });

            // Event listener untuk keydown (mencegah input yang tidak valid)
            jumlahInput.addEventListener('keydown', function(e) {
                // Allow: backspace, delete, tab, escape, enter
                if ([46, 8, 9, 27, 13].indexOf(e.keyCode) !== -1 ||
                    // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                    (e.keyCode === 65 && e.ctrlKey === true) ||
                    (e.keyCode === 67 && e.ctrlKey === true) ||
                    (e.keyCode === 86 && e.ctrlKey === true) ||
                    (e.keyCode === 88 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });

            function showStokNotification() {
                // Hapus notifikasi sebelumnya jika ada
                const existingNotif = document.querySelector('.stok-notification');
                if (existingNotif) {
                    existingNotif.remove();
                }

                // Buat notifikasi baru
                const notification = document.createElement('div');
                notification.className =
                    'stok-notification fixed top-4 right-4 bg-yellow-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-opacity duration-300';
                notification.innerHTML = `
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.864-.833-2.634 0L4.2 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <span>Maksimal ${maxStok} unit tersedia</span>
                    </div>
                `;

                document.body.appendChild(notification);

                // Hapus notifikasi setelah 3 detik
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
</x-app-layout>
