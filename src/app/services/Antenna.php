<?php

namespace Foxyntax\Antenna\App\Serivces;

use Carbon\Carbon;
use Foxyntax\Antenna\App\Traits\Reporter;
use Foxyntax\Antenna\App\Models\FxAntennaLogs;

Class Antenna 
{
    use Reporter;

    /**
     ** Do necessary actions 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->delete_unnecessary_logs();
    }

    /**
     ** Save a log that has been sent from application into a file
     *
     * @param string log
     * @param string title
     * @param bool immediately
     * @param mixed role
     * @return void
     */
    public function watch(string $log, string $title, bool $immediately = false, mixed $role = null) : void
    {
        $logs = new FxAntennaLogs();
        $logs->title = $title;
        $logs->log = $log;
        $logs->save();

        if ($immediately) {
            $this->report($log, $immediately, $role);
        }
    }

    /**
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     **---------------------------------------------------- Protected Functions --------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     */
    
     /**
      ** delete unnecessary logs based on limiation in configuration
      *
      * @return void
      */
    protected function delete_unnecessary_logs() : void
    {
        $sent_logs_count = FxAntennaLogs::where('is_sent', 1)->count();
        $max_archives = config('antenna.limitation.archives');
        
        // Delete extra records
        if ($send_logs_count > $max_archives) {
            FxAntennaLogs::where('is_sent', 1)
                            ->orderBy('id', 'asc')
                            ->limit($send_logs_count - $max_archives)
                            ->delete();
        }
    }
} 