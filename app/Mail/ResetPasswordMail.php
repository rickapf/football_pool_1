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
     * @var
     */
    protected $token;

    /**
     * @var
     */
    protected $resetId;


    /**
     * ResetPasswordMail constructor.
     *
     * @param User $user
     * @param      $token
     * @param      $resetId
     */
    public function __construct(User $user, $token, $resetId)
    {
        $this->user    = $user;
        $this->token   = $token;
        $this->resetId = $resetId;
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
                        'fname'   => $this->user->fname,
                        'token'   => $this->token,
                        'resetId' => $this->resetId
                    ]);
    }
}
