<x-auth.layout title="Reset Password" header="Reset Password" subheader="Enter your email and new password to reset.">
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <x-auth.input type="email" name="email" id="email" label="Email" required />
        <x-auth.input type="password" name="password" id="password" label="New Password" required />
        <x-auth.input type="password" name="password_confirmation" id="password_confirmation"
            label="Confirm New Password" required />

        <!-- Tombol Reset Password -->
        <div class="mt-4 flex items-center justify-end gap-x-2">
            <a class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:ring hover:ring-white h-10 px-4 py-2 duration-200"
                href="{{ route('login.page') }}">Back to Login</a>
            <button
                class="font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2"
                type="submit">Reset Password</button>
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
