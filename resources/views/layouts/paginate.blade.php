@if ($paginator->hasPages())
    <ul class="pagination pagination-sm m-0">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item"><span class="page-link" style="color: #0c0c0c">Previous</span></li>
        @else
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item"><span class="page-link" style="color: #0c0c0c">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">Next</a></li>
        @else
            <li class="page-item"><span class="page-link" style="color: #0c0c0c">Next</span></li>
        @endif
    </ul>
@endif