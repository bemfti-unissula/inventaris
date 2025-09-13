{{-- Grid View Skeleton --}}
<div id="gridViewSkeleton" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
    @for ($i = 0; $i < 8; $i++)
        <div class="animate-pulse">
            <div class="bg-gradient-to-br from-red-900/20 to-red-800/10 backdrop-blur-sm rounded-xl border border-red-300/30 p-6 shadow-lg red-glow">
                {{-- Image Placeholder --}}
                <div class="w-full h-48 rounded-lg bg-red-800/20 mb-4 red-glow"></div>

                {{-- Title Placeholder --}}
                <div class="h-6 bg-red-700/30 rounded mb-2"></div>

                {{-- Description Placeholder --}}
                <div class="space-y-2 mb-3">
                    <div class="h-4 bg-red-600/20 rounded"></div>
                    <div class="h-4 bg-red-600/20 rounded w-3/4"></div>
                </div>

                {{-- Category and Stock Placeholder --}}
                <div class="flex items-center justify-between mb-3">
                    <div class="h-6 bg-red-500/30 rounded-full w-20"></div>
                    <div class="h-4 bg-red-600/20 rounded w-16"></div>
                </div>

                {{-- Footer Placeholder --}}
                <div class="mt-4 flex items-center justify-between">
                    <div class="h-3 bg-red-600/20 rounded w-24"></div>
                    <div class="w-4 h-4 bg-red-600/20 rounded"></div>
                </div>
            </div>
        </div>
    @endfor
</div>

{{-- List View Skeleton --}}
<div id="listViewSkeleton" class="hidden space-y-4 mb-8">
    @for ($i = 0; $i < 6; $i++)
        <div class="animate-pulse">
            <div class="bg-gradient-to-br from-red-900/20 to-red-800/10 backdrop-blur-sm rounded-xl border border-red-300/30 p-6 shadow-lg red-glow">
                <div class="flex items-center gap-6">
                    {{-- Image Placeholder --}}
                    <div class="w-20 h-20 rounded-lg bg-red-800/20 flex-shrink-0 red-glow"></div>

                    {{-- Content Placeholder --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                {{-- Title --}}
                                <div class="h-6 bg-red-700/30 rounded mb-2 w-3/4"></div>

                                {{-- Description --}}
                                <div class="h-4 bg-red-600/20 rounded mb-2 w-full"></div>

                                {{-- Category and Stock --}}
                                <div class="flex items-center gap-4">
                                    <div class="h-5 bg-red-500/30 rounded-full w-16"></div>
                                    <div class="h-4 bg-red-600/20 rounded w-12"></div>
                                </div>
                            </div>

                            {{-- Arrow Placeholder --}}
                            <div class="ml-4 flex-shrink-0">
                                <div class="w-5 h-5 bg-red-600/20 rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
