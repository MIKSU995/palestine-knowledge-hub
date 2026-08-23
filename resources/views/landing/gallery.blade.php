@extends('layouts.app')

@section('title', 'Gallery - Historical Images of Palestine | Palestine Knowledge Hub')
@section('meta_description', 'Explore a curated gallery of historical, cultural, and contemporary photographs documenting Palestinian life, heritage, and resilience.')

@section('content')

{{-- Hero --}}
<section class="bg-slate-900 text-white py-16 border-b border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_30%_50%,#10b981,transparent_60%)]"></div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
        <span class="px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 font-bold text-xs uppercase tracking-wider">
            Historical Archive & Gallery
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
            Visual Heritage of Palestine
        </h1>
        <p class="mt-4 text-slate-300 text-lg max-w-2xl leading-relaxed">
            A curated collection of photographs, documents, and visual testimonies showcasing Palestinian culture, history, and resilience through the ages.
        </p>
    </div>
</section>

{{-- Filter & Search Bar --}}
<section class="sticky top-0 z-40 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border-b border-slate-200 dark:border-slate-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 flex flex-wrap gap-3 items-center justify-between">
        {{-- Category Filter --}}
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('gallery') }}"
               class="px-4 py-1.5 rounded-full text-sm font-semibold border transition {{ !request('category') ? 'bg-slate-900 dark:bg-white text-white dark:text-slate-900 border-slate-900 dark:border-white' : 'border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:border-emerald-500 hover:text-emerald-600' }}">
                All
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('gallery', ['category' => $cat]) }}"
               class="px-4 py-1.5 rounded-full text-sm font-semibold border transition {{ request('category') === $cat ? 'bg-emerald-600 text-white border-emerald-600' : 'border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:border-emerald-500 hover:text-emerald-600' }}">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        {{-- Search --}}
        <form method="GET" action="{{ route('gallery') }}" class="flex gap-2">
            @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
            <div class="relative">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search gallery..."
                       class="pl-9 pr-4 py-2 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm text-slate-800 dark:text-slate-100 outline-none focus:ring-2 focus:ring-emerald-500 w-56">
            </div>
            <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition">
                Search
            </button>
        </form>
    </div>
</section>

{{-- Gallery Grid --}}
<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        @if($items->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-20 h-20 rounded-3xl bg-slate-200 dark:bg-slate-800 flex items-center justify-center text-slate-400 mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Gallery Coming Soon</h2>
            <p class="text-slate-500 dark:text-slate-400 max-w-md leading-relaxed">
                Our curated collection of historical images and documents is being prepared. Check back soon for a rich visual journey through Palestinian heritage.
            </p>
            <a href="{{ route('home') }}" class="mt-6 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-semibold transition text-sm">
                Back to Home
            </a>
        </div>
        @else
        {{-- Masonry-style photo grid --}}
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-4">
            @foreach($items as $item)
            <div class="break-inside-avoid group cursor-pointer relative" onclick="openGalleryModal('{{ $item->image_url }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->caption ?? '') }}', '{{ $item->year ?? '' }}', '{{ $item->category ?? '' }}', '{{ $item->location ?? '' }}')">
                <div class="overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ $item->image_url }}"
                         alt="{{ $item->title }}"
                         loading="lazy"
                         class="w-full h-auto object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 rounded-2xl flex flex-col justify-end p-4">
                        <span class="text-xs font-semibold text-emerald-300 uppercase tracking-wide mb-1">{{ $item->category }}</span>
                        <h3 class="text-white font-bold text-sm leading-snug">{{ $item->title }}</h3>
                        @if($item->year)
                        <span class="text-slate-300 text-xs mt-1">{{ $item->year }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $items->links() }}
        </div>
        @endif
    </div>
</section>

{{-- Lightbox Modal --}}
<div id="gallery-modal" class="fixed inset-0 bg-slate-950/90 backdrop-blur-sm z-[9999] hidden items-center justify-center p-4">
    <button onclick="closeGalleryModal()" class="absolute top-4 right-4 text-white/70 hover:text-white text-4xl font-light transition z-10">&times;</button>
    <button onclick="closeGalleryModal()" class="absolute inset-0 w-full h-full cursor-default" id="modal-overlay"></button>

    <div class="relative z-10 max-w-5xl w-full bg-slate-900 rounded-3xl overflow-hidden shadow-2xl flex flex-col lg:flex-row max-h-[90vh]">
        {{-- Image --}}
        <div class="flex-1 bg-black flex items-center justify-center min-h-64">
            <img id="modal-image" src="" alt="" class="max-h-[70vh] max-w-full object-contain">
        </div>
        {{-- Info Panel --}}
        <div class="lg:w-72 p-6 flex flex-col justify-between bg-slate-900 border-t lg:border-t-0 lg:border-l border-slate-800">
            <div>
                <span id="modal-category" class="text-xs font-bold text-emerald-400 uppercase tracking-wider"></span>
                <h2 id="modal-title" class="text-xl font-bold text-white mt-2 leading-snug"></h2>
                <p id="modal-caption" class="text-slate-400 text-sm mt-3 leading-relaxed"></p>
                <div class="mt-4 space-y-2">
                    <div id="modal-year-row" class="flex items-center gap-2 text-sm text-slate-400">
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span id="modal-year"></span>
                    </div>
                    <div id="modal-location-row" class="flex items-center gap-2 text-sm text-slate-400">
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <span id="modal-location"></span>
                    </div>
                </div>
            </div>
            <button onclick="closeGalleryModal()" class="mt-6 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white rounded-xl text-sm font-semibold transition">
                Close
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const galleryModal = document.getElementById('gallery-modal');

    function openGalleryModal(src, title, caption, year, category, location) {
        document.getElementById('modal-image').src = src;
        document.getElementById('modal-title').textContent = title;
        document.getElementById('modal-caption').textContent = caption;
        document.getElementById('modal-year').textContent = year;
        document.getElementById('modal-category').textContent = category;
        document.getElementById('modal-location').textContent = location;

        document.getElementById('modal-year-row').style.display = year ? 'flex' : 'none';
        document.getElementById('modal-location-row').style.display = location ? 'flex' : 'none';

        galleryModal.classList.remove('hidden');
        galleryModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeGalleryModal() {
        galleryModal.classList.add('hidden');
        galleryModal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeGalleryModal();
    });
</script>
@endpush