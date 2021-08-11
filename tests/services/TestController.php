<?php

namespace Foxyntax\Antenna\Test\Serivces;

use Carbon\Carbon;
use Foxyntax\Antenna\App\Traits\Reporter;
use Foxyntax\Antenna\App\Models\FxMonitoringLogs;

Class TestController 
{
    /**
     * Run Watch method
     * 
     */
    public function run_watch()
    {
        Antenna::watch('this is a test log', 'Testing Package', true, 'dev');
    }

    /**
     * Run Watch method
     * 
     */
    public function test()
    {
        return response()->json([
            'success'   => true
        ]);
    }
} 