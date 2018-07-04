<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class LogoutController
 *
 * @package App\Http\Controllers\Auth
 */
class LogoutController extends Controller
{
    /**
     * LogoutController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
