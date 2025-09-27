<x-auth.layout title="Email Verification" header="Check Your Email"
    subheader="We've sent a verification link to your email address">

    <div class="text-center space-y-6">
        <!-- Email Icon -->
        <div class="mx-auto w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>

        <!-- Success Message -->
        <div class="space-y-2">
            <h3 class="text-lg font-semibold text-gray-900">Email Verification Sent!</h3>
            <p class="text-sm text-gray-600 max-w-md mx-auto">
                We've sent a verification email to
                @if (session('email'))
                    <span class="font-medium text-red-600">{{ session('email') }}</span>
                @else
                    your email address
                @endif
            </p>
        </div>

        <!-- Instructions -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-left">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h4 class="text-sm font-medium text-yellow-800">Important:</h4>
                    <ul class="mt-2 text-sm text-yellow-700 space-y-1">
                        <li>• Check your email inbox for the verification link</li>
                        <li>• <strong>Don't forget to check your SPAM folder</strong> if you don't see the email</li>
                        <li>• The verification link will expire in <strong>30 minutes</strong></li>
                        <li>• Click the link in the email to activate your account</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Resend Email Link -->
        <div class="border-t pt-6">
            <div class="text-center">
                <p class="text-sm text-gray-600 mb-3">Didn't receive the email?</p>
                <a href="{{ route('email.resend', ['email' => session('email')]) }}"
                    class="text-sm text-red-600 hover:text-red-800 font-medium transition-colors duration-200 underline">
                    Click here to resend verification email
                </a>
            </div>
        </div>

        <!-- Back to Login -->
        <div class="text-center pt-4">
            <a href="{{ route('login.page') }}"
                class="text-sm text-red-600 hover:text-red-800 font-medium transition-colors duration-200">
                ← Back to Login
            </a>
        </div>
    </div>

    @if (session('success'))
        <x-auth.alert type="success">
            {{ session('success') }}
        </x-auth.alert>
    @endif

    @if (session('error'))
        <x-auth.alert type="error">
            {{ session('error') }}
        </x-auth.alert>
    @endif

    @if (session('info'))
        <x-auth.alert type="info">
            {{ session('info') }}
        </x-auth.alert>
    @endif

</x-auth.layout>
