<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

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
        return Cache::rememberForever(config('pool.cache.keys.user_dropdown'), function () {
            return static::get(['id', 'fname', 'lname'])->sortBy('fname')->toArray();
        });
    }
}
