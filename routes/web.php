<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Term;
use App\Models\Career;


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

Route::get('/sample', function () {
    return view('sample');
});

Route::get('/login', function () {
    return view('login');
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
        return view('/admin/dashboard');
    });

    Route::get('/terms', function() {
        return view('/admin/terms');
    });

    Route::get('/terms/delete/{id}', function($id) {
        $term = Term::where('active', '1')->findOrFail($id);
        return view('/admin/deletes/terms', ['term' => $term]);
    });

    Route::get('/careers', function() {
        return view('/admin/careers');
    });

    Route::get('/careers/delete/{id}', function($id) {
        $career = Career::where('active', '1')->findOrFail($id);
        return view('/admin/deletes/careers', ['career' => $career]);
    });

    Route::get('/students', function() {
        return view('/admin/students');
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
