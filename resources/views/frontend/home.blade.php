@extends('layouts.frontend')

@section('content')

{{-- ====================================
     HERO SECTION - CINEMATIC FULL WIDTH
===================================== --}}
<section class="relative overflow-hidden" style="min-height: 92vh;">

    {{-- Layered background: image + overlays --}}
    <div class="absolute inset-0">
        {{-- Background image --}}
        <img src="{{ asset('images/hero-gaming-room.png') }}"
             alt="PSRoom Gaming Lounge"
             class="w-full h-full object-cover object-center"
             style="filter: saturate(1.1) brightness(0.55);">

        {{-- Gradient overlays to blend --}}
        <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(3,6,15,0.97) 0%, rgba(3,6,15,0.75) 45%, rgba(3,6,15,0.35) 100%);"></div>
        <div class="absolute inset-0" style="background: linear-gradient(0deg, rgba(3,6,15,1) 0%, rgba(3,6,15,0.6) 25%, transparent 60%);"></div>
        <div class="absolute inset-0" style="background: radial-gradient(ellipse 70% 60% at 30% 50%, rgba(0,87,184,0.12) 0%, transparent 65%);"></div>

        {{-- Animated floating orbs --}}
        <div class="absolute" style="top: 15%; left: 12%; width: 450px; height: 450px; background: radial-gradient(circle, rgba(0,87,184,0.18) 0%, transparent 65%); animation: float 8s ease-in-out infinite; pointer-events:none;"></div>
        <div class="absolute" style="bottom: 20%; right: 15%; width: 350px; height: 350px; background: radial-gradient(circle, rgba(108,43,217,0.14) 0%, transparent 65%); animation: float 10s ease-in-out infinite reverse; pointer-events:none;"></div>
    </div>

    {{-- Hero Content --}}
    <div class="relative z-10 w-full px-5 md:px-10 lg:px-16 xl:px-20 flex items-center" style="min-height: 92vh;">
        <div class="w-full grid grid-cols-1 lg:grid-cols-12 gap-8 xl:gap-16 items-center py-20">

            {{-- Left: Text Content --}}
            <div class="lg:col-span-7 space-y-7 reveal" style="animation-delay:0.1s">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2.5 rounded-full px-4 py-1.5"
                     style="background: rgba(0,180,240,0.08); border: 1px solid rgba(0,180,240,0.25);">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75" style="background:#00B4F0;"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2" style="background:#00B4F0;"></span>
                    </span>
                    <span class="text-[10px] font-bold tracking-widest uppercase" style="color:#00D4FF;">🎮 Premium PlayStation Gaming Lounge</span>
                </div>

                {{-- Headline --}}
                <h1 class="font-black leading-[1.07]" style="font-size: clamp(2.4rem, 5.5vw, 4.2rem); letter-spacing: -0.02em;">
                    <span class="block text-white">Rasakan Sensasi</span>
                    <span class="block text-white">Bermainnya!!</span>
                    <span class="block" style="background: linear-gradient(135deg, #00B4F0 0%, #60D4FF 40%, #A78BFA 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">PlayStation</span>
                    <span class="block text-white" style="font-size: 60%; opacity: 0.7; font-weight: 600; letter-spacing: 0.05em; margin-top: 0.3rem;">SETARA ROOM PS SENDIRI</span>
                </h1>

                {{-- Sub description --}}
                <p class="leading-relaxed max-w-xl" style="color: rgba(139,163,204,0.9); font-size: clamp(0.85rem, 1.5vw, 1rem);">
                    Fasilitas premium eksklusif: PS5 & PS4 Pro, TV OLED 65", sound system dolby atmos, sofa kulit mewah, dan AC inverter tersedia <strong class="text-white">24 jam sehari, 7 hari seminggu</strong> untuk kepuasan gaming Anda.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-4 items-center">
                    <a href="{{ route('frontend.room') }}" class="btn-primary">
                        <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Lihat Semua Room</span>
                        <svg class="w-3.5 h-3.5" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('frontend.how-to-book') }}" class="btn-ghost">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Cara Pemesanan</span>
                    </a>
                </div>

                {{-- Mini Feature Pills --}}
                <div class="flex flex-wrap gap-3 pt-2">
                    @foreach([
                        ['PS5 & PS4 Pro', '#00B4F0'],
                        ['TV OLED 65"', '#A78BFA'],
                        ['AC + Sofa Premium', '#4ADE80'],
                        ['Buka 24 Jam', '#F5C518'],
                    ] as [$feat, $color])
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[10px] font-semibold"
                              style="background: rgba(26,42,74,0.5); border: 1px solid rgba(26,42,74,0.9); color: rgba(240,244,255,0.75);">
                            <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:{{ $color }};"></span>
                            {{ $feat }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Right: Stats Floating Card --}}
            <div class="lg:col-span-5 flex justify-center lg:justify-end reveal" style="animation-delay:0.3s">
                <div class="w-full max-w-sm space-y-4">
                    {{-- Floating glass panel --}}
                    <div class="glass-card rounded-2xl p-6" style="animation: float 6s ease-in-out infinite;">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0"
                                 style="background: linear-gradient(135deg, #0057B8, #00B4F0);">
                                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm3-3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-white">PSRoom Enterprise</div>
                                <div class="text-[9px] uppercase tracking-widest" style="color:var(--text-muted)">Status: <span class="text-green-400 font-bold">● Buka Sekarang</span></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3 mb-4">
                            @foreach([
                                ['10+', 'Room Premium'],
                                ['5K+', 'Pelanggan Aktif'],
                                ['99%', 'Kepuasan'],
                                ['24/7', 'Layanan'],
                            ] as [$val, $lbl])
                                <div class="rounded-xl p-3.5 text-center"
                                     style="background: rgba(6,12,26,0.6); border: 1px solid rgba(26,42,74,0.7);">
                                    <div class="text-xl font-black mb-0.5 text-gradient-blue">{{ $val }}</div>
                                    <div class="text-[9px] font-semibold uppercase tracking-wider" style="color:var(--text-muted)">{{ $lbl }}</div>
                                </div>
                            @endforeach
                        </div>

                        {{-- PS Symbols --}}
                        <div class="flex items-center justify-center gap-4 pt-3" style="border-top: 1px solid rgba(26,42,74,0.5);">
                            <span class="text-xl font-black" style="color:#00B4F0; text-shadow: 0 0 12px rgba(0,180,240,0.8)">▲</span>
                            <span class="text-xl font-black" style="color:#F87171; text-shadow: 0 0 12px rgba(248,113,113,0.8)">●</span>
                            <span class="text-xl font-black" style="color:#A78BFA; text-shadow: 0 0 12px rgba(167,139,250,0.8)">✖</span>
                            <span class="text-xl font-black" style="color:#4ADE80; text-shadow: 0 0 12px rgba(74,222,128,0.8)">■</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-2 animate-bounce" style="opacity:0.5;">
        <span class="text-[9px] uppercase tracking-widest text-slate-400 font-semibold">Scroll</span>
        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- ====================================
     FEATURED ROOMS SECTION
===================================== --}}
<section class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-20">

    {{-- Section Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12 reveal">
        <div>
            <div class="section-label">Koleksi Room</div>
            <h2 class="text-2xl md:text-3xl font-black text-white tracking-tight">
                Room Paling <span class="text-gradient-blue">Underated</span>
            </h2>
            <p class="text-sm mt-2" style="color: var(--text-secondary);">Pilih tipe room favorit untuk pengalaman gaming terbaik</p>
        </div>
        <a href="{{ route('frontend.room') }}"
           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest transition-all duration-200 group flex-shrink-0"
           style="color: var(--accent-blue);">
            <span class="group-hover:text-cyan-300 transition-colors">Lihat Semua Room</span>
            <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    {{-- Room Cards Grid --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($rooms as $room)
            @php
                $statusColor = match ($room->status_room) {
                    'tersedia'    => 'available',
                    'dipakai'     => 'busy',
                    'maintenance' => 'maintenance',
                    default       => 'busy',
                };
                $statusLabel = match ($room->status_room) {
                    'tersedia'    => 'Tersedia',
                    'dipakai'     => 'Sedang Dipakai',
                    'maintenance' => 'Maintenance',
                    default       => ucfirst($room->status_room),
                };
                $catName = strtolower($room->kategori?->nama_kategori ?? '');
                $fallbackImage = match ($catName) {
                    'vip'    => 'images/vip-room.png',
                    'deluxe' => 'images/deluxe-room.png',
                    default  => 'images/regular-room.png',
                };
            @endphp

            <div class="premium-card group flex flex-col reveal" style="animation-delay: {{ $loop->index * 0.07 }}s">
                {{-- Room Image --}}
                <div class="relative overflow-hidden rounded-xl mx-3 mt-3" style="height:180px;">
                    <img src="{{ $room->foto_room ? asset('storage/' . $room->foto_room) : asset($fallbackImage) }}"
                         alt="{{ $room->nama_room }}"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                         loading="lazy">

                    {{-- Gradient overlay on image --}}
                    <div class="absolute inset-0" style="background: linear-gradient(0deg, rgba(10,18,37,0.85) 0%, transparent 50%);"></div>

                    {{-- Category Badge --}}
                    <div class="absolute top-3 left-3">
                        @if($catName === 'vip')
                            <span class="badge-vip">VIP</span>
                        @elseif($catName === 'deluxe')
                            <span class="badge-deluxe">Deluxe</span>
                        @else
                            <span class="badge-regular">Regular</span>
                        @endif
                    </div>

                    {{-- Status Badge --}}
                    <div class="absolute top-3 right-3">
                        <span class="inline-flex items-center gap-1.5 rounded-lg px-2 py-0.5 text-[9px] font-bold status-{{ $statusColor }}"
                              style="backdrop-filter: blur(8px);">
                            <span class="w-1.5 h-1.5 rounded-full inline-block {{ $room->status_room === 'tersedia' ? 'animate-pulse' : '' }}"
                                  style="background: {{ $statusColor === 'available' ? '#4ADE80' : ($statusColor === 'busy' ? '#F87171' : '#FBBF24') }};"></span>
                            {{ $statusLabel }}
                        </span>
                    </div>

                    {{-- Room code on image bottom --}}
                    <div class="absolute bottom-3 right-3">
                        <span class="text-[9px] font-mono font-bold px-1.5 py-0.5 rounded-md"
                              style="background: rgba(3,6,15,0.7); color: rgba(139,163,204,0.8); border: 1px solid rgba(26,42,74,0.5);">
                            {{ $room->kode_room }}
                        </span>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="flex flex-col flex-grow p-4">
                    {{-- Room Name --}}
                    <h3 class="font-bold text-white group-hover:text-cyan-300 transition-colors duration-200 text-sm mb-3 truncate">
                        {{ $room->nama_room }}
                    </h3>

                    {{-- Specs Row --}}
                    <div class="flex items-center gap-2 flex-wrap mb-4">
                        <span class="inline-flex items-center gap-1 text-[10px] font-medium px-2 py-1 rounded-lg"
                              style="background: rgba(26,42,74,0.5); color: var(--text-secondary); border: 1px solid rgba(26,42,74,0.7);">
                            <svg class="w-3 h-3 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2z"/>
                            </svg>
                            {{ $room->jenisPlaystation?->nama_playstation ?? '-' }}
                        </span>
                        <span class="inline-flex items-center gap-1 text-[10px] font-medium px-2 py-1 rounded-lg"
                              style="background: rgba(26,42,74,0.5); color: var(--text-secondary); border: 1px solid rgba(26,42,74,0.7);">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
                            </svg>
                            {{ $room->kapasitas_orang }} Orang
                        </span>
                    </div>

                    {{-- Spacer --}}
                    <div class="flex-grow"></div>

                    {{-- Price + CTA --}}
                    <div class="flex items-center justify-between pt-3"
                         style="border-top: 1px solid rgba(26,42,74,0.6);">
                        <div>
                            <span class="text-[8px] uppercase tracking-wider font-bold block mb-0.5" style="color: var(--text-muted)">Harga / Jam</span>
                            <span class="text-sm font-black text-white">
                                Rp {{ number_format($room->harga_per_jam, 0, ',', '.') }}
                            </span>
                        </div>

                        @if($room->status_room === 'tersedia')
                            <a href="{{ route('booking.create', $room->id_room) }}"
                               class="btn-primary"
                               style="padding: 0.5rem 1rem; font-size: 0.65rem;">
                                <span>Pesan</span>
                                <svg class="w-3.5 h-3.5" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        @else
                            <button disabled
                                    class="inline-flex items-center gap-1 rounded-xl text-[10px] font-bold uppercase tracking-wider px-4 py-2 cursor-not-allowed"
                                    style="background: rgba(26,42,74,0.3); border: 1px solid rgba(26,42,74,0.6); color: var(--text-muted);">
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- ====================================
     WHY CHOOSE US (FEATURES)
===================================== --}}
<section class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-16" style="border-top: 1px solid rgba(26,42,74,0.4);">
    <div class="text-center mb-12 reveal">
        <div class="section-label">Mengapa Kami</div>
        <h2 class="text-2xl md:text-3xl font-black text-white tracking-tight">
            Standar <span class="text-gradient-purple">Premium</span> di Setiap Detail
        </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach([
            ['💰', 'Harga Terjangkau', 'Tarif bersahabat untuk semua kalangan dengan pilihan durasi fleksibel mulai dari 1 jam.', 'rgba(245,197,24,0.15)', 'rgba(245,197,24,0.3)'],
            ['🎮', 'Konsol Terkini', 'PlayStation 5 & PS4 Pro original dengan koleksi game premium terlengkap.', 'rgba(0,180,240,0.12)', 'rgba(0,180,240,0.3)'],
            ['📅', 'Reservasi Instan', 'Pesan secara online kapan saja, real-time, tanpa antrian panjang di lokasi.', 'rgba(167,139,250,0.12)', 'rgba(167,139,250,0.3)'],
            ['🛡️', 'Dukungan 24/7', 'Tim operator kami selalu siap membantu semua kebutuhan gaming Anda.', 'rgba(74,222,128,0.12)', 'rgba(74,222,128,0.3)'],
        ] as [$icon, $title, $desc, $bg, $border])
            <div class="premium-card p-5 reveal group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-4 transition-transform duration-300 group-hover:scale-110"
                     style="background: {{ $bg }}; border: 1px solid {{ $border }};">
                    {{ $icon }}
                </div>
                <h3 class="text-sm font-bold text-white mb-2">{{ $title }}</h3>
                <p class="text-xs leading-relaxed" style="color: var(--text-secondary);">{{ $desc }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- ====================================
     QUICK INFO CARDS
===================================== --}}
<section class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Card: How to Book --}}
        <a href="{{ route('frontend.how-to-book') }}"
           class="premium-card group p-7 flex flex-col reveal"
           style="background: linear-gradient(135deg, rgba(0,87,184,0.08) 0%, rgba(10,18,37,0.55) 100%);">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-110"
                 style="background: rgba(0,87,184,0.15); border: 1px solid rgba(0,180,240,0.2);">
                <svg class="w-6 h-6" style="color:#00B4F0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="text-base font-black text-white mb-2">Cara Pemesanan</h3>
            <p class="text-xs leading-relaxed mb-5" style="color: var(--text-secondary);">
                Panduan langkah demi langkah untuk melakukan reservasi room game PlayStation di platform kami.
            </p>
            <div class="mt-auto flex items-center gap-2 text-xs font-bold uppercase tracking-widest group-hover:gap-3 transition-all" style="color:#00B4F0;">
                <span>Pelajari Cara Pesan</span>
                <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </a>

        {{-- Card: About --}}
        <a href="{{ route('frontend.about') }}"
           class="premium-card group p-7 flex flex-col reveal"
           style="background: linear-gradient(135deg, rgba(108,43,217,0.08) 0%, rgba(10,18,37,0.55) 100%);">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-110"
                 style="background: rgba(108,43,217,0.15); border: 1px solid rgba(167,139,250,0.2);">
                <svg class="w-6 h-6" style="color:#A78BFA" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h3 class="text-base font-black text-white mb-2">Tentang Kami</h3>
            <p class="text-xs leading-relaxed mb-5" style="color: var(--text-secondary);">
                Cerita di balik lounge gaming PlayStation premium kami dan komitmen tinggi kami dalam memanjakan para gamer.
            </p>
            <div class="mt-auto flex items-center gap-2 text-xs font-bold uppercase tracking-widest group-hover:gap-3 transition-all" style="color:#A78BFA;">
                <span>Tentang PSRoom</span>
                <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </a>

        {{-- Card: Contact --}}
        <a href="{{ route('frontend.contact') }}"
           class="premium-card group p-7 flex flex-col reveal"
           style="background: linear-gradient(135deg, rgba(74,222,128,0.06) 0%, rgba(10,18,37,0.55) 100%);">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-110"
                 style="background: rgba(74,222,128,0.12); border: 1px solid rgba(74,222,128,0.2);">
                <svg class="w-6 h-6" style="color:#4ADE80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <h3 class="text-base font-black text-white mb-2">Hubungi Kami</h3>
            <p class="text-xs leading-relaxed mb-5" style="color: var(--text-secondary);">
                Operator lounge kami siap sedia 24 jam menjawab pertanyaan, reservasi grup, dan kebutuhan khusus Anda.
            </p>
            <div class="mt-auto flex items-center gap-2 text-xs font-bold uppercase tracking-widest group-hover:gap-3 transition-all" style="color:#4ADE80;">
                <span>Kontak Sekarang</span>
                <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </a>
    </div>
</section>

{{-- ====================================
     CTA BANNER
===================================== --}}
<section class="w-full px-5 md:px-10 lg:px-16 xl:px-20 pb-20">
    <div class="relative rounded-2xl overflow-hidden reveal"
         style="background: linear-gradient(135deg, rgba(0,87,184,0.25) 0%, rgba(108,43,217,0.2) 50%, rgba(0,87,184,0.15) 100%); border: 1px solid rgba(0,180,240,0.2);">

        {{-- Decorative --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-0 w-64 h-64 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(0,87,184,0.3) 0%, transparent 70%); transform: translate(-30%, -30%);"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(108,43,217,0.3) 0%, transparent 70%); transform: translate(30%, 30%);"></div>
        </div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 p-10 md:p-14">
            <div>
                <div class="section-label mb-3">Mulai Sekarang</div>
                <h2 class="text-2xl md:text-3xl font-black text-white tracking-tight mb-3">
                    Siap untuk Pengalaman<br>Gaming <span class="text-gradient-blue">Terbaik?</span>
                </h2>
                <p class="text-sm" style="color: rgba(139,163,204,0.85);">
                    Daftarkan akun Anda dan nikmati kemudahan reservasi room PlayStation premium kapan saja.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 flex-shrink-0">
                @guest
                    <a href="{{ route('register') }}" class="btn-primary" style="white-space:nowrap;">
                        <span>Daftar Gratis</span>
                        <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                @endguest
                <a href="{{ route('frontend.room') }}" class="btn-ghost" style="white-space:nowrap;">
                    <span>Lihat Room</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
