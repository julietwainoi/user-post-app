@extends('layouts.master')

@section('content')
<div class="container">
    <h1> WorkExperience-details</h1>

    <!-- Check if there are any education records -->
    @if($workExperiences->isNotEmpty())
        @foreach($workExperiences as $workExperience)
            <div class="mb-3">
                <p><strong>job_title:</strong> {{ $workExperience->job_title }}</p>
                <p><strong>company:</strong> {{ $workExperience->company }}</p>
                <p><strong>start_date:</strong> {{ $workExperience->start_date }}</p>
                <p><strong>end_date:</strong> {{ $workExperience->end_date }}</p>

                <a href="{{ route('work-experiences.edit', $workExperience->uuid) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('work-experiences.destroy', $workExperience->uuid) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <hr>
        @endforeach
    @else
        <p>No education details found.</p>
        <a href="{{ route('work-experiences.create') }}" class="btn btn-primary">Add Education Details</a>
    @endif
</div>
@endsection
