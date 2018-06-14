<?php

namespace App\Models;

use App\Models\Base as BaseModel;

class User extends BaseModel
{
    /**
     * Don't return these fields in query results
     *
     * @var array
     */
    protected $hidden = ['password', 'updated_at', 'created_at', 'id'];
}
