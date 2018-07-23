<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Setting;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubmitPicksRequest;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class PicksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makePicks(Request $request)
    {
        $week  = Setting::first()->current_week;
        $picks = Entry::userPicks($week);

        $thursday_picked_by = ($picks) ? $picks->thursday_picked_by : 'person';
        $tiebreaker_points  = ($picks) ? $picks->tiebreaker_points  : null;

        if ($request->make == 'thursday') {
            $games = Schedule::thursdayGames($week);
            $flags = [
                'picks_made'         => 'thursday',
                'thursday_picked_by' => $thursday_picked_by,
                'weekend_picked_by'  => null
            ];
        } else {
            $games = Schedule::allGames($week);
            $flags = [
                'picks_made'         => 'all',
                'thursday_picked_by' => $thursday_picked_by,
                'weekend_picked_by'  => 'person'
            ];
        }

        # Add picks data to games data
        if ($picks) {
            $games->transform(function ($game, $key) use ($picks) {
                $gameVar = 'game_' . $game->number;
                $game->picked = $picks->$gameVar;
                return $game;
            });
        }

        return view('picks.main', compact('games', 'flags', 'tiebreaker_points'));
    }

    /**
     * @param SubmitPicksRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePicks(SubmitPicksRequest $request)
    {
        $data = $request->validated();

        Entry::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'week'    => Setting::first()->current_week,
            ],
            [
                'picks_made'         => $request->picks_made,
                'thursday_picked_by' => $request->thursday_picked_by,
                'weekend_picked_by'  => $request->weekend_picked_by,
                'game_1'             => (isset($data['game_1']))  ? $data['game_1']  : null,
                'game_2'             => (isset($data['game_2']))  ? $data['game_2']  : null,
                'game_3'             => (isset($data['game_3']))  ? $data['game_3']  : null,
                'game_4'             => (isset($data['game_4']))  ? $data['game_4']  : null,
                'game_5'             => (isset($data['game_5']))  ? $data['game_5']  : null,
                'game_6'             => (isset($data['game_6']))  ? $data['game_6']  : null,
                'game_7'             => (isset($data['game_7']))  ? $data['game_7']  : null,
                'game_8'             => (isset($data['game_8']))  ? $data['game_8']  : null,
                'game_9'             => (isset($data['game_9']))  ? $data['game_9']  : null,
                'game_10'            => (isset($data['game_10'])) ? $data['game_10'] : null,
                'game_11'            => (isset($data['game_11'])) ? $data['game_11'] : null,
                'game_12'            => (isset($data['game_12'])) ? $data['game_12'] : null,
                'game_13'            => (isset($data['game_13'])) ? $data['game_13'] : null,
                'game_14'            => (isset($data['game_14'])) ? $data['game_14'] : null,
                'game_15'            => (isset($data['game_15'])) ? $data['game_15'] : null,
                'game_16'            => (isset($data['game_16'])) ? $data['game_16'] : null,
                'tiebreaker_points'  => (isset($request->tiebreaker_points)) ? $request->tiebreaker_points : null
            ]
        );

        return back()->with(['picks_made' => true]);
    }
}
