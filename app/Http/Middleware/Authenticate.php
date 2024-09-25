<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->RouteIs('app.*'))
        {
            return route('app.login');
        }
        elseif($request->RouteIs('admin.*'))
        {
            return route('admin.login');
        }
        elseif($request->RouteIs('client.*'))
        {
            return route('client.login');
        }
        else 
        {
            return route('acceuil');
        }
    }
}
