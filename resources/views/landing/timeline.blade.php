@extends('layouts.app')

@section('title', 'Historical Timeline of Palestine - 1917 to Present')

@section('content')

<!-- Header -->
<section class="bg-slate-900 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="px-3.5 py-1.5 rounded-full bg-amber-500/20 text-amber-300 font-bold text-xs uppercase tracking-wider">
                Chronological History
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
                Historical Timeline of Palestine
            </h1>
            <p class="mt-4 text-slate-300 text-lg leading-relaxed">
                An authentic chronological documentation of key political, social, cultural, and legal developments shaping Palestine from the early 20th century to modern times.
            </p>
        </div>
    </div>
</section>

<!-- Timeline Main Section -->
<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Era Filter & Search Bar -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('timeline') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ !request('era') || request('era') == 'All' ? 'bg-amber-600 text-white shadow-md' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800' }}">
                    All Eras
                </a>
                @foreach($eras as $e)
                <a href="{{ route('timeline', ['era' => $e, 'search' => request('search')]) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('era') == $e ? 'bg-amber-600 text-white shadow-md' : 'bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800' }}">
                    {{ $e }}
                </a>
                @endforeach
            </div>

            <form action="{{ route('timeline') }}" method="GET" class="flex items-center gap-2">
                @if(request('era'))
                <input type="hidden" name="era" value="{{ request('era') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search historical events..." class="px-4 py-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-sm text-slate-900 dark:text-white placeholder-slate-400 outline-none focus:border-amber-500 w-64">
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-semibold text-sm transition">
                    Search
                </button>
            </form>
        </div>

        <!-- Vertical Interactive Timeline Grid -->
        @if(count($events) > 0)
        <div class="relative border-l-2 border-amber-500/40 ml-4 md:ml-32 space-y-12 py-4">

            @foreach($events as $event)
            <div id="event-{{ $event->id }}" class="relative pl-8 md:pl-12 group">

                <!-- Timeline Year Badge on Left -->
                <div class="absolute -left-3 md:-left-28 top-0 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-amber-500 border-4 border-slate-50 dark:border-slate-950 flex items-center justify-center"></span>
                    <span class="hidden md:inline font-extrabold text-xl text-amber-600 dark:text-amber-400">{{ $event->year }}</span>
                </div>

                <!-- Event Card -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:border-amber-500/60 transition duration-300">
                    <div class="flex flex-wrap items-center justify-between gap-3 text-xs mb-3">
                        <span class="px-3 py-1 rounded-full bg-amber-100 dark:bg-amber-950 text-amber-800 dark:text-amber-300 font-bold">
                            {{ $event->era }}
                        </span>
                        <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400 font-medium">
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $event->location ?? 'Palestine' }}
                            </span>
                            <span>•</span>
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $event->date_display ?? $event->year }}
                            </span>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition">
                        {{ $event->title }}
                    </h2>

                    @if($event->image_url)
                    <div class="my-4 rounded-2xl overflow-hidden h-72 bg-slate-200 dark:bg-slate-800 shadow-md">
                        <img src="{{ \Illuminate\Support\Str::startsWith($event->image_url, 'http') ? $event->image_url : asset($event->image_url) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    @endif

                    <p class="text-slate-600 dark:text-slate-300 text-base leading-relaxed mt-4">
                        {{ $event->description }}
                    </p>

                    @if($event->details)
                    <div class="mt-4 p-4 rounded-2xl bg-amber-50 dark:bg-slate-800/60 border border-amber-200 dark:border-slate-700/60 text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
                        <span class="font-bold text-amber-700 dark:text-amber-400 block mb-1">Historical Impact & Context:</span>
                        {{ $event->details }}
                    </div>
                    @endif
                </div>

            </div>
            @endforeach

        </div>
        @else
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-16 text-center border border-slate-200 dark:border-slate-800">
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white">No Timeline Events Found</h3>
            <p class="text-slate-500 mt-2">Try adjusting your era filter or search term.</p>
        </div>
        @endif

    </div>
</section>

@endsection