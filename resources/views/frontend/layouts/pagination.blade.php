@if ($paginator->hasPages())
    <nav
        aria-label=""
        class="d-flex justify-content-center align-items-center"
    >
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a type="button" disabled class="page-link"><i class="fas fa-arrow-circle-left"></i></a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="fas fa-arrow-circle-left"></i></a>
                </li>
            @endif



            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a type="button" disabled class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                              <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
            @else
                    <li class="page-item disabled">
                        <a class="page-link" type="button" disabled>
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
            @endif
        </ul>
    </nav>
@endif
