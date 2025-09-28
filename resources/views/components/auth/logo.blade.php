<a href="{{ route('inventaris') }}" class="group">
    <div class="flex flex-col items-center space-y-6">
        <!-- Logo Image with Dark Theme -->
        <div class="relative group-hover:scale-105 transition-transform duration-300">
            <div
                class="absolute -inset-4 bg-gradient-to-r from-red-600/20 to-red-700/20 rounded-full blur-xl opacity-60 group-hover:opacity-80 transition duration-300">
            </div>
            <div
                class="relative bg-gray-800/90 backdrop-blur-sm p-6 rounded-full shadow-2xl border border-gray-700/50 dark-glow">
                <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI" class="w-20 h-20 object-contain">
            </div>
        </div>

        <!-- Text Logo with Dark Theme -->
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white leading-tight font-poppins drop-shadow-lg">
                Inventaris
                <span
                    class="block bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent mt-1 font-poppins">
                    BEM FTI
                </span>
            </h1>
            <div
                class="w-20 h-1.5 bg-gradient-to-r from-red-500 via-red-600 to-red-700 rounded-full mx-auto mt-4 shadow-lg">
            </div>
        </div>
    </div>
</a>
