<?php

namespace App\Http\Requests;

use App\Models\Sort;
use Illuminate\Foundation\Http\FormRequest;

class KinopoiskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page'        => ['nullable', 'integer', 'min:1'],
            'year'        => ['nullable', 'integer'],
            'genres'      => ['nullable', 'array'],
            'genres.*'    => ['nullable', 'integer', 'exists:genres,id'],
            'countries'   => ['nullable', 'array'],
            'countries.*' => ['nullable', 'integer', 'exists:countries,id'],
            'sortField'   => ['nullable', 'integer', 'exists:sorts,id'],
            'sortType'    => ['nullable', 'integer', 'in:-1,1'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('sortType') === false) {
            $this->merge([
                'sortType' => -1,
            ]);
        }
        if ($this->filled('sortField') === false) {
            $this->merge([
                'sortField' => Sort::query()->first()->id,
            ]);
        }
    }
}