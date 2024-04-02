@extends('layouts.app-base')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="d-flex flex-row justify-content-between">
            @foreach ($posts as $post)
                <div class="card" style="width: 18rem;">
                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $post->title }}</h5>
                        <a href="#" class="btn btn-primary">See post</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
