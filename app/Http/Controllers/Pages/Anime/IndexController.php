<?php

namespace App\Http\Controllers\Pages\Anime;

use App\Actions\Kinopoisk\GetFilterDataAction;
use App\Facades\Kinopoisk\KinopoiskFacade as Kinopoisk;
use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use App\Models\Custom\Anime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class IndexController extends Controller
{

    public function __invoke(KinopoiskRequest $request): View
    {
        $requestData = $request->validated();

        $anime = Anime::query()->filter($requestData)->get();

        $filterData = (new GetFilterDataAction())($requestData);

        $pagination = new LengthAwarePaginator($anime, $anime['total'] ?? 1, 10, $anime['page'] ?? 1);
        $pagination->withPath('/anime')->withQueryString();

        return view('pages.anime.index', compact(['anime', 'filterData', 'requestData', 'pagination']));
    }

}