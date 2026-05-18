@extends('layouts.app')

@section('content')
<div style="min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 3rem 1rem;">
    <div class="card" style="width: 100%; max-width: 420px;">
        <div class="card-header" style="text-align: center; padding-bottom: 0;">
            <div style="display: inline-flex; align-items: center; justify-content: center; width: 3.5rem; height: 3.5rem; border-radius: 50%; background-color: hsl(var(--primary) / 0.1); margin-bottom: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: hsl(var(--primary));"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
            </div>
            <h2 class="card-title" style="font-size: 1.5rem;">Welcome Back</h2>
            <p class="card-description" style="margin-top: 0.25rem;">Sign in to your UrbanRoots account</p>
        </div>

        <div class="card-content" style="padding-top: 1.5rem;">
            @if($errors->any())
                <div class="alert" style="background-color: hsl(var(--destructive) / 0.08); border-color: hsl(var(--destructive) / 0.2); color: hsl(var(--destructive)); margin-bottom: 1rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="label" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="input" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
                </div>

                <div class="form-group">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <label class="label" for="password" style="margin-bottom: 0;">Password</label>
                    </div>
                    <input type="password" id="password" name="password" class="input" placeholder="••••••••" required>
                </div>

                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
                    <input type="checkbox" id="remember" name="remember" style="accent-color: hsl(var(--primary)); width: 1rem; height: 1rem;">
                    <label for="remember" class="text-sm" style="color: hsl(var(--muted-foreground)); cursor: pointer;">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.75rem; font-size: 0.95rem;">
                    Sign In
                </button>
            </form>

            <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid hsl(var(--border));">
                <p class="text-sm" style="color: hsl(var(--muted-foreground));">
                    Don't have an account?
                    <a href="{{ route('register') }}" style="color: hsl(var(--primary)); font-weight: 600; text-decoration: underline;">Create one free</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
