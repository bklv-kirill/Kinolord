<x-main-layout title="Сериалы">
    <div class="anime">
        @forelse($series['docs'] as $seriesItem)
            <x-kinopoisk-card :kpData="$seriesItem"/>
        @empty
        @endforelse
    </div>

    <x-kinopoisk-pagination :page="$series['page']" :pages="$series['pages']" route="series.index"/>
</x-main-layout>
