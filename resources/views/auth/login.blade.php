<x-guest-layout>
    <div class="w-full max-w-md">

        {{-- Card Container --}}
        <div class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl shadow-black/50">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-red-500/10 border border-red-500/20 text-3xl mb-4">
                    🔑
                </div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">Selamat Datang Kembali</h1>
                <p class="text-slate-400 text-sm mt-1">Masuk untuk mengakses dasbor, bookmark, dan progres belajar Anda.</p>
            </div>

            {{-- Session Status --}}
            @if(session('status'))
                <div class="mb-6 p-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-300 text-xs font-semibold">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email Address --}}
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="user@example.com"
                               class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">
                    </div>
                    @error('email')
                        <p class="text-red-400 text-xs font-semibold mt-1.5 flex items-center gap-1">
                            <span>⚠</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-bold text-slate-300 uppercase tracking-wider">
                            Kata Sandi
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-semibold text-red-400 hover:text-red-300 transition">
                                Lupa kata sandi?
                            </a>
                        @endif
                    </div>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="••••••••"
                           class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition">
                    @error('password')
                        <p class="text-red-400 text-xs font-semibold mt-1.5 flex items-center gap-1">
                            <span>⚠</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center">
                    <label class="flex items-center gap-3 cursor-pointer select-none">
                        <input type="checkbox"
                               name="remember"
                               class="w-4 h-4 rounded-lg bg-slate-950 border-slate-800 text-red-600 focus:ring-red-500 focus:ring-offset-slate-900">
                        <span class="text-xs font-semibold text-slate-400">Ingat saya</span>
                    </label>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                        class="w-full py-3.5 px-6 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 active:bg-red-700 text-white font-black text-sm tracking-wide shadow-lg shadow-red-950/50 transition duration-200 flex items-center justify-center gap-2">
                    Masuk ke Akun →
                </button>
            </form>

            {{-- Demo Hint Box --}}
            <div class="mt-6 p-4 rounded-2xl bg-slate-950/60 border border-slate-800/80 text-xs text-slate-400">
                <p class="font-bold text-slate-300 mb-1">🔑 Akun Demo Admin:</p>
                <p class="font-mono text-red-400">admin@palestinehub.com</p>
                <p class="font-mono text-slate-400">password: <span class="text-white font-bold">admin123</span></p>
            </div>

            {{-- Register Link --}}
            <div class="mt-6 text-center pt-6 border-t border-slate-800/60">
                <p class="text-xs text-slate-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-bold text-red-400 hover:text-red-300 transition underline ml-1">
                        Daftar Sekarang
                    </a>
                </p>
            </div>

        </div>

    </div>
</x-guest-layout>