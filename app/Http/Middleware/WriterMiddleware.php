<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class WriterMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role->type == 'writer')
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
