<?php

namespace App\Http\Middleware;

use Closure;

class APIMiddleware
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
        //var_dump($request);

        //return response("Invalid Token Provided",422);

        /*
        $user = User::find(Auth::user()->id);
        $user->name = 'New Name';
        $user->save();

        //Auth::setUser(Auth::user()->with('company')->first());
        Auth::setUser($user);////////////////

        log::error(Auth::user()->name)); // Will be 'NEW Name'
         */

        return $next($request);
    }
}
