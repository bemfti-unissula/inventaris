@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<div
    class="relative bg-gradient-to-br from-red-900/20 to-red-800/10 backdrop-blur-sm border border-red-300/30 rounded-lg overflow-hidden shadow-sm hover:border-red-400/50 transition duration-300 group red-glow">
    <!-- Siluet Effect -->
    <div
        class="absolute inset-0 bg-gradient-to-b from-red-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>

    <!-- Glow Effect -->
    <div
        class="absolute inset-0 bg-gradient-to-r from-transparent via-red-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>

    <!-- Content -->
    <div class="relative">
        <!-- Image -->
        <div class="w-full aspect-[4/3] overflow-hidden bg-red-900/20 border border-red-300/20 red-glow">
            <img src="{{ $image }}" alt="{{ $name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>

        <div class="px-5 pt-3 pb-6">
            <!-- Category -->
            <div class="mb-2">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-superline-line bg-red-500/20 text-red-300 border border-red-500/30 red-glow">
                    {{ $category }}
                </span>
            </div>

            <!-- Glow Divider -->
            <div
                class="my-1 h-px bg-gradient-to-r from-transparent via-red-400/50 to-transparent transition-opacity duration-300">
            </div>

            <!-- Name and Stock -->
            <dl class="mb-1">
                <dt
                    class="text-xl font-superline text-red-100 truncate group-hover:text-red-200 transition-colors duration-300 drop-shadow-lg">
                    {{ $name }}
                </dt>
                <dd class="text-lg font-superline-line text-red-300 group-hover:text-red-200 transition-colors duration-300">
                    Stok: {{ $count }}
                </dd>
            </dl>

            <!-- Description -->
            <p class="text-sm text-red-400 group-hover:text-red-300 transition-colors duration-300 font-superline-line">
                <span class="description-text">{{ $description }}</span>
            </p>
        </div>
    </div>
</div>

<style>
    .description-text {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        word-wrap: break-word;
    }
</style>
