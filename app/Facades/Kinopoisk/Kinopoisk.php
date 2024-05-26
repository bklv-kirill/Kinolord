<?php

namespace App\Facades\Kinopoisk;

use App\Abstracts\AbstractKinopoisk;

class Kinopoisk extends AbstractKinopoisk
{
    protected string $url = 'https://api.kinopoisk.dev/v1.4/movie?';
    protected array $notNullFields
        = [
            'name',
            'description',
            'poster.url',
        ];

    public function movies(): array
    {
        $this->queryParams['type'] = 'movie';
        return $this->getEntityData();
    }
    public function series(): array
    {
        $this->queryParams['type'] = 'tv-series';
        return $this->getEntityData();
    }

    public function anime(): array
    {
        $this->queryParams['type'] = 'anime';
        return $this->getEntityData();
    }
    public function persons(): array
    {
        return $this->getEntityData();
    }
}
