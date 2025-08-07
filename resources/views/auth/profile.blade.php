<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-sky-600/20 border border-sky-400/30 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">
                    {{ __('Profile Saya') }}
                </h2>
                <p class="text-sm text-gray-300">Kelola informasi akun dan keamanan Anda</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-black min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Update Profile Information -->
            <div class="bg-black/50 backdrop-blur-sm shadow-xl rounded-2xl border border-gray-800 overflow-hidden">
                <div class="bg-sky-600/20 border-b border-sky-400/30 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-sky-400/20 border border-sky-400/30 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-white">
                                {{ __('Informasi Profile') }}
                            </h2>
                            <p class="text-gray-300 text-sm">
                                {{ __('Update informasi profile dan alamat email akun Anda.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="p-6 sm:p-8">
                    <section>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('patch')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <x-auth.input-label for="name" :value="__('Nama Lengkap')" />
                                    <div class="relative mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                        </div>
                                        <x-auth.text-input id="name" name="name" type="text"
                                            class="w-full h-12 px-4 py-3 pl-10 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                            :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    </div>
                                    <x-auth.input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-auth.input-label for="email" :value="__('Alamat Email')" />
                                    <div class="relative mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg>
                                        </div>
                                        <x-auth.text-input id="email" name="email" type="email"
                                            class="w-full h-12 px-4 py-3 pl-10 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                            :value="old('email', $user->contacts['email'])" required autocomplete="username" />
                                    </div>
                                    <x-auth.input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>

                                <div>
                                    <x-auth.input-label for="phone" :value="__('Nomor Telepon')" />
                                    <div class="relative mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <x-auth.text-input id="phone" name="phone" type="text"
                                            class="w-full h-12 px-4 py-3 pl-10 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                            :value="old('phone', $user->contacts['phone'] ?? '')" required autocomplete="tel" />
                                    </div>
                                    <x-auth.input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>

                                <div>
                                    <x-auth.input-label for="fakultas" :value="__('Fakultas')" />
                                    <div class="relative mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </div>
                                        <select id="fakultas" name="fakultas" required
                                            class="w-full h-12 px-4 py-3 pl-10 bg-black/90 border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200">
                                            <option value="" disabled
                                                {{ old('fakultas', $user->fakultas ?? '') == '' ? 'selected' : '' }}>
                                                Pilih Fakultas</option>
                                            <option value="FTI"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FTI' ? 'selected' : '' }}>
                                                Fakultas Teknologi Industri</option>
                                            <option value="FE"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FE' ? 'selected' : '' }}>
                                                Fakultas Ekonomi</option>
                                            <option value="FH"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FH' ? 'selected' : '' }}>
                                                Fakultas Hukum</option>
                                            <option value="FAI"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FAI' ? 'selected' : '' }}>
                                                Fakultas Agama Islam</option>
                                            <option value="FP"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FP' ? 'selected' : '' }}>
                                                Fakultas Psikologi</option>
                                            <option value="FKIP"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FKIP' ? 'selected' : '' }}>
                                                Fakultas Keguruan dan Ilmu Pendidikan</option>
                                            <option value="FBSB"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FBSB' ? 'selected' : '' }}>
                                                Fakultas Bahasa, Sastra, dan Budaya</option>
                                            <option value="FIKOM"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FIKOM' ? 'selected' : '' }}>
                                                Fakultas Ilmu Komunikasi</option>
                                            <option value="FK"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FK' ? 'selected' : '' }}>
                                                Fakultas Kedokteran</option>
                                            <option value="FKG"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FKG' ? 'selected' : '' }}>
                                                Fakultas Kedokteran Gigi</option>
                                            <option value="FIK"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FIK' ? 'selected' : '' }}>
                                                Fakultas Ilmu Keperawatan</option>
                                            <option value="FF"
                                                {{ old('fakultas', $user->fakultas ?? '') == 'FF' ? 'selected' : '' }}>
                                                Fakultas Farmasi</option>
                                        </select>
                                    </div>
                                    <x-auth.input-error class="mt-2" :messages="$errors->get('fakultas')" />
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4">
                                <div class="flex items-center gap-4">
                                    <button type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-sky-600 border border-sky-500 rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2 focus:ring-offset-black transition ease-in-out duration-150 shadow-lg">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('Simpan Perubahan') }}
                                    </button>

                                    @if (session('status') === 'profile-updated')
                                        <div x-data="{ show: true }" x-show="show"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-90"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 transform scale-100"
                                            x-transition:leave-end="opacity-0 transform scale-90"
                                            x-init="setTimeout(() => show = false, 3000)"
                                            class="inline-flex items-center px-4 py-2 bg-green-100 border border-green-200 rounded-lg">
                                            <svg class="w-4 h-4 text-green-600 mr-2" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span
                                                class="text-sm font-medium text-green-800">{{ __('Berhasil disimpan!') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-black/50 backdrop-blur-sm shadow-xl rounded-2xl border border-gray-800 overflow-hidden">
                <div class="bg-green-600/20 border-b border-green-400/30 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-green-400/20 border border-green-400/30 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-white">
                                {{ __('Keamanan Password') }}
                            </h2>
                            <p class="text-gray-300 text-sm">
                                {{ __('Pastikan akun Anda menggunakan password yang panjang dan acak untuk tetap aman.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="p-6 sm:p-8">
                    <section>

                        <form method="post" action="{{ route('profile.password.update') }}" class="space-y-6">
                            @csrf
                            @method('patch')

                            <div class="space-y-6">
                                <div>
                                    <x-auth.input-label for="update_password_current_password" :value="__('Password Saat Ini')" />
                                    <div class="relative mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                </path>
                                            </svg>
                                        </div>
                                        <x-auth.text-input id="update_password_current_password"
                                            name="current_password" type="password"
                                            class="w-full h-12 px-4 py-3 pl-10 pr-12 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                            autocomplete="current-password" />
                                        <button type="button"
                                            onclick="togglePassword('update_password_current_password', this)"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg class="h-5 w-5 text-gray-400 hover:text-white transition-colors"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <x-auth.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-auth.input-label for="update_password_password" :value="__('Password Baru')" />
                                        <div class="relative mt-2">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <x-auth.text-input id="update_password_password" name="password"
                                                type="password"
                                                class="w-full h-12 px-4 py-3 pl-10 pr-12 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                                autocomplete="new-password" />
                                            <button type="button"
                                                onclick="togglePassword('update_password_password', this)"
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                <svg class="h-5 w-5 text-gray-400 hover:text-white transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <x-auth.input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-auth.input-label for="update_password_password_confirmation"
                                            :value="__('Konfirmasi Password')" />
                                        <div class="relative mt-2">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <x-auth.text-input id="update_password_password_confirmation"
                                                name="password_confirmation" type="password"
                                                class="w-full h-12 px-4 py-3 pl-10 pr-12 bg-black/40 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-400 transition duration-200"
                                                autocomplete="new-password" />
                                            <button type="button"
                                                onclick="togglePassword('update_password_password_confirmation', this)"
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                <svg class="h-5 w-5 text-gray-400 hover:text-white transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <x-auth.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4">
                                <div class="flex items-center gap-4">
                                    <button type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-green-600 border border-green-500 rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 focus:ring-offset-black transition ease-in-out duration-150 shadow-lg">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                            </path>
                                        </svg>
                                        {{ __('Update Password') }}
                                    </button>

                                    @if (session('status') === 'password-updated')
                                        <div x-data="{ show: true }" x-show="show"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-90"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 transform scale-100"
                                            x-transition:leave-end="opacity-0 transform scale-90"
                                            x-init="setTimeout(() => show = false, 3000)"
                                            class="inline-flex items-center px-4 py-2 bg-green-100 border border-green-200 rounded-lg">
                                            <svg class="w-4 h-4 text-green-600 mr-2" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span
                                                class="text-sm font-medium text-green-800">{{ __('Password berhasil diperbarui!') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Profile Tips -->
            <div class="bg-sky-600/10 border border-sky-400/30 rounded-2xl p-6">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div
                            class="w-10 h-10 bg-sky-400/20 border border-sky-400/30 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-white mb-2">Tips Keamanan</h3>
                        <ul class="text-sm text-gray-300 space-y-1">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-400 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Gunakan password minimal 8 karakter
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-400 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Kombinasikan huruf besar, kecil, angka, dan simbol
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-400 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Jangan gunakan informasi pribadi yang mudah ditebak
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const svg = button.querySelector('svg');

            if (input.type === 'password') {
                input.type = 'text';
                // Change to eye-slash icon (hidden)
                svg.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                input.type = 'password';
                // Change back to eye icon (visible)
                svg.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
    </script>
</x-app-layout>
