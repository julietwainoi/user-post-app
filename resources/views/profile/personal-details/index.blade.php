@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Personal Details</h1>

    @if($personalDetail)
        <p><strong>Name:</strong> {{ $personalDetail->name }}</p>
        <p><strong>Bio:</strong> {{ $personalDetail->bio }}</p>
        <p><strong>Location:</strong> {{ $personalDetail->location }}</p>
        <a href="{{ route('personal-details.edit', $personalDetail) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('personal-details.destroy', $personalDetail) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @else
        <a href="{{ route('personal-details.create') }}" class="btn btn-primary">Add Personal Details</a>
    @endif
</div>
@endsection
