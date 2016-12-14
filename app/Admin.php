<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static $login_validation = [
        'email' => 'required|exists:admins',
        'password' => 'required',
    ];
    public static $change_password_validation = [
        'cur_password' => 'required|min:8',
        'new_password' => 'required|min:8',
    ];
    public static $add_user_validation = [
        'user_email' => 'required|unique',
        'user_password' => 'required|min:8',
    ];

}
