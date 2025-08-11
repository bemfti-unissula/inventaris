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

    <form action="{{ route('login') }}" method="POST" class="space-y-2">
        @csrf
        
        <!-- Input Fields -->
        <div class="space-y-1">
            <x-auth.input type="email" name="email" id="email" label="Email" required />
            <x-auth.input type="password" name="password" id="password" label="Password" required />
        </div>

        <!-- Remember Me and Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember"
                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 focus:ring-2" />
                <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>
            <a href="{{ route('password.request') }}" class="text-sm text-red-600 hover:text-red-500">Forgot password?</a>
        </div>

        <!-- Login Button -->
        <div class="pt-1">
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                Sign In
            </button>
        </div>

        <!-- Register Link -->
        <div class="text-center pt-2 border-t border-gray-200">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-red-600 hover:text-red-500 font-medium ml-1">
                    Register here
                </a>
            </p>
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
