<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Term;


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
        return view('/admin/dashboard');
    });

    Route::get('/terms', function() {
        return view('/admin/terms');
    });

    Route::get('/terms/delete/{id}', function($id) {
        $term = Term::where('active', '1')->findOrFail($id);
        return view('/admin/terms/delete', ['term' => $term]);
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
