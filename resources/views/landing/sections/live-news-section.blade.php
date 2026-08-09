<section class="py-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 transition-colors">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 dark:bg-red-950/60 text-red-700 dark:text-red-400 text-xs font-bold uppercase tracking-wider mb-3">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                    Real-Time Updates
                </div>
                <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Latest Palestine Real-Time News
                </h2>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
                    Continuously updated news feed powered by verified global news sources and API sync.
                </p>
            </div>

            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 hover:text-emerald-700">
                <span>View Full News Hub</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <!-- News Cards Grid -->
        @if(isset($liveNews) && count($liveNews) > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($liveNews->take(6) as $news)
            <div class="bg-slate-50 dark:bg-slate-800/60 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/60 hover:border-emerald-500 dark:hover:border-emerald-500 transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between gap-2 text-xs mb-3">
                        <span class="px-2.5 py-1 rounded-lg bg-emerald-100 dark:bg-emerald-950/80 text-emerald-800 dark:text-emerald-300 font-bold">
                            {{ $news->source ?? 'News' }}
                        </span>
                        <span class="text-slate-400">
                            {{ optional($news->published_at)->diffForHumans() }}
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition line-clamp-2">
                        <a href="{{ $news->url }}" target="_blank" rel="noopener">
                            {{ $news->title }}
                        </a>
                    </h3>

                    <p class="text-sm text-slate-600 dark:text-slate-300 mt-3 line-clamp-3 leading-relaxed">
                        {{ $news->summary }}
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
                    <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">Category: {{ $news->category ?? 'General' }}</span>
                    <a href="{{ $news->url }}" target="_blank" rel="noopener" class="text-xs font-bold text-emerald-600 dark:text-emerald-400 hover:underline flex items-center gap-1">
                        <span>Read Source</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        @else
        <div class="text-center py-12 bg-slate-50 dark:bg-slate-800 rounded-3xl">
            <p class="text-slate-500">Live news feed currently refreshing...</p>
        </div>
        @endif

    </div>

</section>
