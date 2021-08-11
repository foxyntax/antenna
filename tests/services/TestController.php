<?php

namespace Foxyntax\Antena\Test\Serivces;

use Carbon\Carbon;
use Foxyntax\Antena\App\Traits\Reporter;
use Foxyntax\Antena\App\Models\FxMonitoringLogs;

Class TestController 
{
    /**
     * Run Watch method
     * 
     */
    public function run_watch()
    {
        Antena::watch('this is a test log', 'Testing Package', true, 'dev');
    }
} 