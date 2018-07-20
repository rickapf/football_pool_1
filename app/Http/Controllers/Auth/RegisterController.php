<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Setting;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        if (Setting::registrationDeadlinePassed()) {
            return redirect(route('login'));
        }

        return view('auth.register', []);
    }


    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createUser(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => $data['password']
        ]);

        event(new UserRegistered($user));

        return back()->with(['first_name' => $user->first_name]);
    }
}
