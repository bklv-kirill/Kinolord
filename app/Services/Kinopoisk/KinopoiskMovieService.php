<?php

namespace App\Services\Kinopoisk;

use App\Classes\Kinopoisk\KinopoiskMovie;
use App\Interfaces\Kinopoisk\IKinoposikService;

class KinopoiskMovieService implements IKinoposikService
{

    public function __construct(
        protected readonly KinopoiskMovie $kinopoiskMovie,
    ) {}

    public function getContent(array $queryParams): array
    {
        return $this->kinopoiskMovie->get($queryParams);
    }

}
