<x-auth.layout title="Reset Password" header="Reset Password" subheader="Enter your new password below">

    @if (session('error'))
        <x-auth.alert type="error">
            {{ session('error') }}
        </x-auth.alert>
    @endif

    <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ request('token') }}">

        <div class="text-center mb-6">
            <!-- Lock Icon -->
            <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                    </path>
                </svg>
            </div>
            <p class="text-sm text-gray-600">
                Please enter your new password. Make sure it's strong and secure.
            </p>
        </div>

        <x-auth.input type="password" name="password" id="password" label="New Password" required />
        <x-auth.input type="password" name="password_confirmation" id="password_confirmation"
            label="Confirm New Password" required />

        <!-- Tombol Reset Password -->
        <div class="mt-6 flex items-center justify-between gap-x-2">
            <a class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:ring hover:ring-white h-10 px-4 py-2 duration-200 text-red-600 hover:text-red-800"
                href="{{ route('login.page') }}">← Back to Login</a>
            <button
                class="font-semibold hover:bg-red-700 hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-red-600 text-white h-10 px-6 py-2"
                type="submit">Reset Password</button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Remember your password?
            <a href="{{ route('login.page') }}" class="text-red-600 hover:text-red-800 font-medium">Sign in here</a>
        </p>
    </div>
</x-auth.layout>
