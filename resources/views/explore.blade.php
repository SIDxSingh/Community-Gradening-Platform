@extends('layouts.app')

@section('content')

<!-- Explore Header (Dark Bento) -->
<section style="padding: 6rem 0 5rem; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container" style="max-width: 760px; text-align: center;">
        <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.25rem; display: block;">🌿 Community Feed</span>
        <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 700; line-height: 1.05; margin: 0 0 1.5rem; letter-spacing: -0.02em; color: hsl(var(--background));">
            Explore Community Gardens
        </h1>
        <p style="font-size: 1.15rem; color: hsl(var(--background)/0.7); margin: 0 0 2.5rem; line-height: 1.6;">
            Discover beautiful gardens submitted by your neighbours. Like and comment to show your support.
        </p>
        <a href="{{ route('gardens.create') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: hsl(var(--primary)); color: white; padding: 0.875rem 2rem; border-radius: 50px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: transform 0.2s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            + Share Your Garden
        </a>
    </div>
</section>

<section class="section" style="padding: 3rem 0;">
    <div class="container">

        @if($gardens->isEmpty())
            <div style="text-align: center; padding: 5rem 2rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: hsl(var(--muted-foreground)); margin: 0 auto 1.5rem; display: block;"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;">No gardens yet!</h2>
                <p style="color: hsl(var(--muted-foreground)); margin-bottom: 1.5rem;">Be the first to propose a garden and share a photo to appear here.</p>
                <a href="{{ route('gardens.create') }}" class="btn btn-primary" style="padding: 0.75rem 1.5rem;">Propose a Garden</a>
            </div>
        @else
            <!-- Instagram-style Feed Grid -->
            <div class="explore-feed">
                @foreach($gardens as $garden)
                @php
                    $sessionId = session()->getId();
                    $isLiked = $garden->isLikedBySession($sessionId);
                @endphp
                <div class="feed-card reveal" data-garden-id="{{ $garden->id }}">

                    <!-- Card Header -->
                    <div class="feed-card-header">
                        <div class="feed-avatar">{{ strtoupper(substr($garden->title, 0, 1)) }}</div>
                        <div>
                            <div class="font-semibold" style="font-size: 0.9rem;">{{ $garden->title }}</div>
                            <div class="text-sm" style="color: hsl(var(--muted-foreground));">
                                <span style="color: hsl(var(--foreground)); font-weight: 500;">{{ $garden->user->name ?? 'Community Member' }}</span> • 
                                @if($garden->location)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline; vertical-align: middle;"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    {{ $garden->location }}
                                @else
                                    {{ $garden->created_at->diffForHumans() }}
                                @endif
                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->is_admin)
                            <form action="{{ route('admin.gardens.delete', $garden) }}" method="POST" onsubmit="return confirm('Admin: Delete this post?');" style="margin-left: auto;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm" style="background: none; border: none; padding: 0; color: hsl(var(--destructive)); cursor: pointer;" title="Delete Post">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- Garden Image -->
                    <div class="feed-card-image">
                        <img src="{{ asset('storage/' . $garden->image) }}" alt="{{ $garden->title }}" loading="lazy">
                    </div>

                    <!-- Action Bar -->
                    <div class="feed-card-actions">
                        <button class="like-btn {{ $isLiked ? 'liked' : '' }}" data-garden="{{ $garden->id }}" data-url="{{ route('gardens.like', $garden) }}" title="Like">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="{{ $isLiked ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                            <span class="like-count">{{ $garden->likes->count() }}</span>
                        </button>
                        <button class="comment-toggle-btn" data-garden="{{ $garden->id }}" title="Comment">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            <span>{{ $garden->comments->count() }}</span>
                        </button>
                        <a href="{{ route('gardens.show', $garden) }}" title="Join Garden Discussion" style="color: inherit; text-decoration: none; display: flex; align-items: center; justify-content: center; width: 22px; height: 22px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
                        </a>
                    </div>

                    <!-- Description -->
                    @if($garden->description)
                    <div class="feed-card-body">
                        <span class="font-semibold" style="font-size: 0.875rem;">{{ $garden->title }}</span>
                        <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground));"> {{ $garden->description }}</span>
                    </div>
                    @endif

                    <!-- Comments Preview -->
                    @if($garden->comments->count() > 0)
                    <div class="feed-comments-preview">
                        @foreach($garden->comments->take(2) as $comment)
                        <div class="feed-comment" style="display: flex; justify-content: space-between; align-items: start;">
                            <div>
                                <span class="font-semibold" style="font-size: 0.8rem;">{{ $comment->author_name }}</span>
                                <span style="font-size: 0.8rem; color: hsl(var(--muted-foreground));"> {{ $comment->body }}</span>
                            </div>
                            @if(Auth::check() && Auth::user()->is_admin)
                                <form action="{{ route('admin.comments.delete', $comment) }}" method="POST" onsubmit="return confirm('Admin: Delete comment?');" style="margin-left: 0.5rem;">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background: none; border: none; padding: 0; color: hsl(var(--destructive) / 0.5); cursor: pointer;" title="Delete Comment">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                        @endforeach
                        @if($garden->comments->count() > 2)
                            <span style="font-size: 0.78rem; color: hsl(var(--muted-foreground));">View all {{ $garden->comments->count() }} comments</span>
                        @endif
                    </div>
                    @endif

                    <!-- Add Comment -->
                    <div class="feed-comment-form" id="comment-form-{{ $garden->id }}" style="display: none;">
                        <form action="{{ route('gardens.comments.store', $garden) }}" method="POST" style="display: flex; gap: 0.5rem; padding: 0.75rem 1rem; border-top: 1px solid hsl(var(--border));">
                            @csrf
                            <input type="text" name="author_name" class="input" placeholder="Your name" required style="max-width: 120px; padding: 0.4rem 0.6rem; font-size: 0.8rem;">
                            <input type="text" name="body" class="input" placeholder="Add a comment…" required style="flex: 1; padding: 0.4rem 0.6rem; font-size: 0.8rem;">
                            <button type="submit" class="btn btn-primary btn-sm" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">Post</button>
                        </form>
                    </div>

                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Like toggle (AJAX)
    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const url = btn.dataset.url;
            const token = document.querySelector('meta[name="csrf-token"]')?.content
                       || '{{ csrf_token() }}';
            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' }
                });
                const data = await res.json();
                const svg = btn.querySelector('svg');
                svg.setAttribute('fill', data.liked ? 'currentColor' : 'none');
                btn.classList.toggle('liked', data.liked);
                btn.querySelector('.like-count').textContent = data.count;
            } catch(e) { console.error(e); }
        });
    });

    // Comment toggle
    document.querySelectorAll('.comment-toggle-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.garden;
            const form = document.getElementById('comment-form-' + id);
            if (form) form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    });
});
</script>
@endsection
