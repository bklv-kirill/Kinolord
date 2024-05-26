<?php

namespace App\Actions\Kinopoisk;

class CheckIsEmptyDataAction
{
    public function __invoke(array $data): bool
    {
        return isset($data['docs']) || isset($data['error']);
    }

}
