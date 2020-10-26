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
            'firstname' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'email' => 'bail|required|email|string|max:100|unique:ads',
            'phone' => 'bail|required|size:12|unique:ads',
            'type' => 'bail|required|string',
            'cargo_capacity' => 'required',
            'body_length' => 'required',
            'body_width' => 'required',
            'body_height' => 'required',
            'back_door' => 'in:0,1',
            'side_door' => 'in:0,1',
            'up_door' => 'in:0,1',
            'open_door' => 'in:0,1',
            'movers' => 'bail|required|in:0,1',
            'title' => 'bail|required|unique:ads|string|max:100',
            'description' => 'bail|required|string|unique:ads|max:600',
            'city_price' => 'required',
            'out_of_town_price' => 'required',
            'photo' => 'required|image|between:10,1000'
        ];
    }
}
