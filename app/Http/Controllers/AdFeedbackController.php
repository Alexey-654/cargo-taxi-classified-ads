<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $data = $request->validate([
            'email' => 'bail|required|email|string|max:100|unique:feedbacks',
            'name' => 'required|string|max:100',
            'ad_id' => 'bail|required|numeric',
            'score' => 'bail|required|in:1,2,3,4,5',
            'message' => 'bail|required|string|min:45|max:600|not_regex:{http}|unique:feedbacks'
        ]);

        $feedback = new Feedback();
        $feedback->fill($data);
        $feedback->save();

        $message = $data['email'] . "\n" .
            'Name - ' . $data['name'] . "\n" .
            'Ad_id - ' . $data['ad_id'] . "\n" .
            'Score - ' . $data['score'] . "\n" .
            'Message - ' . $data['message'];

        Mail::raw($message, function ($message) {
            $message->to('vianosenko@gmail.com')
                ->subject('Ad Feedback Form');
        });

        return back()->with('message', 'Ваш отзыв отправлен');
    }
}
