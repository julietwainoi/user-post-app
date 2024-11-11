@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Combined Details</h1>

    <!-- Education Details Section -->
    <h2>Education Details</h2>
    @if($educations->isNotEmpty())
        @foreach($educations as $education)
            <div class="mb-3">
                <p><strong>Degree:</strong> {{ $education->degree }}</p>
                <p><strong>Institution:</strong> {{ $education->institution }}</p>
                <p><strong>Year of Graduation:</strong> {{ $education->year_of_graduation }}</p>

                <a href="{{ route('educations.edit', $education->uuid) }}" class="btn btn-primary">Edit</a>
                
                <form action="{{ route('educations.destroy', $education->uuid) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <hr>
        @endforeach
    @else
        <p>No education details found.</p>
        <a href="{{ route('educations.create') }}" class="btn btn-primary">Add Education Details</a>
    @endif

    <!-- GitHub Repository Details Section -->
    <h2>GitHub Repository Details</h2>
    @if($githubRepositories->isNotEmpty())
        @foreach($githubRepositories as $githubRepository)
            <div class="mb-3">
                <p><strong>Repository Name:</strong> {{ $githubRepository->repo_name }}</p>
                <p><strong>Repository URL:</strong> <a href="{{ $githubRepository->repo_url }}" target="_blank">{{ $githubRepository->repo_url }}</a></p>
                <p><strong>Description:</strong> {{ $githubRepository->description }}</p>

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
        <p>No GitHub repository details found.</p>
        <a href="{{ route('github-repositories.create') }}" class="btn btn-primary">Add GitHub Repository</a>
    @endif
</div>
@endsection