@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Edit Plant</h2>
        <p class="card-description">Update information for {{ $plant->name }}.</p>
    </div>
    
    <div class="card-content">
        <form action="{{ route('plants.update', $plant) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="label" for="name">Name / Nickname</label>
                <input type="text" id="name" name="name" class="input" required value="{{ old('name', $plant->name) }}">
            </div>

            <div class="form-group">
                <label class="label" for="species">Species</label>
                <input type="text" id="species" name="species" class="input" required value="{{ old('species', $plant->species) }}">
            </div>

            <div class="form-group">
                <label class="label" for="sunlight_requirement">Sunlight Requirement</label>
                <input type="text" id="sunlight_requirement" name="sunlight_requirement" class="input" required value="{{ old('sunlight_requirement', $plant->sunlight_requirement) }}">
            </div>

            <div class="form-group">
                <label class="label" for="water_frequency">Water Frequency</label>
                <input type="text" id="water_frequency" name="water_frequency" class="input" required value="{{ old('water_frequency', $plant->water_frequency) }}">
            </div>

            <div class="flex justify-between mt-8">
                <a href="{{ route('plants.index') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Plant</button>
            </div>
        </form>
    </div>
</div>
@endsection
