<x-auth.layout title="Reset Password" header="Reset Password" subheader="Enter your new password below">

    <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
        @csrf
        <input type="hidden" name="token" value="{{ request('token') }}">

        <!-- Enhanced Info Section -->
        <div class="text-center space-y-4">
            <!-- Premium Lock Icon -->
            <div
                class="mx-auto w-16 h-16 bg-gradient-to-br from-rose-500/20 to-red-600/20 border border-rose-500/30 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm">
                <svg class="w-8 h-8 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                    </path>
                </svg>
            </div>
            <p class="text-sm text-gray-300 leading-relaxed font-poppins">
                Please enter your new password. Make sure it's strong and secure for your account protection.
            </p>
        </div>

        <!-- Password Section -->
        <div class="space-y-5">
            <x-auth.input type="password" name="password" id="password" label="New Password" required />
            <x-auth.input type="password" name="password_confirmation" id="password_confirmation"
                label="Confirm New Password" required />
        </div>

        <!-- Security Tips -->
        <div
            class="bg-gradient-to-br from-blue-900/20 via-indigo-900/15 to-purple-900/20 border border-blue-500/20 rounded-xl p-5 backdrop-blur-sm relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 w-20 h-20 bg-blue-500/5 rounded-full -translate-y-10 translate-x-10">
            </div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-purple-500/5 rounded-full translate-y-8 -translate-x-8">
            </div>

            <div class="relative z-10">
                <div class="flex items-center mb-4">
                    <div
                        class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-lg mr-3 border border-blue-400/30">
                        <i class="fas fa-shield-alt text-blue-400 text-sm"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-200 font-poppins">Tips Keamanan Password</h4>
                </div>

                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <div
                            class="flex items-center justify-center w-5 h-5 bg-emerald-500/20 rounded-full border border-emerald-400/30 flex-shrink-0 mt-0.5">
                            <i class="fas fa-check text-emerald-400 text-xs"></i>
                        </div>
                        <div class="text-xs text-gray-300 font-poppins">
                            <span class="font-medium text-gray-200">Minimal 8 karakter</span> - Gunakan kombinasi
                            panjang untuk keamanan maksimal
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div
                            class="flex items-center justify-center w-5 h-5 bg-emerald-500/20 rounded-full border border-emerald-400/30 flex-shrink-0 mt-0.5">
                            <i class="fas fa-check text-emerald-400 text-xs"></i>
                        </div>
                        <div class="text-xs text-gray-300 font-poppins">
                            <span class="font-medium text-gray-200">Huruf besar & kecil</span> - Kombinasi case
                            meningkatkan kekuatan password
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div
                            class="flex items-center justify-center w-5 h-5 bg-emerald-500/20 rounded-full border border-emerald-400/30 flex-shrink-0 mt-0.5">
                            <i class="fas fa-check text-emerald-400 text-xs"></i>
                        </div>
                        <div class="text-xs text-gray-300 font-poppins">
                            <span class="font-medium text-gray-200">Sertakan angka</span> - Tambahkan setidaknya satu
                            digit numerik
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div
                            class="flex items-center justify-center w-5 h-5 bg-amber-500/20 rounded-full border border-amber-400/30 flex-shrink-0 mt-0.5">
                            <i class="fas fa-lightbulb text-amber-400 text-xs"></i>
                        </div>
                        <div class="text-xs text-gray-300 font-poppins">
                            <span class="font-medium text-gray-200">Hindari info pribadi</span> - Jangan gunakan nama,
                            tanggal lahir, atau data mudah ditebak
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between gap-4 pt-2">
            <a href="{{ route('login.page') }}"
                class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-gray-300 bg-transparent border border-gray-500/50 rounded-lg hover:bg-gray-600/20 hover:text-white hover:border-gray-400/70 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-0 transition-all duration-200 font-poppins backdrop-blur-sm">
                <i class="fas fa-arrow-left mr-2 text-xs"></i>
                Back to Login
            </a>

            <button type="submit"
                class="premium-button inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-rose-600 via-rose-500 to-red-600 hover:from-rose-500 hover:via-rose-400 hover:to-red-500 rounded-lg shadow-lg hover:shadow-rose-500/25 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-0 transition-all duration-300 font-poppins transform hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden">
                <span class="relative z-10 flex items-center">
                    <i class="fas fa-key mr-2 text-xs"></i>
                    Update Password
                </span>
            </button>
        </div>
    </form>

    <!-- Enhanced Footer -->
    <div class="mt-8 text-center">
        <div class="flex items-center justify-center space-x-2 text-sm text-gray-400 font-poppins">
            <i class="fas fa-info-circle text-xs text-rose-400"></i>
            <span>Remember your password?</span>
            <a href="{{ route('login.page') }}"
                class="text-rose-400 hover:text-rose-300 font-medium transition-colors duration-200 ml-1">
                Sign in here
            </a>
        </div>
    </div>
</x-auth.layout>
