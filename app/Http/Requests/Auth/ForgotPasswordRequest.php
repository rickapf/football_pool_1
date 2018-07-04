<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ForgotPasswordRequest extends FormRequest
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
            'id'    => 'bail|required|integer',
            'email' => 'bail|required|email|max:30'
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
            'id.required'    => 'Name is required',
            'id.integer'     => 'Name is not valid',
            'email.required' => 'Email Address is required',
            'email.email'    => 'Email Address is not valid',
            'email.max'      => 'Email Address can contain a maximum of 30 characters',
        ];
    }


    /**
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator)
        {
            # Only do this validaion after all initial validation passed
            if (!$validator->failed()) {
                # Validate user and password combination
                try {
                    User::where('id', $this->id)->where('email', $this->email)->firstOrFail();
                } catch (ModelNotFoundException $e) {
                    $validator->errors()->add('id', 'Name and/or email address is incorrect');
                }
            }
        });
    }
}
