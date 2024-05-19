<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            {{-- Mobile --}}
            <div class="flex flex-col gap-3 w-full lg:hidden">
                <div class="flex justify-between">
                    <span>
                        @if ($paginator->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm text-neutral-500 bg-white border border-neutral-200 rounded-md select-none dark:bg-neutral-100 dark:border-neutral-300">
                                {!! __('pagination.previous') !!}
                            </span>
                        @else
                            <button type="button"
                                    wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                    wire:loading.attr="disabled"
                                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                                    class="relative inline-flex items-center px-4 py-2 text-sm text-neutral-800 bg-white border border-neutral-200 rounded-md hover:bg-gray-100 focus:border-gray-400 active:bg-gray-200 active:text-neutral-800 transition ease-in-out dark:bg-neutral-100 dark:border-neutral-300 dark:focus:border-gray-400 dark:text-neutral-800 dark:hover:bg-gray-200 dark:active:bg-gray-300">
                                {!! __('pagination.previous') !!}
                            </button>
                        @endif
                    </span>
                    <span>
                        @if ($paginator->hasMorePages())
                            <button type="button"
                                    wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                    wire:loading.attr="disabled"
                                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                                    class="relative inline-flex items-center px-4 py-2 text-sm text-neutral-800 bg-white border border-neutral-200 rounded-md hover:bg-gray-100 focus:border-gray-400 active:bg-gray-200 active:text-neutral-800 transition ease-in-out dark:bg-neutral-100 dark:border-neutral-300 dark:focus:border-gray-400 dark:text-neutral-800 dark:hover:bg-gray-200 dark:active:bg-gray-300">
                                {!! __('pagination.next') !!}
                            </button>
                        @else
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm text-neutral-500 bg-white border border-neutral-200 rounded-md select-none dark:bg-neutral-100 dark:border-neutral-300">
                                {!! __('pagination.next') !!}
                            </span>
                        @endif
                    </span>
                </div>
            </div>

            {{-- Desktop --}}
            <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-between">
                <p class="text-sm text-neutral-800 dark:text-neutral-400">
                    <span>{!! __('Showing') !!}</span>
                    <span class="font-bold">{{ $paginator->firstItem() }}</span>
                    <span>{!! __('to') !!}</span>
                    <span class="font-bold">{{ $paginator->lastItem() }}</span>
                    <span>{!! __('of') !!}</span>
                    <span class="font-bold">{{ $paginator->total() }}</span>
                    <span>{!! __('results') !!}</span>
                </p>

                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 text-sm text-neutral-500 bg-white border border-neutral-200 rounded-l-md dark:bg-neutral-100 dark:border-neutral-300"
                                        aria-hidden="true">
                                        <!-- Icon "chevron-left" (outline) from https://heroicons.com -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button type="button"
                                        wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                        rel="prev"
                                        class="relative inline-flex items-center px-2 py-2 text-sm text-neutral-800 bg-white border border-neutral-200 rounded-l-md hover:bg-gray-100 focus:z-10 focus:border-gray-400 active:bg-gray-200 active:text-neutral-800 transition ease-in-out dark:bg-neutral-100 dark:border-neutral-300 dark:focus:border-gray-400 dark:text-neutral-800 dark:hover:bg-gray-200 dark:active:bg-gray-300"
                                        aria-label="@lang('pagination.previous')">
                                    <!-- Icon "chevron-left" (outline) from https://heroicons.com -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                    </svg>
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm text-neutral-800 bg-white border border-neutral-200 select-none dark:bg-neutral-100 dark:border-neutral-300 dark:text-neutral-800">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm text-neutral-500 bg-neutral-100 border border-neutral-200 select-none dark:bg-neutral-300 dark:border-neutral-300 dark:text-neutral-400">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button type="button"
                                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm text-neutral-800 bg-white border border-neutral-200 hover:bg-gray-100 focus:z-10 focus:border-gray-400 active:bg-gray-200 active:text-neutral-800 transition ease-in-out dark:bg-neutral-100 dark:border-neutral-300 dark:focus:border-gray-400 dark:text-neutral-800 dark:hover:bg-gray-200 dark:active:bg-gray-300"
                                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button type="button"
                                        wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                        rel="next"
                                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm text-neutral-800 bg-white border border-neutral-200 rounded-r-md hover:bg-gray-100 focus:z-10 focus:border-gray-400 active:bg-gray-200 active:text-neutral-800 transition ease-in-out dark:bg-neutral-100 dark:border-neutral-300 dark:focus:border-gray-400 dark:text-neutral-800 dark:hover:bg-gray-200 dark:active:bg-gray-300"
                                        aria-label="@lang('pagination.next')">
                                    <!-- Icon "chevron-right" (outline) from https://heroicons.com -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm text-neutral-500 bg-white border border-neutral-200 rounded-r-md dark:bg-neutral-100 dark:border-neutral-300"
                                        aria-hidden="true">
                                        <!-- Icon "chevron-right" (outline) from https://heroicons.com -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
