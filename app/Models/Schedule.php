<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * @var string
     */
    protected $table = 'schedule';


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


    /**
     * @return mixed
     */
    public static function thursdayDeadline()
    {
        return static::where('week', Setting::first()->current_week)->whereRaw("DAYNAME(`when`) = 'thursday'")->orderBy('number')->first()->when;
    }


    /**
     * @return mixed
     */
    public static function weekendDeadline()
    {
        return static::where('week', Setting::first()->current_week)->whereRaw("DAYNAME(`when`) != 'thursday'")->orderBy('number')->first()->when;
    }
}
