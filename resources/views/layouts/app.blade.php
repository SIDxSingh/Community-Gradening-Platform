<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UrbanRoots</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                UrbanRoots
            </a>
            <div class="navbar-nav">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ route('explore') }}" class="nav-link {{ request()->routeIs('explore') ? 'active' : '' }}">Explore Gardens</a>
                <a href="{{ route('gardens.index') }}" class="nav-link {{ request()->routeIs('gardens.*') ? 'active' : '' }}">Gardens</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                <a href="{{ route('gardens.create') }}" class="btn btn-primary btn-sm ml-4">Propose a Garden</a>

                @auth
                {{-- Logged-in user avatar dropdown --}}
                <div class="auth-dropdown">
                    <button class="user-avatar-btn auth-dropdown-toggle" id="auth-btn" title="{{ Auth::user()->name }}">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </button>
                    <div class="auth-dropdown-menu" id="auth-menu">
                        <div style="padding: 0.875rem 1rem; border-bottom: 1px solid hsl(var(--border));">
                            <div class="font-semibold" style="font-size: 0.875rem;">{{ Auth::user()->name }}</div>
                            <div class="text-sm" style="color: hsl(var(--muted-foreground));">{{ Auth::user()->email }}</div>
                        </div>
                        <a href="{{ route('gardens.create') }}" class="auth-dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/></svg>
                            My Gardens
                        </a>
                        <a href="{{ route('explore') }}" class="auth-dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                            Explore Feed
                        </a>
                        @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="auth-dropdown-item" style="color: hsl(var(--primary)); font-weight: 600;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
                            Admin Dashboard
                        </a>
                        @endif
                        <a href="#" class="auth-dropdown-item" id="logout-link" onclick="doLogout(event)" style="color: hsl(var(--destructive)); border-top: 1px solid hsl(var(--border));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                            Sign Out
                        </a>
                    </div>
                </div>
                @else
                {{-- Guest: Show Sign In / Register --}}
                <div class="auth-dropdown">
                    <button class="btn btn-outline btn-sm auth-dropdown-toggle" id="auth-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 1 0-16 0"/></svg>
                        Account
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="auth-dropdown-menu" id="auth-menu">
                        <a href="{{ route('login') }}" class="auth-dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
                            Sign In
                        </a>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    @if(request()->is('/'))
        <main>
            @yield('content')
        </main>
    @else
        <main class="container page-content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    @endif

    <style>
        .footer-bento {
            background-color: hsl(var(--foreground));
            color: hsl(var(--background));
            margin-top: auto;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1fr;
        }
        @media (min-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        .footer-left {
            display: flex;
            flex-direction: column;
            border-right: 1px solid hsl(var(--background) / 0.1);
        }
        .footer-top-left {
            padding: 4rem 2rem;
            border-bottom: 1px solid hsl(var(--background) / 0.1);
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        @media (min-width: 768px) {
            .footer-top-left {
                padding: 4rem;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }
        .footer-bottom-left {
            padding: 4rem 2rem;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
        @media (min-width: 768px) {
            .footer-bottom-left {
                padding: 4rem;
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .footer-right {
            padding: 4rem 2rem;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }
        @media (min-width: 768px) {
            .footer-right {
                padding: 4rem;
            }
        }
        .footer-link {
            color: hsl(var(--background) / 0.6);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s ease;
        }
        .footer-link:hover {
            color: hsl(var(--primary));
        }
    </style>

    <footer class="footer-bento">
        <div class="footer-grid">
            <!-- Left Side -->
            <div class="footer-left">
                <!-- Top Left -->
                <div class="footer-top-left">
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 1.5rem; font-weight: bold;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="hsl(var(--primary))" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                        URBANROOTS.
                    </div>
                    <p style="color: hsl(var(--background) / 0.6); font-size: 0.875rem; max-width: 250px; margin: 0; line-height: 1.5;">
                        Because if our cities can't sustain green spaces, neither will our future.
                    </p>
                </div>
                <!-- Bottom Left -->
                <div class="footer-bottom-left">
                    <div>
                        <h4 style="font-weight: 600; margin-bottom: 1.5rem; font-size: 1rem;">Explore</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                            <li><a href="{{ route('gardens.index') }}" class="footer-link">Find a Garden</a></li>
                            <li><a href="{{ route('plants.index') }}" class="footer-link">Plant Encyclopedia</a></li>
                            <li><a href="#" class="footer-link">Success Stories</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 style="font-weight: 600; margin-bottom: 1.5rem; font-size: 1rem;">Company</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                            <li><a href="{{ route('about') }}" class="footer-link">About Us</a></li>
                            <li><a href="#" class="footer-link">Careers</a></li>
                            <li><a href="{{ route('contact') }}" class="footer-link">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 style="font-weight: 600; margin-bottom: 1.5rem; font-size: 1rem;">Social</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                            <li><a href="#" class="footer-link">Instagram</a></li>
                            <li><a href="#" class="footer-link">Twitter</a></li>
                            <li><a href="#" class="footer-link">Facebook</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Right Side -->
            <div class="footer-right">
                <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.5rem; display: block;">Newsletter</span>
                <h2 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 600; line-height: 1.1; margin-bottom: 3rem; max-width: 400px; margin-top: 0;">
                    Join the<br>Community
                </h2>
                
                <form style="position: relative; max-width: 400px; z-index: 10;">
                    <input type="email" placeholder="Enter your email..." required style="width: 100%; padding: 1.25rem 1.5rem; border-radius: 50px; border: none; outline: none; font-size: 1rem; color: #1a1a1a; background: white; box-sizing: border-box;">
                    <button type="submit" style="position: absolute; right: 8px; top: 8px; bottom: 8px; aspect-ratio: 1; border-radius: 50%; border: none; background: hsl(var(--primary)); color: white; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: transform 0.2s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                </form>
                
                <!-- Plant Illustration Background -->
                <svg style="position: absolute; bottom: -40px; right: 0px; width: 300px; height: 300px; opacity: 0.05; z-index: 1; pointer-events: none; transform: rotate(-15deg);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Auth Dropdown Toggle
            const authBtn = document.getElementById('auth-btn');
            const authMenu = document.getElementById('auth-menu');
            if (authBtn && authMenu) {
                authBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    authMenu.classList.toggle('show');
                });
                document.addEventListener('click', () => authMenu.classList.remove('show'));
            }

            // Scroll Reveal
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });

        // Logout — creates a fresh form at click time to avoid stale CSRF issues
        function doLogout(e) {
            e.preventDefault();
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("logout") }}';
            const token = document.createElement('input');
            token.type  = 'hidden';
            token.name  = '_token';
            token.value = '{{ csrf_token() }}';
            form.appendChild(token);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
