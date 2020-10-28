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
        $request->validate([
            'adminFormEmail' => 'bail|required|email',
            'adminFormMessage' => [
                'bail',
                'required',
                'string',
                'between:30,1000',
                'not_regex:{http}',
                'not_regex:{#}'
            ]
        ]);

        $message = 'email - ' . request('adminFormEmail') . "\n" . 'message - ' . request('adminFormMessage');
        Mail::raw($message, function ($message) {
            $message->to('vianosenko@gmail.com')
                ->subject('Admin Feedback Form');
        });

        return back()->with('message', 'Сообщение отправленно');
    }
}
