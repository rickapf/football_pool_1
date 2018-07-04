<?php

namespace App\Listeners;

use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserRequestedResetPasswordLink;

class SendPasswordResetEmail implements ShouldQueue
{
    /**
     * @var string
     */
    public $queue = 'password_reset_email';


    /**
     * @param UserRequestedResetPasswordLink $event
     */
    public function handle(UserRequestedResetPasswordLink $event)
    {
        Mail::send(new ResetPasswordMail($event->user, $event->token, $event->resetId));
    }
}
