@extends('layouts.app')

@section('content')

<!-- Gardens Index Header -->
<section style="padding: 5rem 0 4rem; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container" style="max-width: 760px; text-align: center;">
        <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.25rem; display: block;">🌿 My Gardens</span>
        <h1 style="font-size: clamp(2.25rem, 4vw, 3.5rem); font-weight: 700; line-height: 1.05; margin: 0 0 1.5rem; letter-spacing: -0.02em; color: hsl(var(--background));">
            Your Garden Listings
        </h1>
        <p style="font-size: 1.1rem; color: hsl(var(--background)/0.7); margin: 0 0 2.5rem; line-height: 1.6;">
            Manage all your proposed and approved community gardens in one place.
        </p>
        <a href="{{ route('gardens.create') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: hsl(var(--primary)); color: white; padding: 0.875rem 2rem; border-radius: 50px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: transform 0.2s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            + Add New Garden
        </a>
    </div>
</section>

<section style="padding: 3rem 0;">
    <div class="container">
        <div class="table-wrapper" style="border-radius: 20px; overflow: hidden; border: 1px solid hsl(var(--border)); box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Uploaded By</th>
                        <th>Location</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gardens as $garden)
                    <tr>
                        <td class="font-medium">
                            {{ $garden->title }}
                            @if($garden->status === 'pending')
                                <span style="background-color: #fef08a; color: #a16207; padding: 0.1rem 0.5rem; font-size: 0.75rem; border-radius: 99px; margin-left: 0.5rem; display: inline-block;">Pending Approval</span>
                            @endif
                        </td>
                        <td>{{ $garden->user->name ?? 'Community Member' }}</td>
                        <td>{{ $garden->location }}</td>
                        <td>{{ $garden->size }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('gardens.show', $garden) }}" class="btn btn-sm btn-outline">View</a>
                                <a href="{{ route('gardens.edit', $garden) }}" class="btn btn-sm btn-outline">Edit</a>
                                <form action="{{ route('gardens.destroy', $garden) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
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
