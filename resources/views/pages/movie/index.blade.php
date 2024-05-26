<x-main-layout title="Фильмы">
    <div class="filters">
        <x-form :action="route('movie.index')" method="GET">
            <div class="filter">
                <label for="year">Год</label>
                <input type="number" name="year" id="year" value="{{ $requestData['year'] ?? '' }}">
            </div>
            <div class="filter">
                <h3>Жанр</h3>
                @foreach($genres as $genre)
                    <div>
                        <input type="checkbox" name="genres[]" id="{{ $genre->slug }}" value="{{ $genre->name }}" @checked(isset($requestData['genres']) && in_array($genre->name, $requestData['genres']))>
                        <label for="{{ $genre->slug }}">{{ $genre->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="filter">
                <h3>Страна</h3>
                @foreach($countries as $country)
                    <div>
                        <input type="checkbox" name="countries[]" id="{{ $country->slug }}" value="{{ $country->name }}" @checked(isset($requestData['countries']) && in_array($country->name, $requestData['countries']))>
                        <label for="{{ $country->slug }}">{{ $country->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit">Поиск</button>
        </x-form>
    </div>

    <div class="movies">
        @forelse($movies['docs'] ?? [] as $movie)
            <x-kinopoisk-card :kpData="$movie" />
        @empty
            <x-kinopoisk-empty-search />
        @endforelse
    </div>

    @notEmpty($movies['docs'])
    <x-kinopoisk-pagination :page="$movies['page']" :pages="$movies['pages']" route="anime.index" :queryParams="$requestData" />
    @endnotEmpty

</x-main-layout>
