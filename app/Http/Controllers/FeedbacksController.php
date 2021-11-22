<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FeedbacksController extends Controller
{
//    public function __construct()
//    {
////        dd(Auth::user());
//        $this->middleware('auth');
//    }

    public function index()
    {
        Gate::authorize('view-admin');
//        dd(Auth::user()->role->name);
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
