@extends('layouts.app')

@section('content')

<style>
    .about-stat-box {
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        border: 1px solid hsl(var(--border));
        transition: transform 0.25s ease;
    }
    .about-stat-box:hover { transform: translateY(-4px); }
    .value-box {
        border-radius: 20px;
        padding: 2.5rem;
        border: 1px solid hsl(var(--border));
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .value-box:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08);
    }
    .team-card {
        border-radius: 20px;
        padding: 2.5rem 2rem;
        border: 1px solid hsl(var(--background)/0.15);
        background: hsl(var(--background)/0.06);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        transition: transform 0.25s ease;
    }
    .team-card:hover { transform: translateY(-4px); }
</style>

<!-- About Hero (Dark Bento Style) -->
<section style="padding: 8rem 0 6rem; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container" style="max-width: 800px; text-align: center;">
        <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.5rem; display: block;">🌱 Our Story</span>
        <h1 style="font-size: clamp(3rem, 6vw, 5rem); font-weight: 700; line-height: 1.05; margin: 0 0 2rem; letter-spacing: -0.02em;">
            Rooted in Community,<br>Growing Together.
        </h1>
        <p style="font-size: 1.25rem; color: hsl(var(--background)/0.7); line-height: 1.7; max-width: 640px; margin: 0 auto;">
            UrbanRoots was born from a simple belief: everyone deserves access to fresh food and green spaces, no matter where they live. We are a platform connecting urban gardeners, local communities, and green-thumb enthusiasts.
        </p>
    </div>
</section>

<!-- Mission + Stats Section -->
<section class="section reveal" style="padding: 7rem 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 5rem; align-items: center;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start;">
                <div style="grid-column: 1 / -1;">
                    <span style="color: hsl(var(--primary)); font-size: 0.875rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; display: block; margin-bottom: 1rem;">Our Mission</span>
                    <h2 style="font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 700; line-height: 1.1; margin: 0 0 1.5rem;">Turning Concrete Jungles Into Thriving Ecosystems</h2>
                    <p style="color: hsl(var(--muted-foreground)); line-height: 1.8; margin-bottom: 1rem; font-size: 1.1rem;">
                        We believe that every unused rooftop, vacant lot, and community park is an opportunity to grow something beautiful. UrbanRoots provides the tools, knowledge, and community connections to make that happen.
                    </p>
                    <p style="color: hsl(var(--muted-foreground)); line-height: 1.8; font-size: 1.1rem;">
                        From our MongoDB-powered Plant Encyclopedia to our community garden directory, every feature is built to lower the barrier to entry for urban farming and connect passionate people.
                    </p>
                    <div style="margin-top: 2.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="{{ route('gardens.index') }}" class="btn btn-primary" style="padding: 0.875rem 1.75rem; border-radius: 50px; font-size: 1rem;">Find a Garden</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline" style="padding: 0.875rem 1.75rem; border-radius: 50px; font-size: 1rem;">Get In Touch</a>
                    </div>
                </div>
            </div>
            <!-- Stats Bento -->
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem;">
                <div class="about-stat-box" style="background: hsl(var(--primary)/0.06); border-color: hsl(var(--primary)/0.2);">
                    <div style="font-size: 3rem; font-weight: 800; color: hsl(var(--primary)); line-height: 1;">120+</div>
                    <div style="color: hsl(var(--muted-foreground)); margin-top: 0.5rem; font-size: 0.95rem;">Community Gardens</div>
                </div>
                <div class="about-stat-box" style="background: hsl(var(--secondary)/0.08); border-color: hsl(var(--secondary)/0.25);">
                    <div style="font-size: 3rem; font-weight: 800; color: hsl(var(--secondary)); line-height: 1;">5K+</div>
                    <div style="color: hsl(var(--muted-foreground)); margin-top: 0.5rem; font-size: 0.95rem;">Active Members</div>
                </div>
                <div class="about-stat-box" style="background: hsl(var(--accent)/0.06); border-color: hsl(var(--accent)/0.2);">
                    <div style="font-size: 3rem; font-weight: 800; color: hsl(var(--accent)); line-height: 1;">300+</div>
                    <div style="color: hsl(var(--muted-foreground)); margin-top: 0.5rem; font-size: 0.95rem;">Plant Species</div>
                </div>
                <div class="about-stat-box" style="background: hsl(var(--primary)/0.06); border-color: hsl(var(--primary)/0.2);">
                    <div style="font-size: 3rem; font-weight: 800; color: hsl(var(--primary)); line-height: 1;">8</div>
                    <div style="color: hsl(var(--muted-foreground)); margin-top: 0.5rem; font-size: 0.95rem;">Cities & Counting</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section (Dark Bento) -->
<section class="section reveal" style="padding: 7rem 0; background: hsl(var(--foreground));">
    <div class="container">
        <div style="text-align: center; margin-bottom: 4rem;">
            <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; display: inline-block; margin-bottom: 1rem;">Our Values</span>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; color: hsl(var(--background)); margin: 0 0 1rem;">What We Stand For</h2>
            <p style="color: hsl(var(--background)/0.65); font-size: 1.125rem; max-width: 600px; margin: 0 auto;">Our three core values guide every decision we make as a platform.</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
            <div class="value-box" style="background: hsl(var(--background)/0.06); border-color: hsl(var(--background)/0.12);">
                <div style="width: 52px; height: 52px; border-radius: 14px; background: hsl(var(--primary)/0.15); color: hsl(var(--primary)); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 600; color: hsl(var(--background)); margin: 0 0 0.75rem;">Community First</h3>
                <p style="color: hsl(var(--background)/0.65); line-height: 1.7; margin: 0;">Every feature is designed to bring people together, not replace human connection. Gardens are shared spaces — and so is this platform.</p>
            </div>
            <div class="value-box" style="background: hsl(var(--background)/0.06); border-color: hsl(var(--background)/0.12);">
                <div style="width: 52px; height: 52px; border-radius: 14px; background: hsl(var(--secondary)/0.2); color: hsl(var(--secondary)); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 600; color: hsl(var(--background)); margin: 0 0 0.75rem;">Radical Access</h3>
                <p style="color: hsl(var(--background)/0.65); line-height: 1.7; margin: 0;">Fresh food is a right, not a privilege. We are committed to keeping the platform free and accessible to every neighbourhood regardless of socioeconomic status.</p>
            </div>
            <div class="value-box" style="background: hsl(var(--background)/0.06); border-color: hsl(var(--background)/0.12);">
                <div style="width: 52px; height: 52px; border-radius: 14px; background: hsl(var(--accent)/0.15); color: hsl(var(--accent)); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 600; color: hsl(var(--background)); margin: 0 0 0.75rem;">Sustainability</h3>
                <p style="color: hsl(var(--background)/0.65); line-height: 1.7; margin: 0;">We champion organic, regenerative growing practices and work with partners who share our commitment to a healthier planet and a more resilient food system.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section reveal" style="padding: 7rem 0; background: hsl(var(--muted)/0.3);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 4rem;">
            <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; display: inline-block; margin-bottom: 1rem;">The People</span>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; margin: 0 0 1rem;">Meet the Team</h2>
            <p style="color: hsl(var(--muted-foreground)); font-size: 1.125rem; max-width: 600px; margin: 0 auto;">A small but passionate group of urban farmers, developers, and community organisers.</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
            @foreach([['name' => 'Mohammad Tabish', 'role' => 'Co-Founder & CTO', 'avatar' => 'tabish'], ['name' => 'Siddharth Shukla', 'role' => 'Co-Founder & Head of Community', 'avatar' => 'siddharth'], ['name' => 'Chintamani', 'role' => 'Co-Founder & Lead Developer', 'avatar' => 'chintamani']] as $member)
            <div style="background: white; border-radius: 20px; padding: 2.5rem 2rem; border: 1px solid hsl(var(--border)); display: flex; flex-direction: column; align-items: center; text-align: center; transition: transform 0.25s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.04);" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="https://i.pravatar.cc/150?u={{ $member['avatar'] }}" alt="{{ $member['name'] }}" style="width: 88px; height: 88px; border-radius: 50%; object-fit: cover; border: 3px solid hsl(var(--primary)/0.25); margin-bottom: 1.25rem;">
                <h3 style="font-size: 1.1rem; font-weight: 700; margin: 0 0 0.35rem; color: hsl(var(--foreground));">{{ $member['name'] }}</h3>
                <p style="color: hsl(var(--muted-foreground)); font-size: 0.9rem; margin: 0;">{{ $member['role'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
