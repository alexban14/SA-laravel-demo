<div class="comments mt-3">
    <h3>Comments</h3>
    @if ($post->has('comments'))
        @foreach ($post->comments as $comment)
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div>
                        <p class="card-text">{{ $comment->body }}</p>
                        <p class="card-subtitle mb-2 text-muted">By: {{ $comment->user->name }}</p>
                    </div>
                    @if (Auth::check() && $comment->user_id === Auth::user()->id)
                        <form action="{{ route('posts.delete.comment', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    @endif

    @auth
        <form action="{{ route('posts.store.comment', $post->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <textarea name="body" class="form-control" placeholder="Leave a comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
    @endauth
</div>
