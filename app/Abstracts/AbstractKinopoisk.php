<?php

namespace App\Abstracts;

use App\Filters\KinopoistFilter;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractKinopoisk
{
    private const URL = 'https://api.kinopoisk.dev/v1.4/movie';
    private const EMPTY_DATA = [
        'docs' => [],
        'page' => 1,
        'pages' => 1,
    ];
    protected PendingRequest $request;
    public string $query;

    public function __construct() {
        $this->query = '?type=' . $this->type;

        $this->request = Http::withHeaders([
            'X-API-KEY' => config('kinopoisk.api_key'),
            'Content-Type' => 'application/json',
        ]);
    }

    public static function query(): static
    {
        return new static();
    }

    public function filter(array $requestData): static
    {
        $filter = new KinopoistFilter($this, $requestData);
        $filter->apply();

        return $this;
    }

    public function whereNotNullFields(array $notNullFields): static
    {
        foreach ($notNullFields as $field) {
            $this->query .= '&notNullFields' . '=' . $field;
        }

        return $this;
    }

    public function whereGenres(array $genres): static
    {
        foreach ($genres as $genre) {
            $this->query .= '&genres.name=%2B' . $genre;
        }

        return $this;
    }

    public function whereCountries(array $countries): static
    {
        foreach ($countries as $country) {
            $this->query .= '&countries.name=%2B' . $country;
        }

        return $this;
    }

    public function orderBy(string $sortField, string $sortType): static
    {
        $this->query .= '&sortField=' . $sortField;
        $this->query .= '&sortType=' . $sortType;

        return $this;
    }

    public function get(): array
    {
        $this->whereNotNullFields([
            'name',
            'description',
            'poster.url',
        ]);

        $response = $this->request->get(self::URL . $this->query);

        return $response->successful() ?
            $response->json() :
            self::EMPTY_DATA;
    }

    public function find(int $id): array|null
    {
        $response = $this->request->get(self::URL . '/' . $id);

        return $response->successful() ?
            $response->json() :
            null;
    }
}