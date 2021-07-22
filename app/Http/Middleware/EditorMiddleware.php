<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EditorMiddleware
{
    public function handle($request, Closure $next)
    {
        // dd(Auth::user());
        if(Auth::user()->role->type == 'editor')
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
