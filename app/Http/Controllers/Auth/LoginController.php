<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function redirectTo()
    {
      // Get the authenticated user
      $user = Auth::user();

      // Redirect based on user's role
      if ($user->hasRole('Administrator')) {
          return '/admin';
      } elseif ($user->hasRole('Mart Worker')) {
          return '/worker';
      }elseif ($user->hasRole('Committee')) {
          return '/committee';
      } else {
          // Default redirect for other roles or unauthenticated users
          return '/';
      }
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
}
