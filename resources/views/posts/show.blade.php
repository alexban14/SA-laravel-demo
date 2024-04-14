@extends('layouts.app-base')

@section('content')
    <div class="container md-w-100 w-50">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="d-flex mb-3 justify-content-between">
            <a href="/posts/{{ $post['id'] }}/edit">
                <button class="btn btn-info">
                    Edit Post
                </button>
            </a>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf()
                @method("DELETE")
                <button class="btn btn-danger" type="submit">
                    Delete Post
                </button>
        </div>

        <h2>{{ $post['title'] }}</h2>

        <p>{{ $post['body'] }}</p>

        <img class="img-fluid" src="{{ $post['image'] }}" alt="{{ $post->title }}" />
    </div>
@endsection
