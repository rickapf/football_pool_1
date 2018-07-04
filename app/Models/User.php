<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['fname', 'lname', 'email', 'password'];

    /**
     * @var array
     */
    protected $hidden = ['password'];


    /**
     * @return mixed
     */
    public static function dropDown()
    {
        return static::get(['id', 'fname', 'lname'])->sortBy('fname')->toArray();
    }
}
