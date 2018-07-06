<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Setting extends Model
{
    /**
     * @var array
     */
    protected $dates = ['registration_deadline'];


    /**
     * @return bool
     */
    public static function registrationDeadlinePassed()
    {
        #Carbon::setTestNow(Carbon::create(2018, 9, 7, 0, 0));
        return (Carbon::now() > static::first()->registration_deadline);
    }
}
