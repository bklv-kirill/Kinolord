<?php

namespace App\Abstracts;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractKinopoisk
{

    protected const URL = 'https://api.kinopoisk.dev/v1.4';

    protected string $apiKey;
    protected PendingRequest $query;
    protected const EMPTY_DATA = [
        'page' => 1,
        'pages' => 1,
    ];

    public function __construct()
    {
        $this->apiKey = env('KINOPOISK_API_KEY');

        $this->query = Http::withHeader('X-API-KEY', $this->apiKey);
    }

    protected function checkIsEmptyData(array $data): bool
    {
        return !isset($movies['docs']) || isset($movies['error']);

    }

}
