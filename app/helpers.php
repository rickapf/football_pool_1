<?php

/**
 * Created by PhpStorm.
 * User: pfitzgerald
 * Date: 7/6/18
 * Time: 5:58 PM
 */

/**
 * @param $path
 *
 * @return string
 */
function setActiveNavTab($path)
{
    return Request::is($path) ? 'nav-link active' : 'nav-link';
}


/**
 * @param null $make
 *
 * @return string
 */
function setActivePicksButton($make = null)
{
    return (Request::get('make') == $make) ? 'active' : '';
}


/**
 * @param      $game
 * @param null $prevGameDay
 * @param      $tiebreakerPoints
 *
 * @return array
 */
function getPickFormVars($game, $prevGameDay = null, $tiebreakerPoints)
{
    $homeClass = $awayClass = $homeChecked = $awayChecked = '';
    $classString   = 'bg-success text-white';
    $checkedString = 'checked';

    # Show header rows?
    if (!isset($prevGameDay) || $prevGameDay != $game->when->format('l')) {
        $showHeader = true;
        $prevGameDay = $game->when->format('l');
    } else {
        $showHeader = false;
    }

    # Team names and records
    $homeTeamName   = "{$game->homeTeam->city} {$game->homeTeam->name}";
    $homeTeamRecord = "({$game->homeTeam->wins}-{$game->homeTeam->losses}-{$game->awayTeam->ties})";
    $awayTeamName   = "{$game->awayTeam->city} {$game->awayTeam->name}";
    $awayTeamRecord = "({$game->awayTeam->wins}-{$game->awayTeam->losses}-{$game->awayTeam->ties})";

    # Game selected/checked & tiebreaker points
    if (old()) {
        if (old("game_{$game->number}") == $game->home_team) {
            $homeClass   = $classString;
            $homeChecked = $checkedString;
        }
        if (old("game_{$game->number}") == $game->away_team) {
            $awayClass   = $classString;
            $awayChecked = $checkedString;
        }
        $tiebreakerPoints = old('tiebreaker_points');
    } else {
        if ($game->picked == $game->home_team) {
            $homeClass   = $classString;
            $homeChecked = $checkedString;
        }
        if ($game->picked == $game->away_team) {
            $awayClass   = $classString;
            $awayChecked = $checkedString;
        }
    }

    return [
        'show_header'       => $showHeader,
        'prev_game_day'     => $prevGameDay,
        'home_team_name'    => $homeTeamName,
        'home_team_record'  => $homeTeamRecord,
        'away_team_name'    => $awayTeamName,
        'away_team_record'  => $awayTeamRecord,
        'home_class'        => $homeClass,
        'away_class'        => $awayClass,
        'home_checked'      => $homeChecked,
        'away_checked'      => $awayChecked,
        'tiebreaker_points' => $tiebreakerPoints
    ];
}