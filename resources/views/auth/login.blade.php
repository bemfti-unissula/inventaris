<x-auth.layout title="Login Pages" header="Login" subheader="Welcome back, enter your credentials to continue.">
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

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <x-auth.input type="email" name="email" id="email" label="Email" required />
        <x-auth.input type="password" name="password" id="password" label="Password" required />

        <!-- Remember Me dan Forgot Password -->
        <div class="mt-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember"
                    class="outline-none focus:outline focus:outline-sky-300" />
                <label for="remember" class="text-xs">Remember me</label>
            </div>
            <a href="{{ route('password.request') }}" class="text-xs hover:text-sky-300">Forgot password?</a>
        </div>

        <!-- Tombol Register dan Login -->
        <div class="mt-4 flex items-center justify-end gap-x-2">
            <a class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:ring hover:ring-white h-10 px-4 py-2 duration-200"
                href="{{ route('register') }}">Register</a>
            <button
                class="font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2"
                type="submit">Log in</button>
        </div>
    </form>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(`eye-icon-${inputId}`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('text-gray-400');
                eyeIcon.classList.add('text-white');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('text-white');
                eyeIcon.classList.add('text-gray-400');
            }
        }
    </script>
</x-auth.layout>
