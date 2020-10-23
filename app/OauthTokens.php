<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthTokens extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'token';
    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'token';
    }

    /**
     * Get the user that owns this token.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
