<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        $users = User::get(['id', 'fname', 'lname'])->sortBy('fname')->toArray();

        return view('auth.login', compact('users'));
    }
}
