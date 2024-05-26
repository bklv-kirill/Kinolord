<?php

namespace App\Actions\Kinopoisk;


use App\Models\Country;
use App\Models\Genre;
use App\Models\Sort;

class GetFilterDataAction
{
    protected array $filterData = [];

    public function __invoke(array $requestData): array
    {
        $this->filterData['genres'] = isset($requestData['genres']) ?
            Genre::query()->whereIn('id', $requestData['genres'])->get() :
            [];

        $this->filterData['countries'] = isset($requestData['countries']) ?
            Country::query()->whereIn('id', $requestData['countries'])->get() :
            [];

        $this->filterData['sortField'] = isset($requestData['sortField']) ?
            Sort::query()->find($requestData['sortField']) :
            null;

        $this->filterData['sortType'] = $requestData['sortType'] ?? null;

        return $this->filterData;
    }

}
