<?php

use App\Models\Comment;


$comment = Comment::all();

// Creating a new user
$comment = Comment::create([
    'body' => 'Helpful article. Keep it up!',
    'post_id' => 2,
    'user_id' => 1,
]);

// Updating a user
$comment->update(['body' => 'The article was better before the update!']);

// Deleting a user
$comment->delete();
