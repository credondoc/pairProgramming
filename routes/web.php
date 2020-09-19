<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/concierto');
});

Route::get('/concierto', '\App\Http\Controllers\ConciertoController@show')
    ->name('concierto.show');

Route::post('/concierto', '\App\Http\Controllers\ConciertoController@create')
    ->name('concierto.create');
