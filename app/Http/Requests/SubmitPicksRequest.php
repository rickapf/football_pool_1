<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SubmitPicksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'game_1'  => 'required_if:game_1_available,true',
            "game_2"  => "required_if:game_2_available,true",
            "game_3"  => "required_if:game_3_available,true",
            "game_4"  => "required_if:game_4_available,true",
            "game_5"  => "required_if:game_5_available,true",
            "game_6"  => "required_if:game_6_available,true",
            "game_7"  => "required_if:game_7_available,true",
            "game_8"  => "required_if:game_8_available,true",
            "game_9"  => "required_if:game_9_available,true",
            "game_10" => "required_if:game_10_available,true",
            "game_11" => "required_if:game_11_available,true",
            "game_12" => "required_if:game_12_available,true",
            "game_13" => "required_if:game_13_available,true",
            "game_14" => "required_if:game_14_available,true",
            "game_15" => "required_if:game_15_available,true",
            "game_16" => "required_if:game_16_available,true",
            'tiebreaker_points' => "bail|required_if:picks_made,all|numeric"
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
            'game_1.required_if'  => 'You must pick all games',
            'game_2.required_if'  => 'You must pick all games',
            'game_3.required_if'  => 'You must pick all games',
            'game_4.required_if'  => 'You must pick all games',
            'game_5.required_if'  => 'You must pick all games',
            'game_6.required_if'  => 'You must pick all games',
            'game_7.required_if'  => 'You must pick all games',
            'game_8.required_if'  => 'You must pick all games',
            'game_9.required_if'  => 'You must pick all games',
            'game_10.required_if' => 'You must pick all games',
            'game_11.required_if' => 'You must pick all games',
            'game_12.required_if' => 'You must pick all games',
            'game_13.required_if' => 'You must pick all games',
            'game_14.required_if' => 'You must pick all games',
            'game_15.required_if' => 'You must pick all games',
            'game_16.required_if' => 'You must pick all games',
            'tiebreaker_points.required_if' => 'Tiebreaker points is required',
            'tiebreaker_points.numeric'     => 'Tiebreaker points must be numeric'
        ];
    }
}
