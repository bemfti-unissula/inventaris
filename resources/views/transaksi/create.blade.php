<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('barang.show', $barang->_id) }}"
                    class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h2 class="font-medium text-lg text-gray-200 leading-tight">
                    {{ __('Form Peminjaman') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 shadow-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-white/10">
                    <h3 class="text-gray-200 font-semibold">Form Peminjaman Barang</h3>
                    <p class="text-gray-400 text-sm mt-1">{{ $barang->nama_barang }}</p>
                </div>

                <form action="{{ route('transaksi.store', ['barang_id' => $barang->_id]) }}" method="POST"
                    enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    <input type="hidden" name="barang_id" value="{{ $barang->_id }}">

                    <!-- Informasi Barang -->
                    <div class="bg-white/5 border border-white/10 rounded-lg p-4">
                        <h4 class="text-gray-200 font-medium mb-3">Informasi Barang</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-gray-400">Nama:</span>
                                <span class="text-gray-200 ml-2">{{ $barang->nama_barang }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Kategori:</span>
                                <span class="text-gray-200 ml-2">{{ $barang->kategori }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Stok Tersedia:</span>
                                <span class="text-gray-200 ml-2">{{ $barang->stok }} unit</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-auth.input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman"
                            label="Tanggal Peminjaman" required />
                    </div>

                    <div>
                        <x-auth.input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"
                            label="Tanggal Pengembalian" required />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Surat Peminjaman (PDF, maks
                            2MB)</label>
                        <input type="file" name="file" accept="application/pdf" required
                            class="w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-600 file:text-white hover:file:bg-red-700">
                        @error('file')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jumlah" class="block text-sm font-medium text-gray-300 mb-2">
                            Jumlah
                        </label>
                        <input type="number" name="jumlah" id="jumlah" min="1" max="{{ $barang->stok }}"
                            required
                            class="w-full rounded-md bg-white/10 border border-white/20 text-gray-200 p-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200">
                        @error('jumlah')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Stok tersedia: <span
                                class="text-green-400 font-semibold">{{ $barang->stok }} unit</span></p>
                    </div>

                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-300 mb-2">Keterangan
                            (opsional)</label>
                        <textarea id="keterangan" name="keterangan" rows="3"
                            class="w-full rounded-md bg-white/10 border border-white/20 text-gray-200 p-3 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                    </div>

                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('barang.show', $barang->_id) }}"
                            class="text-sm text-gray-400 hover:text-white">Batal</a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                            Ajukan Peminjaman
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahInput = document.getElementById('jumlah');
            const maxStok = {{ $barang->stok }};

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
