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
        return view('picks.main', []);
    }
}
