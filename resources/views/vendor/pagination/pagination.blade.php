@if ($paginator->hasPages())
    <nav>
        <ul class="pagination d-flex flex-wrap gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">‹ Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">‹ Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
            @endphp

            @foreach ($elements as $element)
                {{-- Show "..." separator for long page lists --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                {{-- Show page numbers intelligently --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $currentPage)
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @elseif ($page == 1 || $page == $lastPage || abs($currentPage - $page) <= 1)
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == 2 || $page == $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next ›</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Next ›</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
