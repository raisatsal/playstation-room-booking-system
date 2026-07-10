@extends('layouts.frontend')

@section('content')

{{-- Page Header --}}
<div class="relative overflow-hidden py-16 px-5 md:px-10 lg:px-16 xl:px-20"
     style="background: linear-gradient(135deg, rgba(0,87,184,0.12) 0%, rgba(3,6,15,0.5) 100%); border-bottom: 1px solid rgba(26,42,74,0.4);">
    <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="section-label mb-3">Histori Saya</div>
            <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
                Riwayat <span class="text-gradient-blue">Pemesanan</span>
            </h1>
            <p class="text-sm mt-2" style="color: var(--text-secondary);">Daftar transaksi sewa room PlayStation yang telah Anda lakukan.</p>
        </div>
        <a href="{{ route('frontend.room') }}" class="btn-primary flex-shrink-0">
            <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <span>Sewa Room Baru</span>
        </a>
    </div>
</div>

<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-10">

    @if ($bookings->isEmpty())
        {{-- Empty State --}}
        <div class="flex flex-col items-center justify-center py-24 text-center reveal">
            <div class="w-20 h-20 rounded-2xl flex items-center justify-center text-4xl mb-5"
                 style="background: rgba(26,42,74,0.4); border: 1px solid rgba(26,42,74,0.7);">
                📋
            </div>
            <h3 class="text-lg font-black text-white mb-2">Belum Ada Pemesanan</h3>
            <p class="text-sm mb-6 max-w-xs" style="color: var(--text-secondary);">
                Anda belum pernah melakukan pemesanan room. Ayo mulai petualangan gaming Anda sekarang!
            </p>
            <a href="{{ route('frontend.room') }}" class="btn-primary">
                <span>Cari Room Sekarang</span>
                <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

    @else
        {{-- Desktop Table --}}
        <div class="hidden md:block reveal">
            <div class="premium-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(26,42,74,0.7); background: rgba(6,12,26,0.5);">
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest" style="color: var(--text-muted);">Kode Booking</th>
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest" style="color: var(--text-muted);">Room PlayStation</th>
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest" style="color: var(--text-muted);">Tanggal</th>
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest" style="color: var(--text-muted);">Jam Sewa</th>
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest text-center" style="color: var(--text-muted);">Durasi</th>
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest text-right" style="color: var(--text-muted);">Total</th>
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest text-center" style="color: var(--text-muted);">Pembayaran</th>
                                <th class="py-4 px-5 text-[9px] font-black uppercase tracking-widest text-center" style="color: var(--text-muted);">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                @php
                                    $payColor  = match ($booking->status_pembayaran) {
                                        'sudah_bayar' => ['text' => '#4ADE80', 'bg' => 'rgba(74,222,128,0.08)', 'border' => 'rgba(74,222,128,0.2)'],
                                        default       => ['text' => '#F87171', 'bg' => 'rgba(248,113,113,0.08)', 'border' => 'rgba(248,113,113,0.2)'],
                                    };
                                    $payLabel  = $booking->status_pembayaran === 'sudah_bayar' ? 'Lunas' : 'Belum Bayar';

                                    $ordColor  = match ($booking->status_pemesanan) {
                                        'aktif'      => ['text' => '#00B4F0', 'bg' => 'rgba(0,180,240,0.08)', 'border' => 'rgba(0,180,240,0.2)'],
                                        'selesai'    => ['text' => '#4ADE80', 'bg' => 'rgba(74,222,128,0.08)', 'border' => 'rgba(74,222,128,0.2)'],
                                        'dibatalkan' => ['text' => '#F87171', 'bg' => 'rgba(248,113,113,0.08)', 'border' => 'rgba(248,113,113,0.2)'],
                                        default      => ['text' => '#8BA3CC', 'bg' => 'rgba(26,42,74,0.3)', 'border' => 'rgba(26,42,74,0.5)'],
                                    };
                                    $ordLabel  = match ($booking->status_pemesanan) {
                                        'aktif'      => 'Aktif (Main)',
                                        'selesai'    => 'Selesai',
                                        'dibatalkan' => 'Dibatalkan',
                                        default      => $booking->status_pemesanan,
                                    };
                                @endphp
                                <tr class="transition duration-200"
                                    style="border-bottom: 1px solid rgba(26,42,74,0.4);"
                                    onmouseover="this.style.background='rgba(26,42,74,0.2)'"
                                    onmouseout="this.style.background=''">
                                    <td class="py-4 px-5 font-mono font-bold text-xs" style="color: var(--text-muted)">
                                        {{ $booking->kode_pemesanan }}
                                    </td>
                                    <td class="py-4 px-5 font-black text-sm text-white">
                                        {{ $booking->room?->nama_room ?? '-' }}
                                    </td>
                                    <td class="py-4 px-5 text-xs" style="color: var(--text-secondary)">
                                        {{ \Carbon\Carbon::parse($booking->tanggal_pemesanan)->format('d M Y') }}
                                    </td>
                                    <td class="py-4 px-5 text-xs" style="color: var(--text-secondary)">
                                        {{ $booking->jam_mulai }} – {{ $booking->jam_selesai }}
                                    </td>
                                    <td class="py-4 px-5 text-xs font-bold text-white text-center">
                                        {{ $booking->durasi_jam }} Jam
                                    </td>
                                    <td class="py-4 px-5 text-sm font-black text-right"
                                        style="color: var(--accent-blue)">
                                        Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-5 text-center">
                                        <span class="inline-flex items-center rounded-lg px-2.5 py-1 text-[9px] font-bold"
                                              style="color: {{ $payColor['text'] }}; background: {{ $payColor['bg'] }}; border: 1px solid {{ $payColor['border'] }};">
                                            {{ $payLabel }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-5 text-center">
                                        <span class="inline-flex items-center rounded-lg px-2.5 py-1 text-[9px] font-bold"
                                              style="color: {{ $ordColor['text'] }}; background: {{ $ordColor['bg'] }}; border: 1px solid {{ $ordColor['border'] }};">
                                            {{ $ordLabel }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="md:hidden space-y-4 reveal">
            @foreach ($bookings as $booking)
                @php
                    $payColor  = match ($booking->status_pembayaran) {
                        'sudah_bayar' => ['text' => '#4ADE80', 'bg' => 'rgba(74,222,128,0.08)', 'border' => 'rgba(74,222,128,0.2)'],
                        default       => ['text' => '#F87171', 'bg' => 'rgba(248,113,113,0.08)', 'border' => 'rgba(248,113,113,0.2)'],
                    };
                    $payLabel  = $booking->status_pembayaran === 'sudah_bayar' ? 'Lunas' : 'Belum Bayar';
                    $ordColor  = match ($booking->status_pemesanan) {
                        'aktif'      => ['text' => '#00B4F0', 'bg' => 'rgba(0,180,240,0.08)', 'border' => 'rgba(0,180,240,0.2)'],
                        'selesai'    => ['text' => '#4ADE80', 'bg' => 'rgba(74,222,128,0.08)', 'border' => 'rgba(74,222,128,0.2)'],
                        'dibatalkan' => ['text' => '#F87171', 'bg' => 'rgba(248,113,113,0.08)', 'border' => 'rgba(248,113,113,0.2)'],
                        default      => ['text' => '#8BA3CC', 'bg' => 'rgba(26,42,74,0.3)', 'border' => 'rgba(26,42,74,0.5)'],
                    };
                    $ordLabel  = match ($booking->status_pemesanan) {
                        'aktif'      => 'Aktif (Main)',
                        'selesai'    => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                        default      => $booking->status_pemesanan,
                    };
                @endphp
                <div class="premium-card p-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-[9px] font-mono font-bold" style="color: var(--text-muted)">
                            {{ $booking->kode_pemesanan }}
                        </span>
                        <span class="inline-flex items-center rounded-lg px-2 py-0.5 text-[9px] font-bold"
                              style="color: {{ $ordColor['text'] }}; background: {{ $ordColor['bg'] }}; border: 1px solid {{ $ordColor['border'] }};">
                            {{ $ordLabel }}
                        </span>
                    </div>

                    <div>
                        <h4 class="text-sm font-black text-white">{{ $booking->room?->nama_room ?? '-' }}</h4>
                        <p class="text-xs mt-0.5" style="color: var(--text-secondary);">
                            {{ \Carbon\Carbon::parse($booking->tanggal_pemesanan)->format('d M Y') }} &bull;
                            {{ $booking->jam_mulai }} – {{ $booking->jam_selesai }} ({{ $booking->durasi_jam }} Jam)
                        </p>
                    </div>

                    <div class="flex items-center justify-between pt-3"
                         style="border-top: 1px solid rgba(26,42,74,0.5);">
                        <div>
                            <span class="text-[8px] uppercase tracking-wider font-bold block" style="color: var(--text-muted)">Total Bayar</span>
                            <span class="text-sm font-black" style="color: var(--accent-blue)">
                                Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                            </span>
                        </div>
                        <span class="inline-flex items-center rounded-lg px-2.5 py-1 text-[9px] font-bold"
                              style="color: {{ $payColor['text'] }}; background: {{ $payColor['bg'] }}; border: 1px solid {{ $payColor['border'] }};">
                            {{ $payLabel }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

@endsection
