<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotification;

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
                'not_regex:/@|#|http/',
            ]
        ]);

        $userEntranceTime = session()->get('time');
        $userTimeOnSiteBeforeSendForm = now()->diffInMinutes($userEntranceTime);

        $fields = [
            'email' => request('adminFormEmail'),
            'message' => request('adminFormMessage'),
            'url' => url()->previous(),
            'time on site before send form' => $userTimeOnSiteBeforeSendForm,
            'referer' => $request->headers->get('referer'),
            'user-agent' => $request->userAgent(),
        ];

        $subject = 'Admin Feedback Form';
        Mail::to('vianosenko@gmail.com')->send(new AdminNotification($fields, $subject));

        return back()->with('message', 'Сообщение отправленно');
    }
}
