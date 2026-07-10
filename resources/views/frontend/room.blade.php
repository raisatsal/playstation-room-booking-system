@extends('layouts.frontend')

@section('content')

{{-- Page Header Banner --}}
<div class="relative overflow-hidden py-16 px-5 md:px-10 lg:px-16 xl:px-20"
     style="background: linear-gradient(135deg, rgba(0,87,184,0.12) 0%, rgba(3,6,15,0.5) 50%, rgba(108,43,217,0.08) 100%); border-bottom: 1px solid rgba(26,42,74,0.4);">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(0,87,184,0.12) 0%, transparent 70%); transform: translate(30%,-30%);"></div>
    </div>
    <div class="relative z-10">
        <div class="section-label mb-3">Koleksi Room</div>
        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
            Semua <span class="text-gradient-blue">Room PlayStation</span>
        </h1>
        <p class="text-sm mt-2" style="color: var(--text-secondary);">Pilih tipe room favorit Anda dan nikmati kenyamanan bermain dengan fasilitas eksklusif.</p>
    </div>
</div>

{{-- Room Grid --}}
<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-12">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
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

            <div class="premium-card group flex flex-col reveal"
                 data-category="{{ $catName }}"
                 data-status="{{ $room->status_room }}"
                 style="animation-delay: {{ $loop->index * 0.05 }}s">

                {{-- Room Image --}}
                <div class="relative overflow-hidden rounded-xl mx-3 mt-3" style="height: 165px;">
                    <img src="{{ $room->foto_room ? asset('storage/' . $room->foto_room) : asset($fallbackImage) }}"
                         alt="{{ $room->nama_room }}"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                         loading="lazy">
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
                            <span class="w-1.5 h-1.5 rounded-full {{ $room->status_room === 'tersedia' ? 'animate-pulse' : '' }}"
                                  style="background: {{ $statusColor === 'available' ? '#4ADE80' : ($statusColor === 'busy' ? '#F87171' : '#FBBF24') }};"></span>
                            {{ $statusLabel }}
                        </span>
                    </div>

                    {{-- Room Code --}}
                    <div class="absolute bottom-3 right-3">
                        <span class="text-[9px] font-mono font-bold px-1.5 py-0.5 rounded-md"
                              style="background: rgba(3,6,15,0.7); color: rgba(139,163,204,0.8); border: 1px solid rgba(26,42,74,0.5);">
                            {{ $room->kode_room }}
                        </span>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="flex flex-col flex-grow p-4">
                    <h3 class="font-bold text-white group-hover:text-cyan-300 transition-colors duration-200 text-sm mb-3 truncate">
                        {{ $room->nama_room }}
                    </h3>

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

                    <div class="flex-grow"></div>

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
</div>

@endsection
