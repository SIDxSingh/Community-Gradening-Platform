@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Propose a New Garden</h2>
        <p class="card-description">Share your green space with the community. Add a photo to feature it in the Explore feed!</p>
    </div>

    <div class="card-content">
        <form action="{{ route('gardens.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="label" for="title">Title</label>
                <input type="text" id="title" name="title" class="input" required value="{{ old('title') }}" placeholder="e.g. Rooftop Kale Garden">
                @error('title') <p style="color: hsl(var(--destructive)); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="label" for="location">Location</label>
                <input type="text" id="location" name="location" class="input" value="{{ old('location') }}" placeholder="e.g. Lal Chowk, Srinagar">
            </div>

            <div class="form-group">
                <label class="label" for="size">Size</label>
                <input type="text" id="size" name="size" class="input" value="{{ old('size') }}" placeholder="e.g. 200 sq ft">
            </div>

            <div class="form-group">
                <label class="label" for="description">Description</label>
                <textarea id="description" name="description" class="input" rows="4" placeholder="Tell the community about your garden…">{{ old('description') }}</textarea>
            </div>

            <!-- Image Upload Field -->
            <div class="form-group">
                <label class="label" for="image">Garden Photo <span style="color: hsl(var(--muted-foreground)); font-weight: 400;">(optional — appears in Explore feed)</span></label>
                <div class="image-upload-zone" id="upload-zone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: hsl(var(--muted-foreground));"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                    <p style="margin: 0.5rem 0 0; font-size: 0.875rem; color: hsl(var(--muted-foreground));">Click to upload or drag and drop</p>
                    <p style="margin: 0.25rem 0 0; font-size: 0.75rem; color: hsl(var(--muted-foreground));">PNG, JPG, GIF, WEBP up to 4MB</p>
                    <input type="file" id="image" name="image" accept="image/*" style="position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;">
                    <img id="image-preview" src="" alt="Preview" style="display: none; max-height: 180px; border-radius: var(--radius); margin-top: 1rem; object-fit: cover; width: 100%;">
                </div>
                @error('image') <p style="color: hsl(var(--destructive)); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between mt-8">
                <a href="{{ route('gardens.index') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Garden</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (ev) => {
        const preview = document.getElementById('image-preview');
        preview.src = ev.target.result;
        preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
});
</script>
@endsection
