<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogQueries
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        DB::connection("mysql")->enableQueryLog();

        return $next($request);
    }

    public function terminate($request, $response)
    {
        Log::info('Queries executed', DB::connection("mysql")->getQueryLog());
    }
}
