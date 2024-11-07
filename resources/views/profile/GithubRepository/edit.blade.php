@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit githubRepository Details</h1>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit form -->
    <form action="{{ route('github-repositories.update', $githubRepository->uuid) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="repo_name" class="form-label">repo_name</label>
            <input type="text" name="repo_name" id="repo_name" class="form-control" value="{{ old('repo_name', $githubRepository->repo_name) }}" required>
        </div>
         <!-- Location -->
         <div class="mb-3">
            <label for="repo_url" class="form-label">repo_url</label>
            <input type="text" name="repo_url" id="repo_url" class="form-control" value="{{ old('repo_url', $githubRepository->repo_url) }}">
        </div>


        <!-- Bio -->
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $githubRepository->description) }}</textarea>
        </div>

       
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Details</button>
        <a href="{{ route('github-repositories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
