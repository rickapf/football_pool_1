<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterUser;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('register', []);
    }


    /**
     * Process registration form
     *
     * @param RegisterUser $request
     */
    public function register(RegisterUser $request)
    {
        $data = $request->validated();

        User::create([
            'fname'    => $data['fname'],
            'lname'    => $data['lname'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
