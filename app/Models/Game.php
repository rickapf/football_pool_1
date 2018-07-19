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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function homeTeam()
    {
        return $this->hasOne(Team::class, 'id', 'home_team');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function awayTeam()
    {
        return $this->hasOne(Team::class, 'id', 'away_team');
    }
}
