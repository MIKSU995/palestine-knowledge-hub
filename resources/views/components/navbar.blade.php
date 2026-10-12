<nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-2xl border-b border-slate-200/60 dark:border-slate-800/60 transition-all duration-300" id="main-navbar">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-16 sm:h-[4.25rem] gap-2">

            <!-- Brand Logo (Palaestina Learns Image Logo) -->
            <a href="/" class="flex items-center gap-2.5 shrink-0 group">
                <div class="relative w-10 h-10 sm:w-11 sm:h-11 rounded-xl overflow-hidden flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm group-hover:shadow-md group-hover:scale-[1.03] transition-all duration-300">
                    <img src="{{ asset('images/logo.svg') }}" alt="Palestine Knowledge Hub" class="w-full h-full object-contain" />
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-base sm:text-lg font-extrabold tracking-tight text-slate-900 dark:text-white leading-none">
                        Palestine <span class="text-red-700 dark:text-red-400">Knowledge Hub</span>
                    </span>
                    <span class="text-[9px] font-semibold text-slate-500 dark:text-slate-400 tracking-widest uppercase">Learn · Understand · Take Action</span>
                </div>
            </a>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden xl:flex items-center gap-0.5 2xl:gap-1 text-[13px] font-semibold">

                <!-- Beranda -->
                <a href="/" class="nav-link-item px-3 py-2 rounded-xl transition-all duration-200 {{ request()->is('/') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100/80 dark:hover:bg-slate-800/60' }}">
                    Beranda
                </a>

                <!-- Gaza Live -->
                <a href="/#gaza-update" class="nav-link-item px-3 py-2 rounded-xl text-rose-600 dark:text-rose-400 font-bold hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all duration-200 flex items-center gap-1.5">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-rose-500"></span>
                    </span>
                    Gaza Live
                </a>

                <!-- Berita (single link) -->
                <a href="{{ route('news.index') }}" class="nav-link-item px-3 py-2 rounded-xl transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('news.*') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100/80 dark:hover:bg-slate-800/60' }}">
                    <span>Berita</span>
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                </a>

                <!-- DROPDOWN: Jelajahi -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open"
                        class="nav-link-item px-3 py-2 rounded-xl transition-all duration-200 flex items-center gap-1 text-slate-600 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100/80 dark:hover:bg-slate-800/60">
                        Jelajahi
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute left-0 mt-2 w-60 bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-slate-900/10 dark:shadow-slate-950/50 border border-slate-200/80 dark:border-slate-800 py-2 z-50 divide-y divide-slate-100 dark:divide-slate-800/60" style="display:none;">
                        <div class="p-1">
                            <a href="{{ route('timeline') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400 transition-all duration-150 {{ request()->routeIs('timeline') ? 'text-red-600 dark:text-red-400 font-bold bg-red-50/50 dark:bg-red-950/20' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-amber-500/10 dark:bg-amber-400/10 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Linimasa Sejarah</div>
                                    <div class="text-[10px] text-slate-400">Kronologi peristiwa Palestina</div>
                                </div>
                            </a>
                            <a href="{{ route('maps') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400 transition-all duration-150 {{ request()->routeIs('maps') ? 'text-red-600 dark:text-red-400 font-bold bg-red-50/50 dark:bg-red-950/20' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-blue-500/10 dark:bg-blue-400/10 text-blue-600 dark:text-blue-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Peta & Geografi</div>
                                    <div class="text-[10px] text-slate-400">Peta wilayah interaktif</div>
                                </div>
                            </a>
                            <a href="{{ route('gallery') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400 transition-all duration-150 {{ request()->routeIs('gallery') ? 'text-red-600 dark:text-red-400 font-bold bg-red-50/50 dark:bg-red-950/20' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/10 dark:bg-emerald-400/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Galeri Media</div>
                                    <div class="text-[10px] text-slate-400">Arsip foto & dokumentasi</div>
                                </div>
                            </a>
                            <a href="{{ route('culture') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400 transition-all duration-150 {{ request()->routeIs('culture*') ? 'text-red-600 dark:text-red-400 font-bold bg-red-50/50 dark:bg-red-950/20' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-rose-500/10 dark:bg-rose-400/10 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4 4 4 0 014-4c.83 0 1.6.25 2.25.68A4.004 4.004 0 0117 13a4 4 0 013.9 3.1c.07.29.1.59.1.9a4 4 0 01-4 4H7z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Budaya Palestina</div>
                                    <div class="text-[10px] text-slate-400">Warisan, seni & tradisi</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- DROPDOWN: Edukasi -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open"
                        class="nav-link-item px-3 py-2 rounded-xl transition-all duration-200 flex items-center gap-1 text-slate-600 dark:text-slate-300 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100/80 dark:hover:bg-slate-800/60">
                        Edukasi
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute left-0 mt-2 w-60 bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-slate-900/10 dark:shadow-slate-950/50 border border-slate-200/80 dark:border-slate-800 py-2 z-50 divide-y divide-slate-100 dark:divide-slate-800/60" style="display:none;">
                        <div class="p-1">
                            <a href="{{ route('articles') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400 transition-all duration-150 {{ request()->routeIs('articles*') ? 'text-red-600 dark:text-red-400 font-bold bg-red-50/50 dark:bg-red-950/20' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-red-500/10 dark:bg-red-400/10 text-red-600 dark:text-red-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Artikel Edukasi</div>
                                    <div class="text-[10px] text-slate-400">Bacaan analitis & sejarah</div>
                                </div>
                            </a>
                            <a href="{{ route('resources') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400 transition-all duration-150 {{ request()->routeIs('resources') ? 'text-red-600 dark:text-red-400 font-bold bg-red-50/50 dark:bg-red-950/20' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-indigo-500/10 dark:bg-indigo-400/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Materi Pembelajaran</div>
                                    <div class="text-[10px] text-slate-400">Modul & bahan ajar</div>
                                </div>
                            </a>
                            <a href="{{ route('quiz') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400 transition-all duration-150 {{ request()->routeIs('quiz*') ? 'text-red-600 dark:text-red-400 font-bold bg-red-50/50 dark:bg-red-950/20' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-purple-500/10 dark:bg-purple-400/10 text-purple-600 dark:text-purple-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-4a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Kuis Interaktif</div>
                                    <div class="text-[10px] text-slate-400">Evaluasi pemahaman Anda</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Tools & User Actions -->
            <div class="flex items-center gap-1.5 shrink-0">

                <!-- Humanitarian Aid CTA Button -->
                <a href="/#humanitarian-hub" class="px-3.5 py-2 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-extrabold text-xs transition-all duration-200 shadow-md hover:shadow-lg flex items-center gap-1.5 shrink-0">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                    <span class="hidden sm:inline">Saluran Donasi</span>
                </a>

                <!-- Global Search Trigger -->
                <button onclick="openSearchModal()" class="p-2 sm:px-3 sm:py-2 rounded-xl text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white bg-slate-100/80 dark:bg-slate-800/80 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all duration-200 flex items-center gap-1.5 text-xs font-medium" title="Cari (Ctrl+K)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="hidden md:inline">Cari</span>
                </button>

                <!-- ═══════════════════════════════════════════ -->
                <!-- HAMBURGER DROPDOWN: Petisi + Dark Mode + Bookmark + Masuk -->
                <!-- ═══════════════════════════════════════════ -->
                <!-- ═══════════════════════════════════════════ -->
                <!-- HAMBURGER DROPDOWN: Petisi + Dark Mode + Bookmark + Masuk -->
                <!-- ═══════════════════════════════════════════ -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open" 
                            class="p-2 sm:p-2.5 rounded-xl text-slate-700 dark:text-slate-200 bg-slate-100/90 dark:bg-slate-800/90 hover:bg-slate-200/90 dark:hover:bg-slate-700/90 border border-slate-200/80 dark:border-slate-700/80 transition-all duration-200 flex items-center justify-center shadow-sm hover:shadow group focus:outline-none"
                            :class="open ? 'ring-2 ring-red-500/40 bg-red-50/80 dark:bg-slate-800 text-red-600 dark:text-red-400' : ''"
                            title="Menu Petisi, Mode Tampilan & Masuk">
                        <!-- Exact 3-pill hamburger icon matching media__1791687824056.png -->
                        <svg class="w-5 h-5 transition-transform duration-200 text-slate-800 dark:text-slate-200 group-hover:text-red-600 dark:group-hover:text-red-400" viewBox="0 0 24 24" fill="currentColor">
                            <rect x="3.5" y="4.5" width="17" height="3" rx="1.5" />
                            <rect x="3.5" y="10.5" width="17" height="3" rx="1.5" />
                            <rect x="3.5" y="16.5" width="17" height="3" rx="1.5" />
                        </svg>
                    </button>

                    <!-- Dropdown Panel -->
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute right-0 mt-3 w-64 bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-slate-900/15 dark:shadow-slate-950/70 border border-slate-200/90 dark:border-slate-800 p-2 z-50 divide-y divide-slate-100 dark:divide-slate-800"
                        style="display: none;">
                        
                        <!-- Top pointer notch -->
                        <div class="absolute -top-1.5 right-4 w-3 h-3 bg-white dark:bg-slate-900 border-t border-l border-slate-200/90 dark:border-slate-800 rotate-45 pointer-events-none"></div>

                        <!-- Section 1: Petisi Solidaritas -->
                        <div class="p-1">
                            <a href="{{ route('petition') }}" 
                               @click="open = false"
                               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-150 {{ request()->routeIs('petition*') ? 'bg-red-50 dark:bg-red-950/50 text-red-600 dark:text-red-400 shadow-sm' : 'text-slate-800 dark:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 hover:text-red-600 dark:hover:text-red-400' }}">
                                <div class="w-7 h-7 rounded-lg bg-red-500/10 dark:bg-red-400/10 text-red-600 dark:text-red-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <span>Petisi Solidaritas</span>
                                        <span class="text-[9px] font-extrabold px-1.5 py-0.5 rounded bg-red-100 dark:bg-red-900/60 text-red-600 dark:text-red-300">Aksi</span>
                                    </div>
                                    <div class="text-[10px] font-normal text-slate-400 dark:text-slate-400 truncate">Suarakan dukungan Anda</div>
                                </div>
                            </a>
                        </div>

                        <!-- Section 2: Mode Tampilan & Bookmark -->
                        <div class="p-1 space-y-0.5">
                            <!-- Dark / Light Mode Toggle -->
                            <button onclick="toggleDarkMode()" 
                                    class="w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 transition-all duration-150">
                                <div class="flex items-center gap-3">
                                    <div class="w-7 h-7 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center shrink-0">
                                        <svg class="w-3.5 h-3.5 hidden dark:block text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                        <svg class="w-3.5 h-3.5 block dark:hidden text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                                    </div>
                                    <div class="text-left">
                                        <div>Mode Tampilan</div>
                                        <div class="text-[10px] font-normal text-slate-400">Terang / Gelap</div>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700/60 flex items-center gap-1">
                                    <span class="dark:hidden flex items-center gap-1"><svg class="w-2.5 h-2.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/></svg> Terang</span>
                                    <span class="hidden dark:inline-flex items-center gap-1"><svg class="w-2.5 h-2.5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/></svg> Gelap</span>
                                </span>
                            </button>

                            <!-- Bookmarks Link -->
                            <a href="{{ route('bookmarks') }}" 
                               @click="open = false"
                               class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 dark:text-slate-200 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 transition-all duration-150">
                                <div class="w-7 h-7 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                                </div>
                                <div>
                                    <div>Artikel Tersimpan</div>
                                    <div class="text-[10px] font-normal text-slate-400">Koleksi bookmark Anda</div>
                                </div>
                            </a>
                        </div>

                        <!-- Section 3: Masuk / Akun Pengguna -->
                        <div class="p-1.5">
                            @guest
                            <a href="{{ route('login') }}" 
                               class="flex items-center justify-between p-2.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white shadow-md shadow-red-600/20 transition-all duration-200 group">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-7 h-7 rounded-lg bg-white/20 flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                    </div>
                                    <div class="text-left">
                                        <div class="text-xs font-bold leading-tight">Masuk / Login</div>
                                        <div class="text-[9px] text-white/80 leading-tight">Akses kuis & progres</div>
                                    </div>
                                </div>
                                <svg class="w-3.5 h-3.5 text-white/70 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                            @endguest

                            @auth
                            <div class="p-2 bg-slate-50 dark:bg-slate-800/60 rounded-xl">
                                <div class="flex items-center gap-2.5 mb-2.5">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-red-600 to-rose-700 text-white font-extrabold flex items-center justify-center text-xs shadow-sm">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-xs font-bold text-slate-900 dark:text-white truncate">{{ Auth::user()->name }}</div>
                                        <div class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <a href="{{ route('learning.dashboard') }}" class="flex items-center gap-2 px-2.5 py-1.5 text-xs text-slate-700 dark:text-slate-200 hover:bg-white dark:hover:bg-slate-700 rounded-lg transition-all font-medium">
                                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                        <span>Dashboard Belajar</span>
                                    </a>

                                    @role('Admin')
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-2.5 py-1.5 text-xs text-amber-600 dark:text-amber-400 font-semibold hover:bg-amber-50 dark:hover:bg-amber-950/40 rounded-lg transition-all">
                                        <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        <span>Panel Admin</span>
                                    </a>
                                    @endrole

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center gap-2 text-left px-2.5 py-1.5 text-xs text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/40 rounded-lg transition-all font-semibold">
                                            <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            <span>Keluar</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endauth
                        </div>

                    </div>
                </div>

                <!-- Mobile Menu Button (ONLY visible below xl) -->
                <button onclick="toggleMobileMenu()" class="xl:hidden p-2 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden xl:hidden bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl border-b border-slate-200 dark:border-slate-800 px-4 pt-4 pb-6 space-y-1 text-sm font-semibold transition-all duration-300 max-h-[80vh] overflow-y-auto">

        <a href="/" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all {{ request()->is('/') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : '' }}">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Beranda</span>
        </a>
        <a href="/#gaza-update" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-rose-600 dark:text-rose-400 font-bold hover:bg-rose-50 dark:hover:bg-rose-950/40 transition-all">
            <span class="inline-flex items-center gap-2">
                <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-rose-500"></span></span>
                <span>Gaza Live (@thepalestinecircle)</span>
            </span>
            <span class="text-[10px] font-black uppercase px-2 py-0.5 rounded-md bg-rose-100 dark:bg-rose-950/80 text-rose-600">LIVE</span>
        </a>
        <a href="{{ route('news.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all {{ request()->routeIs('news.*') ? 'bg-slate-100 dark:bg-slate-800 text-red-600 dark:text-red-400 font-bold' : '' }}">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            <span>Berita Terkini</span>
        </a>

        <!-- Mobile Jelajahi Section -->
        <div class="px-3 pt-3 pb-1 text-[10px] font-black text-slate-400 uppercase tracking-widest">Jelajahi</div>
        <a href="{{ route('timeline') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>Linimasa Sejarah</span>
        </a>
        <a href="{{ route('maps') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
            <span>Peta & Geografi</span>
        </a>
        <a href="{{ route('gallery') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span>Galeri Media</span>
        </a>
        <a href="{{ route('culture') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4 4 4 0 014-4c.83 0 1.6.25 2.25.68A4.004 4.004 0 0117 13a4 4 0 013.9 3.1c.07.29.1.59.1.9a4 4 0 01-4 4H7z"/></svg>
            <span>Budaya Palestina</span>
        </a>

        <!-- Mobile Edukasi Section -->
        <div class="px-3 pt-3 pb-1 text-[10px] font-black text-slate-400 uppercase tracking-widest">Edukasi</div>
        <a href="{{ route('articles') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <span>Artikel Edukasi</span>
        </a>
        <a href="{{ route('resources') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            <span>Materi Pembelajaran</span>
        </a>
        <a href="{{ route('quiz') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-4a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            <span>Kuis Interaktif</span>
        </a>

        <div class="border-t border-slate-100 dark:border-slate-800 my-2"></div>

        <a href="{{ route('petition') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-700 dark:text-red-400 font-bold hover:bg-red-50 dark:hover:bg-red-950/30 transition-all">
            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
            <span>Petisi Solidaritas</span>
        </a>

        <!-- Mobile Dark Mode Toggle -->
        <button onclick="toggleDarkMode()" class="w-full text-left px-3 py-2.5 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all flex items-center justify-between">
            <span class="flex items-center gap-3">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                <span>Mode Tampilan</span>
            </span>
            <span class="text-xs px-2.5 py-1 rounded-md bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-bold">
                <span class="dark:hidden">Terang</span>
                <span class="hidden dark:inline">Gelap</span>
            </span>
        </button>

        <div class="pt-3 space-y-2">
            <a href="/#humanitarian-hub" class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 text-white font-extrabold text-xs shadow-lg">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                <span>Saluran Donasi Resmi</span>
            </a>
            @guest
            <a href="{{ route('login') }}" class="block text-center w-full py-3 rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold text-xs">
                Masuk / Login
            </a>
            @endguest
        </div>
    </div>

</nav>

<script>
    // Mobile menu toggle with smooth animation
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        if (menu) menu.classList.toggle('hidden');
    }

    // Navbar scroll effect - add shadow and reduce transparency on scroll
    let lastScrollY = 0;
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('main-navbar');
        if (!navbar) return;
        const scrollY = window.scrollY;
        if (scrollY > 20) {
            navbar.classList.add('shadow-lg', 'shadow-slate-200/30', 'dark:shadow-slate-950/30');
            navbar.classList.remove('border-b');
        } else {
            navbar.classList.remove('shadow-lg', 'shadow-slate-200/30', 'dark:shadow-slate-950/30');
            navbar.classList.add('border-b');
        }
        lastScrollY = scrollY;
    });
</script>