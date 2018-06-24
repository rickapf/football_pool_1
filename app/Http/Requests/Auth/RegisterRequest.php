<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

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
            'fname'    => 'bail|required|regex:/^[a-zA-Z .]+$/|max:30',
            'lname'    => 'bail|required|regex:/^[a-zA-Z .]+$/|max:30',
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
            'fname.regex'        => 'First Name can only contain only letters',
            'fname.max'          => 'First Name can contain a maximum of 30 characters',
            'lname.required'     => 'Last Name is required',
            'lname.regex'        => 'Last Name can only contain letters',
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


    /**
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator)
        {
            # Only do this validaion only after all initial validation passed
            if (!$validator->failed()) {
                # Make sure first & last name combo hasn't already registered
                if ($user = User::where('fname', $this->fname)->where('lname', $this->lname)->first()) {
                    $validator->errors()->add('id', $this->fname . ' ' . $this->lname . ' is already registered');
                }
            }
        });
    }
}
