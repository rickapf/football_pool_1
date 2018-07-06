<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        /*
         * user is logged in
         * show the home page
         */
        if (Auth::check()) {
            return view('home');
        }

        /*
         * user is not logged in
         * reg deadline passed
         * redirect to login page
         */
        if (Setting::registrationDeadlinePassed()) {
            return redirect(route('login'));
        }

        /*
         * user is not logged in
         * reg deadline has not passed
         * redirect to registration page
         */
        return redirect(route('register'));
    }
}
