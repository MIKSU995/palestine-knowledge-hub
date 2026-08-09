@extends('layouts.app')

@section('title', 'My Bookmarks | Palestine Knowledge Hub')

@section('content')

{{-- Hero --}}
<section class="bg-slate-900 text-white py-14 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <span class="px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 font-bold text-xs uppercase tracking-wider">🔖 Saved Content</span>
        <h1 class="text-4xl font-extrabold mt-3">My Bookmarks</h1>
        <p class="text-slate-400 mt-2 text-base">Your personally saved articles and resources for quick access.</p>
    </div>
</section>

<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-5xl mx-auto px-6 lg:px-8">

        @guest
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-24 h-24 rounded-3xl bg-emerald-100 dark:bg-emerald-950/50 flex items-center justify-center text-5xl mb-6">🔖</div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Sign In to View Your Bookmarks</h2>
            <p class="text-slate-500 dark:text-slate-400 max-w-md leading-relaxed mb-8">
                Create a free account to save articles, resources, and timeline events for later reading. Your bookmarks sync across all devices.
            </p>
            <div class="flex gap-3">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-sm transition">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="px-6 py-3 border border-slate-300 dark:border-slate-600 hover:border-emerald-500 text-slate-700 dark:text-slate-300 hover:text-emerald-600 rounded-2xl font-bold text-sm transition">
                    Create Account
                </a>
            </div>
        </div>
        @endguest

        @auth
        @if($bookmarks->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-24 h-24 rounded-3xl bg-slate-200 dark:bg-slate-800 flex items-center justify-center text-5xl mb-6">🔖</div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">No Bookmarks Yet</h2>
            <p class="text-slate-500 dark:text-slate-400 max-w-md leading-relaxed mb-8">
                Start exploring articles and resources. Click the bookmark icon on any article or resource to save it here for easy access.
            </p>
            <a href="{{ route('articles') }}" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-sm transition">
                Browse Articles
            </a>
        </div>
        @else

        {{-- Bookmark Count --}}
        <div class="flex items-center justify-between mb-8">
            <p class="text-slate-600 dark:text-slate-400 text-sm font-medium">
                {{ $bookmarks->count() }} saved {{ Str::plural('item', $bookmarks->count()) }}
            </p>
        </div>

        <div class="space-y-4">
            @foreach($bookmarks as $bookmark)
            @php $item = $bookmark->bookmarkable; @endphp
            @if($item)
            @php
                $isArticle = $bookmark->bookmarkable_type === 'App\Models\Article';
                $isResource = $bookmark->bookmarkable_type === 'App\Models\Resource' || $bookmark->bookmarkable_type === 'App\Models\EducationalResource';
            @endphp
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-5 flex items-start gap-4 shadow-sm hover:shadow-md hover:border-emerald-500/40 transition duration-200">

                {{-- Thumbnail / Icon --}}
                <div class="flex-shrink-0 w-20 h-20 rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                    @if($isArticle && $item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                    @elseif($isResource)
                        <div class="text-3xl">📚</div>
                    @else
                        <div class="text-3xl">📄</div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <span class="text-xs font-semibold {{ $isArticle ? 'text-emerald-600 dark:text-emerald-400' : 'text-blue-600 dark:text-blue-400' }}">
                                {{ $isArticle ? '📰 Article' : '📚 Resource' }}
                            </span>
                            <h3 class="font-bold text-slate-900 dark:text-white mt-0.5 leading-snug">
                                @if($isArticle)
                                <a href="{{ route('articles.show', $item->slug) }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                                    {{ $item->title }}
                                </a>
                                @else
                                <span>{{ $item->title }}</span>
                                @endif
                            </h3>
                            @if(isset($item->excerpt) && $item->excerpt)
                            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1.5 leading-relaxed line-clamp-2">{{ $item->excerpt }}</p>
                            @elseif(isset($item->description) && $item->description)
                            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1.5 leading-relaxed line-clamp-2">{{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-4 mt-3 text-xs text-slate-400">
                        <span>Saved {{ $bookmark->created_at->diffForHumans() }}</span>
                        @if($isArticle)
                        <a href="{{ route('articles.show', $item->slug) }}" class="font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                            Read Article →
                        </a>
                        @elseif($isResource)
                        <a href="{{ route('resources.download', $item->id) }}" class="font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                            Access Resource →
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif
        @endauth

    </div>
</section>

@endsection
