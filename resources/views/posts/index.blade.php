@extends('layouts.master')
@section('content')
@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif

<div class="container p-4"> 

    <hr>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 mb-4"> <!-- Adjust column size to 6 for two columns -->
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        
                        <p class="text-muted">Posted by: {{ $post->user->name }}</p>

                        <form action="{{ route('posts.like', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">
                                Like ({{ $post->likes->count() }})
                            </button>
                        </form>
                        
                        <h3>Comments:</h3>
                        @if($post->comments->isEmpty())
                            <p>No comments yet.</p>
                        @else
                            @foreach($post->comments as $comment)
                                <div>
                                    <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                                </div>
                            @endforeach
                        @endif
                        
                        <form action="{{ route('posts.comment', $post->id) }}" method="POST">
                            @csrf
                            <textarea name="content" class="form-control mb-2" required></textarea>
                            <button type="submit" class="btn btn-secondary">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
