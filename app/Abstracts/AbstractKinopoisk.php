<?php

namespace App\Abstracts;

use App\Actions\Kinopoisk\BuildQueryStringAction;
use App\Actions\Kinopoisk\CheckIsEmptyDataAction;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractKinopoisk
{
    protected PendingRequest $query;

    protected array $queryParams = [];
    protected const EMPTY_DATA
        = [
            'docs' => [],
            'page'  => 1,
            'pages' => 1,
        ];

    public function __construct()
    {
        $this->query = Http::withHeader('X-API-KEY', env('KINOPOISK_API_KEY'));
    }

    public function query(array $queryParams): self
    {
        $this->queryParams = $queryParams;

        return $this;
    }

    protected function getEntityData(): array
    {
        $queryString = (new BuildQueryStringAction($this->queryParams, $this->notNullFields))();

        $data = $this->query->get($this->url.$queryString)->json();

        return (new CheckIsEmptyDataAction())($data) ? self::EMPTY_DATA : $data;
    }

}
