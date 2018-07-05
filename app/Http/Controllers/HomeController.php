<?php

namespace App\Http\Controllers;

use App\Traits\Authentication;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    use Authentication;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        if ($this->registrationDeadlinePassed()) {
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
