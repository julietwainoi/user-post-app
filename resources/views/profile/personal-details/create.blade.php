<!-- resources/views/personal-details/create.blade.php -->
@extends('layouts.master') <!-- Assuming you have an app layout -->

@section('content')
<div class="container">
    <h2>Add Personal Details</h2>

    <!-- Display Success Message -->
   ><!-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif -->
    <x-auth-session-status :status="session('status')" />


    <form action="{{ route('personal-details.store') }}" method="POST">
        @csrf <!-- CSRF Token for form security -->

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" name="bio">{{ old('bio') }}</textarea>
            @error('bio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
