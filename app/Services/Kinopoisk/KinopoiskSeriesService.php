<?php

namespace App\Services\Kinopoisk;

use App\Classes\Kinopoisk\KinopoiskSeries;
use App\Interfaces\Kinopoisk\IKinoposikService;

class KinopoiskSeriesService implements IKinoposikService
{

    public function __construct(
        protected readonly KinopoiskSeries $kinopoiskSeries
    ) {}

    public function getContent(array $queryParams): array
    {
        return $this->kinopoiskSeries->get($queryParams);
    }

}
