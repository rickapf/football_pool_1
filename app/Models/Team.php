<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public static function idByAbbreviation($abbreviation)
    {
        return static::where('abbreviation', $abbreviation)->first()->id;
    }
}
