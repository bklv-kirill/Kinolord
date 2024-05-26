<?php

namespace App\Classes\Kinopoisk;

use App\Abstracts\AbstractKinopoisk;
use App\Interfaces\IKinopoisk;

class KinopoiskAnime extends AbstractKinopoisk implements IKinopoisk
{
    protected const MOVIE_URL = '/movie';
    public function get(array $queryParams): array
    {
        $anime = $this->query->get(self::URL . self::MOVIE_URL, array_merge(['type'=>'anime'], $queryParams))->json();

        return $this->checkIsEmptyData($anime) ? self::EMPTY_DATA : $anime;

    }
}
