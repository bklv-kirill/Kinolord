<?php

namespace App\Http\Requests;

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
            'sortField' => [
                'nullable',
                'string',
                'exists:sorts,id',
            ],
            'sortType'   => ['nullable', 'integer', 'in:1,-1'],
        ];
    }

}
