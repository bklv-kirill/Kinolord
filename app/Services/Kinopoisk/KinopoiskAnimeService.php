<?php

namespace App\Services\Kinopoisk;

use App\Classes\Kinopoisk\KinopoiskAnime;
use App\Interfaces\Kinopoisk\IKinoposikService;

class KinopoiskAnimeService implements IKinoposikService
{

    public function __construct(
        protected readonly KinopoiskAnime $kinopoiskAnime
    ) {}

    public function getContent(array $queryParams): array
    {
        return $this->kinopoiskAnime->get($queryParams);
    }

}
