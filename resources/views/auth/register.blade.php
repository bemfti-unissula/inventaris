<x-auth.layout title="Register Pages" header="Register" subheader="Create your account to get started.">
    <form action="{{ route('register.create') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Personal Information Section -->
        <div class="space-y-5">
            <x-auth.input type="text" name="name" id="name" label="Full Name/Organization Name" required />
            <x-auth.input type="email" name="email" id="email" label="Email" required />
            <x-auth.input type="tel" name="phone" id="phone" label="Nomor HP" required />
            
            <!-- Enhanced Fakultas Dropdown -->
            <div class="space-y-2">
                <label for="fakultas" class="block text-sm font-medium text-gray-200 font-poppins">Fakultas</label>
                <select name="fakultas" id="fakultas" required class="premium-input w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 bg-gradient-to-r from-gray-700/50 to-gray-600/50 text-gray-100 border border-gray-500/50 backdrop-blur-sm transition-all duration-300 hover:bg-gray-600/60 font-poppins">
                    <option value="" disabled selected hidden class="text-gray-400">Pilih Fakultas</option>
                    <option value="FTI" class="bg-gray-800 text-gray-100">Fakultas Teknologi Industri</option>
                    <option value="FE" class="bg-gray-800 text-gray-100">Fakultas Ekonomi</option>
                    <option value="FH" class="bg-gray-800 text-gray-100">Fakultas Hukum</option>
                    <option value="FAI" class="bg-gray-800 text-gray-100">Fakultas Agama Islam</option>
                    <option value="FP" class="bg-gray-800 text-gray-100">Fakultas Psikologi</option>
                    <option value="FKIP" class="bg-gray-800 text-gray-100">Fakultas Keguruan dan Ilmu Pendidikan</option>
                    <option value="FBSB" class="bg-gray-800 text-gray-100">Fakultas Bahasa, Sastra, dan Budaya</option>
                    <option value="FIKOM" class="bg-gray-800 text-gray-100">Fakultas Ilmu Komunikasi</option>
                    <option value="FK" class="bg-gray-800 text-gray-100">Fakultas Kedokteran</option>
                    <option value="FKG" class="bg-gray-800 text-gray-100">Fakultas Kedokteran Gigi</option>
                    <option value="FIK" class="bg-gray-800 text-gray-100">Fakultas Ilmu Keperawatan</option>
                    <option value="FT" class="bg-gray-800 text-gray-100">Fakultas Teknik</option>
                    <option value="FF" class="bg-gray-800 text-gray-100">Fakultas Farmasi</option>
                </select>
                @error('fakultas')
                    <p class="mt-2 text-sm text-rose-400 font-poppins">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Security Section -->
        <div class="space-y-5">
            <x-auth.input type="password" name="password" id="password" label="Password" required />
            <x-auth.input type="password" name="password_confirmation" id="password_confirmation" label="Konfirmasi Password" required />
        </div>

        <!-- Terms and Conditions -->
        <div class="flex items-start gap-3">
            <input type="checkbox" name="terms" id="terms" 
                class="w-4 h-4 mt-1 text-rose-500 bg-gray-700/50 border border-gray-500/50 rounded focus:ring-rose-500 focus:ring-2 focus:ring-offset-0 transition-all duration-200" required />
            <label for="terms" class="text-sm text-gray-300 font-poppins leading-relaxed">
                I agree to the <span class="text-rose-400 hover:text-rose-300 transition-colors">Terms and Conditions</span>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between gap-4 pt-2">
            <a href="{{ route('login.page') }}" 
                class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-gray-300 bg-transparent border border-gray-500/50 rounded-lg hover:bg-gray-600/20 hover:text-white hover:border-gray-400/70 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-0 transition-all duration-200 font-poppins backdrop-blur-sm">
                <i class="fas fa-sign-in-alt mr-2 text-xs"></i>
                Login
            </a>
            
            <button type="submit" 
                class="premium-button inline-flex items-center justify-center px-8 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-rose-600 via-rose-500 to-red-600 hover:from-rose-500 hover:via-rose-400 hover:to-red-500 rounded-lg shadow-lg hover:shadow-rose-500/25 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-0 transition-all duration-300 font-poppins transform hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden">
                <span class="relative z-10 flex items-center">
                    <i class="fas fa-user-plus mr-2 text-xs"></i>
                    Create Account
                </span>
            </button>
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

        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus states to form elements
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('scale-[1.01]');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('scale-[1.01]');
                });
            });
        });
    </script>
</x-auth.layout>
