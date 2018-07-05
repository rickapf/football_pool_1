<?php

/**
 * Created by PhpStorm.
 * User: pfitzgerald
 * Date: 7/5/18
 * Time: 1:53 PM
 */

namespace App\Traits;

use App\Models\Setting;
use Illuminate\Support\Carbon;

trait Authentication
{
    /**
     * @return bool
     */
    public function registrationDeadlinePassed()
    {
        #Carbon::setTestNow(Carbon::create(2018, 9, 7, 0, 0));
        return (Carbon::now() > Setting::first()->registration_deadline);
    }
}