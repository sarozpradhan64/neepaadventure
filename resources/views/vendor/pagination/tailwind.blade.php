@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex w-full items-center justify-between">
        {{-- Mobile View --}}
        <div class="flex flex-1 justify-between sm:hidden gap-2">
            @if ($paginator->onFirstPage())
                <x-ui.button variant="outline" disabled>
                    {!! __('pagination.previous') !!}
                </x-ui.button>
            @else
                <x-ui.button variant="outline" href="{{ $paginator->previousPageUrl() }}">
                    {!! __('pagination.previous') !!}
                </x-ui.button>
            @endif

            @if ($paginator->hasMorePages())
                <x-ui.button variant="outline" href="{{ $paginator->nextPageUrl() }}">
                    {!! __('pagination.next') !!}
                </x-ui.button>
            @else
                <x-ui.button variant="outline" disabled>
                    {!! __('pagination.next') !!}
                </x-ui.button>
            @endif
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-muted-foreground">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium text-foreground">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium text-foreground">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium text-foreground">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="flex items-center gap-1">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li>
                            <x-ui.button variant="outline" size="icon" disabled class="h-8 w-8">
                                <x-lucide-chevron-left class="size-4" />
                            </x-ui.button>
                        </li>
                    @else
                        <li>
                            <x-ui.button variant="outline" size="icon" href="{{ $paginator->previousPageUrl() }}" rel="prev" class="h-8 w-8">
                                <x-lucide-chevron-left class="size-4" />
                            </x-ui.button>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>
                                <span class="flex h-8 w-8 items-center justify-center text-sm font-medium text-muted-foreground">
                                    <x-lucide-more-horizontal class="size-4" />
                                </span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li>
                                        <x-ui.button variant="default" size="icon" disabled class="h-8 w-8">
                                            {{ $page }}
                                        </x-ui.button>
                                    </li>
                                @else
                                    <li>
                                        <x-ui.button variant="outline" size="icon" href="{{ $url }}" class="h-8 w-8">
                                            {{ $page }}
                                        </x-ui.button>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <x-ui.button variant="outline" size="icon" href="{{ $paginator->nextPageUrl() }}" rel="next" class="h-8 w-8">
                                <x-lucide-chevron-right class="size-4" />
                            </x-ui.button>
                        </li>
                    @else
                        <li>
                            <x-ui.button variant="outline" size="icon" disabled class="h-8 w-8">
                                <x-lucide-chevron-right class="size-4" />
                            </x-ui.button>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
