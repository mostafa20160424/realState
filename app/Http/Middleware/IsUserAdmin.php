<?php

namespace App\Http\Middleware;

use Closure;

class IsUserAdmin
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
        if(auth()->user()->admin != 1){//Auth::user()->col name in database
            return redirect('/')->with('error','لا تملك صلاحيه اهذه الصفحه');
        }
        return $next($request);
    }
}
