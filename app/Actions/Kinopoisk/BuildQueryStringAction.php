<?php

namespace App\Actions\Kinopoisk;

use App\Classes\Kinopoisk\QueryStringBuilder;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Sort;

class BuildQueryStringAction extends QueryStringBuilder
{

    public function __invoke(): string
    {
        foreach ($this->queryParams as $param => $value) {
            if ( ! is_null($value) && ! empty($value)) {
                $this->queryFilters[$param] = $value;
            }
        }

        $this->buildQueryString();

        return $this->queryString;
    }

    protected function page(string $page): void
    {
        $this->queryString .= "page={$page}&";
    }

    protected function countries(array $countries): void
    {
        foreach ($countries as $country) {
            $country           = Country::query()->find($country);
            $this->queryString .= "countries.name=%2B{$country->name}&";
        }
    }

    protected function genres(array $genres): void
    {
        foreach ($genres as $genre) {
            $genre             = Genre::query()->find($genre);
            $this->queryString .= "genres.name=%2B{$genre->name}&";
        }
    }

    protected function sortField(string $sortField): void
    {
        $sortField         = Sort::query()->find($sortField);
        $this->queryString .= "sortField={$sortField->slug}&";
    }

    protected function sortType(int $orderType): void
    {
        if (!isset($this->queryParams['sortField'])) {
            $this->sortField(1);
        }

        $this->queryString .= "sortType={$orderType}&";
    }

    protected function type(string $type): void
    {
        $this->queryString .= "type={$type}&";
    }
}
