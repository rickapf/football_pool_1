<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Entry extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'week',
        'picks_made',
        'thursday_picked_by',
        'weekend_picked_by',
        'game_1',
        'game_2',
        'game_3',
        'game_4',
        'game_5',
        'game_6',
        'game_7',
        'game_8',
        'game_9',
        'game_10',
        'game_11',
        'game_12',
        'game_13',
        'game_14',
        'game_15',
        'game_16',
        'tiebreaker_points'
    ];


    /**
     * @param $week
     *
     * @return mixed
     */
    public static function userPicks($week)
    {
        return static::where('week', $week)->where('user_id', Auth::user()->id)->first();
    }
}
