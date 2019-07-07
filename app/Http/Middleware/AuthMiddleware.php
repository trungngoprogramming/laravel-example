<?php

namespace App\Http\Middleware;

use Closure;
use App\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/')
                ->with('error', 'Chưa đăng nhập');
        }

        return $next($request);
    }
}
