@extends('layouts.app-base')

@section('content')
    <div class="container md-w-100 w-50">
        <div class="mb-3">
            <a href="/posts/{{ $post['id'] }}/edit">
                <button class="btn btn-outline-info">
                    Edit Post
                </button>
            </a>
        </div>
        <h2>{{ $post['title'] }}</h2>
        <p>{{ $post['body'] }}</p>
        <img class="img-fluid" src="{{ $post['image'] }}" alt="{{ $post->title }}" />
    </div>
@endsection
