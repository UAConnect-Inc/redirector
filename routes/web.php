<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('r/{link}', [RedirectController::class, 'index'])
    ->name('redirect.index')
    ->where('link', '[0-9]+');
