<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\UserRegistered;
use App\Traits\Authentication;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    use Authentication;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        if ($this->registrationDeadlinePassed()) {
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
            'fname'    => ucfirst($data['fname']),
            'lname'    => ucfirst($data['lname']),
            'email'    => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        event(new UserRegistered($user));

        return back()->with(['fname' => $user->fname]);
    }
}
