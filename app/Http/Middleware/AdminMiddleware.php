<?php



namespace App\Http\Middleware;



use Closure;

use Auth;



class AdminMiddleware

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
        if (auth()->user()->type_user == 'admin') {

            return $next($request);

        }

        return abort('403');

    }

}

