<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackPostRequest;
use App\Models\Contact;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('front.feedback.index');
    }

    public function addFeedback(FeedbackPostRequest $request)
    {
        $data = $request->all();

        Feedback::Create($data);

        return redirect('feedback/result')
            ->with('notification', 'We take note of your feedback');
    }

    public function result()
    {
        $notification = session('notification');
        $error = session('error');

        if ($notification == null && $error == null) {
            return redirect('');
        }

        return view('front.feedback.result', compact('notification', 'error'));
    }
}
