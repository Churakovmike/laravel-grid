@php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $paginator
 * @var array[] $elements
 */
@endphp

@if ($paginator->hasPages())
    <nav aria-label="easy grid pagination">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ url()->current() . '/?page=' .  ($paginator->currentPage() - 1) }}">&laquo;</a></li>
            @endif
            @foreach($elements as $key => $element)
                @if (is_array($element))
                    @foreach($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ url()->current() . $url }}">{{ $page }}</a></li>
                            @endif
                    @endforeach
                @elseif(is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ (new \ChurakovMike\EasyGrid\Helpers\PaginationHelper($paginator))->getNextUrl() }}">&raquo;</a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
            @endif
        </ul>
    </nav>
    <div class="clearfix"></div>
@endif
