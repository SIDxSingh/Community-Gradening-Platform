@extends('layouts.app')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 2rem 1rem;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem;">Admin Dashboard</h1>
            <p style="color: hsl(var(--muted-foreground));">Manage users, approve gardens, and moderate content.</p>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: hsl(142 72% 29% / 0.1); border: 1px solid hsl(142 72% 29% / 0.2); color: hsl(142 72% 29%); padding: 1rem; border-radius: var(--radius); margin-bottom: 2rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background-color: hsl(var(--destructive) / 0.1); border: 1px solid hsl(var(--destructive) / 0.2); color: hsl(var(--destructive)); padding: 1rem; border-radius: var(--radius); margin-bottom: 2rem;">
            {{ session('error') }}
        </div>
    @endif

    <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
        
        {{-- PENDING GARDENS --}}
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Pending Garden Approvals ({{ $pendingGardens->count() }})</h2>
            </div>
            <div class="card-content">
                @if($pendingGardens->isEmpty())
                    <p style="color: hsl(var(--muted-foreground)); font-size: 0.875rem;">No pending gardens right now.</p>
                @else
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($pendingGardens as $garden)
                            <div style="border: 1px solid hsl(var(--border)); padding: 1rem; border-radius: var(--radius); display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; gap: 1rem; align-items: center;">
                                    @if($garden->image)
                                        <img src="{{ asset('storage/' . $garden->image) }}" alt="Garden" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                    @endif
                                    <div>
                                        <h3 style="font-weight: 600; margin: 0;">{{ $garden->title }}</h3>
                                        <p style="font-size: 0.875rem; color: hsl(var(--muted-foreground)); margin: 0;">{{ Str::limit($garden->description, 50) }}</p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 0.5rem;">
                                    <form action="{{ route('admin.gardens.approve', $garden) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm" style="background-color: hsl(142 72% 29%); color: white; border: none; height: 32px; padding: 0 1rem; border-radius: var(--radius); cursor: pointer;">Accept</button>
                                    </form>
                                    <form action="{{ route('admin.gardens.delete', $garden) }}" method="POST" onsubmit="return confirm('Delete this request permanently?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline" style="color: hsl(var(--destructive)); border-color: hsl(var(--destructive) / 0.5); height: 32px;">Reject & Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        {{-- ALL APPROVED GARDENS --}}
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Live Gardens ({{ $approvedGardens->count() }})</h2>
            </div>
            <div class="card-content">
                @if($approvedGardens->isEmpty())
                    <p style="color: hsl(var(--muted-foreground)); font-size: 0.875rem;">No live gardens.</p>
                @else
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        @foreach($approvedGardens as $garden)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid hsl(var(--border));">
                                <div>
                                    <span style="font-weight: 500;">{{ $garden->title }}</span>
                                    <span style="font-size: 0.75rem; color: hsl(var(--muted-foreground)); margin-left: 0.5rem;">{{ $garden->created_at->format('M d, Y') }}</span>
                                </div>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="{{ route('gardens.show', $garden) }}" class="btn btn-sm btn-outline" style="height: 28px; font-size: 0.75rem; padding: 0 0.5rem;">View</a>
                                    <form action="{{ route('admin.gardens.delete', $garden) }}" method="POST" onsubmit="return confirm('Delete this live garden permanently?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline" style="height: 28px; font-size: 0.75rem; padding: 0 0.5rem; color: hsl(var(--destructive)); border-color: hsl(var(--destructive) / 0.5);">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        {{-- USERS --}}
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Registered Users ({{ $users->count() }})</h2>
            </div>
            <div class="card-content">
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    @foreach($users as $user)
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid hsl(var(--border));">
                            <div>
                                <span style="font-weight: 500;">{{ $user->name }}</span>
                                <span style="font-size: 0.875rem; color: hsl(var(--muted-foreground)); margin-left: 0.5rem;">{{ $user->email }}</span>
                                @if($user->is_admin)
                                    <span style="margin-left: 0.5rem; background: hsl(var(--primary) / 0.1); color: hsl(var(--primary)); font-size: 0.7rem; padding: 0.1rem 0.4rem; border-radius: 4px; font-weight: 600;">ADMIN</span>
                                @endif
                            </div>
                            @if(!$user->is_admin)
                                <form action="{{ route('admin.users.delete', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline" style="height: 28px; font-size: 0.75rem; padding: 0 0.5rem; color: hsl(var(--destructive)); border-color: hsl(var(--destructive) / 0.5);">Delete User</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
