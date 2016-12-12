<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
