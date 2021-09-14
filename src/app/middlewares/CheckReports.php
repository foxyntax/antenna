<?php

namespace Foxyntax\Antenna\App\Middlewares;

use Closure;
use Foxyntax\Antenna\App\Traits\Reporter;

class CheckReports {

    use Reports;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        $this->report(null, false, $role);   

        return $next($request);
    }
}