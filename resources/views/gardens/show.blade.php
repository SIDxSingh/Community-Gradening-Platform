@extends('layouts.app')

@section('content')
<!-- Garden Show: Dark Hero Banner -->
<section style="padding: 5rem 0 4rem; background: hsl(var(--foreground)); color: hsl(var(--background));">
    <div class="container" style="max-width: 900px;">
        <a href="{{ route('gardens.index') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; color: hsl(var(--background)/0.6); font-size: 0.875rem; text-decoration: none; margin-bottom: 2rem;" onmouseover="this.style.color='hsl(var(--primary))'" onmouseout="this.style.color='hsl(var(--background)/0.6)'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            Back to Gardens
        </a>
        <div style="display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
            <div>
                <h1 style="font-size: clamp(2rem, 4vw, 3.25rem); font-weight: 700; margin: 0 0 0.5rem; letter-spacing: -0.02em; color: hsl(var(--background));">{{ $garden->title }}</h1>
                <p style="color: hsl(var(--background)/0.7); font-size: 0.95rem; margin: 0 0 0.75rem;">
                    Uploaded by <strong style="color: hsl(var(--background));">{{ $garden->user->name ?? 'Community Member' }}</strong>
                </p>
                @if($garden->location)
                <p style="color: hsl(var(--primary)); font-size: 1rem; display: flex; align-items: center; gap: 0.4rem; margin: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    {{ $garden->location }}
                </p>
                @endif
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center;">
                @if(Auth::check() && (Auth::id() === $garden->user_id || Auth::user()->is_admin))
                    <a href="{{ route('gardens.edit', $garden) }}" style="display: inline-flex; align-items: center; gap: 0.4rem; background: hsl(var(--background)/0.1); color: hsl(var(--background)); padding: 0.625rem 1.25rem; border-radius: 50px; font-size: 0.875rem; font-weight: 500; text-decoration: none; border: 1px solid hsl(var(--background)/0.2);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                        Edit
                    </a>
                @endif
                @if(Auth::check())
                    <button id="open-chat-btn" style="display: inline-flex; align-items: center; gap: 0.5rem; background: hsl(var(--primary)); color: white; padding: 0.625rem 1.5rem; border-radius: 50px; font-size: 0.875rem; font-weight: 600; border: none; cursor: pointer; transition: transform 0.2s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
                        Live Chat
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Garden Detail Cards -->
<section style="padding: 3rem 0 5rem;">
    <div class="container" style="max-width: 900px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
            <div style="background: white; border-radius: 16px; border: 1px solid hsl(var(--border)); padding: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                <span style="font-size: 0.8rem; font-weight: 600; color: hsl(var(--muted-foreground)); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.5rem;">Size</span>
                <p style="margin: 0; font-size: 1.1rem; font-weight: 600; color: hsl(var(--foreground));">{{ $garden->size ?? 'Not specified' }}</p>
            </div>
            <div style="background: white; border-radius: 16px; border: 1px solid hsl(var(--border)); padding: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                <span style="font-size: 0.8rem; font-weight: 600; color: hsl(var(--muted-foreground)); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.5rem;">Created</span>
                <p style="margin: 0; font-size: 1.1rem; font-weight: 600; color: hsl(var(--foreground));">{{ $garden->created_at->format('M d, Y') }}</p>
            </div>
        </div>
        @if($garden->description)
        <div style="background: white; border-radius: 16px; border: 1px solid hsl(var(--border)); padding: 2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
            <span style="font-size: 0.8rem; font-weight: 600; color: hsl(var(--muted-foreground)); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 1rem;">Description</span>
            <p style="margin: 0; line-height: 1.75; color: hsl(var(--foreground)); font-size: 1.05rem;">{{ $garden->description }}</p>
        </div>
        @endif
    </div>
</section>

@if(Auth::check())
<!-- Chat Panel -->
<div id="chat-panel" style="position: fixed; top: 0; right: -420px; width: 420px; max-width: 100%; height: 100vh; background: hsl(var(--background)); border-left: 1px solid hsl(var(--border)); box-shadow: -4px 0 24px rgba(0,0,0,0.12); transition: right 0.35s cubic-bezier(0.4,0,0.2,1); z-index: 1000; display: flex; flex-direction: column;">
    <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid hsl(var(--border)); display: flex; justify-content: space-between; align-items: center; background: hsl(var(--foreground)); color: hsl(var(--background));">
        <div style="display: flex; align-items: center; gap: 0.75rem;">
            <div style="width: 8px; height: 8px; border-radius: 50%; background: hsl(var(--primary)); box-shadow: 0 0 6px hsl(var(--primary));"></div>
            <h3 style="font-weight: 700; font-size: 1rem; margin: 0; color: hsl(var(--background));">{{ $garden->title }} — Live Chat</h3>
        </div>
        <button id="close-chat-btn" style="background: hsl(var(--background)/0.1); border: none; cursor: pointer; color: hsl(var(--background)); border-radius: 8px; padding: 0.35rem; display: flex; align-items: center; justify-content: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
    </div>
    <div id="chat-messages" style="flex: 1; overflow-y: auto; padding: 1.25rem; display: flex; flex-direction: column; gap: 0.75rem; background: hsl(var(--muted)/0.2);">
        <!-- Messages loaded here -->
    </div>
    <div style="padding: 1rem 1.25rem; border-top: 1px solid hsl(var(--border)); background: hsl(var(--background));">
        <form id="chat-form" style="display: flex; gap: 0.6rem; align-items: center;">
            <input type="text" id="chat-input" class="input" placeholder="Type a message…" required style="flex: 1; padding: 0.6rem 1rem; border-radius: 50px; font-size: 0.9rem;">
            <button type="submit" style="background: hsl(var(--primary)); color: white; border: none; border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; transition: transform 0.15s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
            </button>
        </form>
    </div>
</div>

<!-- WebSockets (Pusher & Laravel Echo via CDN) -->
<script src="https://js.pusher.com/8.0.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const chatPanel   = document.getElementById('chat-panel');
    const openBtn     = document.getElementById('open-chat-btn');
    const closeBtn    = document.getElementById('close-chat-btn');
    const messagesDiv = document.getElementById('chat-messages');
    const chatForm    = document.getElementById('chat-form');
    const chatInput   = document.getElementById('chat-input');

    const currentUserId  = '{{ Auth::id() }}';
    const currentUserName = '{{ Auth::user()->name }}';
    const gardenTitle    = '{{ $garden->title }}';
    const gardenId       = '{{ $garden->id }}';
    const token          = document.querySelector('meta[name="csrf-token"]').content;

    let isPanelOpen  = false;
    let unreadCount  = 0;

    // ── Notification Badge ──────────────────────────────────────────────────
    // Inject a badge span right next to the open button
    const badge = document.createElement('span');
    badge.id = 'chat-badge';
    badge.style.cssText = `
        display: none; position: absolute; top: -8px; right: -8px;
        background: #ef4444; color: white; border-radius: 50%;
        width: 20px; height: 20px; font-size: 0.7rem; font-weight: 700;
        align-items: center; justify-content: center;
        box-shadow: 0 0 0 2px white;
        animation: badgePulse 1.5s infinite;
    `;
    badge.textContent = '0';
    if (openBtn) {
        openBtn.style.position = 'relative';
        openBtn.appendChild(badge);
    }

    // Pulse keyframe
    const styleEl = document.createElement('style');
    styleEl.textContent = `
        @keyframes badgePulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 2px white, 0 0 0 4px rgba(239,68,68,0.4); }
            50% { transform: scale(1.15); box-shadow: 0 0 0 2px white, 0 0 0 6px rgba(239,68,68,0.2); }
        }
    `;
    document.head.appendChild(styleEl);

    function showBadge(count) {
        badge.textContent = count > 9 ? '9+' : count;
        badge.style.display = 'flex';
    }
    function clearBadge() {
        unreadCount = 0;
        badge.style.display = 'none';
    }

    // ── Browser Notifications ───────────────────────────────────────────────
    function requestNotifPermission() {
        if ('Notification' in window && Notification.permission === 'default') {
            Notification.requestPermission();
        }
    }

    function sendBrowserNotif(senderName, messageText) {
        if (!('Notification' in window) || Notification.permission !== 'granted') return;
        if (document.visibilityState === 'visible' && isPanelOpen) return; // already looking at it

        const notif = new Notification(`💬 New message in ${gardenTitle}`, {
            body: `${senderName}: ${messageText}`,
            icon: '/favicon.ico',
            badge: '/favicon.ico',
            tag: `chat-garden-${gardenId}`, // groups messages so they don't stack
            renotify: true,
        });

        // Click notification → focus tab & open panel
        notif.onclick = () => {
            window.focus();
            openPanel();
            notif.close();
        };

        // Auto-close after 5 s
        setTimeout(() => notif.close(), 5000);
    }

    // ── Echo Setup ──────────────────────────────────────────────────────────
    window.Pusher = Pusher;
    window.Echo = new Echo({
        broadcaster: 'reverb',
        key: '{{ env('REVERB_APP_KEY') }}',
        wsHost: window.location.hostname,
        wsPort: {{ env('REVERB_PORT', 8080) }},
        wssPort: {{ env('REVERB_PORT', 8080) }},
        forceTLS: (window.location.protocol === 'https:'),
        enabledTransports: ['ws', 'wss'],
    });

    // ── Message Rendering ───────────────────────────────────────────────────
    function appendMessage(msg, isMine) {
        const wrap = document.createElement('div');
        wrap.style.display = 'flex';
        wrap.style.flexDirection = 'column';
        wrap.style.alignItems = isMine ? 'flex-end' : 'flex-start';

        const bubble = document.createElement('div');
        bubble.style.padding = '0.6rem 1rem';
        bubble.style.borderRadius = isMine ? '18px 18px 4px 18px' : '18px 18px 18px 4px';
        bubble.style.maxWidth = '75%';
        bubble.style.wordBreak = 'break-word';
        bubble.style.fontSize = '0.9rem';
        bubble.style.lineHeight = '1.5';

        if (isMine) {
            bubble.style.backgroundColor = 'hsl(var(--primary))';
            bubble.style.color = 'white';
        } else {
            bubble.style.backgroundColor = 'white';
            bubble.style.color = 'hsl(var(--foreground))';
            bubble.style.border = '1px solid hsl(var(--border))';
        }

        const senderName = msg.sender ? msg.sender.name : (isMine ? currentUserName : 'Someone');
        bubble.innerHTML = `<strong style="font-size: 0.75rem; display: block; margin-bottom: 0.2rem; opacity: 0.75;">${senderName}</strong>${msg.message_text}`;

        wrap.appendChild(bubble);
        messagesDiv.appendChild(wrap);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    // ── Load History ─────────────────────────────────────────────────────
    async function loadMessages() {
        const res = await fetch(`/gardens/${gardenId}/messages`, {
            headers: { 'Accept': 'application/json' }
        });
        const messages = await res.json();
        messagesDiv.innerHTML = '';
        messages.forEach(msg => appendMessage(msg, String(msg.sender_id) === currentUserId));
    }

    // ── Panel Open/Close ────────────────────────────────────────────────────
    function openPanel() {
        chatPanel.style.right = '0';
        isPanelOpen = true;
        clearBadge();
        loadMessages();
    }

    if (openBtn) {
        openBtn.addEventListener('click', () => {
            requestNotifPermission(); // ask for browser notif permission on first open
            openPanel();
        });
    }

    closeBtn.addEventListener('click', () => {
        chatPanel.style.right = '-420px';
        isPanelOpen = false;
    });

    // ── Send Message ────────────────────────────────────────────────────────
    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const text = chatInput.value.trim();
        if (!text) return;

        chatInput.value = '';
        appendMessage({ message_text: text, sender_id: currentUserId }, true);

        await fetch(`/gardens/${gardenId}/messages`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ message_text: text })
        });
    });

    // ── Real-time Listener ───────────────────────────────────────────────────
    window.Echo.private(`chat.garden.${gardenId}`)
        .listen('MessageSent', (e) => {
            const msg = e.message;
            const isFromMe = String(msg.sender_id) === currentUserId;

            if (!isFromMe) {
                // Always render in panel
                appendMessage(msg, false);

                // If panel is closed → increment badge + fire browser notif
                if (!isPanelOpen) {
                    unreadCount++;
                    showBadge(unreadCount);

                    const senderName = msg.sender ? msg.sender.name : 'Someone';
                    sendBrowserNotif(senderName, msg.message_text);
                }
            }
        });
});
</script>
@endif
@endsection

