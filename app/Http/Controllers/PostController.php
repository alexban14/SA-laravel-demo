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
        $post = Post::orderBy("id","desc");
        return view("post.index", compact("post"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            "title"=> "string|required|max:255",
            "body" => "string|required",
            "image" => "string",
        ]);
        // ...saving logic

        // saved the data successfully

        // redirecting to url
        // return redirect('/posts')->with('success','Post created successfully!');

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
