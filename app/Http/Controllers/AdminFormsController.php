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
            'adminFormEmail' => 'bail|required|email|string|max:255',
            'adminFormMessage' => [
                'bail',
                'required',
                'string',
                'min:30',
                'max:500',
                'not_regex:{http}',
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
