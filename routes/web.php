<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('landing');
});

Route::get('home', function() {
    if (auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }
    return redirect('/student/dashboard');
})->middleware(['auth']);

Auth::routes(['register' => true]);

Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {

    Route::get('/dashboard', function() {
        if(Auth::check()) {
            return view('/admin/dashboard');
        }
    });

    Route::get('/courses', function() {
        if(Auth::check()) {
            return view('/admin/courses', ['terms' => [App\Http\Controllers\TermController::class, 'getTerms']]);
        }
    });

    Route::resource('users', 'UserController');
});

Route::name('student')
  ->prefix('student')
  ->middleware(['auth', 'can:accessAlumne'])
  ->group(function () {

    Route::get('/dashboard', function() {
        return view('/student/dashboard');
    });

    Route::resource('users', 'UserController');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
