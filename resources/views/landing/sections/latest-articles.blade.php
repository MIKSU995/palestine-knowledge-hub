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
                            <span>📅 {{ optional($article->published_at)->format('d M Y') }}</span>
                            <span>•</span>
                            <span>📖 {{ $article->reading_time }} min read</span>
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
                    <span class="text-xs text-slate-400 font-medium">👁 {{ number_format($article->views) }} views</span>
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
