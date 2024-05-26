<?php

namespace App\Classes\Kinopoisk;

use App\Abstracts\AbstractKinopoisk;
use App\Interfaces\IKinopoisk;

class KinopoiskMovie extends AbstractKinopoisk implements IKinopoisk
{
    protected const MOVIE_URL = '/movie';

    public function get(array $queryParams): array
    {
        $movies = $this->query->get(self::URL . self::MOVIE_URL, array_merge(['type'=>'movie'], $queryParams))->json();

        return $this->checkIsEmptyData($movies) ? self::EMPTY_DATA : $movies;
    }
}
