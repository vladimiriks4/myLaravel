<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class FeedbacksController extends Controller
{
    public function feedback()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedback', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.contacts');
    }

    public function store()
    {
        $this->validate(request(), [
            'message' => 'required',
            'email' => 'required|string|max:45|email:rfc,dns',
        ]);

        Feedback::create(request()->all());
        return redirect('/admin/feedback');
    }
}
