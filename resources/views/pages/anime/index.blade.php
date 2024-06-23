<x-main-layout title="Аниме">
    <div class="filters">
        <x-form :action="route('anime.index')" method="GET">
            <div class="filter">
                <label for="genre-select">Жанр</label>
                <select id="genre-select" name="genres[]" multiple>
                    @foreach($filterData['genres'] as $genre)
                        <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="filter">
                <label for="countries-select">Страна</label>
                <select id="countries-select" name="countries[]" multiple>
                    @foreach($filterData['countries'] as $country)
                        <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter">
                <label for="sort-field-select">Сортировка</label>
                <select id="sort-field-select" name="sortField">
                    @isset($filterData['sortField'])
                        <option value="{{ $filterData['sortField']->id }}" selected>{{ $filterData['sortField']->name }}</option>
                    @endisset
                </select>
            </div>

            <div class="filter">
                <label for="sort-type-select">Тип сортировки</label>
                <select id="sort-type-select" name="sortType">
                    <option value="-1" @selected($filterData['sortType'] === '-1')>По убыванию</option>
                    <option value="1" @selected($filterData['sortType'] === '1')>По возрастанию</option>
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

    {{ $pagination->links() }}

</x-main-layout>