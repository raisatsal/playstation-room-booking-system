<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSRoom Enterprise — Premium PlayStation Lounge</title>
    <meta name="description" content="Sewa room PlayStation premium dengan fasilitas eksklusif. PS5, PS4 Pro, TV OLED, AC, dan sofa kulit tersedia 24 jam.">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ps: {
                            blue:    '#0057B8',
                            cyan:    '#00B4F0',
                            purple:  '#6C2BD9',
                            pink:    '#E040FB',
                            gold:    '#F5C518',
                        },
                        dark: {
                            900: '#03060F',
                            800: '#060C1A',
                            700: '#0A1225',
                            600: '#0F1A35',
                            500: '#162040',
                            border: '#1A2A4A',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow-pulse': 'glow-pulse 2s ease-in-out infinite',
                        'slide-down': 'slide-down 0.3s ease-out',
                        'fade-in-up': 'fade-in-up 0.5s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-12px)' },
                        },
                        'glow-pulse': {
                            '0%, 100%': { opacity: '0.6', boxShadow: '0 0 20px rgba(0,180,240,0.3)' },
                            '50%': { opacity: '1', boxShadow: '0 0 40px rgba(0,180,240,0.7)' },
                        },
                        'slide-down': {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        'fade-in-up': {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ========================
           GLOBAL DESIGN SYSTEM
        ======================== */
        :root {
            --bg-primary: #03060F;
            --bg-secondary: #060C1A;
            --bg-card: #0A1225;
            --bg-card-hover: #0F1A35;
            --border-primary: #1A2A4A;
            --border-hover: #2A3F6A;
            --text-primary: #F0F4FF;
            --text-secondary: #8BA3CC;
            --text-muted: #4A6080;
            --accent-blue: #00B4F0;
            --accent-purple: #6C2BD9;
            --accent-cyan: #00D4FF;
            --accent-gold: #F5C518;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            background-image:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(0,87,184,0.15) 0%, transparent 60%),
                radial-gradient(ellipse 50% 80% at 100% 50%, rgba(108,43,217,0.08) 0%, transparent 50%),
                radial-gradient(ellipse 40% 60% at 0% 80%, rgba(0,180,240,0.06) 0%, transparent 40%);
            background-attachment: fixed;
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ========================
           SCROLLBAR
        ======================== */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: var(--bg-primary); }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #0057B8, #00B4F0);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover { background: #00B4F0; }

        /* ========================
           GLASS COMPONENTS
        ======================== */
        .glass-nav {
            background: rgba(3, 6, 15, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(26, 42, 74, 0.6);
        }

        .glass-card {
            background: rgba(10, 18, 37, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(26, 42, 74, 0.8);
        }

        /* ========================
           NAV LINK INDICATOR
        ======================== */
        .nav-link {
            position: relative;
            padding: 0.5rem 0;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(139, 163, 204, 0.8);
            transition: color 0.2s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #0057B8, #00B4F0);
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        .nav-link:hover { color: #F0F4FF; }
        .nav-link:hover::after { width: 100%; }
        .nav-link.active { color: #F0F4FF; }
        .nav-link.active::after { width: 100%; }

        /* ========================
           BUTTONS
        ======================== */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(135deg, #0057B8 0%, #00B4F0 100%);
            color: white;
            font-weight: 700;
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 0 20px rgba(0,180,240,0.3), 0 4px 15px rgba(0,87,184,0.3);
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #0057B8 0%, #00D4FF 100%);
            opacity: 0;
            transition: opacity 0.25s ease;
        }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover {
            box-shadow: 0 0 35px rgba(0,180,240,0.55), 0 6px 20px rgba(0,87,184,0.4);
            transform: translateY(-2px);
        }
        .btn-primary span, .btn-primary svg { position: relative; z-index: 1; }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.4rem;
            background: rgba(26, 42, 74, 0.5);
            color: rgba(240, 244, 255, 0.8);
            font-weight: 700;
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border-radius: 0.75rem;
            border: 1px solid rgba(26, 42, 74, 0.9);
            cursor: pointer;
            transition: all 0.25s ease;
        }
        .btn-ghost:hover {
            background: rgba(26, 42, 74, 0.9);
            border-color: rgba(42, 63, 106, 1);
            color: #F0F4FF;
            transform: translateY(-1px);
        }

        /* ========================
           CARDS
        ======================== */
        .premium-card {
            background: rgba(10, 18, 37, 0.55);
            border: 1px solid rgba(26, 42, 74, 0.8);
            border-radius: 1.25rem;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .premium-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,87,184,0.04) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.35s ease;
            pointer-events: none;
        }
        .premium-card:hover::before { opacity: 1; }
        .premium-card:hover {
            border-color: rgba(0,180,240,0.3);
            box-shadow: 0 8px 32px rgba(0,87,184,0.2), 0 0 0 1px rgba(0,180,240,0.1);
            transform: translateY(-4px);
        }

        /* ========================
           FORM INPUTS
        ======================== */
        .form-input {
            width: 100%;
            background: rgba(6, 12, 26, 0.8);
            border: 1px solid rgba(26, 42, 74, 0.9);
            border-radius: 0.75rem;
            padding: 0.8rem 1.1rem;
            font-size: 0.8rem;
            color: var(--text-primary);
            outline: none;
            transition: all 0.2s ease;
        }
        .form-input:focus {
            border-color: rgba(0,180,240,0.5);
            box-shadow: 0 0 0 3px rgba(0,180,240,0.1);
        }
        .form-input::placeholder { color: var(--text-muted); }

        /* ========================
           BADGE
        ======================== */
        .badge-vip {
            background: linear-gradient(135deg, #0057B8, #00B4F0);
            color: white;
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.2rem 0.5rem;
            border-radius: 0.3rem;
            box-shadow: 0 0 12px rgba(0,180,240,0.4);
        }
        .badge-deluxe {
            background: linear-gradient(135deg, #6C2BD9, #E040FB);
            color: white;
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.2rem 0.5rem;
            border-radius: 0.3rem;
            box-shadow: 0 0 12px rgba(224,64,251,0.4);
        }
        .badge-regular {
            background: rgba(26, 42, 74, 0.9);
            color: rgba(139,163,204,0.9);
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.2rem 0.5rem;
            border-radius: 0.3rem;
        }

        /* ========================
           STATUS BADGES
        ======================== */
        .status-available {
            color: #4ADE80;
            background: rgba(74,222,128,0.1);
            border: 1px solid rgba(74,222,128,0.2);
        }
        .status-busy {
            color: #F87171;
            background: rgba(248,113,113,0.1);
            border: 1px solid rgba(248,113,113,0.2);
        }
        .status-maintenance {
            color: #FBBF24;
            background: rgba(251,191,36,0.1);
            border: 1px solid rgba(251,191,36,0.2);
        }

        /* ========================
           GRADIENT TEXT
        ======================== */
        .text-gradient-blue {
            background: linear-gradient(135deg, #00B4F0 0%, #60CFFF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .text-gradient-purple {
            background: linear-gradient(135deg, #A78BFA 0%, #E040FB 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ========================
           SECTION DIVIDER
        ======================== */
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--accent-blue);
            margin-bottom: 0.75rem;
        }
        .section-label::before {
            content: '';
            width: 1.5rem;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent-blue));
        }
        .section-label::after {
            content: '';
            width: 1.5rem;
            height: 1px;
            background: linear-gradient(90deg, var(--accent-blue), transparent);
        }

        /* ========================
           TOAST NOTIFICATIONS
        ======================== */
        .toast-success {
            background: rgba(5, 25, 15, 0.95);
            border: 1px solid rgba(74,222,128,0.25);
            backdrop-filter: blur(12px);
        }
        .toast-error {
            background: rgba(25, 5, 10, 0.95);
            border: 1px solid rgba(248,113,113,0.25);
            backdrop-filter: blur(12px);
        }

        /* ========================
           FOOTER GLOW LINE
        ======================== */
        .footer-glow {
            background: linear-gradient(90deg, transparent, rgba(0,180,240,0.4), rgba(108,43,217,0.4), transparent);
            height: 1px;
        }

        /* ========================
           MOBILE NAV
        ======================== */
        #mobile-menu {
            display: none;
        }
        #mobile-menu.open {
            display: block;
        }

        /* ========================
           ANIMATIONS
        ======================== */
        @keyframes slide-down {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down { animation: slide-down 0.25s ease-out forwards; }

        @keyframes fade-in {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        .animate-fade-in { animation: fade-in 0.4s ease-out forwards; }

        /* ========================
           SECTION ANIMATION ON SCROLL
        ======================== */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen antialiased selection:bg-blue-600/40 selection:text-white">

    <!-- ========================
         STICKY NAVIGATION
    ======================== -->
    <header id="main-nav" class="sticky top-0 z-50 glass-nav transition-all duration-300">
        <div class="w-full px-5 md:px-10 lg:px-16 xl:px-20">
            <div class="flex items-center justify-between h-18" style="height:72px">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group flex-shrink-0">
                    <div class="relative w-9 h-9 flex items-center justify-center rounded-xl overflow-hidden"
                         style="background: linear-gradient(135deg, #0057B8 0%, #00B4F0 100%); box-shadow: 0 0 18px rgba(0,180,240,0.4);">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm3-3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                        </svg>
                    </div>
                    <div class="leading-none">
                        <div class="text-sm font-black tracking-widest text-white uppercase">
                            PS<span class="text-gradient-blue">Room</span>
                        </div>
                        <div class="text-[8px] font-bold tracking-[0.25em] uppercase mt-0.5" style="color: var(--text-muted)">
                            Enterprise
                        </div>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex items-center gap-7">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('frontend.room') }}"
                       class="nav-link {{ request()->routeIs('frontend.room') ? 'active' : '' }}">Room</a>
                    @auth
                        <a href="{{ route('booking.history') }}"
                           class="nav-link {{ request()->routeIs('booking.history') ? 'active' : '' }}">Riwayat</a>
                    @endauth
                    <a href="{{ route('frontend.how-to-book') }}"
                       class="nav-link {{ request()->routeIs('frontend.how-to-book') ? 'active' : '' }}">Cara Pesan</a>
                    <a href="{{ route('frontend.about') }}"
                       class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}">Tentang Kami</a>
                    <a href="{{ route('frontend.contact') }}"
                       class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}">Kontak</a>
                </nav>

                <!-- Desktop Auth -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <div class="flex items-center gap-3">
                            <div class="flex flex-col items-end">
                                <span class="text-[9px] font-semibold uppercase tracking-wider" style="color:var(--text-muted)">Logged in as</span>
                                <span class="text-xs font-bold text-white">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                                 style="background: rgba(0,87,184,0.15); border: 1px solid rgba(0,180,240,0.2);">
                                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit"
                                   class="px-4 py-2 rounded-xl text-[10px] font-bold uppercase tracking-wider transition-all duration-200 cursor-pointer"
                                   style="background: rgba(248,113,113,0.08); border: 1px solid rgba(248,113,113,0.2); color: #F87171;"
                                   onmouseover="this.style.background='rgba(248,113,113,0.18)'; this.style.color='#FCA5A5'"
                                   onmouseout="this.style.background='rgba(248,113,113,0.08)'; this.style.color='#F87171'">
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-ghost text-[10px]">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary text-[10px]">
                            <span>Daftar</span>
                        </a>
                    @endauth
                </div>

                <!-- Mobile: Hamburger -->
                <button id="mobile-toggle"
                        class="md:hidden flex flex-col gap-1.5 p-2 rounded-lg transition"
                        style="background: rgba(26,42,74,0.4); border: 1px solid rgba(26,42,74,0.8);"
                        onclick="toggleMobileMenu()">
                    <span class="block w-5 h-0.5 bg-slate-300 rounded transition-all duration-200" id="ham-top"></span>
                    <span class="block w-5 h-0.5 bg-slate-300 rounded transition-all duration-200" id="ham-mid"></span>
                    <span class="block w-3.5 h-0.5 bg-slate-300 rounded transition-all duration-200" id="ham-bot"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="md:hidden border-t animate-slide-down" style="border-color: rgba(26,42,74,0.5); background: rgba(3,6,15,0.97);">
            <div class="px-5 py-5 space-y-1">
                <a href="{{ route('home') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('home') ? 'text-white bg-blue-500/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Beranda
                </a>
                <a href="{{ route('frontend.room') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('frontend.room') ? 'text-white bg-blue-500/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Room
                </a>
                @auth
                    <a href="{{ route('booking.history') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('booking.history') ? 'text-white bg-blue-500/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Riwayat Pemesanan
                    </a>
                @endauth
                <a href="{{ route('frontend.how-to-book') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-sm font-semibold transition text-slate-400 hover:text-white hover:bg-white/5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Cara Pemesanan
                </a>
                <a href="{{ route('frontend.about') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-sm font-semibold transition text-slate-400 hover:text-white hover:bg-white/5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Tentang Kami
                </a>
                <a href="{{ route('frontend.contact') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-sm font-semibold transition text-slate-400 hover:text-white hover:bg-white/5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Kontak
                </a>
                <div class="pt-3 border-t flex gap-2" style="border-color: rgba(26,42,74,0.6)">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full text-center py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition cursor-pointer" style="background: rgba(248,113,113,0.1); border: 1px solid rgba(248,113,113,0.2); color: #F87171;">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex-1 text-center py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-slate-300 transition" style="background: rgba(26,42,74,0.4); border: 1px solid rgba(26,42,74,0.8);">Login</a>
                        <a href="{{ route('register') }}" class="flex-1 text-center py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white transition" style="background: linear-gradient(135deg, #0057B8, #00B4F0); box-shadow: 0 0 12px rgba(0,180,240,0.3);">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- ========================
         MAIN CONTENT
    ======================== -->
    <main class="flex-grow w-full">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="animate-fade-in px-5 md:px-10 lg:px-16 xl:px-20 pt-5">
                <div class="toast-success flex items-center justify-between rounded-xl p-4 text-xs" role="alert">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(74,222,128,0.15);">
                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="font-semibold text-green-300">{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-slate-500 hover:text-white transition ml-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="animate-fade-in px-5 md:px-10 lg:px-16 xl:px-20 pt-5">
                <div class="toast-error flex items-center justify-between rounded-xl p-4 text-xs" role="alert">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(248,113,113,0.15);">
                            <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <span class="font-semibold text-rose-300">{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-slate-500 hover:text-white transition ml-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- ========================
         PREMIUM FOOTER
    ======================== -->
    <footer class="mt-auto" style="background: rgba(3,6,15,0.97); border-top: 1px solid rgba(26,42,74,0.5);">
        <!-- Glow line -->
        <div class="footer-glow"></div>

        <div class="px-5 md:px-10 lg:px-16 xl:px-20 pt-14 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

                <!-- Branding -->
                <div class="space-y-4 lg:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="w-8 h-8 flex items-center justify-center rounded-xl"
                             style="background: linear-gradient(135deg, #0057B8, #00B4F0); box-shadow: 0 0 14px rgba(0,180,240,0.35);">
                            <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm3-3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-black tracking-widest text-white uppercase">PS<span class="text-gradient-blue">Room</span></div>
                            <div class="text-[8px] font-bold tracking-[0.25em] uppercase" style="color: var(--text-muted)">Enterprise</div>
                        </div>
                    </a>
                    <p class="text-xs leading-relaxed" style="color: var(--text-muted); max-width: 220px;">
                        Penyedia layanan rental PlayStation premium dengan fasilitas terbaik untuk pengalaman gaming luar biasa.
                    </p>
                    <!-- Social Links -->
                    <div class="flex gap-2.5">
                        <a href="#" class="w-8 h-8 rounded-lg flex items-center justify-center transition hover:scale-110" style="background: rgba(26,42,74,0.6); border: 1px solid rgba(26,42,74,0.9); color: var(--text-secondary);">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg flex items-center justify-center transition hover:scale-110" style="background: rgba(26,42,74,0.6); border: 1px solid rgba(26,42,74,0.9); color: var(--text-secondary);">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057.1 18.08.11 18.102.127 18.116a19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg flex items-center justify-center transition hover:scale-110" style="background: rgba(26,42,74,0.6); border: 1px solid rgba(26,42,74,0.9); color: var(--text-secondary);">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div>
                    <h4 class="text-xs font-black uppercase tracking-widest text-white mb-5 flex items-center gap-2">
                        <span class="w-3 h-0.5 inline-block" style="background: linear-gradient(90deg, #0057B8, #00B4F0);"></span>
                        Navigasi
                    </h4>
                    <ul class="space-y-3">
                        @foreach([
                            ['Beranda', 'home'],
                            ['Daftar Room', 'frontend.room'],
                            ['Cara Pemesanan', 'frontend.how-to-book'],
                            ['Tentang Kami', 'frontend.about'],
                            ['Kontak', 'frontend.contact'],
                        ] as [$label, $routeName])
                            <li>
                                <a href="{{ route($routeName) }}" class="text-xs transition duration-200 flex items-center gap-2 group" style="color: var(--text-muted)">
                                    <span class="w-1.5 h-1.5 rounded-full inline-block transition-all duration-200 group-hover:scale-150" style="background: var(--accent-blue); opacity: 0.4;"></span>
                                    <span class="group-hover:text-cyan-400 transition-colors duration-200">{{ $label }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Info -->
                <div>
                    <h4 class="text-xs font-black uppercase tracking-widest text-white mb-5 flex items-center gap-2">
                        <span class="w-3 h-0.5 inline-block" style="background: linear-gradient(90deg, #0057B8, #00B4F0);"></span>
                        Informasi
                    </h4>
                    <ul class="space-y-3.5">
                        <li class="flex items-start gap-2.5">
                            <div class="w-5 h-5 mt-0.5 flex-shrink-0 flex items-center justify-center">
                                <span class="w-2 h-2 rounded-full animate-pulse" style="background: #4ADE80;"></span>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-green-400">Buka 24 Jam</span>
                                <p class="text-[10px] mt-0.5" style="color: var(--text-muted)">Setiap Hari Tanpa Libur</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 flex-shrink-0 mt-0.5" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-xs" style="color: var(--text-muted);">Jl. Raya Gaming No. 12, Kota Impian</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 flex-shrink-0 mt-0.5" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <p class="text-xs" style="color: var(--text-muted);">+62 812-3456-7890</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 flex-shrink-0 mt-0.5" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <p class="text-xs" style="color: var(--text-muted);">support@psroom-ent.com</p>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h4 class="text-xs font-black uppercase tracking-widest text-white mb-5 flex items-center gap-2">
                        <span class="w-3 h-0.5 inline-block" style="background: linear-gradient(90deg, #0057B8, #00B4F0);"></span>
                        Newsletter
                    </h4>
                    <p class="text-xs leading-relaxed mb-4" style="color: var(--text-muted)">
                        Dapatkan promo eksklusif dan update game terbaru langsung di email Anda.
                    </p>
                    <div class="flex rounded-xl overflow-hidden" style="border: 1px solid rgba(26,42,74,0.9);">
                        <input type="email"
                               placeholder="Email Anda..."
                               class="flex-1 bg-transparent px-3.5 py-2.5 text-xs text-white outline-none"
                               style="font-size:0.7rem;"
                               onfocus="this.style.outline='none'">
                        <button class="px-4 py-2.5 text-white text-xs font-bold transition hover:brightness-110 flex-shrink-0"
                                style="background: linear-gradient(135deg, #0057B8, #00B4F0); font-size:0.7rem; letter-spacing:0.05em;">
                            Gabung
                        </button>
                    </div>
                    <!-- PS Symbols Decoration -->
                    <div class="flex items-center gap-3 mt-5">
                        <span class="text-lg font-black" style="color: rgba(0,87,184,0.5)">▲</span>
                        <span class="text-lg font-black" style="color: rgba(248,113,113,0.5)">●</span>
                        <span class="text-lg font-black" style="color: rgba(108,43,217,0.5)">✖</span>
                        <span class="text-lg font-black" style="color: rgba(74,222,128,0.5)">■</span>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-[10px]" style="border-top: 1px solid rgba(26,42,74,0.4); color: var(--text-muted);">
                <p>&copy; {{ date('Y') }} <span class="text-white font-semibold">PSRoom Enterprise</span>. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="hover:text-cyan-400 transition">Privacy Policy</a>
                    <span style="color: rgba(26,42,74,0.8)">|</span>
                    <a href="#" class="hover:text-cyan-400 transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const top = document.getElementById('ham-top');
            const mid = document.getElementById('ham-mid');
            const bot = document.getElementById('ham-bot');
            menu.classList.toggle('open');
            const isOpen = menu.classList.contains('open');
            top.style.transform = isOpen ? 'rotate(45deg) translateY(8px)' : '';
            mid.style.opacity = isOpen ? '0' : '1';
            bot.style.transform = isOpen ? 'rotate(-45deg) translateY(-8px)' : '';
            bot.style.width = isOpen ? '1.25rem' : '';
        }

        // Reveal on scroll
        const revealElements = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.04, rootMargin: '0px 0px -40px 0px' });
        revealElements.forEach(el => revealObserver.observe(el));
        // Also mark any already-visible reveals (above the fold)
        setTimeout(() => {
            revealElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) el.classList.add('visible');
            });
        }, 50);
    </script>

</body>
</html>
