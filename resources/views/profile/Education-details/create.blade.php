@extends('layouts.master') <!-- Assuming you have a master layout -->

@section('content')
<div class="container">
    <h2>Add Education Details</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('educations.store') }}" method="POST">
        @csrf <!-- CSRF Token for form security -->

        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" class="form-control" id="degree" name="degree" value="{{ old('degree') }}" required>
            @error('degree')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <input type="text" class="form-control" id="institution" name="institution" value="{{ old('institution') }}" required>
            @error('institution')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year_of_graduation" class="form-label">Year of Graduation</label>
            <input type="number" class="form-control" id="year_of_graduation" name="year_of_graduation" value="{{ old('year_of_graduation') }}" required>
            @error('year_of_graduation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
