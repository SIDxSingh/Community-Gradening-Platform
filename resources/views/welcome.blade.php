@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container" style="display: flex; flex-direction: column; align-items: center;">
        <h1 class="hero-title">Grow Together,<br>Thrive Together.</h1>
        <p class="hero-subtitle">UrbanRoots connects city dwellers with local community gardens. Discover green spaces near you, learn about resilient plant species, and start cultivating your own urban oasis today.</p>
        
        <div class="hero-actions">
            <a href="{{ route('gardens.index') }}" class="btn btn-primary" style="padding: 0.75rem 1.5rem; font-size: 1rem;">Explore Gardens</a>
            <a href="{{ route('plants.index') }}" class="btn btn-outline" style="padding: 0.75rem 1.5rem; font-size: 1rem;">Browse Plants</a>
        </div>
    </div>
</section>

<!-- Infinite Image Marquee Section -->
<div class="marquee-container">
    <div class="marquee-content">
        <!-- Original Set -->
        <img src="{{ asset('images/marquee_1.png') }}" alt="Garden 1">
        <img src="{{ asset('images/marquee_2.png') }}" alt="Garden 2">
        <img src="{{ asset('images/marquee_3.png') }}" alt="Garden 3">
        <img src="{{ asset('images/marquee_4.png') }}" alt="Garden 4">
        <img src="{{ asset('images/marquee_5.png') }}" alt="Garden 5">
        
        <!-- Duplicated Set for Infinite Scroll -->
        <img src="{{ asset('images/marquee_1.png') }}" alt="Garden 1">
        <img src="{{ asset('images/marquee_2.png') }}" alt="Garden 2">
        <img src="{{ asset('images/marquee_3.png') }}" alt="Garden 3">
        <img src="{{ asset('images/marquee_4.png') }}" alt="Garden 4">
        <img src="{{ asset('images/marquee_5.png') }}" alt="Garden 5">
    </div>
</div>

<!-- Features Section -->
<section class="section reveal">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Why UrbanRoots?</h2>
            <p class="section-description">We provide the tools and community support you need to turn concrete jungles into thriving ecosystems.</p>
        </div>

        <div class="grid md:grid-cols-3">
            <!-- Feature 1 -->
            <div class="card feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>
                </div>
                <h3 class="card-title mb-2">Local Gardens</h3>
                <p class="card-description">Find and join community gardens right in your neighborhood. Book plots and meet fellow gardeners.</p>
            </div>

            <!-- Feature 2 -->
            <div class="card feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                </div>
                <h3 class="card-title mb-2">Plant Encyclopedia</h3>
                <p class="card-description">Access our extensive MongoDB-powered library of plant species, sunlight requirements, and care guides.</p>
            </div>

            <!-- Feature 3 -->
            <div class="card feature-card">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                </div>
                <h3 class="card-title mb-2">Vibrant Community</h3>
                <p class="card-description">Connect with experts and beginners alike. Share tips, seeds, and harvests with your local community.</p>
            </div>
        </div>
    </div>
</section>

<!-- Premium Testimonials Section -->
<section class="section reveal" style="padding: 8rem 0; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container">
        <div style="margin-bottom: 4rem; text-align: center;">
            <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1rem; display: inline-block;">Testimonials</span>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; margin-bottom: 1rem; color: hsl(var(--background));">What Our Community Says</h2>
            <p style="color: hsl(var(--background) / 0.7); font-size: 1.125rem; max-width: 600px; margin: 0 auto;">Hear from the city dwellers who are already cultivating their own urban oasis.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            <!-- Testimonial 1 -->
            <div style="background: hsl(var(--background) / 0.05); border: 1px solid hsl(var(--background) / 0.1); border-radius: 24px; padding: 2.5rem; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div>
                    <svg style="color: hsl(var(--primary)); width: 32px; height: 32px; margin-bottom: 1.5rem;" viewBox="0 0 24 24" fill="currentColor"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    <p style="font-size: 1.125rem; line-height: 1.6; margin-bottom: 2rem; color: hsl(var(--background) / 0.9);">"UrbanRoots completely changed how I source my vegetables. I found a community garden just 3 blocks away, and the members are incredibly supportive."</p>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="https://i.pravatar.cc/150?u=sarah" alt="Sarah J." style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                    <div>
                        <h4 style="font-weight: 600; margin: 0; font-size: 1rem; color: hsl(var(--background));">Sarah J.</h4>
                        <span style="font-size: 0.875rem; color: hsl(var(--background) / 0.6);">Downtown Plot Member</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div style="background: hsl(var(--background) / 0.05); border: 1px solid hsl(var(--background) / 0.1); border-radius: 24px; padding: 2.5rem; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div>
                    <svg style="color: hsl(var(--primary)); width: 32px; height: 32px; margin-bottom: 1.5rem;" viewBox="0 0 24 24" fill="currentColor"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    <p style="font-size: 1.125rem; line-height: 1.6; margin-bottom: 2rem; color: hsl(var(--background) / 0.9);">"The Plant Encyclopedia is my go-to resource. I finally figured out why my indoor ferns were dying, and now they're thriving thanks to the community tips!"</p>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="https://i.pravatar.cc/150?u=marcus" alt="Marcus T." style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                    <div>
                        <h4 style="font-weight: 600; margin: 0; font-size: 1rem; color: hsl(var(--background));">Marcus T.</h4>
                        <span style="font-size: 0.875rem; color: hsl(var(--background) / 0.6);">Balcony Gardener</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div style="background: hsl(var(--background) / 0.05); border: 1px solid hsl(var(--background) / 0.1); border-radius: 24px; padding: 2.5rem; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div>
                    <svg style="color: hsl(var(--primary)); width: 32px; height: 32px; margin-bottom: 1.5rem;" viewBox="0 0 24 24" fill="currentColor"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    <p style="font-size: 1.125rem; line-height: 1.6; margin-bottom: 2rem; color: hsl(var(--background) / 0.9);">"We proposed a new garden space through the platform last year. Today, it feeds over 20 families in our neighborhood. The impact is truly measurable."</p>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="https://i.pravatar.cc/150?u=elena" alt="Elena R." style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                    <div>
                        <h4 style="font-weight: 600; margin: 0; font-size: 1rem; color: hsl(var(--background));">Elena R.</h4>
                        <span style="font-size: 0.875rem; color: hsl(var(--background) / 0.6);">Community Organizer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community Showcase Section -->
<section class="section reveal" style="background-color: hsl(var(--muted) / 0.3);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Community Gardens & Produce</h2>
            <p class="section-description">Take a look at the incredible harvests and beautiful green spaces cultivated by our local urban farmers.</p>
        </div>

        <div class="grid md:grid-cols-3">
            <div class="card" style="overflow: hidden; padding: 0;">
                <img src="{{ asset('images/photo_1.png') }}" alt="Community Garden raised beds" style="width: 100%; height: 250px; object-fit: cover; display: block; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="card" style="overflow: hidden; padding: 0;">
                <img src="{{ asset('images/photo_2.png') }}" alt="Hands holding fresh harvested produce" style="width: 100%; height: 250px; object-fit: cover; display: block; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="card" style="overflow: hidden; padding: 0;">
                <img src="{{ asset('images/photo_3.png') }}" alt="Vibrant urban greenhouse" style="width: 100%; height: 250px; object-fit: cover; display: block; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 3rem;">
            <a href="{{ route('gardens.create') }}" class="btn btn-secondary" style="padding: 0.75rem 1.5rem; font-size: 1rem;">Share Your Garden</a>
        </div>
    </div>
</section>

<!-- Premium FAQ Section -->
<style>
    .faq-bento-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4rem;
    }
    @media (min-width: 992px) {
        .faq-bento-grid {
            grid-template-columns: 1fr 2fr;
        }
    }
    .faq-bento-item {
        background: white;
        border-radius: 16px;
        border: 1px solid hsl(var(--border));
        overflow: hidden;
        margin-bottom: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.2s ease;
    }
    .faq-bento-item:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .faq-bento-item summary {
        padding: 1.5rem 2rem;
        font-weight: 600;
        font-size: 1.125rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        list-style: none;
        color: hsl(var(--foreground));
    }
    .faq-bento-item summary::-webkit-details-marker {
        display: none;
    }
    .faq-bento-item[open] summary svg {
        transform: rotate(180deg);
    }
    .faq-bento-item summary svg {
        transition: transform 0.3s ease;
        color: hsl(var(--muted-foreground));
    }
    .faq-bento-item p {
        padding: 0 2rem 1.5rem 2rem;
        color: hsl(var(--muted-foreground));
        margin: 0;
        line-height: 1.6;
    }
</style>
<section class="section reveal" style="padding: 8rem 0; background: hsl(var(--muted)/0.3);">
    <div class="container faq-bento-grid">
        <div style="max-width: 400px;">
            <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1rem; display: block;">Knowledge Base</span>
            <h2 style="font-size: clamp(2.5rem, 4vw, 3.5rem); font-weight: 700; margin-bottom: 1.5rem; line-height: 1.1;">Frequently Asked Questions</h2>
            <p style="color: hsl(var(--muted-foreground)); font-size: 1.125rem; margin-bottom: 2rem;">Everything you need to know about joining and growing with UrbanRoots.</p>
            <a href="{{ route('contact') }}" class="btn btn-outline" style="border-radius: 50px; padding: 0.75rem 1.5rem; display: inline-flex;">Still have questions?</a>
        </div>

        <div style="display: flex; flex-direction: column;">
            <details class="faq-bento-item">
                <summary>
                    How do I find a community garden near me?
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </summary>
                <p>Simply head to the <a href="{{ route('gardens.index') }}" style="color: hsl(var(--primary)); font-weight: 500;">Gardens</a> page and browse our full list of registered community plots. Each listing includes the location, size, and a description so you can find the perfect fit.</p>
            </details>

            <details class="faq-bento-item">
                <summary>
                    Is UrbanRoots free to use?
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </summary>
                <p>Yes! Browsing gardens, exploring the plant encyclopedia, and connecting with the community is completely free. Some individual garden plots may have their own membership fees managed by local organisers.</p>
            </details>

            <details class="faq-bento-item">
                <summary>
                    How do I propose a new community garden?
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </summary>
                <p>Click the <strong>'Propose a Garden'</strong> button in the navigation bar. Fill in your garden's title, location, size, and a description. Our team will review and publish it so the whole community can find it.</p>
            </details>

            <details class="faq-bento-item">
                <summary>
                    What is the Plant Encyclopedia?
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </summary>
                <p>It's our MongoDB-powered database of plant species with detailed care guides — including sunlight needs, watering schedules, seasonal planting windows, and growing tips contributed by the community.</p>
            </details>

            <details class="faq-bento-item">
                <summary>
                    Can I share photos of my garden?
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </summary>
                <p>Absolutely! When proposing or editing your garden listing, you can upload a photo which will be displayed publicly to attract new members and inspire the community.</p>
            </details>
        </div>
    </div>
</section>

<!-- Harvest Gallery Section -->
<style>
    .bento-grid .card { padding: 0; overflow: hidden; }
    .bento-grid img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; display: block; }
    .bento-grid img:hover { transform: scale(1.05); }
    @media (min-width: 768px) {
        .bento-1 { grid-column: span 1; grid-row: span 2; }
        .bento-2 { grid-column: span 2; grid-row: span 1; }
        .bento-3 { grid-column: span 2; grid-row: span 1; }
    }

    /* Falling Leaves Effect */
    .falling-leaf {
        position: fixed;
        top: 70px;
        z-index: 40;
        pointer-events: none;
        opacity: 0;
        animation: fall linear infinite;
    }
    @keyframes fall {
        0% {
            opacity: 0;
            top: 70px;
            transform: translateX(0) rotate(0deg);
        }
        10% {
            opacity: 0.8;
        }
        90% {
            opacity: 0.8;
        }
        100% {
            opacity: 0;
            top: 110%;
            transform: translateX(50px) rotate(360deg);
        }
    }
</style>
<section class="section reveal">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Fresh Harvests</h2>
            <p class="section-description">See the literal fruits (and vegetables) of our community's labor.</p>
        </div>
        
        <div class="grid md:grid-cols-3 bento-grid" style="grid-auto-rows: 250px;">
            <div class="card bento-1">
                <img src="{{ asset('images/harvest_tomatoes.png') }}" alt="Fresh Produce 1">
            </div>
            <div class="card bento-2">
                <img src="{{ asset('images/harvest_herbs.png') }}" alt="Fresh Produce 2">
            </div>
            <div class="card bento-3">
                <img src="{{ asset('images/harvest_carrots.png') }}" alt="Fresh Produce 3">
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const leafContainer = document.createElement('div');
    leafContainer.setAttribute('aria-hidden', 'true');
    leafContainer.style.position = 'fixed';
    leafContainer.style.top = '0';
    leafContainer.style.left = '0';
    leafContainer.style.width = '100%';
    leafContainer.style.height = '100%';
    leafContainer.style.pointerEvents = 'none';
    leafContainer.style.zIndex = '40';
    leafContainer.style.overflow = 'hidden';
    document.body.appendChild(leafContainer);

    const leafTypes = [
        '<svg width="16" height="16" viewBox="0 0 24 24" fill="hsl(var(--primary) / 0.6)" stroke="none"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/></svg>',
        '<svg width="12" height="12" viewBox="0 0 24 24" fill="hsl(var(--secondary) / 0.6)" stroke="none"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/></svg>',
        '<svg width="14" height="14" viewBox="0 0 24 24" fill="hsl(var(--accent) / 0.5)" stroke="none"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/></svg>'
    ];

    for(let i = 0; i < 12; i++) {
        const leaf = document.createElement('div');
        leaf.className = 'falling-leaf';
        leaf.innerHTML = leafTypes[Math.floor(Math.random() * leafTypes.length)];
        
        const left = Math.random() * 100;
        const animationDuration = Math.random() * 8 + 7; // 7-15s
        const animationDelay = Math.random() * 10; // 0-10s
        
        leaf.style.left = `${left}%`;
        leaf.style.animationDuration = `${animationDuration}s`;
        leaf.style.animationDelay = `${animationDelay}s`;
        
        leafContainer.appendChild(leaf);
    }
});
</script>
@endsection
