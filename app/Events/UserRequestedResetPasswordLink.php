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
     * UserRequestedResetPasswordLink constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
