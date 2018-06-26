<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\UserRequestedResetPasswordLink;
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
        return view('auth.passwords.request_link', ['users' => User::dropDown()]);
    }


    /**
     * @param ResetPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendLink(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        event(new UserRequestedResetPasswordLink(User::find($data['id'])));

        return back()->with(['email' => $data['email']]);
    }
}
