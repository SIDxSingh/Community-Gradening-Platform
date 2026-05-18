@extends('layouts.app')

@section('content')

<!-- Contact Hero (Dark Bento) -->
<section style="padding: 8rem 0 6rem; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container" style="max-width: 800px; text-align: center;">
        <span style="color: hsl(var(--primary)); font-weight: 700; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.5rem; display: block;">✉️ Get In Touch</span>
        <h1 style="font-size: clamp(3rem, 6vw, 5rem); font-weight: 700; line-height: 1.05; margin: 0 0 2rem; letter-spacing: -0.02em;">
            We'd Love to Hear<br>From You.
        </h1>
        <p style="font-size: 1.25rem; color: hsl(var(--background)/0.7); line-height: 1.7; max-width: 600px; margin: 0 auto;">
            Whether you have a question about a garden, want to propose a partnership, or just want to say hello — our team is always here.
        </p>
    </div>
</section>

<!-- Contact Body -->
<section class="section reveal" style="padding: 7rem 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 4rem; align-items: start;">
            @media (min-width: 768px) {
                grid-template-columns: 1.1fr 0.9fr;
            }
            <style>
                @media (min-width: 768px) {
                    .contact-grid { grid-template-columns: 1.1fr 0.9fr !important; }
                }
                .contact-info-card {
                    background: white;
                    border-radius: 16px;
                    border: 1px solid hsl(var(--border));
                    padding: 1.5rem;
                    display: flex;
                    align-items: flex-start;
                    gap: 1rem;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
                    transition: transform 0.2s ease;
                }
                .contact-info-card:hover { transform: translateY(-2px); }
                .contact-icon {
                    width: 44px;
                    height: 44px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }
            </style>

            <div class="contact-grid" style="display: grid; gap: 4rem; align-items: start;">
                <!-- Contact Form -->
                <div style="background: white; border-radius: 24px; border: 1px solid hsl(var(--border)); padding: 3rem; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="font-size: 1.75rem; font-weight: 700; margin: 0 0 0.5rem; color: hsl(var(--foreground));">Send Us a Message</h2>
                    <p style="color: hsl(var(--muted-foreground)); margin: 0 0 2.5rem;">Fill out the form and we'll get back to you within 1–2 business days.</p>

                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="label" for="contact_name">Full Name</label>
                            <input type="text" id="contact_name" name="name" class="input" placeholder="Sarah Johnson" required>
                        </div>
                        <div class="form-group">
                            <label class="label" for="contact_email">Email Address</label>
                            <input type="email" id="contact_email" name="email" class="input" placeholder="sarah@example.com" required>
                        </div>
                        <div class="form-group">
                            <label class="label" for="contact_subject">Subject</label>
                            <input type="text" id="contact_subject" name="subject" class="input" placeholder="I have a question about...">
                        </div>
                        <div class="form-group">
                            <label class="label" for="contact_message">Message</label>
                            <textarea id="contact_message" name="message" class="input" rows="5" placeholder="Tell us how we can help..." required style="resize: vertical;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.875rem; margin-top: 0.5rem; font-size: 1rem; border-radius: 50px;">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div>
                        <h2 style="font-size: 1.75rem; font-weight: 700; margin: 0 0 0.75rem; color: hsl(var(--foreground));">Contact Information</h2>
                        <p style="color: hsl(var(--muted-foreground)); line-height: 1.7; margin: 0;">We operate across multiple cities. Reach out through any of the channels below and one of our community managers will respond promptly.</p>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-icon" style="background: hsl(var(--primary)/0.1); color: hsl(var(--primary));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <h4 style="font-weight: 600; margin: 0 0 0.25rem; font-size: 0.95rem;">Our Office</h4>
                            <p style="font-size: 0.875rem; color: hsl(var(--muted-foreground)); margin: 0; line-height: 1.6;">42 Greenway Avenue, Lal Chowk<br>Srinagar, Kashmir — 190001</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-icon" style="background: hsl(var(--secondary)/0.12); color: hsl(var(--secondary));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </div>
                        <div>
                            <h4 style="font-weight: 600; margin: 0 0 0.25rem; font-size: 0.95rem;">Email Us</h4>
                            <p style="font-size: 0.875rem; color: hsl(var(--muted-foreground)); margin: 0; line-height: 1.6;">hello@urbanroots.in<br>support@urbanroots.in</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-icon" style="background: hsl(var(--accent)/0.1); color: hsl(var(--accent));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.36 2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.29 6.29l1.87-1.87a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <h4 style="font-weight: 600; margin: 0 0 0.25rem; font-size: 0.95rem;">Call Us</h4>
                            <p style="font-size: 0.875rem; color: hsl(var(--muted-foreground)); margin: 0; line-height: 1.6;">+91 (194) 245-6789<br>Mon–Fri, 9 AM – 5 PM IST</p>
                        </div>
                    </div>

                    <!-- CTA Box -->
                    <div style="background: hsl(var(--foreground)); border-radius: 20px; padding: 2rem; color: hsl(var(--background));">
                        <h4 style="font-weight: 700; margin: 0 0 0.75rem; font-size: 1.1rem; color: hsl(var(--primary));">🌿 Join the Community</h4>
                        <p style="font-size: 0.9rem; color: hsl(var(--background)/0.7); margin: 0 0 1.25rem; line-height: 1.6;">Ready to start growing? Explore our gardens or propose one of your own.</p>
                        <a href="{{ route('gardens.index') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: hsl(var(--primary)); color: white; padding: 0.625rem 1.25rem; border-radius: 50px; font-size: 0.9rem; font-weight: 500; text-decoration: none;">Browse Gardens →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
