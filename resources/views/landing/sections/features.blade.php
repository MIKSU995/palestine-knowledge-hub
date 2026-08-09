<section class="py-20 bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 transition-colors">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="px-3.5 py-1.5 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 font-bold text-xs uppercase tracking-wider">
                Comprehensive Knowledge Pillars
            </span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Explore The 6 Educational Pillars
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-base">
                Discover history, geography, arts, real-time news, interactive quizzes, and legal documentations in one unified knowledge platform.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1: Content & Articles -->
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-2xl font-bold mb-6">
                    📚
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">1. Content & Articles</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                    Rich educational essays, reading time estimates, category filters, and curated historical studies.
                </p>
                <a href="{{ route('articles') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-emerald-600 dark:text-emerald-400 mt-6 hover:underline">
                    Browse Articles →
                </a>
            </div>

            <!-- Card 2: Historical Timeline -->
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 dark:bg-amber-950 text-amber-600 dark:text-amber-400 flex items-center justify-center text-2xl font-bold mb-6">
                    📜
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">2. Historical Timeline</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                    Chronological events from 1917 Mandate, 1948 Nakba, 1967 War to modern legal developments.
                </p>
                <a href="{{ route('timeline') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-amber-600 dark:text-amber-400 mt-6 hover:underline">
                    Explore Timeline →
                </a>
            </div>

            <!-- Card 3: Geography & Maps -->
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 dark:bg-blue-950 text-blue-600 dark:text-blue-400 flex items-center justify-center text-2xl font-bold mb-6">
                    🗺️
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">3. Geography & Maps</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                    Interactive map with clickable markers for Jerusalem, Gaza, Ramallah, Jaffa, Hebron, and historical sites.
                </p>
                <a href="{{ route('maps') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-blue-600 dark:text-blue-400 mt-6 hover:underline">
                    View Interactive Map →
                </a>
            </div>

            <!-- Card 4: Interactive Quiz & Learning -->
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-2xl bg-purple-100 dark:bg-purple-950 text-purple-600 dark:text-purple-400 flex items-center justify-center text-2xl font-bold mb-6">
                    🎓
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">4. Interactive Quizzes</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                    Test your knowledge with multiple-choice questions, timers, explanations, and achievement badges.
                </p>
                <a href="{{ route('quiz') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-purple-600 dark:text-purple-400 mt-6 hover:underline">
                    Take Quiz →
                </a>
            </div>

            <!-- Card 5: Real-Time News -->
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-2xl bg-red-100 dark:bg-red-950 text-red-600 dark:text-red-400 flex items-center justify-center text-2xl font-bold mb-6">
                    📡
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">5. Real-Time News API</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                    Live news updates automatically synced from global news APIs and RSS feeds.
                </p>
                <a href="{{ route('news.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-red-600 dark:text-red-400 mt-6 hover:underline">
                    Read Live News →
                </a>
            </div>

            <!-- Card 6: Educational Resources -->
            <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 rounded-2xl bg-teal-100 dark:bg-teal-950 text-teal-600 dark:text-teal-400 flex items-center justify-center text-2xl font-bold mb-6">
                    📄
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">6. Educational Resources</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                    Open-access downloadable PDFs, documentaries, visual infographics, and academic papers.
                </p>
                <a href="{{ route('resources') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-teal-600 dark:text-teal-400 mt-6 hover:underline">
                    Access Resources →
                </a>
            </div>

        </div>

    </div>
</section>