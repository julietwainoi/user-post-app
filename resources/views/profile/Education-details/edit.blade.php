@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Education Details</h1>

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
    <form action="{{ route('educations.update', $education->uuid) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" name="degree" id="degree" class="form-control" value="{{ old('degree', $educations->degree) }}" required>
        </div>

        <!-- Bio -->
        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <textarea name="institution" id="institution" class="form-control" rows="3">{{ old('institution', $educations->institution) }}</textarea>
        </div>

        <!-- Location -->
        <div class="mb-3">
            <label for="year_of_graduation" class="form-label">year_of_graduation</label>
            <input type="text" name="year_of_graduation" id="year_of_graduation" class="form-control" value="{{ old('year_of_graduation', $educations->year_of_graduation) }}">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Details</button>
        <a href="{{ route('educations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
