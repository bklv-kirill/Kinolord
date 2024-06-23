<?php

namespace App\Abstracts;

use Illuminate\Support\Str;

abstract class AbstractFilter
{
    private array $filters = [];

    public function __construct(protected AbstractKinopoisk $model, array $requestData)
    {
        foreach ($requestData as $method => $value) {
            if ($value !== null) {
                $this->filters[Str::camel($method)] = $value;
            }
        }
    }

    public function apply(): void
    {
        foreach ($this->filters as $method => $value) {
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], [$value]);
            }
        }
    }
}