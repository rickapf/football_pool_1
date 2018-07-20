<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    /**
     * @var array
     */
    protected $hidden = ['password'];


    /**
     * @param $value
     */
    protected function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }


    /**
     * @param $value
     */
    protected function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }


    /**
     * @param $value
     */
    protected function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    /**
     * @return mixed
     */
    public static function dropDown()
    {
        return Cache::rememberForever(config('pool.cache.keys.user_dropdown'), function () {
            return static::all()->sortBy('first_name');
        });
    }
}
