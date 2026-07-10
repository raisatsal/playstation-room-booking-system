@extends('layouts.frontend')

@section('content')
<div class="w-full px-5 md:px-10 lg:px-16 xl:px-20 py-14 flex items-center justify-center min-h-[calc(100vh-80px)]">
    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="premium-card p-8 relative overflow-hidden">
            {{-- Ambient glow --}}
            <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full pointer-events-none"
                 style="background: radial-gradient(circle, rgba(0,87,184,0.2) 0%, transparent 70%);"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 rounded-full pointer-events-none"
                 style="background: radial-gradient(circle, rgba(108,43,217,0.12) 0%, transparent 70%);"></div>

            {{-- Logo + Header --}}
            <div class="text-center mb-8 relative z-10">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-4"
                     style="background: linear-gradient(135deg, #0057B8, #00B4F0); box-shadow: 0 0 24px rgba(0,180,240,0.4);">
                    <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm3-3c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                    </svg>
                </div>
                <h1 class="text-xl font-black text-white tracking-tight">Selamat Datang Kembali</h1>
                <p class="text-xs mt-1.5" style="color: var(--text-secondary);">Masuk untuk mengakses portal reservasi PlayStation Anda</p>
            </div>

            {{-- PS Symbols Deco --}}
            <div class="flex items-center justify-center gap-4 mb-6 relative z-10">
                <span class="text-sm font-black opacity-30" style="color:#00B4F0">▲</span>
                <span class="text-sm font-black opacity-30" style="color:#F87171">●</span>
                <span class="text-sm font-black opacity-30" style="color:#A78BFA">✖</span>
                <span class="text-sm font-black opacity-30" style="color:#4ADE80">■</span>
            </div>

            {{-- Form --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-4 relative z-10">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="nama@email.com"
                               class="form-input"
                               style="padding-left: 2.5rem;">
                    </div>
                    @error('email')
                        <span class="text-[10px] font-semibold mt-1.5 block" style="color:#F87171">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4" style="color: var(--text-muted)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password"
                               name="password"
                               id="password"
                               required
                               placeholder="••••••••"
                               class="form-input"
                               style="padding-left: 2.5rem; padding-right: 2.5rem;">
                        <button type="button"
                                onclick="togglePassword('password', this)"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 transition"
                                style="color: var(--text-muted); background: none; border: none; cursor: pointer;"
                                tabindex="-1">
                            <svg class="w-4 h-4 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-[10px] font-semibold mt-1.5 block" style="color:#F87171">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="pt-2">
                    <button type="submit" class="btn-primary w-full justify-center" style="height: 50px; font-size: 0.8rem;">
                        <svg class="w-4 h-4" style="position:relative;z-index:1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span>Masuk ke PSRoom</span>
                    </button>
                </div>
            </form>

            {{-- Register redirect --}}
            <div class="mt-6 pt-5 text-center text-xs relative z-10" style="border-top: 1px solid rgba(26,42,74,0.5);">
                <span style="color: var(--text-muted)">Belum punya akun?</span>
                <a href="{{ route('register') }}"
                   class="ml-1 font-bold transition"
                   style="color: var(--accent-blue);"
                   onmouseover="this.style.color='#60D4FF'"
                   onmouseout="this.style.color='var(--accent-blue)'">
                    Daftar Gratis
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
        const icon = btn.querySelector('.eye-icon');
        icon.style.opacity = isPassword ? '0.4' : '1';
    }
</script>

@endsection
