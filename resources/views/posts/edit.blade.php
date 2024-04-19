{{-- @extends('layouts.app-base') --}}
@extends('layouts.app')

@section('content')
    <div class="container md-w-100 w-50">
        <h2 class="mb-5">Edit the post</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf()
            @method("PUT")
            <div class="mb-3">
                <label for="post_title" class="form-label">Title</label>
                <input type="text" class="form-control" id="post_title" name="post_title" value="{{ $post->title }}">
            </div>

            <div class="mb-3 ">
                <label for="post_body" class="form-label">Contents of the post</label>
                <textarea class="form-control" id="post_body" name="post_body" rows="3" placeholder="Write here your thoughts...">{{ $post->body }}</textarea>
            </div>

            <div class="mb-3">
                <label for="post_image" class="form-label">Image</label>
                <input type="text" class="form-control" id="post_image" name="post_image" placeholder="image link for your post" value="{{ $post->image }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
