<x-auth.layout title="Register Pages" header="Register" subheader="Create your account to get started.">
    <form action="{{ route('register.create') }}" method="POST">
        @csrf
        <x-auth.input type="text" name="name" id="name" label="Full Name/Organization Name" required />
        <x-auth.input type="email" name="email" id="email" label="Email" required />
        <x-auth.input type="tel" name="phone" id="phone" label="Nomor HP" required />
        <!-- Dropdown Fakultas -->
        <div class="mb-4">
            <label for="fakultas" class="block text-sm font-medium text-red-700 mb-2 font-poppins">Fakultas</label>
            <select name="fakultas" id="fakultas" required class="w-full px-4 py-3 border border-red-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 bg-white/90 text-red-900 red-glow transition-all duration-200">
                <option value="" disabled selected hidden>Pilih Fakultas</option>
                <option value="FTI">Fakultas Teknologi Industri</option>
                <option value="FE">Fakultas Ekonomi</option>
                <option value="FH">Fakultas Hukum</option>
                <option value="FAI">Fakultas Agama Islam</option>
                <option value="FP">Fakultas Psikologi</option>
                <option value="FKIP">Fakultas Keguruan dan Ilmu Pendidikan</option>
                <option value="FBSB">Fakultas Bahasa, Sastra, dan Budaya</option>
                <option value="FIKOM">Fakultas Ilmu Komunikasi</option>
                <option value="FK">Fakultas Kedokteran</option>
                <option value="FKG">Fakultas Kedokteran Gigi</option>
                <option value="FIK">Fakultas Ilmu Keperawatan</option>
                <option value="FT">Fakultas Teknik</option>
                <option value="FF">Fakultas Farmasi</option>
            </select>
            @error('fakultas')
                <p class="mt-2 text-sm text-red-600 font-poppins">{{ $message }}</p>
            @enderror
        </div>
        <x-auth.input type="password" name="password" id="password" label="Password" required />
        <x-auth.input type="password" name="password_confirmation" id="password_confirmation"
            label="Konfirmasi Password" required />

        <!-- Terms and Conditions -->
        <div class="mt-4 flex items-center gap-2">
            <input type="checkbox" name="terms" id="terms"
                class="w-4 h-4 text-red-600 bg-red-50 border-red-300 rounded focus:ring-red-500 focus:ring-2 red-glow" required />
            <label for="terms" class="text-sm text-red-700 font-poppins">I agree to the Terms and Conditions</label>
        </div>

        <!-- Tombol Register dan Login -->
        <div class="mt-6 flex items-center justify-between gap-x-4">
            <a class="inline-flex items-center justify-center rounded-lg text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-red-50 text-red-600 border border-red-300 h-10 px-6 py-2 duration-200 font-poppins red-glow"
                href="{{ route('login.page') }}">Login</a>
            <button
                class="font-semibold bg-red-gradient hover:bg-red-700 text-white transition duration-300 inline-flex items-center justify-center rounded-lg text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-6 py-2 font-poppins red-glow shadow-lg hover:shadow-red-500/25"
                type="submit">Register</button>
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

        // Handle floating label for select dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const fakultasSelect = document.getElementById('fakultas');
            const fakultasLabel = document.querySelector('label[for="fakultas"]');

            function updateLabel() {
                if (fakultasSelect.value !== '') {
                    fakultasLabel.style.top = '10px';
                    fakultasLabel.style.fontSize = '12px';
                    fakultasLabel.style.color = 'gray';
                } else {
                    fakultasLabel.style.top = '50%';
                    fakultasLabel.style.fontSize = '14px';
                    fakultasLabel.style.color = '#A9A9A9';
                }
            }

            fakultasSelect.addEventListener('change', updateLabel);
            fakultasSelect.addEventListener('focus', function() {
                fakultasLabel.style.top = '10px';
                fakultasLabel.style.fontSize = '12px';
                fakultasLabel.style.color = 'gray';
            });

            fakultasSelect.addEventListener('blur', updateLabel);

            // Initial check
            updateLabel();
        });
    </script>
</x-auth.layout>
