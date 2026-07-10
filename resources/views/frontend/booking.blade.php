@extends('layouts.frontend')

@section('content')

<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-8 md:py-12">

    {{-- Back Button --}}
    <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 mb-6 text-xs font-semibold transition group"
       style="color: var(--text-secondary);"
       onmouseover="this.style.color='white'"
       onmouseout="this.style.color='var(--text-secondary)'">
        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" style="color: var(--accent-blue)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar Room
    </a>

    <div class="max-w-4xl mx-auto">
        {{-- Page Title --}}
        <div class="mb-8 reveal">
            <div class="section-label mb-2">Reservasi Room</div>
            <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
                Form <span class="text-gradient-blue">Pemesanan</span>
            </h1>
            <p class="text-sm mt-2" style="color: var(--text-secondary);">Konfirmasi jadwal bermain dan lengkapi detail pemesanan di bawah ini yaak.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- Left: Room Summary --}}
            <div class="lg:col-span-5 space-y-4 reveal">

                @php
                    $catName = strtolower($room->kategori?->nama_kategori ?? '');
                    $fallbackImage = match ($catName) {
                        'vip'    => 'images/vip-room.png',
                        'deluxe' => 'images/deluxe-room.png',
                        default  => 'images/regular-room.png',
                    };
                    $totalPrice = $room->harga_per_jam + ($room->kategori?->harga_tambahan ?? 0);
                @endphp

                {{-- Room Image --}}
                <div class="relative rounded-2xl overflow-hidden" style="height: 220px;">
                    @if($room->foto_room)
                        <img src="{{ asset('storage/' . $room->foto_room) }}" alt="{{ $room->nama_room }}" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset($fallbackImage) }}" alt="{{ $room->nama_room }}" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0" style="background: linear-gradient(0deg, rgba(10,18,37,0.95) 0%, rgba(10,18,37,0.3) 50%, transparent 100%);"></div>

                    {{-- Category Badge --}}
                    <div class="absolute top-4 left-4">
                        @if($catName === 'vip')
                            <span class="badge-vip">VIP</span>
                        @elseif($catName === 'deluxe')
                            <span class="badge-deluxe">Deluxe</span>
                        @else
                            <span class="badge-regular">Regular</span>
                        @endif
                    </div>

                    {{-- Room name overlay --}}
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-base font-black text-white">{{ $room->nama_room }}</h3>
                        <p class="text-[10px] font-mono" style="color: rgba(139,163,204,0.7)">{{ $room->kode_room }}</p>
                    </div>
                </div>

                {{-- Room Details --}}
                <div class="premium-card p-5 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <span class="text-[9px] font-black uppercase tracking-widest block mb-1" style="color: var(--text-muted)">Konsol PlayStation</span>
                            <span class="text-sm font-bold text-white">{{ $room->jenisPlaystation?->nama_playstation ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="text-[9px] font-black uppercase tracking-widest block mb-1" style="color: var(--text-muted)">Kapasitas Maks</span>
                            <span class="text-sm font-bold text-white">{{ $room->kapasitas_orang }} Orang</span>
                        </div>
                    </div>

                    <div class="pt-3" style="border-top: 1px solid rgba(26,42,74,0.6)">
                        <span class="text-[9px] font-black uppercase tracking-widest block mb-1" style="color: var(--text-muted)">Harga Per Jam</span>
                        <span class="text-xl font-black text-gradient-blue">
                            Rp {{ number_format($totalPrice, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                {{-- Info Notes --}}
                <div class="premium-card p-4 space-y-3"
                     style="background: rgba(0,87,184,0.06); border-color: rgba(0,180,240,0.15);">
                    <div class="flex items-start gap-2">
                        <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5" style="color: var(--accent-blue)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-[10px] leading-relaxed" style="color: var(--text-secondary);">
                            Sistem menghitung total secara otomatis berdasarkan durasi yang Anda pilih.
                        </p>
                    </div>
                    <div class="flex items-start gap-2">
                        <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5" style="color: #4ADE80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <p class="text-[10px] leading-relaxed" style="color: var(--text-secondary);">
                            Kode booking dikirim otomatis ke halaman Riwayat Pemesanan Anda.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Right: Booking Form --}}
            <div class="lg:col-span-7 reveal" style="animation-delay: 0.15s">
                <div class="premium-card p-6 md:p-7">

                    <form action="{{ route('booking.store', $room->id_room) }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" id="harga_per_jam_raw" value="{{ $totalPrice }}">

                        {{-- Time Inputs --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="jam_mulai" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">
                                    Jam Mulai Bermain
                                </label>
                                <input type="time"
                                       name="jam_mulai"
                                       id="jam_mulai"
                                       value="{{ old('jam_mulai', now()->format('H:i')) }}"
                                       required
                                       class="form-input"
                                       onchange="calculateTotal()">
                                @error('jam_mulai')
                                    <span class="text-[10px] text-rose-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="jam_selesai" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">
                                    Jam Selesai Bermain
                                </label>
                                <input type="time"
                                       name="jam_selesai"
                                       id="jam_selesai"
                                       value="{{ old('jam_selesai', now()->addHour()->format('H:i')) }}"
                                       required
                                       class="form-input"
                                       onchange="calculateTotal()">
                                @error('jam_selesai')
                                    <span class="text-[10px] text-rose-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Payment Method --}}
                        <div>
                            <label for="metode_pembayaran" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">
                                Metode Pembayaran
                            </label>
                            <select name="metode_pembayaran"
                                    id="metode_pembayaran"
                                    required
                                    class="form-input">
                                <option value="cash" {{ old('metode_pembayaran') === 'cash' ? 'selected' : '' }}>💵 Cash (Bayar di Tempat)</option>
                                <option value="transfer" {{ old('metode_pembayaran') === 'transfer' ? 'selected' : '' }}>🏦 Transfer Bank</option>
                                <option value="qris" {{ old('metode_pembayaran') === 'qris' ? 'selected' : '' }}>📱 QRIS (Pembayaran Instan)</option>
                            </select>
                            @error('metode_pembayaran')
                                <span class="text-[10px] text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Price Calculation Panel --}}
                        <div class="rounded-2xl p-5 space-y-3"
                             style="background: rgba(0,87,184,0.06); border: 1px solid rgba(0,180,240,0.15);">
                            <div class="flex items-center justify-between">
                                <span class="text-xs" style="color: var(--text-secondary)">Harga per Jam</span>
                                <span class="text-xs font-semibold text-white">
                                    Rp {{ number_format($totalPrice, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs" style="color: var(--text-secondary)">Durasi Bermain</span>
                                <span id="durasi_display" class="text-xs font-black text-white">– Jam</span>
                            </div>
                            <div class="flex items-center justify-between pt-3"
                                 style="border-top: 1px solid rgba(0,180,240,0.15);">
                                <span class="text-sm font-black text-white">Total Estimasi</span>
                                <span id="total_harga_display" class="text-xl font-black text-gradient-blue">–</span>
                            </div>
                        </div>

                        {{-- Validation Errors Global --}}
                        @if ($errors->any())
                            <div class="p-4 rounded-xl text-xs"
                                 style="background: rgba(248,113,113,0.08); border: 1px solid rgba(248,113,113,0.2); color: #F87171;">
                                <ul class="space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:#F87171"></span>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Submit Button --}}
                        <button type="submit" class="btn-primary w-full justify-center" style="height: 52px; font-size: 0.8rem;">
                            <svg class="w-5 h-5" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <span>Konfirmasi Reservasi Sekarang</span>
                        </button>

                        <p class="text-center text-[10px]" style="color: var(--text-muted)">
                            Dengan memesan, Anda menyetujui syarat dan ketentuan layanan kami.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function calculateTotal() {
        const jamMulai    = document.getElementById('jam_mulai').value;
        const jamSelesai  = document.getElementById('jam_selesai').value;
        const hargaPerJam = parseFloat(document.getElementById('harga_per_jam_raw').value);

        if (!jamMulai || !jamSelesai) {
            document.getElementById('durasi_display').textContent = '– Jam';
            document.getElementById('total_harga_display').textContent = '–';
            return;
        }

        const [h1, m1] = jamMulai.split(':').map(Number);
        const [h2, m2] = jamSelesai.split(':').map(Number);
        let diffMinutes = (h2 * 60 + m2) - (h1 * 60 + m1);
        if (diffMinutes < 0) diffMinutes += 24 * 60;

        let durasi    = Math.floor(diffMinutes / 60);
        const sisa    = diffMinutes % 60;
        if (durasi === 0 && sisa > 0) durasi = 1;

        if (durasi > 0) {
            const total = durasi * hargaPerJam;
            document.getElementById('durasi_display').textContent = durasi + ' Jam';
            document.getElementById('total_harga_display').textContent =
                'Rp ' + new Intl.NumberFormat('id-ID').format(total);
        } else {
            document.getElementById('durasi_display').textContent = '– Jam';
            document.getElementById('total_harga_display').textContent = '–';
        }
    }

    document.addEventListener('DOMContentLoaded', calculateTotal);
</script>

@endsection
