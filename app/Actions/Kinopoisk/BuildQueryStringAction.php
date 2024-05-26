<?php

namespace App\Actions\Kinopoisk;

use App\Models\Country;
use App\Models\Genre;

class BuildQueryStringAction
{

    public function __construct(
        protected array $queryParams,
    ) {}

    public function __invoke(string $entity): string
    {
        $queryString = '';
        $queryString .= '?type='.$entity.'&';

        if (isset($this->queryParams['countries'])) {
            foreach ($this->queryParams['countries'] as $country) {
                $country = Country::query()->find($country);
                $queryString .= 'countries.name=%2B'.$country->name.'&';
            }
        }

        if (isset($this->queryParams['genres'])) {
            foreach ($this->queryParams['genres'] as $genre) {
                $genre = Genre::query()->find($genre);
                $queryString .= 'genres.name=%2B'.$genre->name.'&';
            }
        }

        return $queryString;
    }

    protected function insertIntoQuery(string &$queryString): void
    {
        foreach ($this->queryParams['genres'] as $genre) {
            $queryString .= 'genres.name=%2B'.$genre.'&';
        }
    }

}
