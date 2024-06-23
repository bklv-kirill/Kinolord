<?php

namespace App\Http\Controllers\Pages\Movie;

use App\Actions\Kinopoisk\GetFilterDataAction;
use App\Facades\Kinopoisk\KinopoiskFacade as Kinopoisk;
use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use App\Models\Custom\Movie;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class IndexController extends Controller
{

    public function __invoke(KinopoiskRequest $request): View
    {
        $requestData = $request->validated();

        $movies = Movie::query()->filter($requestData)->get();

        $filterData = (new GetFilterDataAction())($requestData);

        $pagination = new LengthAwarePaginator($movies, $movies['total'], 10, $movies['page'] ?? 1);
        $pagination->withPath('/movies')->withQueryString();

        return view('pages.movie.index', compact(['movies', 'filterData', 'requestData', 'pagination']));
    }

}