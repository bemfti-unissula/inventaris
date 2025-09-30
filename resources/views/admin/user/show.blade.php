<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-black/95 via-gray-900/95 to-black/95 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Back Icon -->
            <div class="mb-8 flex items-center gap-4">
                <a href="{{ route('admin.user.index') }}"
                    class="flex items-center justify-center w-10 h-10 text-white hover:text-gray-300 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-white">Detail User</h1>
                    <p class="text-gray-400">{{ $user->name }}</p>
                </div>
                <div class="flex-shrink-0">
                    @if ($user->role === 'admin')
                        <span
                            class="inline-flex items-center px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-sm border border-red-400/30">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 8a6 6 0 01-7.743 5.743L10 14l-4 1-1-4 .257-.257A6 6 0 1118 8zm-6-2a1 1 0 11-2 0 1 1 0 012 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Administrator
                        </span>
                    @else
                        <span
                            class="inline-flex items-center px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm border border-blue-400/30">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            User
                        </span>
                    @endif
                </div>
            </div>

            <!-- User Information -->
            <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-800/50 rounded-xl p-8">
                <!-- Avatar and Basic Info -->
                <div class="text-center mb-8">
                    <div
                        class="w-24 h-24 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2">{{ $user->name }}</h2>
                    <p class="text-gray-400">{{ $user->email }}</p>
                </div>

                <!-- User Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Information -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Informasi Personal
                            </h3>
                        </div>

                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                            <div class="user-info-field">
                                {{ $user->name }}
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <div class="user-info-field">
                                {{ $user->email }}
                            </div>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Nomor Telepon</label>
                            <div class="user-info-field">
                                {{ $user->phone ?? 'Tidak ada' }}
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                Informasi Akademik
                            </h3>
                        </div>

                        @php
                            $fakultasMap = [
                                'FTI' => 'Fakultas Teknologi Industri',
                                'FE' => 'Fakultas Ekonomi',
                                'FH' => 'Fakultas Hukum',
                                'FAI' => 'Fakultas Agama Islam',
                                'FP' => 'Fakultas Psikologi',
                                'FKIP' => 'Fakultas Keguruan dan Ilmu Pendidikan',
                                'FBSB' => 'Fakultas Bahasa, Sastra, dan Budaya',
                                'FIKOM' => 'Fakultas Ilmu Komunikasi',
                                'FK' => 'Fakultas Kedokteran',
                                'FKG' => 'Fakultas Kedokteran Gigi',
                                'FIK' => 'Fakultas Ilmu Keperawatan',
                                'FT' => 'Fakultas Teknik',
                                'FF' => 'Fakultas Farmasi',
                            ];
                        @endphp

                        <!-- Faculty -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Fakultas</label>
                            <div class="user-info-field">
                                @if ($user->fakultas)
                                    {{ $fakultasMap[$user->fakultas] ?? $user->fakultas }}
                                @else
                                    <span class="italic">Tidak ada fakultas</span>
                                @endif
                            </div>
                        </div>

                        <!-- Role -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Role</label>
                            <div class="user-info-field">
                                @if ($user->role === 'admin')
                                    <span class="flex items-center text-red-500 font-semibold">
                                        <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 8a6 6 0 01-7.743 5.743L10 14l-4 1-1-4 .257-.257A6 6 0 1118 8zm-6-2a1 1 0 11-2 0 1 1 0 012 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Administrator
                                    </span>
                                @else
                                    <span class="flex items-center text-blue-500 font-semibold">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        User
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Registration Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Tanggal Registrasi</label>
                            <div class="user-info-field">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $user->created_at ? $user->created_at->format('d F Y, H:i') : 'Tidak ada data' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                @if ($user->email_verified_at)
                    <div class="mt-8 pt-6 border-t border-gray-700/50">
                        <div class="flex items-center gap-3 p-4 bg-green-500/10 border border-green-400/30 rounded-lg">
                            <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-green-300">Email Terverifikasi</h4>
                                <p class="text-xs text-green-400">Email diverifikasi pada
                                    {{ $user->email_verified_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mt-8 pt-6 border-t border-gray-700/50">
                        <div
                            class="flex items-center gap-3 p-4 bg-yellow-500/10 border border-yellow-400/30 rounded-lg">
                            <div class="w-8 h-8 bg-yellow-500/20 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-yellow-300">Email Belum Terverifikasi</h4>
                                <p class="text-xs text-yellow-400">User belum memverifikasi alamat emailnya</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-700/50 flex justify-between items-center">
                    <a href="{{ route('admin.user.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar User
                    </a>

                    @if ($user->_id !== auth()->id())
                        <button type="button"
                            onclick="openDeleteModaluserShowDeleteModal('{{ $user->_id }}', '{{ $user->name }}')"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Hapus User
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($user->_id !== auth()->id())
        <!-- Delete Confirmation Modal -->
        <form action="{{ route('admin.user.destroy', $user->_id) }}" method="POST"
            id="deleteFormuserShowDeleteModal">
            @csrf
            @method('DELETE')
        </form>

        @push('modals')
            <x-delete-confirmation-modal modal-id="userShowDeleteModal" title="Konfirmasi Hapus User"
                subtitle="Tindakan ini tidak dapat dibatalkan" item-type="user"
                warning-text="Data user yang sudah dihapus tidak dapat dikembalikan lagi. Semua data transaksi user akan tetap tersimpan."
                confirm-button-text="Ya, Hapus User" cancel-button-text="Batal" />
        @endpush
    @endif

    <style>
        .user-info-field {
            width: 100%;
            min-height: 48px;
            padding: 0.75rem 1rem;
            background-color: #1f2937;
            border: 1px solid #374151;
            border-radius: 0.5rem;
            color: #fff;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }
    </style>
</x-app-layout>
