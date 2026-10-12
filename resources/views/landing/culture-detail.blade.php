@extends('layouts.app')

@section('title', $culture->title . ' | Budaya Palestina | Palestine Knowledge Hub')
@section('meta_description', $culture->description)

@section('content')

{{-- Hero --}}
<section class="relative min-h-[400px] flex items-end overflow-hidden bg-slate-900">
    @if($culture->image_url)
    <img src="{{ $culture->image_url }}" alt="{{ $culture->title }}"
         class="absolute inset-0 w-full h-full object-cover opacity-30">
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/70 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pb-14 pt-32 z-10">
        <nav class="flex items-center gap-2 text-xs text-slate-400 mb-5">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>›</span>
            <a href="{{ route('culture') }}" class="hover:text-white transition">Budaya</a>
            <span>›</span>
            <span class="text-slate-300">{{ $culture->title }}</span>
        </nav>

        <span class="inline-block px-3 py-1 rounded-full bg-red-600/80 text-white text-xs font-extrabold uppercase tracking-wider mb-4">
            {{ $culture->category }}
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
            {{ $culture->title }}
        </h1>
        @if($culture->arabic_title)
        <p class="text-2xl text-slate-300 font-bold mt-2" dir="rtl">{{ $culture->arabic_title }}</p>
        @endif
        @if($culture->region)
        <div class="flex items-center gap-2 mt-4 text-slate-400 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
            {{ $culture->region }}
        </div>
        @endif
    </div>
</section>

{{-- Content --}}
<section class="py-16 bg-white dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="prose prose-slate dark:prose-invert prose-lg max-w-none">
                    <p class="text-xl text-slate-700 dark:text-slate-300 font-medium leading-relaxed">
                        {{ $culture->description }}
                    </p>
                    @if($culture->content)
                    <div class="mt-6 text-slate-600 dark:text-slate-400 leading-relaxed space-y-4">
                        @foreach(explode("\n", $culture->content) as $para)
                            @if(trim($para))
                            <p>{{ trim($para) }}</p>
                            @endif
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Share Section --}}
                <div class="mt-10 pt-8 border-t border-slate-200 dark:border-slate-800">
                    <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-4">Bagikan Warisan Ini</h3>
                    <div class="flex items-center gap-3 flex-wrap">
                        <a href="https://wa.me/?text={{ urlencode($culture->title . ' — Palestine Knowledge Hub: ' . url()->current()) }}"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-500 hover:bg-green-600 text-white text-xs font-bold transition shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($culture->title . ' — Warisan Budaya Palestina') }}&url={{ urlencode(url()->current()) }}&hashtags=PalestineKnowledgeHub,FreePalestine"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-700 text-white text-xs font-bold transition shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.259 5.632 5.905-5.632zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            Twitter / X
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ url()->current() }}').then(()=>alert('Link berhasil disalin!'))"
                                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 text-xs font-bold transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            Salin Link
                        </button>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-8">
                {{-- Quick Info Card --}}
                <div class="bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 space-y-4">
                    <h3 class="font-extrabold text-slate-900 dark:text-white text-sm uppercase tracking-wide">Info Singkat</h3>
                    <dl class="space-y-3 text-sm">
                        <div>
                            <dt class="text-slate-500 dark:text-slate-400 text-xs font-semibold uppercase tracking-wider">Kategori</dt>
                            <dd class="text-slate-800 dark:text-slate-200 font-semibold mt-0.5">{{ $culture->category }}</dd>
                        </div>
                        @if($culture->arabic_title)
                        <div>
                            <dt class="text-slate-500 dark:text-slate-400 text-xs font-semibold uppercase tracking-wider">Nama Arab</dt>
                            <dd class="text-slate-800 dark:text-slate-200 font-semibold mt-0.5" dir="rtl">{{ $culture->arabic_title }}</dd>
                        </div>
                        @endif
                        @if($culture->region)
                        <div>
                            <dt class="text-slate-500 dark:text-slate-400 text-xs font-semibold uppercase tracking-wider">Wilayah</dt>
                            <dd class="text-slate-800 dark:text-slate-200 font-semibold mt-0.5">{{ $culture->region }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>

                {{-- CTA Petisi --}}
                <div class="bg-gradient-to-br from-red-600 to-rose-700 rounded-2xl p-6 text-white">
                    <h3 class="font-extrabold text-base mb-2">✍️ Suarakan Solidaritas</h3>
                    <p class="text-red-100 text-xs leading-relaxed mb-4">Budaya Palestina harus terus hidup. Tandatangani petisi kami untuk mendukung rakyat Palestina.</p>
                    <a href="{{ route('petition') }}" class="inline-block w-full text-center px-4 py-2.5 bg-white text-red-700 rounded-xl text-xs font-extrabold hover:bg-red-50 transition">
                        Tandatangani Petisi →
                    </a>
                </div>

                {{-- Related --}}
                @if($related->isNotEmpty())
                <div>
                    <h3 class="font-extrabold text-slate-900 dark:text-white text-sm uppercase tracking-wide mb-4">Warisan Terkait</h3>
                    <div class="space-y-3">
                        @foreach($related as $rel)
                        <a href="{{ route('culture.show', $rel->id) }}"
                           class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800 hover:bg-red-50 dark:hover:bg-red-950/30 border border-slate-200 dark:border-slate-700 hover:border-red-300 transition group">
                            @if($rel->image_url)
                            <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                            @else
                            <div class="w-12 h-12 rounded-lg bg-red-100 dark:bg-red-950/40 flex items-center justify-center text-xl flex-shrink-0">🎨</div>
                            @endif
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-slate-800 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition line-clamp-1">{{ $rel->title }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $rel->category }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
