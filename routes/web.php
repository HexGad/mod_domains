<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \Illuminate\Support\Facades\Route;
use HexGad\Domains\Http\Controllers\DomainController;

Route::prefix(config('dashboard.urls.prefix'))
    ->as(config('dashboard.urls.route_prefix'))
    ->middleware('auth:dashboard')
    ->group(function () {
        Route::resource('domains', DomainController::class);
    });

