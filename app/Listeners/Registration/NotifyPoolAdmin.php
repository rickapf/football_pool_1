<?php

namespace App\Listeners\Registration;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Events\UserRegistered as UserRegisteredEvent;
use App\Notifications\UserRegistered as UserRegisteredNotification;

class NotifyPoolAdmin implements ShouldQueue
{
    /**
     * @var string
     */
    public $queue = 'reg_notify_admin';


    /**
     * @param UserRegisteredEvent $event
     */
    public function handle(UserRegisteredEvent $event)
    {
        Notification::route('nexmo', config('pool.admin.phone'))->notify(new UserRegisteredNotification($event->user));
    }
}
