<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Term;
use App\Models\Career;
use App\Models\User;


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

Auth::routes(['register' => false]);

Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {

    Route::get('/dashboard', function() {
        Log::channel('logapp')->info('Ha entrado a /admin/dashboard', ['user_id' => Auth::user()->id]);
        return view('/admin/dashboard');
    });

    Route::get('/terms', function() {
        Log::channel('logapp')->info('Ha entrado a /admin/terms', ['user_id' => Auth::user()->id]);
        return view('/admin/terms');
    });

    Route::get('/terms/delete/{id}', function($id) {
        $term = Term::findOrFail($id);
        Log::channel('logapp')->info('Ha entrado a /admin/terms/delete/'. $id, ['user_id' => Auth::user()->id]);
        return view('/admin/deletes/terms', ['term' => $term]);
    });

    Route::get('/careers', function() {
        Log::channel('logapp')->info('Ha entrado a /admin/careers', ['user_id' => Auth::user()->id]);
        return view('/admin/careers');
    });

    Route::get('/careers/delete/{id}', function($id) {
        $career = Career::findOrFail($id);
        Log::channel('logapp')->info('Ha entrado a /admin/careers/delete/'. $id, ['user_id' => Auth::user()->id]);
        return view('/admin/deletes/careers', ['career' => $career]);
    });

    Route::get('/students', function() {
        $users = User::where('role', 'alumn')->paginate(20);
        Log::channel('logapp')->info('Ha entrado a /admin/students', ['user_id' => Auth::user()->id]);
        return view('/admin/students', ['users' => $users]);
    });

    Route::get('/students/delete/{id}', function($id) {
        $student = User::where('role', 'alumn')->findOrFail($id);
        Log::channel('logapp')->info('Ha entrado a /admin/students/delete/'. $id, ['user_id' => Auth::user()->id]);
        return view('/admin/deletes/students', ['student' => $student]);
    });

    Route::resource('users', 'UserController');
});

Route::name('student')
  ->prefix('student')
  ->middleware(['auth', 'can:accessAlumne'])
  ->group(function () {

    Route::get('/dashboard', function() {
        Log::channel('logapp')->info('Ha entrado a /student/dashboard', ['user_id' => Auth::user()->id]);
        return view('/student/dashboard');
    });

    Route::resource('users', 'UserController');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
