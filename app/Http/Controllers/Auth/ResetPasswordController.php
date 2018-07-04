<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
     * @param $token
     * @param $resetId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm($resetId, $token)
    {
        return view('auth.passwords.reset', compact('resetId', 'token'));
    }


    /**
     * @param ResetPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        # Reset password
        $userId = PasswordReset::find($request->id)->user_id;
        $user = User::find($userId);
        $user->password = Hash::make($request->password);
        $user->save();

        # Delete request
        PasswordReset::destroy($request->id);

        # Login the user
        Auth::login($user);

        # Redirect to home page
        return redirect(route('home'));
    }
}
