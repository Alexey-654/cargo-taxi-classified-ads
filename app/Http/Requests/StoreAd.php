<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAd extends FormRequest
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
            'firstname' => 'required|string|between:2,33',
            'lastname' => 'required|string|between:2,33',
            'email' => 'required|email|string|unique:ads',
            'phone' => 'required|size:12|unique:ads',
            'type' => 'required|string',
            'cargo_capacity' => 'required',
            'body_length' => 'required',
            'body_width' => 'required',
            'body_height' => 'required',
            'back_door' => 'in:0,1',
            'side_door' => 'in:0,1',
            'up_door' => 'in:0,1',
            'open_door' => 'in:0,1',
            'movers' => 'required|in:0,1',
            'title' => 'required|unique:ads|string|not_regex:{http}|between:20,120',
            'description' => 'required|string|not_regex:{http}|unique:ads|between:20,600',
            'city_price' => 'required',
            'out_of_town_price' => 'required',
            'photo' => 'required|image|between:10,1000'
        ];
    }
}
