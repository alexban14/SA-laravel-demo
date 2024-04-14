@extends('layouts.app-base')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="/posts/create">
                <button class="btn btn-success">
                    New Post
                </button>
            </a>
        </div>

        <div class="d-flex flex-row justify-content-start">
            @foreach ($posts as $post)
                <div class="card m-3" style="width: 18rem;">
                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $post->title }}</h5>
                        <a href="/posts/{{ $post->id }}" class="btn btn-primary">See post</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
