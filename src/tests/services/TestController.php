<?php

namespace Foxyntax\Monitoring\Test\Serivces;

use Carbon\Carbon;
use Foxyntax\Monitoring\App\Traits\Reporter;
use Foxyntax\Monitoring\App\Models\FxMonitoringLogs;

Class TestController 
{
    /**
     * Run Watch method
     * 
     */
    public function run_watch()
    {
        Monitoring::watch('this is a test log', 'Testing Package', true, 'dev');
    }
} 