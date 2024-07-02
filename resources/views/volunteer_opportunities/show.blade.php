@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Volunteer Opportunity Details</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>{{ $opportunity->title }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $opportunity->description }}</p>
                <p><strong>Date:</strong> {{ $opportunity->date }}</p>
                <p><strong>Location:</strong> {{ $opportunity->location }}</p>
                <a href="{{ route('opportunity.edit', $opportunity->id) }}" class="btn btn-primary">Edit Opportunity</a>
            </div>
        </div>
    </div>
@endsection
