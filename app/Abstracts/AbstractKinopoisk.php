<?php

namespace App\Abstracts;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractKinopoisk
{

    protected const URL = 'https://api.kinopoisk.dev/v1.4';

    protected string $apiKey;
    protected PendingRequest $query;

    public function __construct()
    {
        $this->apiKey = env('KINOPOISK_API_KEY');

        $this->query = Http::withHeader('X-API-KEY', $this->apiKey);
    }

}
