<?php

namespace App\Listeners\Registration;

use Illuminate\Support\Facades\Cache;
use App\Events\UserRegistered as UserRegisteredEvent;

class ClearUserDropDownCache
{
    /**
     * @param UserRegisteredEvent $event
     */
    public function handle(UserRegisteredEvent $event)
    {
        Cache::forget(config('pool.cache.keys.user_dropdown'));
    }
}
