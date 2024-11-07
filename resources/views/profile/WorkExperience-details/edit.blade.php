@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit WorkExperience-details</h1>

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
    <form action="{{ route('work-experiences.update', $workExperience->uuid) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="job_title" class="form-label">job_title</label>
            <input type="text" name="job_title" id="job_title" class="form-control" value="{{ old('job_title', $workExperience->job_title) }}" required>
        </div>

        <!-- Bio -->
        <div class="mb-3">
            <label for="company" class="form-label">company</label>
            <textarea name="company" id="company" class="form-control" rows="3">{{ old('company',$workExperience->company) }}</textarea>
        </div>
         <!-- start_date -->
         <div class="mb-3">
            <label for="start_date" class="form-label">start_date</label>
            <textarea name="start_date" id="start_date" class="form-control" rows="3">{{ old('start_date',$workExperience->start_date) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">end_date</label>
            <textarea name="end_date" id="end_date" class="form-control" rows="3">{{ old('end_date',$workExperience->end_date) }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Details</button>
        <a href="{{ route('work-experiences.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
