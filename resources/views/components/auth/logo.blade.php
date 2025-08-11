<a href="{{ route('inventaris') }}" class="group">
    <div class="flex flex-col items-center space-y-4">
        <!-- Logo Image -->
        <div class="relative group-hover:scale-105 transition-transform duration-300">
            <div class="absolute -inset-2 bg-gradient-to-r from-red-400 to-red-600 rounded-full blur opacity-30 group-hover:opacity-50 transition duration-300"></div>
            <div class="relative bg-white p-4 rounded-full shadow-lg">
                <img src="{{ asset('images/Logo-BEM-FTI.png') }}" alt="Logo BEM FTI" class="w-16 h-16 object-contain">
            </div>
        </div>
        
        <!-- Text Logo -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-slate-900 leading-tight">
                Inventaris
                <span class="block text-red-600 mt-1">
                    BEM FTI
                </span>
            </h1>
            <div class="w-16 h-1 bg-gradient-to-r from-red-500 to-red-600 rounded-full mx-auto mt-2"></div>
        </div>
    </div>
</a>
