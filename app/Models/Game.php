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


    public function homeTeam()
    {
        return $this->hasOne(Team::class, 'id', 'home_team');
    }


    public function awayTeam()
    {
        return $this->hasOne(Team::class, 'id', 'away_team');
    }
}
