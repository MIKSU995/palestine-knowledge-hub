<nav class="sticky top-0 z-50 bg-slate-950/85 backdrop-blur-2xl border-b border-slate-800/80 transition-all duration-300" id="main-navbar">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-16 sm:h-[4.25rem] gap-2">

            <!-- Brand Logo -->
            <a href="/" class="flex items-center gap-2.5 shrink-0 group">
                <div class="relative w-10 h-10 sm:w-11 sm:h-11 rounded-xl overflow-hidden flex items-center justify-center bg-slate-900 border border-slate-700/80 shadow-sm group-hover:shadow-red-900/30 group-hover:border-red-500/50 group-hover:scale-[1.03] transition-all duration-300">
                    <img src="{{ asset('images/logo.svg') }}" alt="Palestine Knowledge Hub" class="w-full h-full object-contain" />
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-base sm:text-lg font-extrabold tracking-tight text-white leading-none">
                        Palestine <span class="text-red-400">Knowledge Hub</span>
                    </span>
                    <span class="text-[9px] font-semibold text-slate-400 tracking-widest uppercase">Edukasi · Kemanusiaan · Donasi</span>
                </div>
            </a>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden xl:flex items-center gap-1 text-[13px] font-semibold">

                <!-- Beranda -->
                <a href="/" class="nav-link-item px-3.5 py-2 rounded-xl transition-all duration-200 {{ request()->is('/') ? 'bg-slate-800/90 text-red-400 font-bold border border-slate-700/70 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
                    Beranda
                </a>

                <!-- DROPDOWN 1: Edukasi Palestina -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open"
                        class="nav-link-item px-3.5 py-2 rounded-xl transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('articles*', 'timeline', 'maps', 'culture*', 'glossary', 'resources', 'quiz*') ? 'bg-slate-800/90 text-red-400 font-bold border border-slate-700/70' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
                        <span>Edukasi Palestina</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180 text-red-400' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute left-0 mt-2 w-72 bg-slate-900/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-black/60 border border-slate-800 p-2 z-50 divide-y divide-slate-800/80" style="display:none;">
                        <div class="p-1 space-y-0.5">
                            <div class="px-3 py-1 text-[10px] font-extrabold uppercase tracking-widest text-slate-500">Sejarah & Geografi</div>
                            <a href="{{ route('articles') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-red-400 transition-all {{ request()->routeIs('articles*') ? 'text-red-400 font-bold bg-red-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-red-500/15 text-red-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Artikel Edukasi</div>
                                    <div class="text-[10px] text-slate-400">Kajian mendalam & fakta sejarah</div>
                                </div>
                            </a>
                            <a href="{{ route('timeline') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-amber-400 transition-all {{ request()->routeIs('timeline') ? 'text-amber-400 font-bold bg-amber-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-amber-500/15 text-amber-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Linimasa Sejarah</div>
                                    <div class="text-[10px] text-slate-400">Kronologi 1917 hingga kini</div>
                                </div>
                            </a>
                            <a href="{{ route('maps') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-blue-400 transition-all {{ request()->routeIs('maps') ? 'text-blue-400 font-bold bg-blue-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-blue-500/15 text-blue-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Peta & Geografi</div>
                                    <div class="text-[10px] text-slate-400">Peta interaktif kota bersejarah</div>
                                </div>
                            </a>
                        </div>
                        <div class="p-1 pt-2 space-y-0.5">
                            <div class="px-3 py-1 text-[10px] font-extrabold uppercase tracking-widest text-slate-500">Budaya & Pembelajaran</div>
                            <a href="{{ route('culture') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-rose-400 transition-all {{ request()->routeIs('culture*') ? 'text-rose-400 font-bold bg-rose-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-rose-500/15 text-rose-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4 4 4 0 014-4c.83 0 1.6.25 2.25.68A4.004 4.004 0 0117 13a4 4 0 013.9 3.1c.07.29.1.59.1.9a4 4 0 01-4 4H7z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Budaya & Warisan</div>
                                    <div class="text-[10px] text-slate-400">Tatreez, seni & tradisi</div>
                                </div>
                            </a>
                            <a href="{{ route('glossary') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-emerald-400 transition-all {{ request()->routeIs('glossary') ? 'text-emerald-400 font-bold bg-emerald-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/15 text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Glosarium Istilah</div>
                                    <div class="text-[10px] text-slate-400">Kamus terminologi Palestina</div>
                                </div>
                            </a>
                            <a href="{{ route('resources') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-indigo-400 transition-all {{ request()->routeIs('resources') ? 'text-indigo-400 font-bold bg-indigo-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-indigo-500/15 text-indigo-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Materi Pembelajaran</div>
                                    <div class="text-[10px] text-slate-400">Modul PDF & bahan ajar</div>
                                </div>
                            </a>
                            <a href="{{ route('quiz') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-purple-400 transition-all {{ request()->routeIs('quiz*') ? 'text-purple-400 font-bold bg-purple-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-purple-500/15 text-purple-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-4a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Kuis & Sertifikat</div>
                                    <div class="text-[10px] text-slate-400">Uji pemahaman Anda</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- DROPDOWN 2: Kemanusiaan & Donasi -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open"
                        class="nav-link-item px-3.5 py-2 rounded-xl transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('petition*', 'gallery') ? 'bg-slate-800/90 text-red-400 font-bold border border-slate-700/70' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
                        <span>Kemanusiaan</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180 text-red-400' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute left-0 mt-2 w-68 bg-slate-900/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-black/60 border border-slate-800 p-2 z-50" style="display:none;">
                        <div class="p-1 space-y-0.5">
                            <a href="/#humanitarian-hub" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-red-400 transition-all">
                                <div class="w-7 h-7 rounded-lg bg-red-500/15 text-red-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Pusat Donasi Terverifikasi</div>
                                    <div class="text-[10px] text-slate-400">Rekening resmi lembaga terpercaya</div>
                                </div>
                            </a>
                            <a href="/#verified-orgs" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-emerald-400 transition-all">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/15 text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Mitra Penyalur Resmi</div>
                                    <div class="text-[10px] text-slate-400">NPC, MER-C, BAZNAS, UNRWA, PRCS</div>
                                </div>
                            </a>
                            <a href="{{ route('petition') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-rose-400 transition-all {{ request()->routeIs('petition*') ? 'text-rose-400 font-bold bg-rose-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-rose-500/15 text-rose-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Petisi Solidaritas</div>
                                    <div class="text-[10px] text-slate-400">Suarakan dukungan kemanusiaan</div>
                                </div>
                            </a>
                            <a href="{{ route('gallery') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-sky-400 transition-all {{ request()->routeIs('gallery') ? 'text-sky-400 font-bold bg-sky-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/15 text-sky-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Galeri & Dokumentasi</div>
                                    <div class="text-[10px] text-slate-400">Arsip visual kemanusiaan</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- DROPDOWN 3: Berita & Sosmed -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open"
                        class="nav-link-item px-3.5 py-2 rounded-xl transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('news.*') ? 'bg-slate-800/90 text-red-400 font-bold border border-slate-700/70' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-rose-500"></span>
                        </span>
                        <span>Berita & Sosmed</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180 text-red-400' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        class="absolute left-0 mt-2 w-72 bg-slate-900/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-black/60 border border-slate-800 p-2 z-50" style="display:none;">
                        <div class="p-1 space-y-0.5">
                            <a href="{{ route('news.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-red-400 transition-all {{ request()->routeIs('news.*') ? 'text-red-400 font-bold bg-red-950/30' : '' }}">
                                <div class="w-7 h-7 rounded-lg bg-red-500/15 text-red-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Pusat Berita Terpercaya</div>
                                    <div class="text-[10px] text-slate-400">Media nasional & internasional</div>
                                </div>
                            </a>
                            <a href="/#gaza-update" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-rose-400 transition-all">
                                <div class="w-7 h-7 rounded-lg bg-rose-500/15 text-rose-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold flex items-center gap-1.5">
                                        <span>Gaza Live Feed</span>
                                        <span class="px-1.5 py-0.5 rounded bg-rose-500/20 text-rose-300 text-[9px] font-black">LIVE</span>
                                    </div>
                                    <div class="text-[10px] text-slate-400">Laporan @thepalestinecircle</div>
                                </div>
                            </a>
                            <a href="/#trusted-social-sources" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-slate-200 hover:bg-slate-800/90 hover:text-amber-400 transition-all">
                                <div class="w-7 h-7 rounded-lg bg-amber-500/15 text-amber-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Jaringan Sosmed Terpercaya</div>
                                    <div class="text-[10px] text-slate-400">Akun & jurnalis lapangan resmi</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Tools & User Actions -->
            <div class="flex items-center gap-2 shrink-0">

                <!-- Humanitarian Aid CTA Button -->
                <a href="/#humanitarian-hub" class="px-3.5 py-2 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-extrabold text-xs transition-all duration-200 shadow-lg shadow-red-950/50 flex items-center gap-1.5 shrink-0">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                    <span class="hidden sm:inline">Saluran Donasi</span>
                </a>

                <!-- Global Search Trigger -->
                <button onclick="openSearchModal()" class="p-2 sm:px-3 sm:py-2 rounded-xl text-slate-300 hover:text-white bg-slate-900 hover:bg-slate-800 border border-slate-800 transition-all duration-200 flex items-center gap-1.5 text-xs font-medium" title="Cari (Ctrl+K)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="hidden md:inline">Cari</span>
                </button>

                <!-- Account & Quick Actions Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open"
                            class="p-2 sm:p-2.5 rounded-xl text-slate-200 bg-slate-900 hover:bg-slate-800 border border-slate-800 transition-all duration-200 flex items-center justify-center shadow-sm group focus:outline-none"
                            :class="open ? 'ring-2 ring-red-500/40 text-red-400' : ''"
                            title="Menu Akun & Aksi">
                        <svg class="w-5 h-5 transition-transform duration-200 text-slate-200 group-hover:text-red-400" viewBox="0 0 24 24" fill="currentColor">
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
                        class="absolute right-0 mt-3 w-64 bg-slate-900/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-black/70 border border-slate-800 p-2 z-50 divide-y divide-slate-800"
                        style="display: none;">

                        <div class="absolute -top-1.5 right-4 w-3 h-3 bg-slate-900 border-t border-l border-slate-800 rotate-45 pointer-events-none"></div>

                        <!-- Section 1: Aksi Solidaritas & Bookmark -->
                        <div class="p-1 space-y-0.5">
                            <a href="{{ route('petition') }}" @click="open = false"
                               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('petition*') ? 'bg-red-950/50 text-red-400' : 'text-slate-100 hover:bg-slate-800/80 hover:text-red-400' }}">
                                <div class="w-7 h-7 rounded-lg bg-red-500/15 text-red-400 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <span>Petisi Solidaritas</span>
                                        <span class="text-[9px] font-extrabold px-1.5 py-0.5 rounded bg-red-900/60 text-red-300">Aksi</span>
                                    </div>
                                    <div class="text-[10px] font-normal text-slate-400 truncate">Suarakan dukungan Anda</div>
                                </div>
                            </a>

                            <a href="{{ route('bookmarks') }}" @click="open = false"
                               class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-semibold text-slate-200 hover:bg-slate-800/80 transition-all">
                                <div class="w-7 h-7 rounded-lg bg-slate-800 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                                </div>
                                <div>
                                    <div>Artikel Tersimpan</div>
                                    <div class="text-[10px] font-normal text-slate-400">Koleksi bookmark Anda</div>
                                </div>
                            </a>
                        </div>

                        <!-- Section 2: Akun Pengguna -->
                        <div class="p-1.5">
                            @guest
                            <a href="{{ route('login') }}"
                               class="flex items-center justify-between p-2.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white shadow-md shadow-red-950/40 transition-all duration-200 group">
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
                            <div class="p-2 bg-slate-800/60 rounded-xl">
                                <div class="flex items-center gap-2.5 mb-2.5">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-red-600 to-rose-700 text-white font-extrabold flex items-center justify-center text-xs shadow-sm">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</div>
                                        <div class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <a href="{{ route('learning.dashboard') }}" class="flex items-center gap-2 px-2.5 py-1.5 text-xs text-slate-200 hover:bg-slate-700 rounded-lg transition-all font-medium">
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                        <span>Dashboard Belajar</span>
                                    </a>

                                    @role('Admin')
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-2.5 py-1.5 text-xs text-amber-400 font-semibold hover:bg-amber-950/40 rounded-lg transition-all">
                                        <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        <span>Panel Admin</span>
                                    </a>
                                    @endrole

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center gap-2 text-left px-2.5 py-1.5 text-xs text-red-400 hover:bg-red-950/40 rounded-lg transition-all font-semibold">
                                            <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
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
                <button onclick="toggleMobileMenu()" class="xl:hidden p-2 rounded-xl text-slate-300 hover:bg-slate-800 transition-all duration-200" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Navigation Drawer (Collapsible Dropdowns, Always Dark) -->
    <div id="mobile-menu" x-data="{ openEdu: true, openAid: false, openNews: false }" class="hidden xl:hidden bg-slate-950/95 backdrop-blur-2xl border-b border-slate-800 px-4 pt-4 pb-6 space-y-2 text-sm font-semibold transition-all duration-300 max-h-[82vh] overflow-y-auto">

        <a href="/" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-200 hover:bg-slate-800 transition-all {{ request()->is('/') ? 'bg-slate-800 text-red-400 font-bold' : '' }}">
            <span>Beranda</span>
        </a>

        <!-- Mobile Dropdown 1: Edukasi Palestina -->
        <div class="rounded-xl bg-slate-900/70 border border-slate-800/80 overflow-hidden">
            <button @click="openEdu = !openEdu" class="w-full flex items-center justify-between px-3 py-2.5 text-left text-slate-200 hover:text-white">
                <span class="text-xs font-extrabold uppercase tracking-wider text-red-400">Edukasi Palestina</span>
                <svg class="w-4 h-4 text-slate-400 transition-transform" :class="openEdu ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="openEdu" class="px-2 pb-2 space-y-1">
                <a href="{{ route('articles') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Artikel Edukasi</a>
                <a href="{{ route('timeline') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Linimasa Sejarah</a>
                <a href="{{ route('maps') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Peta & Geografi</a>
                <a href="{{ route('culture') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Budaya & Warisan</a>
                <a href="{{ route('glossary') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Glosarium Istilah</a>
                <a href="{{ route('resources') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Materi Pembelajaran</a>
                <a href="{{ route('quiz') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Kuis & Sertifikat</a>
            </div>
        </div>

        <!-- Mobile Dropdown 2: Kemanusiaan & Donasi -->
        <div class="rounded-xl bg-slate-900/70 border border-slate-800/80 overflow-hidden">
            <button @click="openAid = !openAid" class="w-full flex items-center justify-between px-3 py-2.5 text-left text-slate-200 hover:text-white">
                <span class="text-xs font-extrabold uppercase tracking-wider text-emerald-400">Kemanusiaan & Donasi</span>
                <svg class="w-4 h-4 text-slate-400 transition-transform" :class="openAid ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="openAid" class="px-2 pb-2 space-y-1" style="display:none;">
                <a href="/#humanitarian-hub" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Pusat Donasi Terverifikasi</a>
                <a href="/#verified-orgs" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Mitra Penyalur Resmi</a>
                <a href="{{ route('petition') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Petisi Solidaritas</a>
                <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Galeri & Dokumentasi</a>
            </div>
        </div>

        <!-- Mobile Dropdown 3: Berita & Sosmed -->
        <div class="rounded-xl bg-slate-900/70 border border-slate-800/80 overflow-hidden">
            <button @click="openNews = !openNews" class="w-full flex items-center justify-between px-3 py-2.5 text-left text-slate-200 hover:text-white">
                <span class="text-xs font-extrabold uppercase tracking-wider text-rose-400">Berita & Sosmed</span>
                <svg class="w-4 h-4 text-slate-400 transition-transform" :class="openNews ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="openNews" class="px-2 pb-2 space-y-1" style="display:none;">
                <a href="{{ route('news.index') }}" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Pusat Berita Terpercaya</a>
                <a href="/#gaza-update" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Gaza Live Feed (@thepalestinecircle)</a>
                <a href="/#trusted-social-sources" class="block px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-slate-800">Jaringan Sosmed Terpercaya</a>
            </div>
        </div>

        <div class="pt-3 space-y-2">
            <a href="/#humanitarian-hub" class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 text-white font-extrabold text-xs shadow-lg">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                <span>Saluran Donasi Resmi</span>
            </a>
            @guest
            <a href="{{ route('login') }}" class="block text-center w-full py-3 rounded-xl bg-slate-800 border border-slate-700 text-white font-bold text-xs">
                Masuk / Login
            </a>
            @endguest
        </div>
    </div>

</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        if (menu) menu.classList.toggle('hidden');
    }

    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('main-navbar');
        if (!navbar) return;
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-lg', 'shadow-black/40');
            navbar.classList.remove('border-b');
        } else {
            navbar.classList.remove('shadow-lg', 'shadow-black/40');
            navbar.classList.add('border-b');
        }
    });
</script>
