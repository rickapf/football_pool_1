<?php

namespace App\Events;

use App\Models\User;

class UserRegistered
{
    /**
     * @var User
     */
    public $user;


    /**
     * UserRegistered constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
