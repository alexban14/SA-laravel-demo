<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepositoryInterface)
    {
        $this->postRepository = $postRepositoryInterface;
    }

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
        $authUser = Auth::user();
        $user = User::whereId($authUser->id)->first();

        $validatedInput = $request->validate([
            // "post_title"=> "string|required|max:255",
            "post_title"=> ["string", "required","max:255"],
            "post_body" => "string|required|max:1000",
            "post_image" => "string|max:255",
        ]);

        $this->postRepository->store($validatedInput, $user);

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
        $post = Post::whereId($id)->first();

        if ($post) {
            return view('posts.show', compact('post'));
        } else {
            return redirect()->back()->with('error', 'Post not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::whereId($id)->first();

        if ($post) {
            return view('posts.edit', compact('post'));
        } else {
            return redirect()
                        ->back()
                        ->with('error', 'Post not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $post = Post::whereId($id)->first();

        // $post->title = $validatedData['post_title'];
        // $post->body = $validatedData['post_body'];
        // $post->image = $validatedData['post_image'];
        // $post->save();

        $post->update([
            'title' => $validatedData['post_title'],
            'body' => $validatedData['post_body'],
            'image' => $validatedData['post_image'],
        ]);

        return redirect()
                    ->action([PostController::class, 'show'], ['id' => $post->id])
                    ->with('success','Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::whereId($id)->first();

        if ($post->delete()) {
            return redirect()
                        ->action([PostController::class, "index"])
                        ->with('warning','Post deleted successfully!');
        } else {
            return redirect()
                        ->action([PostController::class, "index"])
                        ->with('error','Could not delete post');
        }
    }
}
