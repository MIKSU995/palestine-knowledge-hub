<section class="relative py-24 bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 transition-colors overflow-hidden">
    <!-- Ambient Background Light Blob -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-emerald-500/5 dark:bg-emerald-500/10 rounded-full blur-[140px] pointer-events-none animate-ambient-glow"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">

        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-emerald-500/10 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-300 font-bold text-xs uppercase tracking-widest border border-emerald-500/20 shadow-sm animate-float-medium">
                Comprehensive Knowledge Pillars
            </span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Explore The 6 Educational Pillars
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed">
                Discover history, geography, arts, real-time news, interactive quizzes, and legal documentations in one unified knowledge platform.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1: Content & Articles -->
            <div class="group relative rounded-3xl bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 p-8 shadow-sm hover:shadow-2xl hover:border-emerald-500/40 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">1. Content & Articles</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Rich educational essays, reading time estimates, category filters, and curated historical studies.
                    </p>
                </div>
                <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-emerald-600 dark:text-emerald-400 mt-8 group-hover:translate-x-1 transition-transform">
                    <span>Browse Articles</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 2: Historical Timeline -->
            <div class="group relative rounded-3xl bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 p-8 shadow-sm hover:shadow-2xl hover:border-amber-500/40 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-amber-500/10 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">2. Historical Timeline</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Chronological events from 1917 Mandate, 1948 Nakba, 1967 War to modern legal developments.
                    </p>
                </div>
                <a href="{{ route('timeline') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-amber-600 dark:text-amber-400 mt-8 group-hover:translate-x-1 transition-transform">
                    <span>Explore Timeline</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 3: Geography & Maps -->
            <div class="group relative rounded-3xl bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 p-8 shadow-sm hover:shadow-2xl hover:border-blue-500/40 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-500/10 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">3. Geography & Maps</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Interactive map with clickable markers for Jerusalem, Gaza, Ramallah, Jaffa, Hebron, and historical sites.
                    </p>
                </div>
                <a href="{{ route('maps') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-blue-600 dark:text-blue-400 mt-8 group-hover:translate-x-1 transition-transform">
                    <span>View Interactive Map</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 4: Interactive Quizzes -->
            <div class="group relative rounded-3xl bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 p-8 shadow-sm hover:shadow-2xl hover:border-purple-500/40 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-pink-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-purple-500/10 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-4a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">4. Interactive Quizzes</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Test your knowledge with multiple-choice questions, timers, explanations, and achievement badges.
                    </p>
                </div>
                <a href="{{ route('quiz') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-purple-600 dark:text-purple-400 mt-8 group-hover:translate-x-1 transition-transform">
                    <span>Take Quiz</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 5: Real-Time News API -->
            <div class="group relative rounded-3xl bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 p-8 shadow-sm hover:shadow-2xl hover:border-red-500/40 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 to-rose-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-red-500/10 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">5. Real-Time News API</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Live news updates automatically synced from global news APIs and RSS feeds.
                    </p>
                </div>
                <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-red-600 dark:text-red-400 mt-8 group-hover:translate-x-1 transition-transform">
                    <span>Read Live News</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 6: Educational Resources -->
            <div class="group relative rounded-3xl bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 p-8 shadow-sm hover:shadow-2xl hover:border-teal-500/40 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-teal-500 to-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-teal-500/10 dark:bg-teal-950/60 text-teal-600 dark:text-teal-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white group-hover:text-teal-600 dark:group-hover:text-teal-400 transition-colors">6. Educational Resources</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Open-access downloadable PDFs, documentaries, visual infographics, and academic papers.
                    </p>
                </div>
                <a href="{{ route('resources') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-teal-600 dark:text-teal-400 mt-8 group-hover:translate-x-1 transition-transform">
                    <span>Access Resources</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

        </div>

    </div>
</section>