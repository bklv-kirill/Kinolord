<x-main-layout title="Фильмы">
    <div class="movies">
        @forelse($movies['docs'] ?? [] as $movie)
            <x-kinopoisk-card :kpData="$movie" />
        @empty
            <x-kinopoisk-empty-search/>
        @endforelse
    </div>

    <x-kinopoisk-pagination :page="$movies['page']" :pages="$movies['pages']" route="movie.index"/>
</x-main-layout>
