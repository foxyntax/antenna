<?php

namespace Foxyntax\Monitoring\App\Middlewares;

use Closure;
use Foxyntax\Monitoring\App\Traits\Reporter;

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
        $this->report(null, false, null, $role);   

        return $next($request);
    }
}