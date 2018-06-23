<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fname'    => 'bail|required|alpha|max:30',
            'lname'    => 'bail|required|alpha|max:30',
            'email'    => 'bail|required|email|confirmed|max:30',
            'password' => 'bail|required|alpha_num|confirmed|max:30'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fname.required'     => 'First Name is required',
            'fname.alpha'        => 'First Name can only contain letters',
            'fname.max'          => 'First Name can contain a maximum of 30 characters',
            'lname.required'     => 'Last Name is required',
            'lname.alpha'        => 'Last Name can only contain letters',
            'lname.max'          => 'Last Name can contain a maximum of 30 characters',
            'email.required'     => 'Email Address is required',
            'email.email'        => 'Email Address is not valid',
            'email.max'          => 'Email Address can contain a maximum of 30 characters',
            'email.confirmed'    => 'Email Addresses do not match',
            'password.required'  => 'Password is required',
            'password.alpha_num' => 'Password can contain letters and numbers only',
            'password.confirmed' => 'Passwords do not match'
        ];
    }
}
