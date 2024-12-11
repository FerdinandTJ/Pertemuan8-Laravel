<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->session()->get('user');
        if (!isset($user['is_signin']) || !$user['is_sigin']) {
            return redirect('/signin')->with('error', 'Anda harus login terlebih dahulu');
        }
        return $next($request);
    }
}
