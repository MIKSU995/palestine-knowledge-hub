@extends('layouts.app')

@section('title', 'Budaya & Warisan Palestina | Palestine Knowledge Hub')
@section('meta_description', 'Jelajahi kekayaan budaya Palestina: Tatreez, Kuffiyeh, Maqluba, Dabke, dan tradisi ribuan tahun yang terus hidup meski di bawah tekanan.')

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-[420px] flex items-center overflow-hidden bg-slate-900">
    {{-- Animated BG Gradient --}}
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-red-950 via-slate-900 to-slate-950"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full bg-red-600/10 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full bg-rose-500/8 blur-3xl animate-pulse" style="animation-delay:2s"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-20 z-10">
        <div class="max-w-4xl">
            <div class="flex items-center gap-3 mb-5">
                <span class="px-4 py-1.5 rounded-full bg-red-500/20 border border-red-500/30 text-red-300 font-extrabold text-xs uppercase tracking-widest">
                    🎨 Warisan Budaya
                </span>
                <span class="px-3 py-1 rounded-full bg-white/10 text-white/60 font-bold text-xs">
                    UNESCO Recognized
                </span>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1]">
                Budaya &amp; Warisan<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-rose-300">Palestina</span>
            </h1>
            <p class="mt-5 text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl">
                Dari sulaman Tatreez hingga tarian Dabke, dari dapur keluarga hingga ladang zaitun ribuan tahun — budaya Palestina adalah bukti nyata bahwa sebuah bangsa tak bisa dihapus dari sejarah.
            </p>

            {{-- Search Bar --}}
            <div class="mt-8 max-w-xl">
                <form action="{{ route('culture') }}" method="GET" class="flex items-center gap-3 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-2 focus-within:border-red-400/60 transition shadow-2xl">
                    <svg class="w-5 h-5 text-slate-400 ml-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari budaya, kuliner, tradisi..."
                           class="flex-1 bg-transparent text-white placeholder-slate-400 outline-none text-sm py-2">
                    <button type="submit" class="px-5 py-2.5 bg-red-600 hover:bg-red-500 text-white rounded-xl text-xs font-bold transition flex-shrink-0">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Category Filter Bar --}}
<section class="sticky top-0 z-40 bg-white/95 dark:bg-slate-900/95 backdrop-blur-xl border-b border-slate-200 dark:border-slate-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4">
        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar">
            @foreach($categories as $cat)
            <a href="{{ route('culture', array_merge(request()->query(), ['category' => $cat])) }}"
               class="px-4 py-2 rounded-full text-xs font-bold flex-shrink-0 transition
                      {{ (request('category', 'All') === $cat) ? 'bg-red-600 text-white shadow-md' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-red-100 dark:hover:bg-red-950/50 hover:text-red-700' }}">
                @if($cat === 'All') 🌍 Semua
                @elseif($cat === 'Pakaian & Seni') 👗 {{ $cat }}
                @elseif($cat === 'Kuliner') 🍽️ {{ $cat }}
                @elseif($cat === 'Seni & Musik') 🎵 {{ $cat }}
                @elseif($cat === 'Tradisi') 🌿 {{ $cat }}
                @elseif($cat === 'Kerajinan') 🏺 {{ $cat }}
                @else {{ $cat }}
                @endif
            </a>
            @endforeach

            @if(request()->anyFilled(['search', 'category']))
            <a href="{{ route('culture') }}" class="px-3 py-2 text-xs font-bold text-red-600 hover:underline flex-shrink-0">
                ✕ Reset
            </a>
            @endif
        </div>
    </div>
</section>

{{-- Featured Culture Cards --}}
@if(!request()->anyFilled(['search', 'category']) || request('category') === 'All')
<section class="py-16 bg-slate-50 dark:bg-slate-950">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-10">
            <span class="w-1.5 h-8 rounded-full bg-red-600"></span>
            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white">Warisan Unggulan</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($featured as $item)
            <a href="{{ route('culture.show', $item->id) }}"
               class="group relative rounded-3xl overflow-hidden aspect-[4/5] block shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                {{-- Background Image --}}
                <div class="absolute inset-0">
                    @if($item->image_url)
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-red-700 to-rose-900"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent"></div>
                </div>

                {{-- Content --}}
                <div class="absolute inset-0 flex flex-col justify-end p-7">
                    <span class="px-3 py-1 rounded-full bg-red-600/90 text-white text-[11px] font-extrabold uppercase tracking-wider self-start mb-3">
                        {{ $item->category }}
                    </span>
                    <h3 class="text-xl font-extrabold text-white leading-snug group-hover:text-red-300 transition">
                        {{ $item->title }}
                    </h3>
                    @if($item->arabic_title)
                    <p class="text-slate-300 text-base font-semibold mt-1" dir="rtl">{{ $item->arabic_title }}</p>
                    @endif
                    <p class="text-slate-300/80 text-xs mt-2 leading-relaxed line-clamp-2">
                        {{ $item->description }}
                    </p>
                    @if($item->region)
                    <div class="flex items-center gap-1.5 mt-4 text-slate-400 text-xs">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $item->region }}
                    </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- All Culture Items Grid --}}
<section class="py-12 bg-white dark:bg-slate-900/50 border-t border-slate-100 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        @if(request()->anyFilled(['search', 'category']))
        <div class="flex items-center gap-3 mb-8">
            <span class="w-1.5 h-8 rounded-full bg-red-600"></span>
            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white">
                Hasil Pencarian
                @if(request('search'))
                    <span class="text-red-600">"{{ request('search') }}"</span>
                @endif
                @if(request('category') && request('category') !== 'All')
                    <span class="text-base font-semibold text-slate-500 dark:text-slate-400 ml-2">dalam {{ request('category') }}</span>
                @endif
            </h2>
        </div>
        @else
        <div class="flex items-center gap-3 mb-8">
            <span class="w-1.5 h-8 rounded-full bg-red-600"></span>
            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white">Semua Warisan Budaya</h2>
        </div>
        @endif

        @if($cultures->isEmpty())
        <div class="bg-slate-50 dark:bg-slate-800/50 rounded-3xl p-16 text-center border border-slate-200 dark:border-slate-700">
            <div class="text-5xl mb-4">🔍</div>
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tidak ada hasil ditemukan</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Coba kata kunci lain atau hapus filter.</p>
            <a href="{{ route('culture') }}" class="inline-block mt-6 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-2xl text-xs font-bold transition">
                Lihat Semua Budaya
            </a>
        </div>
        @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($cultures as $item)
            <a href="{{ route('culture.show', $item->id) }}"
               class="group flex flex-col bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl hover:border-red-400/50 hover:-translate-y-1 transition-all duration-300">

                {{-- Image --}}
                <div class="relative h-48 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    @if($item->image_url)
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-4xl">
                        @if(str_contains($item->category, 'Kuliner')) 🍽️
                        @elseif(str_contains($item->category, 'Musik')) 🎵
                        @elseif(str_contains($item->category, 'Tradisi')) 🌿
                        @elseif(str_contains($item->category, 'Kerajinan')) 🏺
                        @else 🎨
                        @endif
                    </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 rounded-full bg-red-600/90 text-white text-[10px] font-extrabold uppercase tracking-wider shadow-sm">
                            {{ $item->category }}
                        </span>
                    </div>
                    @if($item->is_featured)
                    <div class="absolute top-3 right-3">
                        <span class="px-2 py-1 rounded-full bg-amber-500/90 text-white text-[10px] font-extrabold">⭐</span>
                    </div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="flex flex-col flex-1 p-5">
                    <h3 class="font-extrabold text-slate-900 dark:text-white text-base leading-snug group-hover:text-red-600 dark:group-hover:text-red-400 transition line-clamp-2">
                        {{ $item->title }}
                    </h3>
                    @if($item->arabic_title)
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold mt-0.5" dir="rtl">{{ $item->arabic_title }}</p>
                    @endif
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 leading-relaxed line-clamp-3 flex-1">
                        {{ $item->description }}
                    </p>
                    @if($item->region)
                    <div class="flex items-center gap-1.5 mt-4 text-slate-400 text-xs border-t border-slate-100 dark:border-slate-800 pt-3">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        {{ $item->region }}
                    </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        @endif

    </div>
</section>

{{-- Did You Know Section --}}
<section class="py-16 bg-gradient-to-br from-red-700 to-rose-800 text-white overflow-hidden relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.8\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold">💡 Tahukah Anda?</h2>
            <p class="text-red-200 mt-2">Fakta menarik tentang budaya Palestina yang jarang diketahui</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-7 border border-white/20">
                <div class="text-4xl mb-4">🌿</div>
                <h3 class="font-extrabold text-lg mb-2">Pohon Zaitun Tertua di Dunia</h3>
                <p class="text-red-100 text-sm leading-relaxed">Beberapa pohon zaitun di Palestina berusia lebih dari 4.000 tahun dan masih menghasilkan buah. Mereka adalah saksi bisu sejarah dari era sebelum Nabi Ibrahim.</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-7 border border-white/20">
                <div class="text-4xl mb-4">🧵</div>
                <h3 class="font-extrabold text-lg mb-2">Tatreez Diakui UNESCO</h3>
                <p class="text-red-100 text-sm leading-relaxed">Pada tahun 2021, UNESCO menetapkan Tatreez sebagai Warisan Budaya Tak Benda. Setiap motif menceritakan kisah desa asalnya — sebuah bahasa visual yang hidup.</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-7 border border-white/20">
                <div class="text-4xl mb-4">🪡</div>
                <h3 class="font-extrabold text-lg mb-2">Satu-Satunya Pabrik Kuffiyeh</h3>
                <p class="text-red-100 text-sm leading-relaxed">Pabrik Hirbawi di Hebron adalah satu-satunya pabrik Kuffiyeh yang tersisa di Palestina, beroperasi sejak 1961. Setiap Kuffiyeh yang mereka buat adalah pernyataan perlawanan budaya.</p>
            </div>
        </div>
    </div>
</section>

{{-- Glossary CTA --}}
<section class="py-12 bg-slate-50 dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <p class="text-slate-500 dark:text-slate-400 text-sm">Ingin memahami istilah-istilah dalam budaya Palestina lebih dalam?</p>
        <div class="flex items-center justify-center gap-4 mt-4 flex-wrap">
            <a href="{{ route('glossary') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-2xl text-sm font-bold transition shadow-md">
                📖 Buka Glosarium Istilah
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <a href="{{ route('petition') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-white rounded-2xl text-sm font-bold border border-slate-200 dark:border-slate-700 transition">
                ✍️ Tandatangani Petisi Solidaritas
            </a>
        </div>
    </div>
</section>

@endsection
