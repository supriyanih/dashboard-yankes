<?php namespace Supriyanih\DashboardYankes\Http\Middleware;

use Closure;

/**
 * The DashboardYankesMiddleware class.
 *
 * @package Supriyanih\DashboardYankes
 * @author  supriyanih <supriyanih@gmail.com>
 */
class DashboardYankesMiddleware
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
        return $next($request);
    }
}
