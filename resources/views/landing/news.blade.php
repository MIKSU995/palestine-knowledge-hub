@extends('layouts.app')

@section('title', 'Pusat Berita Terkini Palestina - Real-Time Updates | Palestine Knowledge Hub')

@section('content')

<!-- Header Banner -->
<section class="bg-slate-900 text-white py-16 sm:py-20 border-b border-slate-800 relative overflow-hidden">
    <!-- Ambient glow -->
    <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-red-600/8 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-rose-600/6 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-600/15 border border-rose-500/30 text-rose-400 text-xs font-bold uppercase tracking-wider mb-5">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                Integrasi Instagram @thepalestinecircle & Berita Real-Time
            </div>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                Pusat Berita Terkini & <br class="hidden sm:block">Live Gaza Update
            </h1>
            <p class="mt-5 text-slate-300/80 text-lg leading-relaxed max-w-2xl">
                Aliran update langsung dari Instagram <a href="https://www.instagram.com/thepalestinecircle/" target="_blank" class="text-rose-400 font-semibold hover:text-rose-300 transition">@thepalestinecircle</a>, laporan kemanusiaan, dan agregasi berita terverifikasi dari media nasional & internasional.
            </p>
        </div>
    </div>
</section>

<!-- The Gaza Update Instagram Live Feed Section -->
@include('landing.sections.gaza-update-section')


<!-- Filter & Search Section -->
<section class="py-12 sm:py-16 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('news.index') }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ !request('category') || request('category') == 'All' ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800 hover:shadow-sm' }}">
                    Semua Berita
                </a>
                <a href="{{ route('news.index', ['category' => 'Berita Indonesia', 'search' => request('search')]) }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-1.5 {{ request('category') == 'Berita Indonesia' ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800 hover:shadow-sm' }}">
                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                    <span>Indonesia</span>
                </a>
                <a href="{{ route('news.index', ['category' => 'Berita Internasional', 'search' => request('search')]) }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-1.5 {{ request('category') == 'Berita Internasional' ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800 hover:shadow-sm' }}">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Internasional</span>
                </a>
                @foreach($categories as $cat)
                @if(!in_array($cat, ['Berita Indonesia', 'Berita Internasional']))
                <a href="{{ route('news.index', ['category' => $cat, 'search' => request('search')]) }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ request('category') == $cat ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800 hover:shadow-sm' }}">
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
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..." class="pl-10 pr-4 py-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-sm text-slate-900 dark:text-white placeholder-slate-400 outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/20 w-60 transition-all duration-200">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <button type="submit" class="px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold text-sm transition-all duration-200 shadow-md hover:shadow-lg">
                        Cari
                    </button>
                </form>

                <a href="{{ route('news.index', ['refresh' => 1]) }}" class="p-2.5 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-300 dark:hover:bg-slate-700 transition-all duration-200 shadow-sm" title="Refresh Live API Feed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </a>
            </div>

        </div>

        <!-- News Grid -->
        @if($newsList->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($newsList as $index => $news)
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-400 flex flex-col justify-between group" style="animation: fadeInUp 0.5s ease {{ $index * 0.06 }}s both;">
                <div>
                    <!-- Meta Badge & Date -->
                    <div class="flex items-center justify-between gap-2 text-xs mb-4">
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full bg-red-100 dark:bg-red-950/60 text-red-800 dark:text-red-300 font-bold">
                                {{ $news->source }}
                            </span>
                            @if($news->category == 'Berita Indonesia')
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-red-500/10 text-red-700 dark:text-red-300 font-semibold text-[10px] border border-red-500/20"><span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>Indonesia</span>
                            @else
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-blue-500/10 text-blue-700 dark:text-blue-300 font-semibold text-[10px] border border-blue-500/20"><svg class="w-3 h-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Global</span>
                            @endif
                        </div>
                        <span class="text-slate-400 font-medium">
                            {{ optional($news->published_at)->diffForHumans() }}
                        </span>
                    </div>

                    <!-- News Title -->
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors duration-200 leading-snug">
                        <a href="{{ $news->url }}" target="_blank" rel="noopener">
                            {{ $news->title }}
                        </a>
                    </h2>

                    <!-- Summary -->
                    <p class="text-sm text-slate-600 dark:text-slate-300/80 mt-4 leading-relaxed line-clamp-4">
                        {{ $news->summary }}
                    </p>
                </div>

                <!-- Footer Link & Share -->
                <div class="mt-8 pt-4 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between">
                    <span class="text-xs text-slate-400">{{ $news->category }}</span>
                    <a href="{{ $news->url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-red-50 dark:bg-red-950/40 text-red-700 dark:text-red-300 font-bold text-xs hover:bg-red-100 dark:hover:bg-red-950/60 transition-all duration-200">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-14">
            {{ $newsList->withQueryString()->links() }}
        </div>
        @else
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-16 text-center border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center mx-auto mb-5">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white">Berita Tidak Ditemukan</h3>
            <p class="text-slate-500 mt-2 max-w-md mx-auto">Coba sesuaikan kata kunci pencarian atau klik refresh untuk sinkronisasi berita live API.</p>
            <a href="{{ route('news.index', ['refresh' => 1]) }}" class="inline-flex items-center gap-2 mt-6 px-6 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold transition-all duration-200 shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Sync Berita Terbaru
            </a>
        </div>
        @endif

    </div>
</section>

@push('styles')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(16px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@endsection
