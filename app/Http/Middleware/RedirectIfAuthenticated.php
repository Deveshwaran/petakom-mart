<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
      $guards = empty($guards) ? [null] : $guards;

      foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Redirect based on user's role
            if ($user->hasRole('Administrator')) {
              return redirect()->route('admin.home');
            } elseif ($user->hasRole('Mart Worker')) {
              return redirect()->route('worker.home');
            } elseif ($user->hasRole('Committee')) {
              return redirect()->route('committee.home');
            }
        }
      }

      return $next($request);
    }
}
