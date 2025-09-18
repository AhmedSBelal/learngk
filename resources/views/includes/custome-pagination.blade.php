@if($paginator->hasPages())
    <ul class="pagination-items text-center">

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="javascript:void(0)" class="disabled">
                    <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                </a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a aria-current="page" class="active" href="#">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

    </ul>
@endif
