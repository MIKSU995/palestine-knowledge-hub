@extends('layouts.app')

@section('title', 'Educational Resources - Books, PDFs & Documents | Palestine Knowledge Hub')
@section('meta_description', 'Download and access curated educational resources, PDFs, books, reports, and documentary links about Palestinian history, culture, and current affairs.')

@section('content')

{{-- Hero --}}
<section class="bg-slate-900 text-white py-16 border-b border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_80%_50%,#3b82f6,transparent_60%)]"></div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
        <span class="px-3.5 py-1.5 rounded-full bg-blue-500/20 text-blue-300 font-bold text-xs uppercase tracking-wider">
            Open Educational Resources
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
            Educational Resources
        </h1>
        <p class="mt-4 text-slate-300 text-lg max-w-2xl leading-relaxed">
            Access a curated library of books, PDFs, academic reports, documentary links, and multimedia resources about Palestine — all freely available.
        </p>
    </div>
</section>

{{-- Filter Bar --}}
<section class="sticky top-0 z-40 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border-b border-slate-200 dark:border-slate-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 flex flex-wrap gap-3 items-center justify-between">
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('resources') }}"
               class="px-4 py-1.5 rounded-full text-sm font-semibold border transition {{ !request('type') ? 'bg-slate-900 dark:bg-white text-white dark:text-slate-900 border-slate-900 dark:border-white' : 'border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:border-blue-500 hover:text-blue-600' }}">
                All Types
            </a>
            @foreach(['pdf', 'video', 'book', 'journal', 'report', 'documentary', 'infographic'] as $type)
            <a href="{{ route('resources', ['type' => $type]) }}"
               class="px-4 py-1.5 rounded-full text-sm font-semibold border transition {{ request('type') === $type ? 'bg-blue-600 text-white border-blue-600' : 'border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:border-blue-500 hover:text-blue-600' }}">
                {{ match($type) {
                    'pdf' => 'PDF',
                    'video' => 'Video',
                    'book' => 'Book',
                    'journal' => 'Journal',
                    'report' => 'Report',
                    'documentary' => 'Documentary',
                    'infographic' => 'Infographic',
                    default => ucfirst($type)
                } }}
            </a>
            @endforeach
        </div>
        <form method="GET" action="{{ route('resources') }}" class="flex gap-2">
            @if(request('type'))<input type="hidden" name="type" value="{{ request('type') }}">@endif
            <div class="relative">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search resources..."
                       class="pl-9 pr-4 py-2 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm text-slate-800 dark:text-slate-100 outline-none focus:ring-2 focus:ring-blue-500 w-52">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-semibold transition">
                Search
            </button>
        </form>
    </div>
</section>

{{-- Resources Grid --}}
<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        @if($resources->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-20 h-20 rounded-3xl bg-blue-100 dark:bg-blue-950/50 flex items-center justify-center text-slate-400 mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Resources Coming Soon</h2>
            <p class="text-slate-500 dark:text-slate-400 max-w-md leading-relaxed">
                Our educational library is being curated with high-quality resources about Palestinian history and culture. Check back soon.
            </p>
        </div>
        @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($resources as $resource)
            @php
                $typeConfig = [
                    'pdf' => ['color' => 'bg-red-100 dark:bg-red-950/60 text-red-700 dark:text-red-300', 'label' => 'PDF Document'],
                    'video' => ['color' => 'bg-blue-100 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300', 'label' => 'Video'],
                    'book' => ['color' => 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300', 'label' => 'Book'],
                    'journal' => ['color' => 'bg-purple-100 dark:bg-purple-950/60 text-purple-700 dark:text-purple-300', 'label' => 'Academic Journal'],
                    'report' => ['color' => 'bg-cyan-100 dark:bg-cyan-950/60 text-cyan-700 dark:text-cyan-300', 'label' => 'Report'],
                    'documentary' => ['color' => 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300', 'label' => 'Documentary'],
                    'infographic' => ['color' => 'bg-emerald-100 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300', 'label' => 'Infographic'],
                ];
                $config = $typeConfig[$resource->type ?? 'pdf'] ?? $typeConfig['pdf'];
            @endphp
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl hover:border-blue-500/40 transition duration-300 flex flex-col group">
                {{-- Header / Icon --}}
                <div class="h-36 bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-900 flex items-center justify-center relative">
                    @if($resource->thumbnail)
                    <img src="{{ asset('storage/' . $resource->thumbnail) }}" alt="{{ $resource->title }}" class="w-full h-full object-cover absolute inset-0">
                    @endif
                    <div class="z-10 group-hover:scale-110 transition duration-300 text-blue-600 dark:text-blue-400">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-bold px-2.5 py-1 rounded-lg {{ $config['color'] }}">{{ $config['label'] }}</span>
                        @if($resource->category)
                        <span class="text-xs text-slate-400 dark:text-slate-500">{{ $resource->category->name }}</span>
                        @endif
                    </div>
                    <h3 class="font-bold text-slate-900 dark:text-white text-base leading-snug group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                        {{ $resource->title }}
                    </h3>
                    @if($resource->description)
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-2 leading-relaxed line-clamp-2 flex-1">{{ $resource->description }}</p>
                    @endif

                    <div class="flex items-center gap-3 mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 text-xs text-slate-400">
                        @if($resource->author)
                        <span>{{ $resource->author }}</span>
                        @endif
                        @if($resource->year)
                        <span>{{ $resource->year }}</span>
                        @endif
                        @if($resource->file_size)
                        <span>{{ $resource->file_size }}</span>
                        @endif
                        @if($resource->downloads_count)
                        <span class="ml-auto flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            {{ number_format($resource->downloads_count) }}
                        </span>
                        @endif
                    </div>

                    <a href="{{ route('resources.download', $resource->id) }}"
                       class="mt-4 w-full text-center py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold text-sm transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        @if($resource->external_url)
                            Access Resource
                        @else
                            Download
                        @endif
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10">{{ $resources->links() }}</div>
        @endif

    </div>
</section>

@endsection
