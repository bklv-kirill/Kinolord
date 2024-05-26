<header class="main-header">
    <span><a href="{{ route('main') }}">Fenix Cinema</a></span>
    <ul>
        <li @class(['active-page' => request()->routeIs('movie.index')])><a href="{{ route('movie.index') }}">Фильмы</a></li>
        <li @class(['active-page' => request()->routeIs('series.index')])><a href="{{ route('series.index') }}">Сериалы</a></li>
        <li @class(['active-page' => request()->routeIs('anime.index')])><a href="{{ route('anime.index') }}">Аниме</a></li>
    </ul>
    <button class="search"><img src="/images/search.svg" alt="search"></button>
</header>
