<?php

namespace App\Http\Requests\Auth;

use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResetPasswordRequest extends FormRequest
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
            # Only do these validaions after all initial validation passed
            if (!$validator->failed()) {

                do {

                    # Make sure password reset request exists
                    try {
                        $pr = PasswordReset::findOrFail($this->id);
                    } catch (ModelNotFoundException $e) {
                        $validator->errors()->add('id', 'Reset password request not found');
                        break;
                    }

                    # Make sure request hasn't expired
                    #Carbon::setTestNow(Carbon::create(2018, 7, 4, 23));
                    if (Carbon::now() > $pr->expires) {
                        PasswordReset::destroy($pr->id);
                        $validator->errors()->add('id', 'Reset password request has expired');
                        break;
                    }

                    # Validate token
                    if (!Hash::check($this->token, $pr->token)) {
                        $validator->errors()->add('id', 'Invalid token');
                        break;
                    }

                } while (0);

            }
        });
    }
}
