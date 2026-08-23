@extends('layouts.app')

@section('title', $article->title)

@section('content')

@php
    $readingTime = max(1, ceil(str_word_count(strip_tags($article->content))/200));
@endphp

{{-- ================= HERO ================= --}}

<section class="relative overflow-hidden bg-gradient-to-r from-green-800 via-green-700 to-emerald-600">

    <div class="absolute inset-0 bg-black/30"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-20">

        {{-- Breadcrumb --}}
        <nav class="text-green-100 text-sm mb-8">

            <a href="{{ route('home') }}" class="hover:text-white">
                Home
            </a>

            <span class="mx-2">/</span>

            <a href="{{ route('articles') }}" class="hover:text-white">
                Articles
            </a>

            <span class="mx-2">/</span>

            <span class="text-white">

                {{ $article->title }}

            </span>

        </nav>

        {{-- Category --}}
        <span class="inline-flex items-center px-5 py-2 rounded-full bg-white/20 backdrop-blur text-white font-medium">

            {{ $article->category->name }}

        </span>

        {{-- Title --}}
        <h1 class="mt-8 text-4xl lg:text-6xl font-extrabold text-white leading-tight max-w-5xl">

            {{ $article->title }}

        </h1>

        {{-- Meta --}}
        <div class="flex flex-wrap items-center gap-6 mt-10 text-green-100">

            <div class="flex items-center gap-2">

                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center font-bold">

                    {{ strtoupper(substr($article->user->name,0,1)) }}

                </div>

                <span>

                    {{ $article->user->name }}

                </span>

            </div>

            <span>

                {{ optional($article->published_at)->format('d F Y') }}

            </span>

            <span>

                👁 {{ number_format($article->views) }}

            </span>

            <span>

                📖 {{ $readingTime }} min read

            </span>

        </div>

    </div>

</section>

{{-- ================= CONTENT ================= --}}

<section class="bg-slate-100 py-16" style="background:#f1f5f9;">

<div class="max-w-7xl mx-auto px-6">

<div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

{{-- ================= MAIN CONTENT ================= --}}

<div class="lg:col-span-8">

<div class="bg-white rounded-3xl overflow-hidden shadow-xl" style="background:#ffffff; color:#1e293b;">

@if($article->thumbnail)

<div class="overflow-hidden">

<img
src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : (str_starts_with($article->thumbnail, 'images/') ? asset($article->thumbnail) : asset('storage/'.$article->thumbnail)) }}"
alt="{{ $article->title }}"
class="w-full h-[550px] object-cover hover:scale-105 duration-700">

</div>

@endif

<div class="p-10 lg:p-14" style="color:#1e293b;">

<div class="flex flex-wrap gap-3 mb-8">

<span class="px-4 py-2 rounded-full bg-green-100 text-green-700">

{{ $article->category->name }}

</span>

<span class="px-4 py-2 rounded-full bg-slate-100">

{{ optional($article->published_at)->format('d M Y') }}

</span>

</div>

<h2 class="text-4xl font-bold text-slate-800 leading-tight">

{{ $article->title }}

</h2>

<div class="mt-6 flex flex-wrap gap-5 text-gray-500 text-sm">

<span>

By <strong>{{ $article->user->name }}</strong>

</span>

<span>

👁 {{ number_format($article->views) }} Views

</span>

<span>

📖 {{ $readingTime }} min read

</span>

</div>

<hr class="my-10">

<div class="prose prose-lg lg:prose-xl max-w-none prose-headings:text-slate-800 prose-p:text-gray-700 prose-p:leading-9 prose-img:rounded-2xl" style="color:#374151; max-width:none;">

    <div style="color:#374151; font-size:1.125rem; line-height:1.9; font-family:inherit;">{!! nl2br(e($article->content)) !!}</div>

</div>

<hr class="my-10">

<div class="flex flex-wrap gap-3">

<span class="font-semibold">

Tags :

</span>

<a href="#"
class="px-4 py-2 rounded-full bg-green-100 text-green-700 hover:bg-green-600 hover:text-white transition">

{{ $article->category->name }}

</a>

</div>

</div>

</div>

</div>

{{-- ================= SIDEBAR ================= --}}

<div class="lg:col-span-4">

<div class="sticky top-28 space-y-8">

{{-- ================= POPULAR ARTICLES ================= --}}

<div class="bg-white rounded-3xl shadow-xl p-8" style="background:#ffffff; color:#1e293b;">

    <div class="flex items-center justify-between mb-6">

        <h3 class="text-2xl font-bold text-slate-800">

            Popular Articles

        </h3>

        <span class="text-sm text-green-600 font-semibold">

            Trending

        </span>

    </div>

    @forelse($popularArticles as $popular)

        <a href="{{ route('articles.show',$popular->slug) }}"
           class="group flex gap-4 py-5 border-b last:border-none hover:bg-slate-50 rounded-xl transition px-2">

            @if($popular->thumbnail)

                <img
                    src="{{ str_starts_with($popular->thumbnail, 'http') ? $popular->thumbnail : (str_starts_with($popular->thumbnail, 'images/') ? asset($popular->thumbnail) : asset('storage/'.$popular->thumbnail)) }}"
                    class="w-24 h-20 rounded-xl object-cover group-hover:scale-105 duration-300">

            @endif

            <div class="flex-1">

                <h4 class="font-semibold text-slate-800 group-hover:text-green-600 transition">

                    {{ $popular->title }}

                </h4>

                <div class="flex items-center gap-4 mt-2 text-xs text-gray-500">

                    <span>

                        {{ optional($popular->published_at)->format('d M Y') }}

                    </span>

                    <span>

                        👁 {{ number_format($popular->views) }}

                    </span>

                </div>

            </div>

        </a>

    @empty

        <p class="text-gray-500">

            No popular articles.

        </p>

    @endforelse

</div>

{{-- ================= CATEGORIES ================= --}}

<div class="bg-white rounded-3xl shadow-xl p-8" style="background:#ffffff; color:#1e293b;">

    <h3 class="text-2xl font-bold text-slate-800 mb-6">

        Categories

    </h3>

    <div class="flex flex-wrap gap-3">

        @foreach($categories as $category)

            <a href="{{ route('articles',['category'=>$category->id]) }}"

               class="px-5 py-3 rounded-full
               bg-green-100
               text-green-700
               font-medium
               hover:bg-green-600
               hover:text-white
               hover:scale-105
               duration-300">

                {{ $category->name }}

            </a>

        @endforeach

    </div>

</div>

{{-- ================= SHARE ================= --}}

<div class="bg-white rounded-3xl shadow-xl p-8" style="background:#ffffff; color:#1e293b;">

    <h3 class="text-2xl font-bold text-slate-800 mb-6">

        Share Article

    </h3>

    <div class="space-y-4">

        <a target="_blank"
           href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}"
           class="flex items-center justify-center gap-3 py-4 rounded-xl bg-green-500 text-white hover:bg-green-600 duration-300">

            <span class="text-xl">🟢</span>

            WhatsApp

        </a>

        <a target="_blank"
           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
           class="flex items-center justify-center gap-3 py-4 rounded-xl bg-blue-600 text-white hover:bg-blue-700 duration-300">

            <span class="text-xl">🔵</span>

            Facebook

        </a>

        <a target="_blank"
           href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
           class="flex items-center justify-center gap-3 py-4 rounded-xl bg-black text-white hover:bg-slate-800 duration-300">

            <span class="text-xl">⚫</span>

            X (Twitter)

        </a>

        <a target="_blank"
           href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}"
           class="flex items-center justify-center gap-3 py-4 rounded-xl bg-sky-500 text-white hover:bg-sky-600 duration-300">

            <span class="text-xl">🔷</span>

            Telegram

        </a>

    </div>

</div>

{{-- ================= QUICK INFO ================= --}}

<div class="bg-gradient-to-br from-green-700 to-emerald-600 rounded-3xl text-white p-8">

    <h3 class="text-2xl font-bold">

        Palestine Hub

    </h3>

    <p class="mt-4 text-green-100 leading-7">

        Learn history, geography and humanitarian issues through trusted educational content.

    </p>

    <div class="grid grid-cols-2 gap-4 mt-8">

        <div class="bg-white/10 rounded-xl p-4">

            <div class="text-3xl font-bold">

                {{ number_format($article->views) }}

            </div>

            <div class="text-sm text-green-100">

                Views

            </div>

        </div>

        <div class="bg-white/10 rounded-xl p-4">

            <div class="text-3xl font-bold">

                {{ $readingTime }}

            </div>

            <div class="text-sm text-green-100">

                Min Read

            </div>

        </div>

    </div>

</div>

</div>

</div>

</div>

</div>

</section>

{{-- ================= PREVIOUS & NEXT ================= --}}

@if($previousArticle || $nextArticle)

<section class="bg-slate-100 pb-12" style="background:#f1f5f9;">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Previous --}}
            @if($previousArticle)

            <a href="{{ route('articles.show',$previousArticle->slug) }}"
               class="group bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition" style="background:#ffffff; color:#1e293b; display:block;">

                <p class="text-sm text-gray-500">

                    ← Previous Article

                </p>

                <h3 class="text-2xl font-bold mt-3 group-hover:text-green-600">

                    {{ $previousArticle->title }}

                </h3>

            </a>

            @else

            <div></div>

            @endif


            {{-- Next --}}
            @if($nextArticle)

            <a href="{{ route('articles.show',$nextArticle->slug) }}"
               class="group bg-white rounded-3xl shadow-lg p-8 text-right hover:shadow-2xl transition" style="background:#ffffff; color:#1e293b; display:block;">

                <p class="text-sm text-gray-500">

                    Next Article →

                </p>

                <h3 class="text-2xl font-bold mt-3 group-hover:text-green-600">

                    {{ $nextArticle->title }}

                </h3>

            </a>

            @endif

        </div>

    </div>

</section>

@endif


{{-- ================= AUTHOR ================= --}}

<section class="bg-slate-100 pb-16">

<div class="max-w-7xl mx-auto px-6">

<div class="bg-white rounded-3xl shadow-xl p-10" style="background:#ffffff; color:#1e293b;">

<div class="flex items-center gap-6">

<div
class="w-20 h-20 rounded-full bg-green-600 text-white flex items-center justify-center text-3xl font-bold">

{{ strtoupper(substr($article->user->name,0,1)) }}

</div>

<div>

<h3 class="text-3xl font-bold">

{{ $article->user->name }}

</h3>

<p class="text-gray-500 mt-2">

Content Writer • Palestine Knowledge Hub

</p>

</div>

</div>

<p class="mt-8 text-gray-700 leading-8">

This article is part of Palestine Knowledge Hub,
an educational platform dedicated to preserving
the history, culture, geography and identity of
Palestine through trusted educational resources.

</p>

</div>

</div>

</section>


{{-- ================= RELATED ARTICLES ================= --}}

<section class="bg-slate-100 pb-24" style="background:#f1f5f9;">

<div class="max-w-7xl mx-auto px-6">

<div class="flex items-center justify-between mb-10">

<h2 class="text-4xl font-bold" style="color:#1e293b;">

Related Articles

</h2>

<a
href="{{ route('articles') }}"
class="text-green-600 font-semibold">

View All →

</a>

</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

@forelse($relatedArticles as $related)

<div
class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2" style="background:#ffffff; color:#1e293b;">

@if($related->thumbnail)

<div class="overflow-hidden">

<img
src="{{ str_starts_with($related->thumbnail, 'http') ? $related->thumbnail : (str_starts_with($related->thumbnail, 'images/') ? asset($related->thumbnail) : asset('storage/'.$related->thumbnail)) }}"
class="w-full h-56 object-cover group-hover:scale-110 duration-500">

</div>

@endif

<div class="p-6">

<span
class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

{{ $related->category->name }}

</span>

<h3
class="text-2xl font-bold mt-4" style="color:#1e293b;">

{{ $related->title }}

</h3>

<p
class="mt-4 text-gray-600 leading-7">

{{ \Illuminate\Support\Str::limit($related->excerpt,120) }}

</p>

<a
href="{{ route('articles.show',$related->slug) }}"
class="inline-flex mt-6 text-green-600 font-semibold">

Read More →

</a>

</div>

</div>

@empty

<div class="col-span-3">

<div class="bg-white rounded-3xl shadow-lg p-16 text-center" style="background:#ffffff; color:#1e293b;">

<h3 class="text-2xl font-bold">

No Related Articles

</h3>

<p class="mt-4 text-gray-500">

More articles will appear here soon.

</p>

</div>

</div>

@endforelse

</div>

</div>

</section>


{{-- ================= CTA ================= --}}
@include('components.article-cta')

@endsection

