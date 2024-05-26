<x-main-layout title="Сериалы">
    <div class="filters">
        <x-form :action="route('series.index')" method="GET">
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

    <div class="series">
        @forelse($series['docs'] as $seriesItem)
            <x-kinopoisk-card :kpData="$seriesItem" />
        @empty
            <x-kinopoisk-empty-search />
        @endforelse
    </div>

    @notEmpty($series['docs'])
    <x-kinopoisk-pagination :page="$series['page']" :pages="$series['pages']" route="series.index" :queryParams="$requestData" />
    @endnotEmpty

</x-main-layout>
