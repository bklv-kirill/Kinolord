<x-main-layout title="Аниме">
    <div class="filters">
        <x-form :action="route('anime.index')" method="GET">
            <div class="filter">
                <label for="year">Год</label> <br>
                <input type="number" name="year" id="year" value="{{ $requestData['year'] ?? '' }}">
            </div>

            <div class="filter">
                <label for="genre-select">Жанр</label>
                <select id="genre-select" name="genres[]" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="filter">
                <label for="countries-select">Страна</label>
                <select id="countries-select" name="countries[]" multiple>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Поиск</button>
        </x-form>
    </div>

    <div class="anime">
        @forelse($anime['docs'] as $animeItem)
            <x-kinopoisk-card :kpData="$animeItem" />
        @empty
            <x-kinopoisk-empty-search />
        @endforelse
    </div>


    @notEmpty($anime['docs'])
    <x-kinopoisk-pagination :page="$anime['page']" :pages="$anime['pages']" route="anime.index" :queryParams="$requestData" />
    @endnotEmpty

</x-main-layout>
