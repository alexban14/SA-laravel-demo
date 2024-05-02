<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostRepository implements PostRepositoryInterface
{
    public function store(array $validatedInput, User $user): bool
    {
        $post = new Post;
        $post->title = $validatedInput['post_title'];
        $post->body = $validatedInput['post_body'];
        $post->image = $validatedInput['post_image'];
        $post-> created_at = Carbon::now();

        $user->posts()->save($post);

        // Post::create([
        //     'title' => $validatedInput['post_title'],
        //     'body' => $validatedInput['post_body'],
        //     'image' => $validatedInput['post_image'],
        //     'user_id' => $user->id,
        //     'created_at' => Carbon::now(),
        // ]);

        if ($post->id) {
            return true;
        } else {
            return false;
        }
    }
}
