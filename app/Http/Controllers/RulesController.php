<?php

namespace App\Http\Controllers;

use App\Models\Setting;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class RulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::first()->toArray();

        return view('rules', ['settings' => $settings]);
    }
}
