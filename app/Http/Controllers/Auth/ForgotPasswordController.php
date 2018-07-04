<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Events\UserRequestedResetPasswordLink;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
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
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.request_link', ['users' => User::dropDown()]);
    }


    /**
     * @param ForgotPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendLink(ForgotPasswordRequest $request)
    {
        $data  = $request->validated();
        $token = Str::random(60);

        $reset = PasswordReset::create([
            'user_id' => $data['id'],
            'token'   => Hash::make($token),
            'expires' => Carbon::now()->modify(config('pool.reset_password_link.expire'))
        ]);

        event(new UserRequestedResetPasswordLink(User::find($data['id']), $token, $reset->id));

        return back()->with(['email' => $data['email']]);
    }
}
