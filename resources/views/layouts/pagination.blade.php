@if ($paginator->hasPages())
    <div class="pagination">
        @if ($paginator->onFirstPage())
           <a href="#" disabled>&laquo;</a>
        @else
        <a class="active-page" href="{{$paginator->previousPageUrl()}}">&laquo;</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <a href="">{{$elemet}}</a>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="{{$url}}">{{$page}}</a>
                    @else
                        <a class="active-page" href="#">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{$paginator->nextPageUrl()}}" disabled>&laquo;</a>
        @else
            <a href="#">&laquo;</a>
        @endif

        
    </div>
@endif

