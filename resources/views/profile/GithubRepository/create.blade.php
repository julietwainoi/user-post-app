<!-- resources/views/personal-details/create.blade.php -->
@extends('layouts.master') <!-- Assuming you have an app layout -->

@section('content')
<div class="container">
    <h2>GithubRepository Details</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('github-repositories.store') }}" method="POST">
        @csrf <!-- CSRF Token for form security -->

        <div class="mb-3">
            <label for="repo_name" class="form-label">repo_name</label>
            <input type="text" class="form-control" id="repo_name" name="repo_name" value="{{ old('repo_name') }}" required>
            @error('repo_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="repo_url" class="form-label">repo_url</label>
            <input type="text" class="form-control" id="repo_url" name="repo_url" value="{{ old('repo_url') }}">
            @error('repo_url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
