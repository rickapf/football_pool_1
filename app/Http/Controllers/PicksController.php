<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Setting;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makePicks()
    {
        $week  = Setting::first()->current_week;
        $games = Game::where('week', $week)->orderBy('when')->get();

        return view('picks', ['games' => $games]);
    }


    public function savePicks(SubmitPicksRequest $request)
    {
        $data = $request->validated();
        dd($data);
    }
}
