@extends('layouts.app')

@section('content')

<!-- Plant Show: Dark Hero Banner -->
<section style="padding: 5rem 0 4rem; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container" style="max-width: 900px;">
        <a href="{{ route('plants.index') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; color: hsl(var(--background)/0.6); font-size: 0.875rem; text-decoration: none; margin-bottom: 2rem;" onmouseover="this.style.color='hsl(var(--primary))'" onmouseout="this.style.color='hsl(var(--background)/0.6)'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            Back to Plants
        </a>
        <div style="display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
            <div>
                <h1 style="font-size: clamp(2rem, 4vw, 3.25rem); font-weight: 700; margin: 0 0 0.75rem; letter-spacing: -0.02em; color: hsl(var(--background));">{{ $plant->name }}</h1>
                <span style="display: inline-flex; background: hsl(var(--primary)/0.2); color: hsl(var(--primary)); padding: 0.35rem 1rem; border-radius: 50px; font-size: 0.875rem; font-weight: 600;">{{ $plant->species }}</span>
            </div>
            <a href="{{ route('plants.edit', $plant) }}" style="display: inline-flex; align-items: center; gap: 0.4rem; background: hsl(var(--background)/0.1); color: hsl(var(--background)); padding: 0.625rem 1.25rem; border-radius: 50px; font-size: 0.875rem; font-weight: 500; text-decoration: none; border: 1px solid hsl(var(--background)/0.2);">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                Edit Plant
            </a>
        </div>
    </div>
</section>

<!-- Plant Detail Cards -->
<section style="padding: 3rem 0 5rem;">
    <div class="container" style="max-width: 900px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem;">
            <div style="background: white; border-radius: 16px; border: 1px solid hsl(var(--border)); padding: 1.75rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                <div style="width: 40px; height: 40px; border-radius: 12px; background: hsl(var(--primary)/0.1); color: hsl(var(--primary)); display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                </div>
                <span style="font-size: 0.78rem; font-weight: 600; color: hsl(var(--muted-foreground)); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.35rem;">Sunlight Requirement</span>
                <p style="margin: 0; font-size: 1.1rem; font-weight: 600; color: hsl(var(--foreground));">{{ $plant->sunlight_requirement }}</p>
            </div>
            <div style="background: white; border-radius: 16px; border: 1px solid hsl(var(--border)); padding: 1.75rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                <div style="width: 40px; height: 40px; border-radius: 12px; background: hsl(var(--secondary)/0.1); color: hsl(var(--secondary)); display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a8 8 0 0 1-8-8c0-4.314 7-14 8-14s8 9.686 8 14a8 8 0 0 1-8 8z"/></svg>
                </div>
                <span style="font-size: 0.78rem; font-weight: 600; color: hsl(var(--muted-foreground)); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.35rem;">Watering Frequency</span>
                <p style="margin: 0; font-size: 1.1rem; font-weight: 600; color: hsl(var(--foreground));">{{ $plant->water_frequency }}</p>
            </div>
            <div style="background: hsl(var(--muted)/0.4); border-radius: 16px; border: 1px solid hsl(var(--border)); padding: 1.75rem;">
                <span style="font-size: 0.78rem; font-weight: 600; color: hsl(var(--muted-foreground)); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.35rem;">MongoDB ID</span>
                <p style="margin: 0; font-size: 0.8rem; font-weight: 500; color: hsl(var(--muted-foreground)); word-break: break-all; font-family: monospace;">{{ $plant->_id }}</p>
            </div>
        </div>
    </div>
</section>

@endsection
