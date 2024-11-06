@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Personal Details</h1>

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
    <form action="{{ route('personal-details.update', $personalDetail->uuid) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $personalDetail->name) }}" required>
        </div>

        <!-- Bio -->
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" id="bio" class="form-control" rows="3">{{ old('bio', $personalDetail->bio) }}</textarea>
        </div>

        <!-- Location -->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $personalDetail->location) }}">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Details</button>
        <a href="{{ route('personal-details.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
