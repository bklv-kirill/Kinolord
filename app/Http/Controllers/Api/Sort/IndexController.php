<?php

namespace App\Http\Controllers\Api\Sort;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\Api\Sort\SortCollection;
use App\Models\Sort;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(): SortCollection
    {
        $sorts = Sort::query()
            ->get();

        return new SortCollection($sorts);
    }
}
