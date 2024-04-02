<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("id","desc")->get();
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            "post_title"=> "string|required|max:255",
            "post_body" => "string|required|max:1000",
            "post_image" => "string|max:255",
        ]);

        Post::create([
            'title' => $validatedInput['post_title'],
            'body' => $validatedInput['post_body'],
            'image' => $validatedInput['post_image'],
        ]);

        //redirecting to controller action
        return redirect()
            ->action([PostController::class, "index"])
            ->with('success','Post created successfully!');

        //redirecting to named route
        // return redirect('post.index')->with('success','Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $validatedData = $request->validated();

        // update the resource with the validated
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
