<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\Api\Country\CountryCollection;
use App\Models\Country;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke(SearchRequest $request): CountryCollection
    {
        $query = $request->get('query', '');
        $page  = $request->get('page', 1);

        $countries = Country::query()
            ->where('name', 'LIKE', "%{$query}%")
            ->paginate(10, ['*'], 'page', $page);

        return new CountryCollection($countries);
    }

}
