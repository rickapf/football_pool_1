<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordReset extends Model
{
    use SoftDeletes;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id','token', 'expires'];

    /**
     * @var array
     */
    protected $dates = ['expires', 'deleted_at'];
}
