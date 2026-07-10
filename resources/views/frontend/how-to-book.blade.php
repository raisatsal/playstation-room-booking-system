@extends('layouts.frontend')

@section('content')

{{-- Page Header --}}
<div class="relative overflow-hidden py-16 px-5 md:px-10 lg:px-16 xl:px-20"
     style="background: linear-gradient(135deg, rgba(0,87,184,0.12) 0%, rgba(3,6,15,0.5) 100%); border-bottom: 1px solid rgba(26,42,74,0.4);">
    <div class="relative z-10">
        <div class="section-label mb-3">Panduan</div>
        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
            Cara <span class="text-gradient-blue">Pemesanan Room</span>
        </h1>
        <p class="text-sm mt-2" style="color: var(--text-secondary);">Panduan praktis melakukan reservasi hingga Anda siap bermain di lounge kami.</p>
    </div>
</div>

<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-14">
    <div class="max-w-3xl mx-auto">

        {{-- Steps Timeline --}}
        <div class="relative">
            {{-- Vertical connecting line --}}
            <div class="absolute left-7 top-0 bottom-0 w-px hidden md:block"
                 style="background: linear-gradient(180deg, rgba(0,180,240,0.5), rgba(108,43,217,0.3), transparent);"></div>

            <div class="space-y-6">
                @foreach([
                    [
                        '01',
                        'Pilih Room Game Impian Anda',
                        'Masuk ke halaman <a href="' . route('frontend.room') . '" style="color:#00B4F0;font-weight:600;" onmouseover="this.style.textDecoration=\'underline\'" onmouseout="this.style.textDecoration=\'none\'">Daftar Room</a>, bandingkan berbagai kategori room (VIP dengan TV OLED besar & AC, Deluxe dengan TV LED sedang, atau Regular). Pastikan status room menunjukkan "Tersedia".',
                        '#00B4F0',
                        'rgba(0,180,240,0.1)',
                        'rgba(0,180,240,0.25)',
                        '🎮',
                    ],
                    [
                        '02',
                        'Login atau Daftar Akun',
                        'Klik tombol "Pesan" pada room pilihan Anda. Jika belum memiliki akun, Anda akan diarahkan ke halaman pendaftaran yang cepat dan mudah. Login atau daftar hanya memerlukan waktu kurang dari 1 menit.',
                        '#A78BFA',
                        'rgba(167,139,250,0.1)',
                        'rgba(167,139,250,0.25)',
                        '👤',
                    ],
                    [
                        '03',
                        'Tentukan Jam dan Durasi Bermain',
                        'Isi form reservasi dengan jam mulai dan jam selesai bermain. Sistem kami secara otomatis dan real-time akan menghitung estimasi total biaya sewa berdasarkan durasi jam bermain yang Anda pilih.',
                        '#4ADE80',
                        'rgba(74,222,128,0.1)',
                        'rgba(74,222,128,0.25)',
                        '⏰',
                    ],
                    [
                        '04',
                        'Pilih Metode Pembayaran',
                        'Pilih metode transaksi yang paling mudah bagi Anda: <strong style="color:white">QRIS Instan</strong>, <strong style="color:white">Transfer Bank</strong>, atau <strong style="color:white">Cash</strong> langsung di meja kasir lounge ketika Anda tiba.',
                        '#F5C518',
                        'rgba(245,197,24,0.1)',
                        'rgba(245,197,24,0.25)',
                        '💳',
                    ],
                    [
                        '05',
                        'Kunjungi Lounge & Mulai Bermain!',
                        'Datangi lounge kami sesuai jadwal yang telah Anda pesan. Tunjukkan kode booking dari halaman Riwayat Pemesanan kepada operator kami. Kami akan langsung menyiapkan room dan console untuk Anda!',
                        '#F87171',
                        'rgba(248,113,113,0.1)',
                        'rgba(248,113,113,0.25)',
                        '🚀',
                    ],
                ] as [$num, $title, $desc, $color, $bg, $border, $emoji])
                    <div class="flex gap-5 md:gap-7 reveal" style="animation-delay: {{ ($loop->index * 0.1) }}s">
                        {{-- Step Number Circle --}}
                        <div class="flex-shrink-0 relative z-10">
                            <div class="w-14 h-14 rounded-2xl flex flex-col items-center justify-center font-black text-xs"
                                 style="background: {{ $bg }}; border: 2px solid {{ $border }}; color: {{ $color }};">
                                <span class="text-lg leading-none">{{ $emoji }}</span>
                                <span class="text-[9px] font-black uppercase tracking-wider mt-0.5">{{ $num }}</span>
                            </div>
                        </div>

                        {{-- Step Content --}}
                        <div class="flex-grow pb-6">
                            <div class="premium-card p-5"
                                 style="border-color: {{ $border }}; background: {{ $bg }};">
                                <h3 class="text-sm font-black text-white mb-2">{{ $title }}</h3>
                                <p class="text-xs leading-relaxed" style="color: var(--text-secondary);">{!! $desc !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- CTA Box --}}
        <div class="mt-10 reveal">
            <div class="rounded-2xl p-8 text-center relative overflow-hidden"
                 style="background: linear-gradient(135deg, rgba(0,87,184,0.2), rgba(108,43,217,0.15)); border: 1px solid rgba(0,180,240,0.2);">
                <div class="relative z-10">
                    <div class="text-3xl mb-3">🎮</div>
                    <h3 class="text-lg font-black text-white mb-2">Sudah Paham Caranya?</h3>
                    <p class="text-xs mb-5" style="color: var(--text-secondary);">
                        Temukan room game PlayStation impian Anda dengan setup monitor 4K & sound system menggelegar!
                    </p>
                    <a href="{{ route('frontend.room') }}" class="btn-primary" style="display:inline-flex;">
                        <span>Pesan Room Sekarang</span>
                        <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="mt-14 reveal">
            <div class="text-center mb-8">
                <div class="section-label mb-3">FAQ</div>
                <h2 class="text-xl font-black text-white">Pertanyaan Umum</h2>
            </div>

            <div class="space-y-3" id="faq-container">
                @foreach([
                    ['Apakah harus reservasi terlebih dahulu?', 'Reservasi sangat disarankan untuk memastikan ketersediaan room Anda. Tanpa reservasi, room mungkin sudah terisi oleh pelanggan lain ketika Anda datang.'],
                    ['Berapa minimal durasi sewa?', 'Minimal sewa adalah 1 jam. Anda dapat memesan hingga maksimal 8 jam dalam satu sesi pemesanan.'],
                    ['Apakah bisa membawa game sendiri?', 'Ya, Anda dapat membawa game fisik (kaset) milik sendiri. Kami juga menyediakan koleksi game lengkap untuk disewa.'],
                    ['Bagaimana jika ingin memperpanjang waktu sewa?', 'Hubungi operator lounge kami untuk memperpanjang waktu sewa, dengan syarat room tidak sudah dipesan orang lain.'],
                ] as [$q, $a])
                    <div class="premium-card overflow-hidden" style="cursor:pointer"
                         onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between p-4">
                            <span class="text-sm font-semibold text-white">{{ $q }}</span>
                            <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-300 faq-icon" style="color: var(--accent-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                        <div class="faq-answer" style="display:none; padding: 0 1rem 1rem; color: var(--text-secondary); font-size: 0.75rem; line-height: 1.7;">
                            {{ $a }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFaq(el) {
        const answer = el.querySelector('.faq-answer');
        const icon = el.querySelector('.faq-icon');
        const isOpen = answer.style.display !== 'none';
        answer.style.display = isOpen ? 'none' : 'block';
        icon.style.transform = isOpen ? '' : 'rotate(180deg)';
    }
</script>

@endsection
