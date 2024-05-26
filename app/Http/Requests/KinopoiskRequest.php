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
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }
}
