{{-- @extends('layouts.app-base') --}}
@extends('layouts.app')

@section('content')
    {{-- <div class="container md-w-100 w-50"> --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12"> <!-- Take full width on medium and larger screens -->
              <div class="position-relative" style="height: calc(100vh / 3); overflow: hidden;">
                    <img class="img-fluid w-100 position-absolute top-0 start-50 translate-middle-x" src="{{ $post['image'] }}" alt="{{ $post->title }}" style="object-fit: cover; height: 100%;">
                    <h2 class="post-title text-center position-absolute w-100" style="top: 50%; transform: translateY(-50%);">{{ $post['title'] }}</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-9">
                @if(session()->has('success'))
                    <x-alert type="success">
                        {{ session()->get('success') }}
                    </x-alert>
                @endif

                @if(session()->has('error'))
                    <x-alert type="danger">
                        {{ session()->get('error') }}
                    </x-alert>
                @endif

                @if (Auth::user() && Auth::user()->id === $post->user->id)
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
                @endif

                {{-- <h2>{{ $post['title'] }}</h2> --}}

                <p>{{ $post['body'] }}</p>

                {{-- <img class="img-fluid" src="{{ $post['image'] }}" alt="{{ $post->title }}" /> --}}
            </div>

            <div class="col-md-3 mt-md-0 mt-3">
                @include('posts.comments')
            </div>
        </div>

    </div>
@endsection
