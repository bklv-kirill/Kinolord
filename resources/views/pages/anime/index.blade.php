<x-main-layout title="Аниме">
    <div class="anime">
        @forelse($anime['docs'] as $animeItem)
            <x-kinopoisk-card :kpData="$animeItem"/>
        @empty
        @endforelse
    </div>

    <x-kinopoisk-pagination :page="$anime['page']" :pages="$anime['pages']" route="anime.index"/>
</x-main-layout>
