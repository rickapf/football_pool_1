<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class RegistrationConfirmationMail extends Mailable
{
    /**
     * @var User
     */
    protected $user;


    /**
     * RegistrationConfirmationMail constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email)
                    ->subject('Registration Confirmation')
                    ->view('emails.registration_confirmation')
                    ->with([
                        'fname' => $this->user->fname,
                        'lname' => $this->user->lname,
                        'email' => $this->user->email
                    ]);
    }
}
