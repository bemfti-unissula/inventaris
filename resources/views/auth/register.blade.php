<x-auth.layout title="Register Pages" header="Register" subheader="Create your account to get started.">
    <form action="{{ route('register.create') }}" method="POST">
        @csrf
        <x-auth.input type="text" name="name" id="name" label="Full Name/Organization Name" required />
        <x-auth.input type="email" name="email" id="email" label="Email" required />
        <x-auth.input type="tel" name="phone" id="phone" label="Nomor HP" required />
        <!-- Dropdown Fakultas -->
        <div class="input-container">
            <select name="fakultas" id="fakultas" required class="input-field">
                <option value="" disabled selected hidden></option>
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
            <label for="fakultas" class="input-label">Fakultas</label>
        </div>
        <x-auth.input type="password" name="password" id="password" label="Password" required />
        <x-auth.input type="password" name="password_confirmation" id="password_confirmation"
            label="Konfirmasi Password" required />

        <!-- Terms and Conditions -->
        <div class="mt-4 flex items-center gap-2">
            <input type="checkbox" name="terms" id="terms"
                class="outline-none focus:outline focus:outline-sky-300" required />
            <label for="terms" class="text-xs">I agree to the Terms and Conditions</label>
        </div>

        <!-- Tombol Register dan Login -->
        <div class="mt-4 flex items-center justify-end gap-x-2">
            <a class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:ring hover:ring-white h-10 px-4 py-2 duration-200"
                href="{{ route('login.page') }}">Login</a>
            <button
                class="font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2"
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
