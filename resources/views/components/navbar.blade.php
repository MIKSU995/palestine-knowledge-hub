<nav class="sticky top-0 z-50 bg-white/95 dark:bg-slate-900/95 backdrop-blur-xl border-b border-slate-200/80 dark:border-slate-800/80 transition-colors duration-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-16 sm:h-20 gap-2">

            <!-- Brand Logo (Compact & Clean Red-White Aesthetic) -->
            <a href="/" class="flex items-center gap-2.5 shrink-0 group">
                <div class="relative w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-red-600 flex items-center justify-center text-white font-black text-lg sm:text-xl shadow-sm group-hover:scale-105 transition-transform overflow-hidden border border-red-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600 via-rose-700 to-red-800 opacity-95"></div>
                    <span class="relative z-10 font-black text-white">P</span>
                </div>

                <div class="flex items-center gap-1.5">
                    <span class="text-base sm:text-lg font-extrabold tracking-tight text-slate-900 dark:text-white">
                        Palestine <span class="text-red-600 dark:text-red-400">Hub</span>
                    </span>
                    <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-red-100 text-red-800 dark:bg-red-950/80 dark:text-red-300 uppercase tracking-wider">
                        Edukasi
                    </span>
                </div>
            </a>

            <!-- Navigation Links (Desktop - Clean Spaced Grid) -->
            <div class="hidden xl:flex items-center gap-1.5 2xl:gap-3 text-xs xl:text-sm font-semibold">

                <a href="/" class="px-2.5 py-1.5 rounded-xl transition {{ request()->is('/') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    Beranda
                </a>

                <a href="/#gaza-update" class="px-2.5 py-1.5 rounded-xl text-rose-600 dark:text-rose-400 font-bold hover:bg-rose-50 dark:hover:bg-rose-950/40 transition flex items-center gap-1">
                    <span>Gaza Live 📸</span>
                </a>

                <a href="{{ route('news.index') }}" class="px-2.5 py-1.5 rounded-xl transition flex items-center gap-1.5 {{ request()->routeIs('news.*') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    <span>Berita</span>
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                </a>

                <a href="{{ route('timeline') }}" class="px-2.5 py-1.5 rounded-xl transition {{ request()->routeIs('timeline') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    Linimasa
                </a>

                <a href="{{ route('maps') }}" class="px-2.5 py-1.5 rounded-xl transition {{ request()->routeIs('maps') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    Peta
                </a>

                <a href="{{ route('articles') }}" class="px-2.5 py-1.5 rounded-xl transition {{ request()->routeIs('articles*') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    Artikel
                </a>

                <a href="{{ route('gallery') }}" class="px-2.5 py-1.5 rounded-xl transition {{ request()->routeIs('gallery') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    Galeri
                </a>

                <a href="{{ route('resources') }}" class="px-2.5 py-1.5 rounded-xl transition {{ request()->routeIs('resources') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    Materi
                </a>

                <a href="{{ route('quiz') }}" class="px-2.5 py-1.5 rounded-xl transition {{ request()->routeIs('quiz*') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : 'text-slate-700 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-800/60' }}">
                    Kuis
                </a>

            </div>

            <!-- Right Tools & User Actions -->
            <div class="flex items-center gap-2 shrink-0">

                <!-- Humanitarian Aid CTA Button -->
                <a href="/#humanitarian-hub" class="px-3.5 py-2 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:opacity-95 text-white font-extrabold text-xs transition shadow-md flex items-center gap-1.5 shrink-0">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                    <span class="hidden sm:inline">Saluran Donasi</span>
                </a>

                <!-- Global Search Trigger -->
                <button onclick="openSearchModal()" class="p-2 sm:px-3 sm:py-2 rounded-xl text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white bg-slate-100 dark:bg-slate-800 transition flex items-center gap-1.5 text-xs font-medium" title="Cari (Ctrl+K)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="hidden md:inline">Cari</span>
                </button>

                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()" aria-label="Toggle dark mode" class="p-2 rounded-xl text-slate-500 hover:text-amber-500 dark:text-slate-400 dark:hover:text-amber-400 bg-slate-100 dark:bg-slate-800 transition">
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>

                <!-- Saved Bookmarks Button -->
                <a href="{{ route('bookmarks') }}" class="p-2 rounded-xl text-slate-500 hover:text-red-600 dark:text-slate-400 dark:hover:text-red-400 bg-slate-100 dark:bg-slate-800 transition" title="Tersimpan">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                </a>

                <!-- User Dropdown / Auth Link -->
                @guest
                <a href="{{ route('login') }}" class="px-3.5 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs sm:text-sm transition shadow-sm">
                    Masuk
                </a>
                @endguest

                @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-1.5 p-1.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        <div class="w-7 h-7 rounded-lg bg-red-600 text-white font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-52 bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 py-2 z-50" style="display: none;">
                        <a href="{{ route('learning.dashboard') }}" class="block px-4 py-2 text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">
                            Dashboard Pembelajaran
                        </a>
                        <a href="{{ route('bookmarks') }}" class="block px-4 py-2 text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">
                            Artikel Tersimpan
                        </a>

                        @role('Admin')
                        <div class="border-t border-slate-100 dark:border-slate-800 my-1"></div>
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-xs text-amber-600 dark:text-amber-400 font-semibold hover:bg-amber-50 dark:hover:bg-amber-950/30">
                            Panel Admin
                        </a>
                        @endrole

                        <div class="border-t border-slate-100 dark:border-slate-800 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-xs text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="xl:hidden p-2 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden xl:hidden bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 px-4 pt-3 pb-6 space-y-2 text-sm font-semibold transition-all">
        <a href="/" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Beranda</a>
        <a href="/#gaza-update" class="block px-3 py-2 rounded-xl text-rose-600 dark:text-rose-400 font-bold hover:bg-rose-50 dark:hover:bg-rose-950/40">Gaza Live 📸 (@thepalestinecircle)</a>
        <a href="{{ route('news.index') }}" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Berita Terkini</a>
        <a href="{{ route('timeline') }}" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Linimasa Sejarah</a>
        <a href="{{ route('maps') }}" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Peta & Geografi</a>
        <a href="{{ route('articles') }}" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Artikel Edukasi</a>
        <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Galeri Media</a>
        <a href="{{ route('resources') }}" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Materi Pembelajaran</a>
        <a href="{{ route('quiz') }}" class="block px-3 py-2 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">Kuis Interaktif</a>
        <div class="pt-2 border-t border-slate-100 dark:border-slate-800">
            <a href="/#humanitarian-hub" class="block text-center w-full py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 text-white font-extrabold text-xs">❤️ Saluran Donasi Resmi</a>
        </div>
    </div>

</nav>