<?php

namespace App\Http\Controllers\Pages\Series;

use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use App\Services\Kinopoisk\KinopoiskSeriesService;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(KinopoiskRequest $request, KinopoiskSeriesService $kinopoiskSeriesService): View
    {
        $seriesQueryParams = $request->validated();

        $series = $kinopoiskSeriesService->getContent($seriesQueryParams);

        return view('pages.series.index', compact(['series']));
    }
}
