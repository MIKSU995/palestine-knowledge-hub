@extends('layouts.app')

@section('title', 'Articles & Publications — Palestine Knowledge Hub')
@section('meta_description', 'Read authentic articles, research papers, and stories on Palestinian history, culture, geography, and international law.')

@section('content')

{{-- ================= HERO HEADER ================= --}}
<section class="bg-slate-900 text-white py-16 border-b border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-emerald-900/30 via-slate-900 to-slate-950"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <span class="px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 font-bold text-xs uppercase tracking-wider">
                Knowledge Archive
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
                Articles & Publications
            </h1>
            <p class="mt-4 text-slate-300 text-base sm:text-lg leading-relaxed">
                Explore in-depth historical research, cultural essays, geographical studies, and legal documentations about Palestine.
            </p>
        </div>

        {{-- Search Bar --}}
        <div class="mt-8 max-w-2xl">
            <form action="{{ route('articles') }}" method="GET" class="relative">
                <div class="flex items-center bg-slate-800/90 border border-slate-700 rounded-2xl p-2 shadow-2xl focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition">
                    <svg class="w-6 h-6 text-slate-400 ml-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search articles by title, history, topic, or keyword..."
                           class="w-full bg-transparent px-4 py-2.5 text-white placeholder-slate-400 text-sm outline-none">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <button type="submit" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl text-xs font-bold transition flex-shrink-0 shadow-lg shadow-emerald-900/40">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- ================= MAIN CONTENT ================= --}}
<section id="article-list" class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Filter Bar --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 sm:pb-0 no-scrollbar">
                <a href="{{ route('articles', ['search' => request('search')]) }}"
                   class="px-4 py-2 rounded-2xl text-xs font-bold transition flex-shrink-0 {{ !request('category') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/20' : 'bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 hover:border-emerald-500' }}">
                    All Categories
                </a>
                @foreach($categories as $category)
                <a href="{{ route('articles', ['category' => $category->id, 'search' => request('search')]) }}"
                   class="px-4 py-2 rounded-2xl text-xs font-bold transition flex-shrink-0 {{ request('category') == $category->id ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/20' : 'bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 hover:border-emerald-500' }}">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>

            <p class="text-xs font-medium text-slate-500 dark:text-slate-400 flex-shrink-0">
                Showing <strong class="text-slate-900 dark:text-white">{{ $articles->total() }}</strong> {{ Str::plural('article', $articles->total()) }}
            </p>
        </div>

        {{-- FEATURED ARTICLE (Show when no search/category filter active) --}}
        @if($featured && !request()->filled('search') && !request()->filled('category') && $articles->currentPage() === 1)
        @php
            $featuredImg = $featured->thumbnail ? (str_starts_with($featured->thumbnail, 'http') ? $featured->thumbnail : asset('storage/'.$featured->thumbnail)) : asset('images/dome-of-rock.jpg');
            $featuredReadTime = max(1, ceil(str_word_count(strip_tags($featured->content)) / 200));
        @endphp
        <div class="mb-12 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 grid lg:grid-cols-12">
            <div class="lg:col-span-7 relative min-h-[320px] lg:min-h-[420px] bg-slate-900">
                <img loading="lazy" src="{{ $featuredImg }}" alt="{{ $featured->title }}" class="w-full h-full object-cover">
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 rounded-full bg-emerald-600 text-white text-xs font-extrabold uppercase tracking-wider shadow-md inline-flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-amber-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        Featured Article
                    </span>
                </div>
            </div>
            <div class="lg:col-span-5 p-8 lg:p-10 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">
                            {{ $featured->category->name ?? 'General' }}
                        </span>
                        <span class="text-slate-300 dark:text-slate-700">•</span>
                        <span class="text-xs text-slate-400">
                            {{ optional($featured->published_at)->format('d M Y') }}
                        </span>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 dark:text-white leading-snug">
                        <a href="{{ route('articles.show', $featured->slug) }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                            {{ $featured->title }}
                        </a>
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-4 leading-relaxed line-clamp-4">
                        {{ $featured->excerpt }}
                    </p>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between">
                    <div class="flex items-center gap-4 text-xs text-slate-400">
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            {{ number_format($featured->views) }} views
                        </span>
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            {{ $featuredReadTime }} min read
                        </span>
                    </div>
                    <a href="{{ route('articles.show', $featured->slug) }}" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs rounded-xl shadow-lg shadow-emerald-900/30 transition flex items-center gap-2">
                        Read Article →
                    </a>
                </div>
            </div>
        </div>
        @endif

        {{-- ARTICLE GRID --}}
        @if($articles->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            @php
                $readTime = max(1, ceil(str_word_count(strip_tags($article->content)) / 200));
                $fallbackImages = [
                    'history-heritage' => asset('images/dome-of-rock.jpg'),
                    'culture-arts'     => asset('images/dome-of-rock.jpg'),
                    'geography-maps'   => asset('images/dome-of-rock.jpg'),
                    'human-rights-law' => asset('images/dome-of-rock.jpg'),
                    'educational-guides' => asset('images/dome-of-rock.jpg'),
                ];
                $categorySlug = $article->category->slug ?? 'history-heritage';
                $defaultImg = $fallbackImages[$categorySlug] ?? asset('images/dome-of-rock.jpg');
                $imgUrl = $article->thumbnail ? (str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : asset('storage/'.$article->thumbnail)) : $defaultImg;
            @endphp

            <article class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition duration-300 flex flex-col justify-between group">
                <div>
                    {{-- Thumbnail image container --}}
                    <div class="relative h-52 overflow-hidden bg-slate-900">
                        <img loading="lazy" src="{{ $imgUrl }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 rounded-full bg-slate-950/80 backdrop-blur-md text-emerald-400 text-[11px] font-bold">
                                {{ $article->category->name ?? 'General' }}
                            </span>
                        </div>
                        <button onclick="toggleBookmark({{ $article->id }}, 'article', this)"
                                class="absolute top-3 right-3 w-8 h-8 rounded-full bg-slate-950/80 backdrop-blur-md text-slate-300 hover:text-emerald-400 flex items-center justify-center transition shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                        </button>
                    </div>

                    {{-- Body --}}
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-400 mb-2">
                            <span>{{ optional($article->published_at)->format('d M Y') ?? 'Recent' }}</span>
                            <span>•</span>
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                {{ $readTime }} min read
                            </span>
                        </div>

                        <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition line-clamp-2 leading-snug">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2.5 leading-relaxed line-clamp-3">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        {{ number_format($article->views) }} views
                    </span>
                    <a href="{{ route('articles.show', $article->slug) }}" class="font-bold text-emerald-600 dark:text-emerald-400 group-hover:underline flex items-center gap-1">
                        Read →
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $articles->withQueryString()->links() }}
        </div>
        @else
        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-16 text-center">
            <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400 mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">No Articles Found</h2>
            <p class="text-slate-400 text-sm mt-2 max-w-md mx-auto">No articles matched your current search or category filter. Try clearing filters to view all content.</p>
            <a href="{{ route('articles') }}" class="inline-block mt-6 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl text-xs font-bold transition">
                Clear Filters
            </a>
        </div>
        @endif

    </div>
</section>

@endsection