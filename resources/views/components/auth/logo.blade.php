<a href="{{ route('inventaris') }}" class="group">
    <div class="flex flex-col items-center space-y-4">
        <!-- Logo Image -->
        <div class="relative group-hover:scale-105 transition-transform duration-300">
            <div class="absolute -inset-3 bg-gradient-to-r from-red-500 to-red-700 rounded-full blur-lg opacity-40 group-hover:opacity-60 transition duration-300"></div>
            <div class="relative bg-white p-5 rounded-full shadow-2xl red-glow">
                <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI" class="w-20 h-20 object-contain red-glow">
            </div>
        </div>
        
        <!-- Text Logo -->
        <div class="text-center">
            <h1 class="text-4xl font-bold text-red-800 leading-tight font-superline drop-shadow-lg">
                Inventaris
                <span class="block text-red-600 mt-1 font-superline-line">
                    BEM FTI
                </span>
            </h1>
            <div class="w-20 h-1.5 bg-gradient-to-r from-red-500 via-red-600 to-red-700 rounded-full mx-auto mt-3 shadow-lg"></div>
        </div>
    </div>
</a>
