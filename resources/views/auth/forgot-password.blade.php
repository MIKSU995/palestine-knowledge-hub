<x-guest-layout>
    <div class="w-full max-w-md">

        <div class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl shadow-black/50">

            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-3xl mb-4">
                    🔒
                </div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">Reset Password</h1>
                <p class="text-slate-400 text-sm mt-1">Enter your registered email address to receive a password reset link.</p>
            </div>

            @if(session('status'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-xs font-semibold">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Email Address
                    </label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           placeholder="user@example.com"
                           class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                    @error('email')
                        <p class="text-red-400 text-xs font-semibold mt-1.5 flex items-center gap-1">
                            <span>⚠</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full py-3.5 px-6 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm tracking-wide shadow-lg shadow-emerald-900/40 transition duration-200">
                    Send Password Reset Link →
                </button>
            </form>

            <div class="mt-6 text-center pt-6 border-t border-slate-800/60">
                <a href="{{ route('login') }}" class="text-xs font-bold text-slate-400 hover:text-white transition">
                    ← Back to Sign In
                </a>
            </div>

        </div>

    </div>
</x-guest-layout>
