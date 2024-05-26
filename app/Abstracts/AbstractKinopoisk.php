<?php

namespace App\Abstracts;

use App\Actions\Kinopoisk\BuildQueryStringAction;
use App\Actions\Kinopoisk\CheckIsEmptyDataAction;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractKinopoisk
{

    protected const URL = 'https://api.kinopoisk.dev/v1.4/movie';

    protected string $apiKey;

    protected PendingRequest $query;

    protected array $queryParams = [];

    protected const EMPTY_DATA
        = [
            'page'  => 1,
            'pages' => 1,
        ];

    public function __construct()
    {
        $this->apiKey = env('KINOPOISK_API_KEY');

        $this->query = Http::withHeader('X-API-KEY', $this->apiKey);
    }

    public function query(array $queryParams): self
    {
        $this->queryParams = $queryParams;

        return $this;
    }

    protected function getEntityData(string $entity): array
    {
        $queryString = (new BuildQueryStringAction($this->queryParams))($entity);

        $data = $this->query->get(self::URL.$queryString)->json();

        return !(new CheckIsEmptyDataAction())($data) ? self::EMPTY_DATA : $data;
    }

}
