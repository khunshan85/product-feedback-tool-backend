<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string|max:512',
            'feedbackId' => 'required|integer',
        ]);

        $comment = Comment::create($validated);
        $comment->feedback_id = $validated['feedbackId'];
        $comment->user_id = $request->user()->id;
        $comment->save();

        return $comment;
    }
}
