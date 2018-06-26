<?php

namespace App\Listeners\Registration;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationEmail implements ShouldQueue
{
    /**
     * @var string
     */
    public $queue = 'reg_confirmation_email';


    /**
     * @param UserRegistered $event
     */
    public function handle(UserRegistered $event)
    {
        Mail::send(new RegistrationConfirmationMail($event->user));
    }
}
