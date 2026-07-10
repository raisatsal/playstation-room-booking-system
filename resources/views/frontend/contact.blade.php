@extends('layouts.frontend')

@section('content')

{{-- Page Header --}}
<div class="relative overflow-hidden py-16 px-5 md:px-10 lg:px-16 xl:px-20"
     style="background: linear-gradient(135deg, rgba(74,222,128,0.08) 0%, rgba(3,6,15,0.5) 100%); border-bottom: 1px solid rgba(26,42,74,0.4);">
    <div class="relative z-10">
        <div class="section-label mb-3">Hubungi Kami</div>
        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
            Kontak & <span class="text-gradient-blue">Lokasi Kami</span>
        </h1>
        <p class="text-sm mt-2" style="color: var(--text-secondary);">Kita siap menjawab pertanyaan Kamu 24 jam sehari yaa!!!</p>
    </div>
</div>

<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-14">
    <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- Left: Contact Info --}}
            <div class="lg:col-span-5 space-y-4 reveal">

                {{-- Operating Hours Card --}}
                <div class="rounded-2xl p-6 relative overflow-hidden"
                     style="background: linear-gradient(135deg, rgba(74,222,128,0.08) 0%, rgba(10,18,37,0.6) 100%); border: 1px solid rgba(74,222,128,0.2);">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-xl"
                             style="background: rgba(74,222,128,0.12); border: 1px solid rgba(74,222,128,0.25);">
                            🕒
                        </div>
                        <div>
                            <div class="text-xs font-bold uppercase tracking-widest text-white">Jam Operasional</div>
                            <div class="flex items-center gap-1.5 mt-0.5">
                                <span class="w-2 h-2 rounded-full animate-pulse" style="background: #4ADE80;"></span>
                                <span class="text-[10px] font-semibold text-green-400">Buka Sekarang</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 text-xs">
                        @foreach([
                            ['Senin – Jumat', '08:00 – 00:00'],
                            ['Sabtu – Minggu', '07:00 – 02:00'],
                            ['Libur Nasional', '07:00 – 02:00'],
                            ['VIP Room 24/7', 'Setiap Hari'],
                        ] as [$day, $hours])
                            <div class="rounded-xl p-3" style="background: rgba(6,12,26,0.5); border: 1px solid rgba(26,42,74,0.5);">
                                <div class="font-bold text-white text-[10px] mb-0.5">{{ $hours }}</div>
                                <div style="color: var(--text-muted); font-size:9px;">{{ $day }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Address --}}
                <div class="premium-card p-5 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0"
                         style="background: rgba(0,87,184,0.1); border: 1px solid rgba(0,180,240,0.2);">
                        📍
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-white uppercase tracking-wider mb-1">Lokasi Lounge</h4>
                        <p class="text-xs leading-relaxed" style="color: var(--text-secondary);">
                            Jl. Lenteng Agung, Ruko Galaxy Sentra, Kota Kita, Swiss 30062006
                        </p>
                        <a href="https://maps.google.com" target="_blank"
                           class="inline-flex items-center gap-1 mt-2 text-[10px] font-bold uppercase tracking-wider transition"
                           style="color: var(--accent-blue);"
                           onmouseover="this.style.color='#60D4FF'"
                           onmouseout="this.style.color='var(--accent-blue)'">
                            Lihat di Maps →
                        </a>
                    </div>
                </div>

                {{-- WhatsApp --}}
                <a href="https://wa.me/628181311274298" target="_blank"
                   class="premium-card p-5 flex items-start gap-4 block group">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0 transition-transform duration-300 group-hover:scale-110"
                         style="background: rgba(74,222,128,0.1); border: 1px solid rgba(74,222,128,0.2);">
                        💬
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-white uppercase tracking-wider mb-1">WhatsApp Hotline</h4>
                        <p class="text-xs font-bold" style="color:#4ADE80">+62 813-1127-4298</p>
                        <p class="text-[10px] mt-0.5" style="color: var(--text-muted);">Chat langsung aja.</p>
                    </div>
                </a>

                {{-- Email --}}
                <div class="premium-card p-5 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0"
                         style="background: rgba(0,87,184,0.1); border: 1px solid rgba(0,180,240,0.2);">
                        ✉️
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-white uppercase tracking-wider mb-1">Email Support</h4>
                        <p class="text-xs font-bold" style="color: var(--accent-blue)">fathir@psroom-ent.com</p>
                        <p class="text-[10px] mt-0.5" style="color: var(--text-muted);">Respon dalam 1x24 jam kerja</p>
                    </div>
                </div>

                {{-- Instagram --}}
                <div class="premium-card p-5 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0"
                         style="background: rgba(224,64,251,0.08); border: 1px solid rgba(224,64,251,0.2);">
                        📸
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-white uppercase tracking-wider mb-1">Instagram</h4>
                        <p class="text-xs font-bold" style="color: #E040FB">@psroom.enterprise</p>
                        <p class="text-[10px] mt-0.5" style="color: var(--text-muted);">Difollow yakk!!</p>
                    </div>
                </div>
            </div>

            {{-- Right: Contact Form --}}
            <div class="lg:col-span-7 reveal" style="animation-delay: 0.15s">
                <div class="premium-card p-7">
                    <div class="mb-6">
                        <div class="section-label mb-2">Chat Langsung</div>
                        <h2 class="text-xl font-black text-white">Kirim Pesan ke Kami</h2>
                        <p class="text-xs mt-1" style="color: var(--text-secondary);">Kita langsung respon dalam waktu persekian detik.</p>
                    </div>

                    {{-- Alert success --}}
                    <div id="contact_alert"
                         class="hidden mb-5 p-4 rounded-xl text-xs font-semibold"
                         style="background: rgba(74,222,128,0.08); border: 1px solid rgba(74,222,128,0.2); color: #4ADE80;">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Yeayyy pesan kamu berhasil terkirim! Kita akan segera menghubungi kamu.
                        </div>
                    </div>

                    <form onsubmit="submitContactForm(event)" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                                <input type="text" required placeholder="Nama Anda"
                                       class="form-input" id="contact_name">
                            </div>
                            <div>
                                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Email Address</label>
                                <input type="email" required placeholder="nama@email.com"
                                       class="form-input" id="contact_email">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">No. WhatsApp (Opsional)</label>
                            <input type="tel" placeholder="+62 812-xxxx-xxxx"
                                   class="form-input" id="contact_phone">
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Topik Pesan</label>
                            <select class="form-input" id="contact_topic">
                                <option value="">Pilih Topik Pesan...</option>
                                <option value="reservasi">Reservasi Grup / Spesial</option>
                                <option value="promo">Promo & Harga Spesial</option>
                                <option value="teknis">Pertanyaan Teknis</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Pesan Anda</label>
                            <textarea rows="4" required placeholder="Tulis pertanyaan, masukan, atau kebutuhan khusus Anda di sini..."
                                      class="form-input" id="contact_msg" style="resize: vertical;"></textarea>
                        </div>
                        <button type="submit"
                                id="contact_btn"
                                class="btn-primary w-full justify-center" style="height: 48px; font-size: 0.75rem;">
                            <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span>Kirim Pesan</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitContactForm(event) {
        event.preventDefault();
        const btn = document.getElementById('contact_btn');
        btn.innerHTML = '<svg style="position:relative;z-index:1;animation:spin 1s linear infinite" class="w-4 h-4" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" style="opacity:0.25"/><path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" style="opacity:0.75"/></svg><span>Mengirim...</span>';
        btn.disabled = true;
        setTimeout(() => {
            const alertBox = document.getElementById('contact_alert');
            alertBox.classList.remove('hidden');
            event.target.reset();
            btn.innerHTML = '<span>Kirim Pesan</span>';
            btn.disabled = false;
            setTimeout(() => alertBox.classList.add('hidden'), 6000);
        }, 1200);
    }
</script>

<style>
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>

@endsection
