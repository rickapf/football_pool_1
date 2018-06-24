<?php

namespace App\Listeners\Registration;

use App\Events\UserRegistered as UserRegisteredEvent;
use App\Notifications\UserRegistered as UserRegisteredNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyPoolAdmin
{
    /**
     * @param UserRegistered $event
     */
    public function handle(UserRegisteredEvent $event)
    {
        # TODO: queue it up
        Notification::route('nexmo', '15165283123')->notify(new UserRegisteredNotification($event->user));
    }
}
