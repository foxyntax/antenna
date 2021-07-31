<?php

namespace Foxyntax\Monitoring\App\Models;

use Illuminate\Database\Eloquent\Model;

class FxMonitoringReports extends Model
{

    /**
     * The model's default values for attributes.
     *
     * @param array
     */
    protected $attributes = [
        'env'   => 'client'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @param array
     */
    protected $fillable = [
        'user_type',
        'env',
        'sent_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @param array
     */
    protected $hidden = [
        'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
}
