<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Ad;

class UpdateAd extends FormRequest
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
    public function rules(Ad $ad)
    {
            return [
                'firstname' => 'required|string|max:30',
                'lastname' => 'string|max:30',
                'email' => [
                    'bail',
                    'required',
                    'email',
                    'string',
                    'max:100',
                    Rule::unique('ads')->ignore($ad->id)
                ],
                'phone' => [
                    'bail',
                    'required',
                    'size:12',
                    Rule::unique('ads')->ignore($ad->id)
                ],
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
                'title' => [
                    'bail',
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('ads')->ignore($ad->id)
                ],
                'description' => [
                    'bail',
                    'required',
                    'string',
                    'max:600',
                    Rule::unique('ads')->ignore($ad->id)
                ],
                'city_price' => 'required',
                'out_of_town_price' => 'required',
                'photo' => 'image|between:10,1000'
            ];
    }
}
