<?php

namespace App;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    public function report()
    {
        return $this->hasOne('App\Reports');
    }

    public function oauthToken()
    {
        return $this->hasOne('App\OauthTokens');
    }
}
