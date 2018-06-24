<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = ['fname', 'lname', 'email', 'password'];

    /**
     * Don't return these fields in query results
     *
     * @var array
     */
    protected $hidden = ['password'];
}
