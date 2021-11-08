<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAuthenticate
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
        if(Auth:: user()) {
            $user = Auth::user();           
            if($user->role == 'admin') {
                //return redirect()->intended('admin/products');
                return $next($request);
            }
            
        }
        return redirect('/login');
        
    }
}
