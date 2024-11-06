@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Education Details</h1>

    <!-- Check if there are any education records -->
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
</div>
@endsection
