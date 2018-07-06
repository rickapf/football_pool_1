<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class FeedbackController extends Controller
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
        return view('feedback');
    }
}
