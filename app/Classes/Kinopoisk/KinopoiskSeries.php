<?php

namespace App\Classes\Kinopoisk;

use App\Abstracts\AbstractKinopoisk;
use App\Interfaces\IKinopoisk;

class KinopoiskSeries extends AbstractKinopoisk implements IKinopoisk
{
    protected const MOVIE_URL = '/movie';
    public function get(array $queryParams): array
    {
        $series = $this->query->get(self::URL . self::MOVIE_URL, array_merge(['type'=>'tv-series'], $queryParams))->json();

        return $this->checkIsEmptyData($series) ? self::EMPTY_DATA : $series;
    }
}
