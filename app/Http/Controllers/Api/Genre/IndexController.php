<?php

namespace App\Http\Controllers\Api\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\Api\Country\CountryCollection;
use App\Http\Resources\Api\Genre\GenreCollection;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(SearchRequest $request): GenreCollection
    {
        $query = $request->get('q', '');
        $page  = $request->get('page', 1);

        $genres = Genre::query()
            ->where('name', 'LIKE', "%{$query}%")
            ->paginate(10, ['*'], 'page', $page);

        return new GenreCollection($genres);
    }
}
