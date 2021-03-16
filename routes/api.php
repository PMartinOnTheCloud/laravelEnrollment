<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API DE CURSOS
Route::put('terms/update/{id}', 'App\Http\Controllers\TermController@update');
Route::post('terms/create', 'App\Http\Controllers\TermController@create');
Route::delete('terms/delete/{id}', 'App\Http\Controllers\TermController@destroy');
Route::resource('terms', 'App\Http\Controllers\TermController');

// API DE CICLOS
Route::put('careers/update/{id}', 'App\Http\Controllers\CareerController@update');
Route::post('careers/create', 'App\Http\Controllers\CareerController@create');
Route::delete('careers/delete/{id}', 'App\Http\Controllers\CareerController@destroy');
Route::resource('careers', 'App\Http\Controllers\CareerController');
