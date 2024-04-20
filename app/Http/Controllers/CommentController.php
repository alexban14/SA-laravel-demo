<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        // Create the comment
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $postId;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function destroy(int $id)
    {
        $comment = Comment::whereId($id)->first();

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id === Auth::user()->id) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }
    }
}
