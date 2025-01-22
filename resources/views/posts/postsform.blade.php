@extends('layouts.master')
@section('content')
@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif

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
    @endsection