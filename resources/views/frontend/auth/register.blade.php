@extends('layouts.frontend')

@section('content')
<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-12 flex items-center justify-center">
    <div class="w-full max-w-2xl">

        {{-- Card --}}
        <div class="premium-card p-8 md:p-10 relative overflow-hidden">
            {{-- Ambient glow --}}
            <div class="absolute -top-24 -right-24 w-52 h-52 rounded-full pointer-events-none"
                 style="background: radial-gradient(circle, rgba(0,87,184,0.18) 0%, transparent 70%);"></div>
            <div class="absolute -bottom-24 -left-24 w-52 h-52 rounded-full pointer-events-none"
                 style="background: radial-gradient(circle, rgba(108,43,217,0.1) 0%, transparent 70%);"></div>

            {{-- Header --}}
            <div class="text-center mb-8 relative z-10">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-4"
                     style="background: linear-gradient(135deg, #0057B8, #00B4F0); box-shadow: 0 0 24px rgba(0,180,240,0.4);">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h1 class="text-xl font-black text-white tracking-tight">Buat Akun PSRoom</h1>
                <p class="text-xs mt-1.5" style="color: var(--text-secondary);">Daftar gratis dan mulai reservasi room gaming impian Anda</p>

                {{-- PS Symbols --}}
                <div class="flex items-center justify-center gap-4 mt-4">
                    <span class="text-sm font-black opacity-25" style="color:#00B4F0">▲</span>
                    <span class="text-sm font-black opacity-25" style="color:#F87171">●</span>
                    <span class="text-sm font-black opacity-25" style="color:#A78BFA">✖</span>
                    <span class="text-sm font-black opacity-25" style="color:#4ADE80">■</span>
                </div>
            </div>

            {{-- Form --}}
            <form action="{{ route('register') }}" method="POST" class="space-y-5 relative z-10">
                @csrf

                {{-- Step 1 Label --}}
                <div class="flex items-center gap-3 mb-2">
                    <div class="h-px flex-grow" style="background: rgba(26,42,74,0.7);"></div>
                    <span class="text-[9px] font-black uppercase tracking-widest" style="color: var(--text-muted);">Informasi Pribadi</span>
                    <div class="h-px flex-grow" style="background: rgba(26,42,74,0.7);"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Nama Lengkap --}}
                    <div>
                        <label for="name" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   placeholder="Nama lengkap Anda"
                                   class="form-input" style="padding-left: 2.5rem;">
                        </div>
                        @error('name')
                            <span class="text-[10px] font-semibold mt-1 block" style="color:#F87171">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   placeholder="nama@email.com"
                                   class="form-input" style="padding-left: 2.5rem;">
                        </div>
                        @error('email')
                            <span class="text-[10px] font-semibold mt-1 block" style="color:#F87171">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Nomor Telepon --}}
                    <div>
                        <label for="nomor_telepon" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Nomor Telepon</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}" required
                                   placeholder="08xxxxxxxxxx"
                                   class="form-input" style="padding-left: 2.5rem;">
                        </div>
                        @error('nomor_telepon')
                            <span class="text-[10px] font-semibold mt-1 block" style="color:#F87171">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- NIK --}}
                    <div>
                        <label for="nik" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">NIK (KTP)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                </svg>
                            </div>
                            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required
                                   placeholder="16 digit NIK KTP"
                                   maxlength="16"
                                   class="form-input" style="padding-left: 2.5rem;">
                        </div>
                        @error('nik')
                            <span class="text-[10px] font-semibold mt-1 block" style="color:#F87171">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label for="tanggal_lahir" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Tanggal Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                   class="form-input" style="padding-left: 2.5rem; color-scheme: dark;">
                        </div>
                        @error('tanggal_lahir')
                            <span class="text-[10px] font-semibold mt-1 block" style="color:#F87171">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="alamat" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Alamat Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
                                   placeholder="Alamat rumah Anda"
                                   class="form-input" style="padding-left: 2.5rem;">
                        </div>
                        @error('alamat')
                            <span class="text-[10px] font-semibold mt-1 block" style="color:#F87171">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Step 2 Label --}}
                <div class="flex items-center gap-3 pt-2">
                    <div class="h-px flex-grow" style="background: rgba(26,42,74,0.7);"></div>
                    <span class="text-[9px] font-black uppercase tracking-widest" style="color: var(--text-muted);">Keamanan Akun</span>
                    <div class="h-px flex-grow" style="background: rgba(26,42,74,0.7);"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" required
                                   placeholder="Min. 8 karakter"
                                   class="form-input" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                            <button type="button" onclick="togglePassword('password', this)" tabindex="-1"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3.5"
                                    style="background:none;border:none;cursor:pointer;color:var(--text-muted)">
                                <svg class="w-4 h-4 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-[10px] font-semibold mt-1 block" style="color:#F87171">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                   placeholder="Ketik ulang password"
                                   class="form-input" style="padding-left: 2.5rem;">
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="pt-2">
                    <button type="submit" class="btn-primary w-full justify-center" style="height: 52px; font-size: 0.8rem;">
                        <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span>Buat Akun Sekarang</span>
                    </button>
                </div>
            </form>

            {{-- Login redirect --}}
            <div class="mt-6 pt-5 text-center text-xs relative z-10" style="border-top: 1px solid rgba(26,42,74,0.5);">
                <span style="color: var(--text-muted)">Sudah punya akun?</span>
                <a href="{{ route('login') }}"
                   class="ml-1 font-bold transition"
                   style="color: var(--accent-blue);"
                   onmouseover="this.style.color='#60D4FF'"
                   onmouseout="this.style.color='var(--accent-blue)'">
                    Masuk di Sini
                </a>
            </div>
        </div>

        {{-- Back to home --}}
        <div class="text-center mt-5">
            <a href="{{ route('home') }}" class="text-xs transition" style="color: var(--text-muted);"
               onmouseover="this.style.color='white'"
               onmouseout="this.style.color='var(--text-muted)'">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
    function togglePassword(id, btn) {
        const input = document.getElementById(id);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        btn.querySelector('.eye-icon').style.opacity = isPassword ? '0.4' : '1';
    }
</script>

@endsection
