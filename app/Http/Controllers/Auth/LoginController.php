<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        User::where('email', auth()->user()->email)->update(['token' => csrf_token()]);
		Log::channel('logapp')->info('Ha iniciado sesión', ['user_id' => Auth::user()->id]);
		
        if (auth()->user()->role == 'admin') {
            return '/admin/dashboard';
        }
        return '/student/dashboard';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout() {
		$user_id = Auth::user()->id;

		Auth::logout();
		Log::channel('logapp')->info('Ha cerrado sesión', ['user_id' => $user_id]);
		return redirect('/');
    }
}
