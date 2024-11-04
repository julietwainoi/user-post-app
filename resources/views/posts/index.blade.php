@extends('layouts.master')
@section('content')

<div class="container p-4"> <!-- Added padding here -->
    <form action="{{ route('posts.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>

    <hr>

    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                
                <p class="text-muted">Posted by: {{ $post->user->name }}</p>

                <form action="{{ route('posts.like', $post->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Like ({{ $post->likes->count() }})</button>
                </form>

                <h6 class="mt-4">Comments:</h6>
                @foreach ($post->comments as $comment)
                    <p>{{ $comment->content }} - <small>by {{ $comment->user->name }}</small></p>
                @endforeach

                <form action="{{ route('posts.comment', $post->id) }}" method="POST">
                    @csrf
                    <textarea name="content" class="form-control mb-2" required></textarea>
                    <button type="submit" class="btn btn-secondary">Comment</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection
