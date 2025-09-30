<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Back Icon -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ isset($transaksi) ? route('transaksi.detail', $transaksi->id) : route('barang.show', $barang->_id) }}"
                    class="flex items-center justify-center w-10 h-10 text-white hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-white">
                        {{ isset($transaksi) ? 'Edit Form Peminjaman' : 'Form Peminjaman Barang' }}
                    </h1>
                    <p class="text-gray-400">
                        {{ isset($transaksi) ? 'Perbarui informasi peminjaman barang' : 'Lengkapi informasi peminjaman barang inventaris' }}
                    </p>
                </div>
            </div>

            <!-- Form Container -->
            <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="{{ isset($transaksi) ? 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' : 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z' }}">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-white">
                            {{ isset($transaksi) ? 'Form Edit Peminjaman' : 'Form Peminjaman Barang' }}
                        </h2>
                        <p class="text-gray-400">
                            {{ isset($transaksi) ? 'Perbarui data peminjaman untuk' : 'Lengkapi data peminjaman barang' }} {{ $barang->nama_barang }}
                        </p>
                    </div>
                </div>

                <form action="{{ isset($transaksi) ? route('transaksi.update', $transaksi->id) : route('transaksi.store', ['barang_id' => $barang->_id]) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($transaksi))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="barang_id" value="{{ $barang->_id }}">

                    <!-- Informasi Barang -->
                    <div class="bg-gray-800/30 border border-gray-700/50 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 bg-red-600/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white">Informasi Barang</h4>
                                <p class="text-sm text-gray-400">Detail barang yang akan dipinjam</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="info-card bg-gray-800/50 rounded-lg p-4 transition-all duration-200">
                                <div class="text-xs text-gray-400 mb-1 uppercase tracking-wide">Nama Barang</div>
                                <div class="text-white font-medium">{{ $barang->nama_barang }}</div>
                            </div>
                            <div class="info-card bg-gray-800/50 rounded-lg p-4 transition-all duration-200">
                                <div class="text-xs text-gray-400 mb-1 uppercase tracking-wide">Kategori</div>
                                <div class="text-white font-medium">{{ $barang->kategori }}</div>
                            </div>
                            <div class="info-card bg-gray-800/50 rounded-lg p-4 transition-all duration-200">
                                <div class="text-xs text-gray-400 mb-1 uppercase tracking-wide">Stok Tersedia</div>
                                <div class="text-green-400 font-semibold flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                        </path>
                                    </svg>
                                    {{ $barang->stok }} unit
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grid Layout for Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Tanggal Peminjaman -->
                        <div>
                            <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-300 mb-2">Tanggal
                                Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" required
                                value="{{ old('tanggal_peminjaman', isset($transaksi) && isset($transaksi->tanggal['peminjaman']) ? \Carbon\Carbon::parse($transaksi->tanggal['peminjaman'])->format('Y-m-d') : '') }}"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200">
                            @error('tanggal_peminjaman')
                                <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Tanggal Pengembalian -->
                        <div>
                            <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-300 mb-2">Tanggal
                                Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" required
                                value="{{ old('tanggal_pengembalian', isset($transaksi) && isset($transaksi->tanggal['pengembalian']) ? \Carbon\Carbon::parse($transaksi->tanggal['pengembalian'])->format('Y-m-d') : '') }}"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200">
                            @error('tanggal_pengembalian')
                                <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Jumlah dan File Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Jumlah -->
                        <div>
                            <label for="jumlah" class="block text-sm font-medium text-gray-300 mb-2">
                                Jumlah Peminjaman
                            </label>
                            <input type="number" name="jumlah" id="jumlah" min="1" 
                                max="{{ $barang->stok }}"
                                required value="{{ old('jumlah', isset($transaksi) ? $transaksi->jumlah : '') }}"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200"
                                placeholder="0">
                            @error('jumlah')
                                <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-400">
                                Stok tersedia: <span class="text-green-400 font-semibold">{{ $barang->stok }} unit</span>
                            </p>
                        </div>

                        <!-- Surat Peminjaman -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Surat Peminjaman</label>
                            
                            <input type="file" name="file" accept="application/pdf" {{ isset($transaksi) ? '' : 'required' }}
                                class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-red-600 file:text-white hover:file:bg-red-700 file:cursor-pointer cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200">
                            @error('file')
                                <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-400">
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    Format PDF, maksimal 2MB
                                </span>
                            </p>

                            @if(isset($transaksi) && isset($transaksi->file['url']))
                            <div class="mt-4 p-4 bg-gray-800/50 border border-gray-700/50 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-white text-sm font-medium">File Saat Ini</span>
                                            <p class="text-xs text-gray-400">Upload file baru untuk mengganti</p>
                                        </div>
                                    </div>
                                    <a href="{{ $transaksi->file['url'] }}" target="_blank" 
                                       class="inline-flex items-center gap-1 px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-xs rounded-lg transition-colors duration-200">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                            </path>
                                        </svg>
                                        Lihat File
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-300 mb-2">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="4"
                            placeholder="Tambahkan keterangan jika diperlukan..."
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors duration-200 resize-none">{{ old('keterangan', isset($transaksi) ? $transaksi->keterangan : '') }}</textarea>
                        @error('keterangan')
                            <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center gap-4 pt-6 border-t border-gray-800">
                        <a href="{{ isset($transaksi) ? route('transaksi.detail', $transaksi->id) : route('barang.show', $barang->_id) }}"
                            class="flex items-center gap-2 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                        <button type="submit"
                            class="flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                            @if(isset($transaksi))
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Update Peminjaman
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Ajukan Peminjaman
                            @endif
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

        /* Custom file input styling */
        input[type="file"]::-webkit-file-upload-button {
            background: #dc2626;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            margin-right: 8px;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background: #b91c1c;
        }

        /* Smooth transitions untuk semua elemen form */
        input, textarea, select {
            transition: all 0.2s ease-in-out;
        }

        /* Hover effect untuk info cards */
        .info-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>

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
