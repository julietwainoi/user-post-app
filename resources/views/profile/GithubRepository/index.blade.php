@extends('layouts.master')

@section('content')
<div class="container">
    <h1>githubRepository Details</h1>
    'repo_name',
    'repo_url',
    'description',

    <!-- Check if there are any education records -->
    @if($githubRepositories->isNotEmpty())
        @foreach($githubRepositories as $githubRepository)
            <div class="mb-3">
                <p><strong>Degree:</strong> {{ $githubRepository->repo_name }}</p>
                <p><strong>Institution:</strong> {{ $githubRepository->repo_url }}</p>
                <p><strong>Year of Graduation:</strong> {{ $githubRepository->description }}</p>

                <a href="{{ route('github-repositories.edit', $githubRepository->uuid) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('github-repositories.destroy', $githubRepository->uuid) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <hr>
        @endforeach
    @else
        <p>No education details found.</p>
        <a href="{{ route('github-repositories.create') }}" class="btn btn-primary">Add Education Details</a>
    @endif
</div>
@endsection
