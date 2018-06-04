<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
            'fname'    => 'bail|required|max:30',
            'lname'    => 'bail|required|max:30',
            'email'    => 'bail|required|max:30',
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
            'fname.max'          => 'First Name can contain a maximum of 30 characters',
            'lname.required'     => 'Last Name is required',
            'lname.max'          => 'Last Name can contain a maximum of 30 characters',
            'email.required'     => 'Email Address is required',
            'email.max'          => 'Email Address can contain a maximum of 30 characters',
            'password.required'  => 'Password is required',
            'password.alpha_num' => 'Password can contain letters and numbers only',
            'password.confirmed' => 'Passwords do not match'
        ];
    }
}
