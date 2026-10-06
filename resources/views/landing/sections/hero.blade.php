<section class="relative bg-slate-900 text-white overflow-hidden py-16 lg:py-24 border-b border-slate-800">

    <!-- Background Subtle Ambient Glow -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-red-950/40 pointer-events-none"></div>
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-red-600/15 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-rose-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Real-Time News & Gaza Update Marquee Ribbon -->
        <div class="mb-8 p-3 rounded-2xl bg-slate-800/80 border border-slate-700/60 backdrop-blur-md flex items-center gap-3 overflow-hidden shadow-md">
            <span class="px-3 py-1 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 text-white font-extrabold text-xs uppercase tracking-wider flex items-center gap-1.5 shrink-0 shadow">
                <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                LIVE GAZA UPDATE
            </span>
            <div class="overflow-hidden flex-1 relative h-6">
                <div class="absolute inset-0 flex items-center whitespace-nowrap animate-marquee gap-8">
                    <a href="#gaza-update" class="text-xs md:text-sm font-semibold text-rose-300 hover:text-white transition inline-flex items-center gap-2">
                        <span>[The Gaza Update]</span>
                        <span>🚨 Penyaluran bantuan medis & air bersih darurat di Gaza Tengah</span>
                    </a>
                    @if(isset($liveNews) && count($liveNews) > 0)
                        @foreach($liveNews as $newsItem)
                        <a href="{{ route('news.index') }}" class="text-xs md:text-sm font-medium text-slate-200 hover:text-red-400 transition inline-flex items-center gap-2">
                            <span class="text-red-400 font-semibold">[{{ $newsItem->source ?? 'Berita' }}]</span>
                            <span>{{ Str::limit($newsItem->title, 80) }}</span>
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>
            <a href="#gaza-update" class="text-xs font-bold text-red-400 hover:underline shrink-0 hidden sm:inline">
                Lihat Feed Live Gaza →
            </a>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Hero Text Content -->
            <div class="space-y-6">

                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-xs sm:text-sm font-semibold">
                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span>Palestine Knowledge & Humanitarian Hub</span>
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight">
                    Edukasi Sejarah & <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-rose-400 to-red-600">Solidaritas Kemanusiaan.</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    Platform terpadu penyedia informasi otentik, update langsung dari Gaza via API Instagram, peta sejarah interaktif, dan saluran bantuan kemanusaiaan terverifikasi.
                </p>

                <!-- Hero Action Buttons -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#humanitarian-hub" class="px-7 py-3.5 rounded-2xl bg-gradient-to-r from-red-600 via-rose-600 to-red-700 hover:opacity-95 text-white font-extrabold text-sm sm:text-base transition duration-300 shadow-xl shadow-red-950/50 flex items-center gap-2">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                        <span>Saluran Donasi Resmi</span>
                    </a>

                    <a href="#gaza-update" class="px-6 py-3.5 rounded-2xl bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-bold text-sm sm:text-base transition duration-300 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        <span>Update Instagram Gaza</span>
                    </a>
                </div>

                <!-- Statistics Badges -->
                <div class="grid grid-cols-4 gap-3 pt-6 border-t border-slate-800 text-center">
                    <div class="p-3 rounded-2xl bg-slate-800/50 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-xl sm:text-2xl font-extrabold text-white">24/7</div>
                        <div class="text-[11px] text-slate-400 font-medium mt-0.5">Live Feed</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-slate-800/50 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-xl sm:text-2xl font-extrabold text-red-400">100%</div>
                        <div class="text-[11px] text-slate-400 font-medium mt-0.5">Lembaga Resmi</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-slate-800/50 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-xl sm:text-2xl font-extrabold text-rose-400">{{ $stats['total_articles'] ?? '12+' }}</div>
                        <div class="text-[11px] text-slate-400 font-medium mt-0.5">Artikel & Peta</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-slate-800/50 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-xl sm:text-2xl font-extrabold text-red-300">Open</div>
                        <div class="text-[11px] text-slate-400 font-medium mt-0.5">Akses Edukasi</div>
                    </div>
                </div>

            </div>

            <!-- Hero Image Showcase -->
            <div class="relative group">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-700/80 group-hover:border-red-500/50 transition duration-500">
                    <img src="images/dome-of-rock.jpg" alt="Dome of the Rock Kota Tua Yerusalem" class="w-full h-[460px] object-cover group-hover:scale-105 transition duration-700" style="object-position: center 25%;">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent opacity-90"></div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <span class="px-3 py-1.5 rounded-full bg-red-600/90 backdrop-blur-md text-white text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                            Kota Tua Yerusalem (Al-Quds)
                        </span>
                        <h3 class="text-xl font-bold text-white mt-2">
                            Platform Warisan Sejarah & Aksi Kemanusiaan
                        </h3>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>