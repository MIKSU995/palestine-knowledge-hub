<section class="relative bg-slate-900 text-white overflow-hidden py-16 lg:py-24 border-b border-slate-800">

    <!-- Background Ambient Glow with Continuous Movement -->
    <div class="absolute inset-0 bg-gradient-to-tr from-emerald-950/80 via-slate-900 to-red-950/40 pointer-events-none"></div>
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-emerald-600/20 rounded-full blur-[120px] animate-ambient-glow pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-teal-500/15 rounded-full blur-[120px] animate-ambient-glow pointer-events-none" style="animation-delay: 4s;"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Real-Time News Ticker Ribbon -->
        @if(isset($liveNews) && count($liveNews) > 0)
        <div class="mb-8 p-3 rounded-2xl bg-slate-800/80 border border-slate-700/60 backdrop-blur-md flex items-center gap-3 overflow-hidden shadow-lg">
            <span class="px-2.5 py-1 rounded-lg bg-red-600 text-white font-bold text-xs uppercase tracking-wider flex items-center gap-1.5 shrink-0">
                <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                LIVE NEWS
            </span>
            <div class="overflow-hidden flex-1 relative h-6">
                <div class="absolute inset-0 flex items-center whitespace-nowrap animate-marquee gap-8">
                    @foreach($liveNews as $newsItem)
                    <a href="{{ route('news.index') }}" class="text-xs md:text-sm font-medium text-slate-200 hover:text-emerald-400 transition inline-flex items-center gap-2">
                        <span class="text-emerald-400 font-semibold">[{{ $newsItem->source ?? 'News' }}]</span>
                        <span>{{ Str::limit($newsItem->title, 80) }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('news.index') }}" class="text-xs font-semibold text-emerald-400 hover:underline shrink-0 hidden sm:inline">
                View All Real-Time News →
            </a>
        </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Hero Text Content -->
            <div class="space-y-6">

                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm font-semibold animate-float-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Palestine Knowledge Hub
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-none">
                    Learn. <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-emerald-500">Understand.</span> <br>
                    Remember.
                </h1>

                <p class="text-lg text-slate-300 leading-relaxed">
                    Explore authentic historical archives, interactive geography maps, cultural heritage documentation, and real-time updates on Palestine.
                </p>

                <!-- Hero Buttons -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('articles') }}" class="px-7 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-base transition duration-300 hover:scale-105 shadow-xl shadow-emerald-900/40">
                        Explore Articles
                    </a>

                    <a href="{{ route('maps') }}" class="px-7 py-3.5 rounded-2xl bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-bold text-base transition duration-300 hover:scale-105 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        Interactive Map
                    </a>
                </div>

                <!-- Statistics Badges -->
                <div class="grid grid-cols-4 gap-4 pt-6 border-t border-slate-800 text-center">
                    <div class="p-3 rounded-2xl bg-slate-800/40 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-2xl font-extrabold text-white">{{ $stats['total_articles'] ?? '12+' }}</div>
                        <div class="text-xs text-slate-400 font-medium mt-0.5">Articles</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-slate-800/40 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-2xl font-extrabold text-emerald-400">{{ $stats['total_timeline'] ?? '10+' }}</div>
                        <div class="text-xs text-slate-400 font-medium mt-0.5">Timeline Events</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-slate-800/40 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-2xl font-extrabold text-amber-400">{{ $stats['total_resources'] ?? '8+' }}</div>
                        <div class="text-xs text-slate-400 font-medium mt-0.5">Resources</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-slate-800/40 border border-slate-800/80 backdrop-blur-sm">
                        <div class="text-2xl font-extrabold text-purple-400">{{ $stats['total_quizzes'] ?? '5+' }}</div>
                        <div class="text-xs text-slate-400 font-medium mt-0.5">Quizzes</div>
                    </div>
                </div>

            </div>

            <!-- Hero Image Showcase with Floating Elements -->
            <div class="relative group">
                <!-- Floating Glass Card 1 -->
                <div class="hidden sm:flex absolute -top-6 -left-6 z-20 items-center gap-3 p-4 rounded-2xl bg-slate-900/90 border border-emerald-500/30 backdrop-blur-xl shadow-2xl animate-float-slow">
                    <div class="w-10 h-10 rounded-xl bg-emerald-600/20 text-emerald-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Educational Base</p>
                        <p class="text-sm font-bold text-white">Verified History</p>
                    </div>
                </div>

                <!-- Floating Glass Card 2 -->
                <div class="hidden sm:flex absolute -bottom-6 -right-6 z-20 items-center gap-3 p-4 rounded-2xl bg-slate-900/90 border border-teal-500/30 backdrop-blur-xl shadow-2xl animate-float-medium">
                    <div class="w-10 h-10 rounded-xl bg-teal-600/20 text-teal-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Interactive Layer</p>
                        <p class="text-sm font-bold text-white">Live GIS Maps</p>
                    </div>
                </div>

                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-700/80 group-hover:border-emerald-500/50 transition duration-500">
                    <img src="{{ asset('images/dome-of-rock.jpg') }}" alt="Dome of the Rock Old City Jerusalem" class="w-full h-[440px] object-cover group-hover:scale-105 transition duration-700" style="object-position: center 25%;">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-90"></div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <span class="px-3 py-1.5 rounded-full bg-emerald-500/80 backdrop-blur-md text-white text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
                            Old City Jerusalem (Al-Quds)
                        </span>
                        <h3 class="text-xl font-bold text-white mt-2">
                            Centuries of History & Cultural Heritage
                        </h3>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>