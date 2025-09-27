@props(['paginator'])

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex flex-1 items-center justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center rounded-md px-4 py-2 text-sm font-superline-line text-red-400 cursor-default leading-5">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center rounded-md px-4 py-2 text-sm font-superline-line text-red-300 hover:text-red-100 transition duration-150 ease-in-out leading-5 red-glow">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative ml-3 inline-flex items-center rounded-md px-4 py-2 text-sm font-superline-line text-red-300 hover:text-red-100 transition duration-150 ease-in-out leading-5 red-glow">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="relative ml-3 inline-flex items-center rounded-md px-4 py-2 text-sm font-superline-line text-red-400 cursor-default leading-5">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-center">
            <div>
                <span class="relative z-0 inline-flex rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-sm font-superline-line text-red-400 cursor-default rounded-l-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-superline-line text-red-300 hover:text-red-100 transition duration-150 ease-in-out rounded-l-md leading-5 red-glow"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $start = max($paginator->currentPage() - 2, 1);
                        $end = min($paginator->currentPage() + 2, $paginator->lastPage());
                    @endphp

                    {{-- First Page --}}
                    @if ($start > 1)
                        <a href="{{ $paginator->url(1) }}"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-superline-line text-red-300 hover:text-red-100 transition duration-150 ease-in-out leading-5 red-glow">
                            1
                        </a>
                        @if ($start > 2)
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-superline-line text-red-400 cursor-default leading-5">...</span>
                            </span>
                        @endif
                    @endif

                    {{-- Page Numbers --}}
                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-superline text-red-100 cursor-default leading-5 bg-red-gradient red-glow">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $paginator->url($page) }}"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-superline-line text-red-300 hover:text-red-100 transition duration-150 ease-in-out leading-5 red-glow">
                                {{ $page }}
                            </a>
                        @endif
                    @endfor

                    {{-- Last Page --}}
                    @if ($end < $paginator->lastPage())
                        @if ($end < $paginator->lastPage() - 1)
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-superline-line text-red-400 cursor-default leading-5">...</span>
                            </span>
                        @endif
                        <a href="{{ $paginator->url($paginator->lastPage()) }}"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-superline-line text-red-300 hover:text-red-100 transition duration-150 ease-in-out leading-5 red-glow">
                            {{ $paginator->lastPage() }}
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-superline-line text-red-300 hover:text-red-100 transition duration-150 ease-in-out rounded-r-md leading-5 red-glow"
                            aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-superline-line text-red-400 cursor-default rounded-r-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
