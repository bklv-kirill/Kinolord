<div class="pagination">
    @if($page === 1 && $pages === 1)
        <a href="{{ route($route, ['page' => 1, ...$queryParams]) }}">
            <div class="page">
                <span>{{ 1 }}</span>
            </div>
        </a>
        <div class="more">
            ...
        </div>
    @else
        @if($pages <= 4)
            @for($iPage = 1; $iPage < $pages + 1; $iPage++)
                <a href="{{ route($route, ['page' => $iPage, ...$queryParams]) }}">
                    <div @class(['page', 'current-page' => $iPage === $page])>
                        <span>{{ $iPage }}</span>
                    </div>
                </a>
            @endfor
        @else
            @if($page > 3)
                <a href="{{ route($route, ['page' => 1, ...$queryParams]) }}">
                    <div class="page">
                        <span>{{ 1 }}</span>
                    </div>
                </a>
                <div class="more">
                    ...
                </div>
            @endif

            @php
                $firstStep = $page === 1 ? 0 : ($page === $pages ? 3 : ($page > 2 ? 2 : 1));
                $secondStep = $page === 1 ? 4 : ($page === $pages ? 1 : ($pages - $page !== 1 ? 3 : 2));
            @endphp
            @for($iPage = $page - $firstStep; $iPage < $page + $secondStep; $iPage++)
                <a href="{{ route($route, ['page' => $iPage, ...$queryParams]) }}">
                    <div @class(['page', 'current-page' => $iPage === $page])>
                        <span>{{ $iPage }}</span>
                    </div>
                </a>
            @endfor

            @if($page < $pages - 2)
                <div class="more">
                    ...
                </div>
                <a href="{{ route($route, ['page' => $pages, ...$queryParams]) }}">
                    <div class="page">
                        <span>{{ $pages }}</span>
                    </div>
                </a>
            @endif
        @endif
    @endif
</div>
