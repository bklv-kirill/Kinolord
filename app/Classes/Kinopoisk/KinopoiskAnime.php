<?php

namespace App\Classes\Kinopoisk;

use App\Abstracts\AbstractKinopoisk;
use App\Interfaces\IKinopoisk;

class KinopoiskAnime extends AbstractKinopoisk implements IKinopoisk
{
    protected const MOVIE_URL = '/movie';
    public function get(array $queryParams): array
    {
        return $this->query->get(self::URL . self::MOVIE_URL, $queryParams)->json();
    }
}
