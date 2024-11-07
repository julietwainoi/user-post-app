@extends('layouts.master') <!-- Assuming you have a master layout -->

@section('content')
<div class="container">
    <h2>Add Workplace Details</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    

    <form action="{{ route('work-experiences.store') }}" method="POST">
        @csrf <!-- CSRF Token for form security -->

        <div class="mb-3">
            <label for="job_title" class="form-label">job_title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ old('job_title') }}" required>
            @error('job_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">company</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}" required>
            @error('company')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
         <!-- Start Date -->
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
        @error('start_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- End Date -->
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date (Optional)</label>
        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
        @error('end_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
