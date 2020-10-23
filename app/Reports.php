<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    /**
     * Get the user that owns this report.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
