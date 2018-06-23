<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        # TODO: Create a shared method for this (in model?)
        $users = User::get(['id', 'fname', 'lname'])->sortBy('fname')->toArray();

        return view('auth.passwords.request_link', compact('users'));
    }


    /**
     * @param ResetPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendLink(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        # TODO: Send email

        return back()->with(['email' => $data['email']]);
    }
}
