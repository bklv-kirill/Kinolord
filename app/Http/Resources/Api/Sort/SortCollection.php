<?php

namespace App\Http\Resources\Api\Sort;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SortCollection extends ResourceCollection
{
    public $collects = SortResource::class;
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
