<?php

namespace App\Classes\Kinopoisk;

class QueryStringBuilder
{
    protected string $queryString = '';

    protected array $queryFilters = [];

    public function __construct(
        protected array $queryParams,
        protected array $notNullFields,
    ) {}

    protected function buildQueryString(): void
    {
        $this->specifyNotNullFields();

        foreach ($this->queryFilters as $field => $value) {
            if (method_exists($this, $field)) {
                call_user_func_array([$this, $field], [$value]);
            }
        }
    }

    protected function specifyNotNullFields(): void
    {
        foreach ($this->notNullFields as $filed) {
            $this->queryString .= "notNullFields={$filed}&";
        }
    }

}
