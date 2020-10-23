<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Ad;
use App\Models\Feedback;
use Intervention\Image\ImageManagerStatic as Image;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::getAds();
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ad = new Ad();
        return view('ads.create', compact('ad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
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
        ]);

        $image = $request->file('photo');
        $extension = $image->clientExtension();
        $id = Ad::max('id') + 1;
        $filename = "id" . $id . "." . $extension;
        $data['photo'] = $image->storeAs('adsPhoto', $filename);

        $imageResize = Image::make($image->getRealPath());
        $imageResize->fit(250, 195);
        $imageResize->save(storage_path('app/public/thumbnails/adsPhoto/') . $filename);

        $ad = new Ad();
        $ad->fill($data);
        $ad->save();
        $request->session()->flash('message', 'Ваше объявление успешно созданно.');

        return redirect()->route('ad.show', ['id' => $ad->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        $feedbacks = Feedback::where('ad_id', $id)->latest()->paginate(5);
        return view('ads.show', compact('ad', 'feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $onlyEmailPassed = 3;
        if (count($request->input()) === $onlyEmailPassed && $request->input('email') === $ad->email) {
            $ad->touch();
            $ad->save();
            $request->session()->flash('message', 'Ваше объявление успешно поднято.');
            return redirect()->route('ads.index');
        }
        if ($request->input('email') === $ad->email) {
            $data = $this->validate($request, [
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
            ]);

            if ($request->file('photo')) {
                $image = $request->file('photo');
                $extension = $image->clientExtension();
                $filename = "id" . $ad->id . "." . $extension;
                $data['photo'] = $image->storeAs('adsPhoto', $filename);
                $imageResize = Image::make($image->getRealPath());
                $imageResize->fit(250, 195);
                $imageResize->save(storage_path('app/public/thumbnails/adsPhoto/') . $filename);
            }

            $ad->fill($data);
            $ad->save();
            $request->session()->flash('message', 'Ваше объявление успешно обновленно и поднято.');
            return redirect()->route('ads.index');
        }

        $request->session()->flash('error', 'Некорректный email адрес');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
        if ($request->input('email') === $ad->email) {
            $ad->state = 'deleted';
            $ad->save();
            $request->session()->flash('message', 'Ваше объявление удалено.');
            return redirect()->route('ads.index');
        }

        $request->session()->flash('error', 'Некорректный email адрес');
        return back();
    }
}
