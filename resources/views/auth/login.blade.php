<x-auth.layout title="Login" header="Sign In" subheader="Enter your credentials to access your account">
    @if (session('success'))
        <x-auth.alert type="success">
            {{ session('success') }}
        </x-auth.alert>
    @endif

    @if (session('status'))
        <x-auth.alert type="success">
            {{ session('status') }}
        </x-auth.alert>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Input Fields Section -->
        <div class="space-y-5">
            <x-auth.input type="email" name="email" id="email" label="Email Address" required />
            <x-auth.input type="password" name="password" id="password" label="Password" required />
        </div>

        <!-- Remember Me and Forgot Password Row -->
        <div class="flex items-center justify-between pt-1">
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember"
                    class="w-4 h-4 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2 transition-all duration-200" />
                <label for="remember"
                    class="ml-3 text-sm text-gray-300 font-poppins font-medium select-none cursor-pointer hover:text-gray-200 transition-colors duration-200">
                    Remember me
                </label>
            </div>
            <a href="{{ route('password.request') }}"
                class="text-sm text-red-400 hover:text-red-300 font-poppins font-medium transition-colors duration-200 hover:underline">
                Forgot password?
            </a>
        </div>

        <!-- Login Button Section -->
        <div class="pt-2">
            <button type="submit"
                class="premium-button w-full text-white font-semibold py-3.5 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-800 font-poppins shadow-xl transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]">
                <div class="flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span>Sign In</span>
                </div>
            </button>
        </div>

        <!-- Register Link Section -->
        <div class="text-center pt-4 mt-6 border-t border-gray-700/70">
            <p class="text-sm text-gray-400 font-poppins">
                Don't have an account?
            </p>
            <a href="{{ route('register') }}"
                class="inline-block mt-1 text-red-400 hover:text-red-300 font-medium font-poppins transition-all duration-200 hover:underline">
                Create your account here
            </a>
        </div>
    </form>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(`eye-icon-${inputId}`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('text-gray-400');
                eyeIcon.classList.add('text-red-500');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('text-red-500');
                eyeIcon.classList.add('text-gray-400');
            }
        }
    </script>
</x-auth.layout>
