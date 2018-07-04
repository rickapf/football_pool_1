<?php

namespace App\Events;

use App\Models\User;

class UserRequestedResetPasswordLink
{
    /**
     * @var User
     */
    public $user;

    /**
     * @var
     */
    public $token;

    /**
     * @var
     */
    public $resetId;


    /**
     * UserRequestedResetPasswordLink constructor.
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
}
