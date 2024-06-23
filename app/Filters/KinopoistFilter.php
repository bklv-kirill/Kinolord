<?php

namespace App\Filters;

use App\Abstracts\AbstractFilter;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Sort;
use Illuminate\Support\Str;

class KinopoistFilter extends AbstractFilter
{
    protected function page(int $page): void
    {
        $this->model->query .= '&page=' . $page;
    }

    protected function year(int $year): void
    {
        $this->model->query .= '&year=' . $year;
    }

    protected function genres(array $genresIds): void
    {
        $genres = [];
        foreach ($genresIds as $genreId) {
            $genre = Genre::query()->find($genreId);
            $genres[] = Str::lower($genre->name);
        }
        $this->model->whereGenres($genres);
    }

    protected function countries(array $countriesIds): void
    {
        $countries = [];
        foreach ($countriesIds as $countryId) {
            $country = Country::query()->find($countryId);
            $countries[] = $country->name;
        }
        $this->model->whereCountries($countries);
    }

    protected function sortField(string $sortFieldId): void
    {
        $sortField = Sort::query()->find($sortFieldId);

        $this->model->query .= '&sortField=' . $sortField->slug;
    }

    protected function sortType(string $sortType): void
    {
        $this->model->query .= '&sortType=' . $sortType;
    }
}