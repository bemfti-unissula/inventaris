<x-auth.layout title="Forgot Password" header="Forgot Password"
    subheader="Enter your email address and we'll send you a reset link.">

    <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Enhanced Info Section -->
        <div class="text-center space-y-4">
            <!-- Premium Email Icon -->
            <div class="mx-auto w-16 h-16 bg-gradient-to-br from-rose-500/20 to-red-600/20 border border-rose-500/30 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm">
                <svg class="w-8 h-8 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <p class="text-sm text-gray-300 leading-relaxed font-poppins">
                Don't worry! Enter your email address below and we'll send you a secure link to reset your password.
            </p>
        </div>

        <!-- Email Input -->
        <div class="space-y-2">
            <x-auth.input type="email" name="email" id="email" label="Email Address" required />
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
                    <i class="fas fa-paper-plane mr-2 text-xs"></i>
                    Send Reset Link
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
