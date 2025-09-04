@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Anterior --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Anterior</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a>
            </li>
        @endif

        {{-- Páginas --}}
        @foreach ($elements as $element)
            {{-- Separador "..." --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array de páginas --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Próxima --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Próxima</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Próxima</span>
            </li>
        @endif
    </ul>
@endif
