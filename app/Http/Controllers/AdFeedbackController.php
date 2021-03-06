<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotification;

class AdFeedbackController extends Controller
{
    /**
     *
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(10);

        return view('feedback.index', compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedbackFields = $request->validate([
            'email' => 'bail|required|email|unique:feedbacks',
            'name' => 'required|string|between:2,100',
            'ad_id' => 'bail|required|numeric|exists:ads,id',
            'score' => 'bail|required|in:1,2,3,4,5',
            'message' => 'bail|required|string|between:30,1000|not_regex:{http}|unique:feedbacks'
        ]);

        $feedback = new Feedback();
        $feedback->fill($feedbackFields);
        $feedback->save();

        $subject = 'Ad Feedback Form';
        Mail::to('vianosenko@gmail.com')->send(new AdminNotification($feedbackFields, $subject));

        return back()->with('message', 'Ваш отзыв отправлен');
    }
}
