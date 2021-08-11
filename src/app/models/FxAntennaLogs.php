<?php

namespace Foxyntax\Antenna\App\Models;

use Illuminate\Database\Eloquent\Model;

class FxAntennaLogs extends Model
{

    /**
     * The model's default values for attributes.
     *
     * @param array
     */
    protected $attributes = [
        'is_sent'   => 0
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @param array
     */
    protected $fillable = [
        'log',
        'is_sent',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @param array
     */
    protected $hidden = [
        'updated_at'
    ];
}
