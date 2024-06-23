<?php

namespace App\Http\Controllers\Pages\Series;

use App\Actions\Kinopoisk\GetFilterDataAction;
use App\Facades\Kinopoisk\KinopoiskFacade as Kinopoisk;
use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use App\Models\Custom\Series;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class IndexController extends Controller
{

    public function __invoke(KinopoiskRequest $request): View
    {
        $requestData = $request->validated();

        $series = Series::query()->filter($requestData)->get();

        $filterData = (new GetFilterDataAction())($requestData);

        $pagination = new LengthAwarePaginator($series, $series['total'], 10, $series['page'] ?? 1);
        $pagination->withPath('/series')->withQueryString();

        return view('pages.series.index', compact(['series', 'filterData', 'requestData', 'pagination']));
    }

}