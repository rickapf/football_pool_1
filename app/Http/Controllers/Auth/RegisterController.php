<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\RegisterUser;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Show registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('auth.register', []);
    }


    /**
     * @param RegisterUser $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterUser $request)
    {
        $data = $request->validated();

        $user = User::create([
            'fname'    => $data['fname'],
            'lname'    => $data['lname'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return back()->with(['fname' => $user->fname]);
    }
}
