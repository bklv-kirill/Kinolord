<?php

namespace App\Http\Resources\Api\Sort;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SortResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
