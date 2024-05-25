<?php

namespace App\Interfaces;

interface IKinopoisk
{

    public function get(array $queryParams): array;
}
