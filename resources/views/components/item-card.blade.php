@props(['name', 'count', 'icon', 'image', 'description', 'category'])

<div
    class="relative bg-black/50 backdrop-blur-sm border border-white/20 rounded-lg overflow-hidden shadow-sm hover:border-sky-300/50 transition duration-300 group">
    <!-- Siluet Effect -->
    <div
        class="absolute inset-0 bg-gradient-to-b from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>

    <!-- Glow Effect -->
    <div
        class="absolute inset-0 bg-gradient-to-r from-transparent via-sky-300/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>

    <!-- Content -->
    <div class="relative">
        <!-- Image -->
        <div class="w-full aspect-[4/3] overflow-hidden bg-black/30">
            <img src="{{ $image }}" alt="{{ $name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>

        <div class="px-5 pt-3 pb-6">
            <!-- Category -->
            <div class="mb-2">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-500/20 text-sky-300 border border-sky-500/30">
                    {{ $category }}
                </span>
            </div>

            <!-- Glow Divider -->
            <div
                class="my-1 h-px bg-gradient-to-r from-transparent via-sky-300/50 to-transparent transition-opacity duration-300">
            </div>

            <!-- Name and Stock -->
            <dl class="mb-1">
                <dt
                    class="text-xl font-bold text-gray-400 truncate group-hover:text-gray-300 transition-colors duration-300">
                    {{ $name }}
                </dt>
                <dd class="text-lg font-semibold text-white group-hover:text-sky-200 transition-colors duration-300">
                    Stok: {{ $count }}
                </dd>
            </dl>

            <!-- Description -->
            <p class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors duration-300">
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
