<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['week', 'number', 'home_team', 'away_team', 'when'];


    /**
     * @var array
     */
    protected $dates = ['when'];
}
