<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class ResetPasswordMail extends Mailable
{
    /**
     * @var User
     */
    protected $user;


    /**
     * ResetPasswordMail constructor.
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
                    ->subject('Reset Password')
                    ->view('emails.reset_password')
                    ->with([
                        'fname' => $this->user->fname
                    ]);
    }
}
