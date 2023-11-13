<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return Feedback::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:256',
            'description' => 'required|string',
            'category_id' => 'required|integer',
        ]);

        $feedback = Feedback::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);
        $feedback->category_id = $validated['category_id'];
        $feedback->user_id = $request->user()->id;
        $feedback->save();

        return $feedback;
    }
}
