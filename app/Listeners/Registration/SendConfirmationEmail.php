<?php

namespace App\Listeners\Registration;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\RegistrationConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationEmail
{

    /**
     * @param UserRegistered $event
     */
    public function handle(UserRegistered $event)
    {
        # TODO: queue it up
        Mail::send(new RegistrationConfirmationMail($event->user));
    }
}
