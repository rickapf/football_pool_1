<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\RegistrationConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegistrationConfirmationEmail
{
    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::send(new RegistrationConfirmationMail($event->user));
    }
}
