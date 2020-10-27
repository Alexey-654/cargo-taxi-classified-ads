<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\StoreAd;
use Illuminate\Validation\Rule;

// use App\Http\Requests\UpdateAd;

class AdController extends Controller
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
    public function store(StoreAd $request)
    {
        $validatedData = $request->validated();
        $image = $validatedData['photo'];
        $extension = $image->clientExtension();
        $id = Ad::max('id') + 1;
        $fileName = "id" . $id . "." . $extension;
        $validatedData['photo'] = $image->storeAs('adsPhoto', $fileName);
        $imageResize = Image::make($image->getRealPath());
        $imageResize->fit(250, 195);
        $imageResize->save(storage_path('app/public/thumbnails/adsPhoto/') . $fileName);

        $ad = new Ad();
        $ad->fill($validatedData);
        $ad->save();

        return redirect()->route('ads.show', $ad)
            ->with('message', 'Ваше объявление успешно созданно.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        $feedbacks = Feedback::where('ad_id', $ad->id)->latest()->paginate(5);
        return view('ads.show', compact('ad', 'feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        if ($request->input('email') === $ad->email) {
            $data = $this->validate($request, [
                'firstname' => 'bail|required|string|max:30',
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

            return redirect()->route('ads.index')
                ->with('message', 'Ваше объявление успешно обновленно и поднято');
        }

        return back()->with('error', 'Некорректный email адрес');
    }

    public function updateTime(Request $request, Ad $ad)
    {
        if ($request->input('updateTimeEmail') === $ad->email) {
            $ad->touch();
            $ad->save();
            return redirect()->route('ads.index')
                ->with('message', 'Ваше объявление успешно поднято');
        }

        return back()->with('error', 'Некорректный email адрес');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ad $ad)
    {
        if ($request->input('destroyEmail') === $ad->email) {
            $ad->state = 'deleted';
            $ad->save();
            return redirect()->route('ads.index')
                ->with('message', 'Ваше объявление удалено');
        }

        return back()->with('error', 'Некорректный email адрес');
    }
}