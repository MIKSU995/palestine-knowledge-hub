@extends('layouts.app')

@section('title', 'Articles')

@section('content')

@php
    $keyword = request('search');
@endphp

{{-- ================= HERO ================= --}}
<section class="bg-gradient-to-r from-green-700 to-emerald-500 py-20">

    <div class="max-w-7xl mx-auto px-6 text-center text-white">

        <h1 class="text-5xl font-bold">
            Explore Palestine Articles
        </h1>

        <p class="mt-5 text-xl text-green-100">
            Discover history, culture, humanitarian issues and authentic educational resources.
        </p>

    </div>

</section>

{{-- ================= ARTICLE SECTION ================= --}}
<section id="article-list" class="py-16 bg-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-10">

            <div>

                <h2 class="text-4xl font-bold text-gray-800">
                    Latest Articles
                </h2>

                <p class="text-gray-500 mt-2">
                    {{ $articles->total() }} article(s) available
                </p>

            </div>

        </div>

    <!-- SEARCH -->
<form action="{{ route('articles') }}" method="GET">

    <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search articles..."
            class="flex-1 px-6 py-4 outline-none">

        @if(request('category'))
            <input
                type="hidden"
                name="category"
                value="{{ request('category') }}">
        @endif

        <button
            type="submit"
            class="bg-green-600 hover:bg-green-700 transition text-white px-8">

            Search

        </button>

    </div>

</form>

<div class="flex flex-wrap gap-3 mt-8">

    <a href="{{ route('articles') }}"
       class="px-5 py-2 rounded-full transition
       {{ request('category') ? 'bg-white shadow hover:bg-green-600 hover:text-white' : 'bg-green-600 text-white' }}">

        All

    </a>

    @foreach($categories as $category)

        <a
            href="{{ route('articles',[
                'category'=>$category->id,
                'search'=>request('search')
            ]) }}"
            class="px-5 py-2 rounded-full transition
            {{ request('category') == $category->id
                ? 'bg-green-600 text-white'
                : 'bg-white shadow hover:bg-green-600 hover:text-white' }}">

            {{ $category->name }}

        </a>

    @endforeach

</div>

@if($featured && !request()->filled('search') && !request()->filled('category'))

<div class="mt-16 bg-white rounded-3xl shadow-xl overflow-hidden lg:flex">

    @if($featured->thumbnail)

        <img
            loading="lazy"
            src="{{ asset('storage/'.$featured->thumbnail) }}"
            alt="{{ $featured->title }}"
            class="lg:w-1/2 w-full h-[400px] object-cover">

    @endif

    <div class="p-10 flex flex-col justify-center">

        <span class="text-green-600 font-semibold uppercase tracking-wider">

            Featured Article

        </span>

        <h2 class="text-4xl font-bold mt-4">

            {{ $featured->title }}

        </h2>

        <p class="mt-5 text-gray-600 leading-8">

            {{ \Illuminate\Support\Str::limit($featured->excerpt, 220) }}

        </p>

        <div class="mt-6 flex items-center gap-4 text-sm text-gray-500">

            <span>{{ optional($featured->published_at)->format('d M Y') }}</span>

            <span>•</span>

            <span>{{ number_format($featured->views) }} views</span>

        </div>

        <a
            href="{{ route('articles.show',$featured->slug) }}"
            class="mt-8 inline-flex w-fit bg-green-600 hover:bg-green-700 transition text-white px-8 py-4 rounded-xl">

            Read Article →

        </a>

    </div>

</div>

@endif

        {{-- ARTICLE GRID --}}
        @if($articles->count())

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($articles as $article)

            @php
            $readingTime = max(1, ceil(str_word_count(strip_tags($article->content)) / 200));
        @endphp

            <article
                class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                {{-- Thumbnail --}}
                @if($article->thumbnail)

                    <img
                        loading="lazy"
                        src="{{ asset('storage/'.$article->thumbnail) }}"
                        alt="{{ $article->title }}"
                        class="w-full h-56 object-cover">

                @else

                    <img
                        src="https://placehold.co/600x400?text=No+Image"
                        alt="No Image"
                        class="w-full h-56 object-cover">

                @endif

                {{-- Body --}}
                <div class="p-6">

                    <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">

                        {{ $article->category->name }}

                    </span>

                    <h3 class="mt-4 text-2xl font-bold text-gray-800 line-clamp-2">

                    {!! $keyword
                    ? str_ireplace(
                    $keyword,
                    '<mark class="bg-yellow-300 rounded px-1">'.$keyword.'</mark>',
                    e($article->title)
                    )
                : e($article->title)
                !!}

                </h3>

                <p class="mt-4 text-gray-600 line-clamp-3">

                {!! $keyword
                ? str_ireplace(
                $keyword,
                '<mark class="bg-yellow-300">'.$keyword.'</mark>',
                e(Str::limit($article->excerpt,140))
                )
                : e(Str::limit($article->excerpt,140))
                !!}

                </p>

                    <div class="mt-6 flex flex-wrap items-center gap-3 text-sm text-gray-500">

                    <span>
                    {{ optional($article->published_at)->format('d M Y') }}
                </span>

                 <span>•</span>

                    <span>
                     👁 {{ number_format($article->views) }}
                </span>

                <span>•</span>

                <span>
                 📖 {{ $readingTime }} min read
              </span>

             </div>

            </article>

            @endforeach

        </div>

        {{-- Pagination --}}
        <div class="mt-12">

            {{ $articles->withQueryString()->links() }}

        </div>

        @else

        <div class="bg-white rounded-3xl shadow-md p-20 text-center">

            <h2 class="text-3xl font-bold text-gray-800">

                No Articles Found

            </h2>

            <p class="mt-4 text-gray-500">

                No articles match your search.

            </p>

            <a
                href="{{ route('articles') }}"
                class="inline-block mt-8 bg-green-600 text-white px-8 py-3 rounded-xl hover:bg-green-700 transition">

                View All Articles

            </a>

        </div>

        @endif

    </div>

</section>

@if(request()->has('search') || request()->has('category'))

<script>
window.addEventListener('load', function () {
    document.getElementById('article-list').scrollIntoView({
        behavior: 'smooth'
    });
});
</script>

@endif

@endsection