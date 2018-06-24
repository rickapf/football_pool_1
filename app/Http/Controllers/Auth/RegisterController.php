<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
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
            'fname'    => $data['fname'],
            'lname'    => $data['lname'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        event(new UserRegistered($user));

        # TODO: make sure first name/last name combo isn't already being used
        # TODO: make sure first and last name are upper cased.
        # TODO: increment number of participants in pool (after event fired. admin table?)
        # TODO: Send myself a text message (after event fired)

        return back()->with(['fname' => $user->fname]);
    }
}
