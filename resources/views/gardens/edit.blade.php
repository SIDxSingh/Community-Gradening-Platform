@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Edit Garden</h2>
        <p class="card-description">Update the details for {{ $garden->title }}.</p>
    </div>
    
    <div class="card-content">
        <form action="{{ route('gardens.update', $garden) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="label" for="title">Title</label>
                <input type="text" id="title" name="title" class="input" required value="{{ old('title', $garden->title) }}">
            </div>

            <div class="form-group">
                <label class="label" for="location">Location</label>
                <input type="text" id="location" name="location" class="input" value="{{ old('location', $garden->location) }}">
            </div>

            <div class="form-group">
                <label class="label" for="size">Size</label>
                <input type="text" id="size" name="size" class="input" value="{{ old('size', $garden->size) }}">
            </div>

            <div class="form-group">
                <label class="label" for="description">Description</label>
                <textarea id="description" name="description" class="input" rows="4">{{ old('description', $garden->description) }}</textarea>
            </div>

            <div class="flex justify-between mt-8">
                <a href="{{ route('gardens.index') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Garden</button>
            </div>
        </form>
    </div>
</div>
@endsection
