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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {

    Route::get('/dashboard', function() {
        if(Auth::check()) {
            return view('/admin/dashboard', ['userLogged' => Auth::user()]);
        }
    });

    Route::get('/courses', function() {
        if(Auth::check()) {
            return view('/admin/courses', ['userLogged' => Auth::user()]);
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
