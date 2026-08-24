@extends('layouts.app')

@section('title', 'Pusat Berita Terkini Palestina - Real-Time Updates | Palestine Knowledge Hub')

@section('content')

<!-- Header Banner -->
<section class="bg-slate-900 text-white py-16 border-b border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-600/20 border border-emerald-500/40 text-emerald-400 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                Integrasi Berita Real-Time
            </div>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">
                Pusat Berita Terkini Palestina
            </h1>
            <p class="mt-4 text-slate-300 text-lg leading-relaxed">
                Dapatkan berita terkini, laporan internasional, dan dokumentasi kemanusiaan yang terintegrasi secara langsung dari sumber API berita terverifikasi.
            </p>
        </div>
    </div>
</section>


<!-- Filter & Search Section -->
<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('news.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ !request('category') || request('category') == 'All' ? 'bg-emerald-600 text-white shadow-md' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Semua Berita (All)
                </a>
                <a href="{{ route('news.index', ['category' => 'Berita Indonesia', 'search' => request('search')]) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-1.5 {{ request('category') == 'Berita Indonesia' ? 'bg-emerald-600 text-white shadow-md' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    <span>🇮🇩 Berita Indonesia</span>
                </a>
                <a href="{{ route('news.index', ['category' => 'Berita Internasional', 'search' => request('search')]) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-1.5 {{ request('category') == 'Berita Internasional' ? 'bg-emerald-600 text-white shadow-md' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    <span>🌐 Berita Internasional</span>
                </a>
                @foreach($categories as $cat)
                @if(!in_array($cat, ['Berita Indonesia', 'Berita Internasional']))
                <a href="{{ route('news.index', ['category' => $cat, 'search' => request('search')]) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('category') == $cat ? 'bg-emerald-600 text-white shadow-md' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    {{ $cat }}
                </a>
                @endif
                @endforeach
            </div>

            <!-- Search & Refresh Form -->
            <div class="flex items-center gap-3">
                <form action="{{ route('news.index') }}" method="GET" class="flex items-center gap-2">
                    @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search live news..." class="pl-10 pr-4 py-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-sm text-slate-900 dark:text-white placeholder-slate-400 outline-none focus:border-emerald-500 w-60">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <button type="submit" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">
                        Search
                    </button>
                </form>

                <a href="{{ route('news.index', ['refresh' => 1]) }}" class="p-2.5 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-300 dark:hover:bg-slate-700 transition" title="Refresh Live API Feed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </a>
            </div>

        </div>

        <!-- News Grid -->
        @if($newsList->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($newsList as $news)
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Meta Badge & Date -->
                    <div class="flex items-center justify-between gap-2 text-xs mb-4">
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-800 dark:text-emerald-300 font-bold">
                                {{ $news->source }}
                            </span>
                            @if($news->category == 'Berita Indonesia')
                            <span class="px-2 py-0.5 rounded-md bg-red-100 dark:bg-red-950/80 text-red-700 dark:text-red-300 font-bold text-[10px]">🇮🇩 Indonesia</span>
                            @else
                            <span class="px-2 py-0.5 rounded-md bg-blue-100 dark:bg-blue-950/80 text-blue-700 dark:text-blue-300 font-bold text-[10px]">🌐 Global</span>
                            @endif
                        </div>
                        <span class="text-slate-400 font-medium">
                            {{ optional($news->published_at)->diffForHumans() }}
                        </span>
                    </div>

                    <!-- News Title -->
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition leading-snug">
                        <a href="{{ $news->url }}" target="_blank" rel="noopener">
                            {{ $news->title }}
                        </a>
                    </h2>

                    <!-- Summary -->
                    <p class="text-sm text-slate-600 dark:text-slate-300 mt-4 leading-relaxed line-clamp-4">
                        {{ $news->summary }}
                    </p>
                </div>

                <!-- Footer Link & Share -->
                <div class="mt-8 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                    <span class="text-xs text-slate-400">Category: {{ $news->category }}</span>
                    <a href="{{ $news->url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 font-bold text-xs hover:bg-emerald-100 transition">
                        <span>Read Full Story</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $newsList->withQueryString()->links() }}
        </div>
        @else
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-16 text-center border border-slate-200 dark:border-slate-800">
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white">No News Found</h3>
            <p class="text-slate-500 mt-2">Try adjusting your search keywords or click refresh to sync live API news.</p>
            <a href="{{ route('news.index', ['refresh' => 1]) }}" class="inline-block mt-6 px-6 py-3 rounded-xl bg-emerald-600 text-white font-bold">
                Sync Live API News
            </a>
        </div>
        @endif

    </div>
</section>

@endsection
