<?php

namespace App\Interfaces\Kinopoisk;

interface IKinoposikService
{

    public function getContent(array $queryParams): array;
}
