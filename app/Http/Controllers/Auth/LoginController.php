<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login', [
            'users' => User::dropDown(),
            'deadlinePassed' => Setting::registrationDeadlinePassed()
        ]);
    }


    /**
     * Authenticate user
     *
     * @param LoginRequest $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return back()->withErrors("Login failed")->withInput();
        }

        return redirect()->intended(route('home'));
    }
}
