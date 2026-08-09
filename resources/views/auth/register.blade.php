<x-guest-layout>
    <div class="w-full max-w-md">

        {{-- Card Container --}}
        <div class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl shadow-black/50">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-3xl mb-4">
                    ✨
                </div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">Create Account</h1>
                <p class="text-slate-400 text-sm mt-1">Join Palestine Knowledge Hub to save bookmarks and track learning progress.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Full Name --}}
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Full Name
                    </label>
                    <input id="name"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           autocomplete="name"
                           placeholder="Tariq Al-Mansoor"
                           class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                    @error('name')
                        <p class="text-red-400 text-xs font-semibold mt-1.5 flex items-center gap-1">
                            <span>⚠</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email Address --}}
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Email Address
                    </label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="username"
                           placeholder="user@example.com"
                           class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                    @error('email')
                        <p class="text-red-400 text-xs font-semibold mt-1.5 flex items-center gap-1">
                            <span>⚠</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Password
                    </label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="new-password"
                           placeholder="Minimum 8 characters"
                           class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                    @error('password')
                        <p class="text-red-400 text-xs font-semibold mt-1.5 flex items-center gap-1">
                            <span>⚠</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Confirm Password
                    </label>
                    <input id="password_confirmation"
                           type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password"
                           placeholder="Re-enter password"
                           class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                    @error('password_confirmation')
                        <p class="text-red-400 text-xs font-semibold mt-1.5 flex items-center gap-1">
                            <span>⚠</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                        class="w-full py-3.5 px-6 rounded-2xl bg-emerald-600 hover:bg-emerald-500 active:bg-emerald-700 text-white font-bold text-sm tracking-wide shadow-lg shadow-emerald-900/40 transition duration-200 flex items-center justify-center gap-2">
                    Create Free Account →
                </button>
            </form>

            {{-- Login Link --}}
            <div class="mt-6 text-center pt-6 border-t border-slate-800/60">
                <p class="text-xs text-slate-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-bold text-emerald-400 hover:text-emerald-300 transition underline ml-1">
                        Sign In
                    </a>
                </p>
            </div>

        </div>

    </div>
</x-guest-layout>
