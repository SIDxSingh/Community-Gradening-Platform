@extends('layouts.app')

@section('content')
<div style="min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 3rem 1rem;">
    <div class="card" style="width: 100%; max-width: 460px;">
        <div class="card-header" style="text-align: center; padding-bottom: 0;">
            <div style="display: inline-flex; align-items: center; justify-content: center; width: 3.5rem; height: 3.5rem; border-radius: 50%; background-color: hsl(var(--primary) / 0.1); margin-bottom: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: hsl(var(--primary));"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
            </div>
            <h2 class="card-title" style="font-size: 1.5rem;">Join UrbanRoots</h2>
            <p class="card-description" style="margin-top: 0.25rem;">Create your free community account</p>
        </div>

        <div class="card-content" style="padding-top: 1.5rem;">

            {{-- Server-side errors --}}
            @if($errors->any())
                <div style="background-color: hsl(var(--destructive) / 0.08); border: 1px solid hsl(var(--destructive) / 0.25); color: hsl(var(--destructive)); border-radius: var(--radius); padding: 0.875rem 1rem; margin-bottom: 1.25rem;">
                    <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.875rem; display: flex; flex-direction: column; gap: 0.25rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" id="register-form" novalidate>
                @csrf

                {{-- Name --}}
                <div class="form-group">
                    <label class="label" for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="input {{ $errors->has('name') ? 'input-error' : '' }}"
                           value="{{ old('name') }}" placeholder="e.g. Sarah Johnson" autocomplete="name" autofocus>
                    @error('name')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label class="label" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="input {{ $errors->has('email') ? 'input-error' : '' }}"
                           value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email">
                    @error('email')
                        <p class="field-error">
                            {{ $message }}
                            <a href="{{ route('login') }}" style="font-weight: 600; text-decoration: underline; color: hsl(var(--destructive));"> Sign in instead →</a>
                        </p>
                    @enderror
                </div>

                {{-- Password with strength meter --}}
                <div class="form-group">
                    <label class="label" for="password">Password</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password"
                               class="input {{ $errors->has('password') ? 'input-error' : '' }}"
                               placeholder="Create a strong password" autocomplete="new-password"
                               oninput="checkStrength(this.value)">
                        <button type="button" onclick="toggleVisibility('password', this)"
                                style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: hsl(var(--muted-foreground)); padding: 0.25rem;" title="Show/Hide">
                            <svg id="eye-password" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>

                    {{-- Strength bar --}}
                    <div style="margin-top: 0.5rem;">
                        <div style="display: flex; gap: 0.3rem; height: 4px;">
                            <div class="strength-bar" id="bar1" style="flex: 1; border-radius: 2px; background: hsl(var(--border)); transition: background 0.3s;"></div>
                            <div class="strength-bar" id="bar2" style="flex: 1; border-radius: 2px; background: hsl(var(--border)); transition: background 0.3s;"></div>
                            <div class="strength-bar" id="bar3" style="flex: 1; border-radius: 2px; background: hsl(var(--border)); transition: background 0.3s;"></div>
                            <div class="strength-bar" id="bar4" style="flex: 1; border-radius: 2px; background: hsl(var(--border)); transition: background 0.3s;"></div>
                        </div>
                        <p id="strength-text" style="font-size: 0.75rem; margin-top: 0.4rem; color: hsl(var(--muted-foreground));"></p>
                    </div>

                    {{-- Requirements checklist --}}
                    <ul id="pw-requirements" style="list-style: none; padding: 0; margin: 0.75rem 0 0; display: flex; flex-direction: column; gap: 0.3rem;">
                        <li id="req-len"   class="req-item">✗ At least 8 characters</li>
                        <li id="req-upper" class="req-item">✗ At least one uppercase letter (A-Z)</li>
                        <li id="req-lower" class="req-item">✗ At least one lowercase letter (a-z)</li>
                        <li id="req-num"   class="req-item">✗ At least one number (0-9)</li>
                        <li id="req-sym"   class="req-item">✗ At least one symbol (!@#$…)</li>
                    </ul>

                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="form-group">
                    <label class="label" for="password_confirmation">Confirm Password</label>
                    <div style="position: relative;">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="input" placeholder="Re-enter your password" autocomplete="new-password"
                               oninput="checkMatch()">
                        <button type="button" onclick="toggleVisibility('password_confirmation', this)"
                                style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: hsl(var(--muted-foreground)); padding: 0.25rem;" title="Show/Hide">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    <p id="match-msg" style="font-size: 0.78rem; margin-top: 0.35rem; display: none;"></p>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.75rem; font-size: 0.95rem; margin-top: 0.5rem;">
                    Create Account
                </button>
            </form>

            <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid hsl(var(--border));">
                <p class="text-sm" style="color: hsl(var(--muted-foreground));">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color: hsl(var(--primary)); font-weight: 600; text-decoration: underline;">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
.input-error { border-color: hsl(var(--destructive)); }
.field-error  { font-size: 0.78rem; color: hsl(var(--destructive)); margin-top: 0.3rem; }
.req-item     { font-size: 0.78rem; color: hsl(var(--muted-foreground)); transition: color 0.2s; }
.req-item.met { color: hsl(142 72% 29%); }
</style>

<script>
const COLORS = {
    weak:   '#ef4444',
    fair:   '#f97316',
    good:   '#eab308',
    strong: '#22c55e',
};

function checkStrength(pw) {
    const rules = {
        len:   pw.length >= 8,
        upper: /[A-Z]/.test(pw),
        lower: /[a-z]/.test(pw),
        num:   /[0-9]/.test(pw),
        sym:   /[^A-Za-z0-9]/.test(pw),
    };

    // Update checklist
    const map = { len: 'req-len', upper: 'req-upper', lower: 'req-lower', num: 'req-num', sym: 'req-sym' };
    const labels = { len: '8 characters', upper: 'uppercase letter (A-Z)', lower: 'lowercase letter (a-z)', num: 'number (0-9)', sym: 'symbol (!@#$…)' };
    Object.entries(rules).forEach(([key, ok]) => {
        const el = document.getElementById(map[key]);
        if (ok) {
            el.textContent = '✓ At least one ' + labels[key];
            el.classList.add('met');
        } else {
            el.textContent = '✗ At least one ' + labels[key];
            el.classList.remove('met');
        }
    });
    if (rules.len) {
        const el = document.getElementById('req-len');
        el.textContent = '✓ At least 8 characters';
        el.classList.add('met');
    } else {
        const el = document.getElementById('req-len');
        el.textContent = '✗ At least 8 characters';
        el.classList.remove('met');
    }

    // Score
    const score = Object.values(rules).filter(Boolean).length;
    const bars  = [1,2,3,4].map(i => document.getElementById('bar'+i));
    const text  = document.getElementById('strength-text');
    const reset = () => bars.forEach(b => b.style.background = 'hsl(var(--border))');
    reset();

    if (pw.length === 0) { text.textContent = ''; return; }

    if (score <= 2) {
        bars[0].style.background = COLORS.weak;
        text.textContent = '⚠ Weak password';
        text.style.color = COLORS.weak;
    } else if (score === 3) {
        bars[0].style.background = bars[1].style.background = COLORS.fair;
        text.textContent = '〜 Fair password';
        text.style.color = COLORS.fair;
    } else if (score === 4) {
        bars.slice(0,3).forEach(b => b.style.background = COLORS.good);
        text.textContent = '↑ Good password';
        text.style.color = COLORS.good;
    } else {
        bars.forEach(b => b.style.background = COLORS.strong);
        text.textContent = '✓ Strong password';
        text.style.color = COLORS.strong;
    }
}

function checkMatch() {
    const pw   = document.getElementById('password').value;
    const conf = document.getElementById('password_confirmation').value;
    const msg  = document.getElementById('match-msg');
    if (!conf) { msg.style.display = 'none'; return; }
    msg.style.display = 'block';
    if (pw === conf) {
        msg.textContent = '✓ Passwords match';
        msg.style.color = COLORS.strong;
    } else {
        msg.textContent = '✗ Passwords do not match';
        msg.style.color = COLORS.weak;
    }
}

function toggleVisibility(fieldId, btn) {
    const field = document.getElementById(fieldId);
    field.type  = field.type === 'password' ? 'text' : 'password';
}
</script>
@endsection
