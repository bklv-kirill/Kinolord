<?php

use App\Http\Controllers\Pages\MainPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPageController::class)->name('main');
