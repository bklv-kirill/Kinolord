<?php

namespace App\Http\Resources\Api\Country;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
{
    public $collects = CountryResource::class;
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
