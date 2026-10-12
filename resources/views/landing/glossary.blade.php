@extends('layouts.app')

@section('title', 'Kamus & Glosarium Sejarah Palestina | Palestine Knowledge Hub')
@section('meta_description', 'Kamus interaktif istilah sejarah, geografi, budaya, dan hukum Palestina. Pelajari etimologi dan sejarah lengkap di balik setiap istilah.')

@section('content')

{{-- Hero Section --}}
<section class="bg-slate-900 text-white py-16 border-b border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-red-900/30 via-slate-900 to-slate-950"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <span class="px-3.5 py-1.5 rounded-full bg-red-500/20 text-red-300 font-bold text-xs uppercase tracking-wider">
                📖 Kamus Istilah & Glosarium Sejarah
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
                Glosarium Sejarah & Istilah Palestina
            </h1>
            <p class="mt-4 text-slate-300 text-base sm:text-lg leading-relaxed">
                Pelajari definisi otentik, etimologi bahasa Arab, dan konteks sejarah di balik istilah-istilah penting sejarah Palestina.
            </p>
        </div>

        {{-- Search Bar --}}
        <div class="mt-8 max-w-2xl">
            <form action="{{ route('glossary') }}" method="GET" class="relative">
                <div class="flex items-center bg-slate-800/90 border border-slate-700 rounded-2xl p-2 shadow-2xl focus-within:border-red-500 focus-within:ring-2 focus-within:ring-red-500/20 transition">
                    <svg class="w-6 h-6 text-slate-400 ml-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari istilah, bahasa Arab, atau arti kata..."
                           class="w-full bg-transparent px-4 py-2.5 text-white placeholder-slate-400 text-sm outline-none">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-500 text-white rounded-xl text-xs font-bold transition flex-shrink-0 shadow-lg shadow-red-900/40">
                        Cari Istilah
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- Sticky Filter & Alphabet Bar --}}
<section class="sticky top-0 z-40 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border-b border-slate-200 dark:border-slate-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 space-y-3">
        
        {{-- Category Filters --}}
        <div class="flex items-center justify-between flex-wrap gap-3">
            <div class="flex items-center gap-2 overflow-x-auto pb-1 no-scrollbar">
                @foreach($categories as $cat)
                <a href="{{ route('glossary', array_merge(request()->query(), ['category' => $cat])) }}"
                   class="px-4 py-1.5 rounded-full text-xs font-bold transition flex-shrink-0 {{ (request('category', 'All') === $cat) ? 'bg-red-600 text-white shadow-md' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-red-600 hover:text-white' }}">
                    {{ $cat }}
                </a>
                @endforeach
            </div>

            @if(request()->anyFilled(['search', 'category', 'letter']))
            <a href="{{ route('glossary') }}" class="text-xs font-bold text-red-600 hover:underline">
                ✕ Hapus Filter
            </a>
            @endif
        </div>

        {{-- Alphabet A-Z Index --}}
        <div class="flex items-center gap-1 overflow-x-auto pt-1 border-t border-slate-100 dark:border-slate-800/80 no-scrollbar text-xs font-bold">
            <span class="text-slate-400 mr-2 uppercase tracking-wider text-[11px]">Abjad:</span>
            <a href="{{ route('glossary', array_merge(request()->query(), ['letter' => null])) }}"
               class="px-2 py-1 rounded {{ !request('letter') ? 'text-red-600 dark:text-red-400 underline font-extrabold' : 'text-slate-500 hover:text-slate-900 dark:hover:text-white' }}">
                Semua
            </a>
            @foreach($alphabet as $char)
            <a href="{{ route('glossary', array_merge(request()->query(), ['letter' => $char])) }}"
               class="px-2 py-1 rounded transition {{ (request('letter') === $char) ? 'bg-red-600 text-white font-extrabold shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800' }}">
                {{ $char }}
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Main Terms Grid --}}
<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        @if($terms->isEmpty())
        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-16 text-center shadow-sm">
            <div class="w-16 h-16 rounded-2xl bg-red-100 dark:bg-red-950/50 text-red-600 dark:text-red-400 flex items-center justify-center mx-auto mb-4 text-2xl">
                📖
            </div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Tidak Ada Istilah Ditemukan</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2 max-w-md mx-auto">
                Istilah yang Anda cari tidak cocok dengan filter saat ini. Coba gunakan kata kunci lain atau hapus filter.
            </p>
            <a href="{{ route('glossary') }}" class="inline-block mt-6 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-2xl text-xs font-bold transition">
                Tampilkan Semua Istilah
            </a>
        </div>
        @else

        <div class="grid md:grid-cols-2 gap-6">
            @foreach($terms as $term)
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm hover:shadow-xl hover:border-red-500/40 transition duration-300 flex flex-col justify-between group">
                <div>
                    {{-- Header Row --}}
                    <div class="flex items-start justify-between gap-4 mb-3">
                        <div>
                            <span class="px-3 py-1 rounded-full bg-red-100 dark:bg-red-950 text-red-700 dark:text-red-300 text-[11px] font-extrabold uppercase tracking-wider">
                                {{ $term->category }}
                            </span>
                            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white mt-2 group-hover:text-red-600 dark:group-hover:text-red-400 transition">
                                {{ $term->term }}
                            </h2>
                        </div>
                        @if($term->arabic_term)
                        <div class="text-right">
                            <span class="text-2xl font-bold text-slate-800 dark:text-slate-200 font-serif leading-none block" dir="rtl">
                                {{ $term->arabic_term }}
                            </span>
                        </div>
                        @endif
                    </div>

                    {{-- Definition --}}
                    <p class="text-sm text-slate-700 dark:text-slate-300 font-medium leading-relaxed">
                        {{ $term->definition }}
                    </p>

                    {{-- Full Description --}}
                    @if($term->description)
                    <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800/80">
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                            {{ $term->description }}
                        </p>
                    </div>
                    @endif
                </div>

                {{-- Footer Etymology & Speech --}}
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between gap-3 text-xs">
                    @if($term->etymology)
                    <span class="text-slate-400 italic text-[11px] truncate max-w-[240px]" title="{{ $term->etymology }}">
                        💡 {{ $term->etymology }}
                    </span>
                    @else
                    <span></span>
                    @endif

                    <button onclick="speakTerm('{{ addslashes($term->term) }}', '{{ addslashes($term->definition) }}')"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-red-600 hover:text-white text-slate-700 dark:text-slate-300 font-bold transition text-xs flex-shrink-0">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
                        Dengarkan
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        @endif

    </div>
</section>

@push('scripts')
<script>
    function speakTerm(term, definition) {
        if (!('speechSynthesis' in window)) {
            alert('Fitur Text-to-Speech tidak didukung oleh peramban Anda.');
            return;
        }

        window.speechSynthesis.cancel(); // Stop current playing speech

        const textToRead = term + '. ' + definition;
        const utterance = new SpeechSynthesisUtterance(textToRead);
        utterance.lang = 'id-ID';
        utterance.rate = 1.0;

        window.speechSynthesis.speak(utterance);
    }
</script>
@endpush

@endsection
