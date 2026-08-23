<section class="py-20 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 transition-colors">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 font-bold text-xs uppercase tracking-wider">
                    Educational Articles
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight mt-3">
                    Featured & Popular Readings
                </h2>
            </div>
            <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 hover:underline">
                View All Articles →
            </a>
        </div>

        @if(isset($latestArticles) && count($latestArticles) > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($latestArticles as $article)
            <article class="bg-slate-50 dark:bg-slate-800/60 rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-700/60 hover:shadow-xl hover:-translate-y-1.5 transition duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Thumbnail -->
                    <div class="relative h-52 overflow-hidden bg-slate-200 dark:bg-slate-700">
                        @if($article->thumbnail)
                        <img src="{{ Str::startsWith($article->thumbnail, 'http') ? $article->thumbnail : asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                        <img src="{{ asset('images/dome-of-rock.jpg') }}" alt="Default image" class="w-full h-full object-cover" style="object-position: center 25%;">
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full bg-slate-900/80 backdrop-blur-md text-white text-xs font-semibold">
                                {{ $article->category->name ?? 'General' }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-400 mb-3">
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ optional($article->published_at)->format('d M Y') }}
                            </span>
                            <span>•</span>
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                {{ $article->reading_time }} min read
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition line-clamp-2">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="text-sm text-slate-600 dark:text-slate-300 mt-3 line-clamp-3 leading-relaxed">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                </div>

                <!-- Footer Action -->
                <div class="p-6 pt-0 flex items-center justify-between">
                    <span class="text-xs text-slate-400 font-medium inline-flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        {{ number_format($article->views) }} views
                    </span>
                    <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 dark:text-emerald-400 hover:underline">
                        <span>Read Article</span>
                        <span>→</span>
                    </a>
                </div>
            </article>
            @endforeach

        </div>
        @endif

    </div>

</section>
