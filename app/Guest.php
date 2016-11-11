<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Guest extends Authenticatable
{
	public $timestamps = false;
    protected $fillable = [
        'email', 'password','cont_acc',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
