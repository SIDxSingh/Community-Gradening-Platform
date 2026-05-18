@extends('layouts.app')

@section('content')

<!-- Plants Index Header -->
<section style="padding: 5rem 0 4rem; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container" style="max-width: 760px; text-align: center;">
        <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.25rem; display: block;">🍃 Plant Encyclopedia</span>
        <h1 style="font-size: clamp(2.25rem, 4vw, 3.5rem); font-weight: 700; line-height: 1.05; margin: 0 0 1.5rem; letter-spacing: -0.02em; color: hsl(var(--background));">
            Plants Library <span style="color: hsl(var(--primary)); font-size: 0.6em; vertical-align: middle; background: hsl(var(--primary)/0.15); border-radius: 8px; padding: 0.2em 0.6em;">MongoDB</span>
        </h1>
        <p style="font-size: 1.1rem; color: hsl(var(--background)/0.7); margin: 0 0 2.5rem; line-height: 1.6;">
            Browse our curated database of plant species, care guides, sunlight needs, and watering schedules.
        </p>
        <a href="{{ route('plants.create') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: hsl(var(--primary)); color: white; padding: 0.875rem 2rem; border-radius: 50px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: transform 0.2s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            + Add New Plant
        </a>
    </div>
</section>

<section style="padding: 3rem 0;">
    <div class="container">
        <div class="table-wrapper" style="border-radius: 20px; overflow: hidden; border: 1px solid hsl(var(--border)); box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Sunlight</th>
                        <th>Water Freq.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plants as $plant)
                    <tr>
                        <td class="font-medium">{{ $plant->name }}</td>
                        <td><span class="badge">{{ $plant->species }}</span></td>
                        <td>{{ $plant->sunlight_requirement }}</td>
                        <td>{{ $plant->water_frequency }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('plants.show', $plant) }}" class="btn btn-sm btn-outline">View</a>
                                <a href="{{ route('plants.edit', $plant) }}" class="btn btn-sm btn-outline">Edit</a>
                                <form action="{{ route('plants.destroy', $plant) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-destructive">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
