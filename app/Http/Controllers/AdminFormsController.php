<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminFormsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email|string|max:255',
            'message' => 'bail|required|string|min:45|max:500',
        ]);

        $message = request('email') . "\n" . request('message');

        Mail::raw($message, function ($message) {
            $message->to('vianosenko@gmail.com')
                ->subject('Admin Feedback form from gruzovoe-taxi-krasnodar.ru');
        });

        return back()->with('message', 'Сообщение отправленно');
    }
}
