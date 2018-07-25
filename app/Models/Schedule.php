<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Schedule extends Model
{
    /**
     * @var string
     */
    protected $table = 'schedule';


    /**
     * @var array
     */
    protected $fillable = ['week', 'number', 'home_team', 'away_team', 'when', 'home_spread', 'away_spread'];


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
     * @param $week
     *
     * @return mixed
     */
    public static function thursdayGames($week)
    {
        return Schedule::where('week', $week)->whereRaw("DAYNAME(`when`) = 'thursday'")->orderBy('number')->get();
    }


    /**
     * @param $week
     *
     * @return mixed
     */
    public static function allGames($week)
    {
        return Schedule::where('week', $week)->orderBy('number')->get();
    }


    /**
     * @param $week
     *
     * @return bool
     */
    public static function thursdayDeadlinePassed($week)
    {
        return (Carbon::now() > static::where('week', $week)->whereRaw("DAYNAME(`when`) = 'Thursday'")->orderBy('number')->first()->when);
    }


    /**
     * @param $week
     *
     * @return bool
     */
    public static function weekendDeadlinePassed($week)
    {
        return (Carbon::now() > static::where('week', $week)->whereRaw("DAYNAME(`when`) != 'Thursday'")->orderBy('number')->first()->when);
    }
}
