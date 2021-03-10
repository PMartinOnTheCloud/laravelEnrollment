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

Route::group(['middleware' => ['auth', 'can:accessAdmin']], function() {
    Route::get('terms/show', 'App\Http\Controllers\TermController@show');
    Route::get('terms/getterm/{id}', 'App\Http\Controllers\TermController@getTerm');
    Route::post('terms/create', 'App\Http\Controllers\TermController@create');
    Route::put('terms/update/{id}', 'App\Http\Controllers\TermController@update');
    Route::delete('terms/delete/{id}', 'App\Http\Controllers\TermController@delete');
});
