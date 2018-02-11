<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Support\Facades\Route;


class CheckRole
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

        $route = Route::currentRouteName();
//        $routes = Route::getRoutes();
//        var_dump($route);
//        var_dump($route, $request->user()->hasRole($route));
//        var_dump($route, $request->user()->can('create-post'));
        if ( ($route === null) || !Permission::must($route) ) {
//            echo 'ignore or null!';
            return $next($request);
        } elseif ($request->user()->can($route)) {
//            echo 'Have Permission!';
            return $next($request);
        } else {
            die('No Permission!');
        }

    }
}
