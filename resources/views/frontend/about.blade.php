@extends('layouts.frontend')

@section('content')

{{-- Page Header --}}
<div class="relative overflow-hidden py-16 px-5 md:px-10 lg:px-16 xl:px-20"
     style="background: linear-gradient(135deg, rgba(108,43,217,0.12) 0%, rgba(3,6,15,0.5) 50%, rgba(0,87,184,0.08) 100%); border-bottom: 1px solid rgba(26,42,74,0.4);">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-80 h-80 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(108,43,217,0.15) 0%, transparent 70%); transform: translate(30%,-30%);"></div>
    </div>
    <div class="relative z-10">
        <div class="section-label mb-3">PS ROOM</div>
        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
            Tentang <span class="text-gradient-purple">Kitaa</span>
        </h1>
        <p class="text-sm mt-2" style="color: var(--text-secondary);">Definisi kenyamanan bermain console PlayStation terbaik di kelasnya.</p>
    </div>
</div>

<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-14">

    {{-- Story Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-20 reveal">
        {{-- Text --}}
        <div class="lg:col-span-7 space-y-6">
            <div>
                <h2 class="text-xl font-black text-white mb-4 leading-tight">
                    Menyatukan Gamer dalam<br><span class="text-gradient-blue">Kemewahan Sejati</span>
                </h2>
                <div class="space-y-4">
                    <p class="text-sm leading-relaxed" style="color: var(--text-secondary);">
                        PSRoom Enterprise didirikan dengan misi untuk menghapus stigma bahwa rental PlayStation identik dengan ruangan pengap dan sempit. Kami percaya para gamer berhak mendapatkan fasilitas eksklusif yang bersih, luas, dan didukung perangkat hardware premium termodern.
                    </p>
                    <p class="text-sm leading-relaxed" style="color: var(--text-secondary);">
                        Mulai dari console PlayStation 5 generasi terbaru, TV OLED berukuran besar, kualitas audio kelas studio, hingga penyejuk udara (AC) mumpuni dan sofa kulit premium yang empuk, mantap pokoknya.
                    </p>
                </div>
            </div>

            {{-- Values --}}
            <div class="space-y-3">
                @foreach([
                    ['🎮', 'Konsol Terupdate', 'PS5 & PS4 Pro original dengan game terlengkap dan terbaru secara berkala.'],
                    ['🛋️', 'Kenyamanan Penuh', 'AC dingin, sofa kulit premium, wewangian aromaterapi, dan sound bar terbaik.'],
                    ['✨', 'Kebersihan Terjaga', 'Seluruh peralatan dibersihkan dengan antiseptik sebelum & sesudah sewa.'],
                ] as [$icon, $title, $desc])
                    <div class="flex items-start gap-4 p-4 rounded-xl transition-all duration-300"
                         style="background: rgba(10,18,37,0.5); border: 1px solid rgba(26,42,74,0.7);"
                         onmouseover="this.style.borderColor='rgba(0,180,240,0.25)'"
                         onmouseout="this.style.borderColor='rgba(26,42,74,0.7)'">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 text-lg"
                             style="background: rgba(0,87,184,0.1); border: 1px solid rgba(0,180,240,0.15);">
                            {{ $icon }}
                        </div>
                        <div>
                            <div class="text-sm font-bold text-white mb-1">{{ $title }}</div>
                            <p class="text-xs leading-relaxed" style="color: var(--text-secondary);">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="lg:col-span-5 grid grid-cols-2 gap-4 reveal">
            @foreach([
                ['10+', 'Room Premium', '#00B4F0', 'rgba(0,180,240,0.1)', 'rgba(0,180,240,0.2)'],
                ['99%', 'Tingkat Kepuasan', '#A78BFA', 'rgba(167,139,250,0.1)', 'rgba(167,139,250,0.2)'],
                ['24/7', 'Layanan Aktif', '#4ADE80', 'rgba(74,222,128,0.1)', 'rgba(74,222,128,0.2)'],
                ['5K+', 'Pelanggan Aktif', '#F5C518', 'rgba(245,197,24,0.1)', 'rgba(245,197,24,0.2)'],
            ] as [$val, $label, $color, $bg, $border])
                <div class="rounded-2xl p-6 text-center transition-all duration-300 group cursor-default"
                     style="background: {{ $bg }}; border: 1px solid {{ $border }}; backdrop-filter: blur(8px);"
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.3)'"
                     onmouseout="this.style.transform=''; this.style.boxShadow=''">
                    <div class="text-3xl font-black mb-1" style="color: {{ $color }}; text-shadow: 0 0 20px {{ $color }}60;">
                        {{ $val }}
                    </div>
                    <div class="text-[9px] font-bold uppercase tracking-widest" style="color: rgba(139,163,204,0.7);">{{ $label }}</div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Team / Mission Section --}}
    <div class="mb-16 reveal">
        <div class="text-center mb-10">
            <div class="section-label mb-3">Misi Kami</div>
            <h2 class="text-xl font-black text-white">
                Mengapa PSRoom Berbeda
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['🏆', 'Premium Quality', 'Setiap detail di lounge kami dirancang untuk memberikan pengalaman gaming yang tidak tertandingi oleh kompetitor manapun.', 'rgba(245,197,24,0.08)', 'rgba(245,197,24,0.2)'],
                ['🔒', 'Keamanan & Privasi', 'Setiap room bersifat privat sehingga Anda dapat bermain dengan tenang tanpa terganggu oleh pengunjung lain.', 'rgba(0,87,184,0.08)', 'rgba(0,180,240,0.2)'],
                ['💡', 'Inovasi Terus-menerus', 'Kami terus berinovasi menghadirkan teknologi dan fasilitas gaming terbaru agar Anda tidak pernah ketinggalan zaman.', 'rgba(108,43,217,0.08)', 'rgba(167,139,250,0.2)'],
            ] as [$icon, $title, $desc, $bg, $border])
                <div class="rounded-2xl p-6 reveal"
                     style="background: {{ $bg }}; border: 1px solid {{ $border }};">
                    <div class="text-2xl mb-4">{{ $icon }}</div>
                    <h3 class="text-sm font-black text-white mb-2">{{ $title }}</h3>
                    <p class="text-xs leading-relaxed" style="color: var(--text-secondary);">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- CTA --}}
    <div class="reveal">
        <div class="rounded-2xl p-10 text-center relative overflow-hidden"
             style="background: linear-gradient(135deg, rgba(0,87,184,0.2) 0%, rgba(108,43,217,0.15) 100%); border: 1px solid rgba(0,180,240,0.2);">
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-64 h-64 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(0,87,184,0.2), transparent 70%); transform: translate(-30%,-30%);"></div>
                <div class="absolute bottom-0 right-0 w-64 h-64 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(108,43,217,0.2), transparent 70%); transform: translate(30%,30%);"></div>
            </div>
            <div class="relative z-10">
                <h3 class="text-xl font-black text-white mb-2">Siap Bergabung?</h3>
                <p class="text-sm mb-6" style="color: var(--text-secondary);">
                    Daftarkan akun Anda dan mulai pesan room PlayStation premium favorit Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('frontend.room') }}" class="btn-primary">
                        <span>Lihat Daftar Room</span>
                        <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('frontend.contact') }}" class="btn-ghost">
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
