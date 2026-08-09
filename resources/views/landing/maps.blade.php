@extends('layouts.app')

@section('title', 'Interactive Map of Palestine - Geographic & Historical Sites')

@push('styles')
<style>
    #palestine-map { height: 600px; border-radius: 1.5rem; z-index: 1; }
    .leaflet-popup-content-wrapper {
        border-radius: 1rem !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15) !important;
        border: 1px solid #e2e8f0;
        padding: 0 !important;
        overflow: hidden;
    }
    .leaflet-popup-content { margin: 0 !important; min-width: 240px; max-width: 300px; }
    .leaflet-popup-tip-container { margin-top: -1px; }
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="bg-slate-900 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="px-3.5 py-1.5 rounded-full bg-blue-500/20 text-blue-300 font-bold text-xs uppercase tracking-wider">
                Interactive Geography
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
                Geography & Interactive Map of Palestine
            </h1>
            <p class="mt-4 text-slate-300 text-lg leading-relaxed">
                Explore historic cities, sacred sites, coastal ports, and cultural landmarks across Palestine through our interactive Leaflet.js map.
            </p>
        </div>
    </div>
</section>

<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Legend & Category Filter Row -->
        <div class="flex flex-wrap gap-3 mb-6 items-center">
            <span class="font-bold text-sm text-slate-700 dark:text-slate-300">Map Legend:</span>
            <span class="flex items-center gap-1.5 text-xs font-semibold bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 px-3 py-1.5 rounded-full">🏛️ Historic Capital</span>
            <span class="flex items-center gap-1.5 text-xs font-semibold bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 px-3 py-1.5 rounded-full">⚓ Port City</span>
            <span class="flex items-center gap-1.5 text-xs font-semibold bg-amber-100 dark:bg-amber-950 text-amber-700 dark:text-amber-300 px-3 py-1.5 rounded-full">🏺 Heritage Site</span>
            <span class="flex items-center gap-1.5 text-xs font-semibold bg-purple-100 dark:bg-purple-950 text-purple-700 dark:text-purple-300 px-3 py-1.5 rounded-full">🎨 Cultural Hub</span>
            <span class="flex items-center gap-1.5 text-xs font-semibold bg-red-100 dark:bg-red-950 text-red-700 dark:text-red-300 px-3 py-1.5 rounded-full">✝️ Sacred Site</span>
        </div>

        <!-- Map Container -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl overflow-hidden border border-slate-200 dark:border-slate-800 p-2">
            <div id="palestine-map"></div>
        </div>

        <!-- Location Cards Grid -->
        <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($locations as $location)
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-lg hover:border-emerald-500/50 transition duration-300 cursor-pointer" onclick="focusLocation({{ $location['lat'] }}, {{ $location['lng'] }}, '{{ addslashes($location['name']) }}')">
                <div class="relative h-36 rounded-2xl overflow-hidden bg-slate-200 dark:bg-slate-800 mb-4">
                    <img src="{{ $location['image'] }}" alt="{{ $location['name'] }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    <div class="absolute top-2 left-2">
                        <span class="px-2 py-1 rounded-lg bg-slate-900/80 text-white text-[10px] font-semibold backdrop-blur-md">
                            {{ $location['category'] }}
                        </span>
                    </div>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white text-base">{{ $location['name'] }}</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 line-clamp-2 leading-relaxed">{{ $location['description'] }}</p>
                <button class="mt-3 text-xs font-bold text-emerald-600 dark:text-emerald-400 hover:underline flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>View on Map</span>
                </button>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
    // Map Data from Controller
    const locations = @json($locations);

    // Initialize Leaflet Map centered on Palestine
    const map = L.map('palestine-map', {
        center: [31.9, 35.2],
        zoom: 8,
        scrollWheelZoom: true
    });

    // Tile Layer - OpenStreetMap (no API key required)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 18
    }).addTo(map);

    // Custom Icon Mapping by category
    const categoryColors = {
        'Historic Capital': '#10b981',
        'Coastal Region': '#3b82f6',
        'Heritage Site': '#f59e0b',
        'Trade & Artisan Center': '#8b5cf6',
        'Cultural & Administrative Hub': '#06b6d4',
        'Port City': '#3b82f6',
        'Historic Port & Citadel': '#6366f1',
        'Sacred Site': '#ef4444'
    };

    function createMarkerIcon(category) {
        const color = categoryColors[category] || '#10b981';
        return L.divIcon({
            className: '',
            html: `<div style="width:36px;height:36px;background:${color};border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:3px solid white;box-shadow:0 4px 12px rgba(0,0,0,0.3);"></div>`,
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -38]
        });
    }

    // Add all location markers
    locations.forEach(loc => {
        const marker = L.marker([loc.lat, loc.lng], { icon: createMarkerIcon(loc.category) })
            .addTo(map)
            .bindPopup(`
                <div>
                    <img src="${loc.image}" style="width:100%;height:140px;object-fit:cover;" alt="${loc.name}">
                    <div style="padding:12px 14px;">
                        <span style="font-size:10px;font-weight:700;color:#10b981;text-transform:uppercase;letter-spacing:.05em;">${loc.category}</span>
                        <h3 style="font-size:15px;font-weight:800;color:#0f172a;margin:4px 0 6px;">${loc.name}</h3>
                        <p style="font-size:12px;color:#475569;line-height:1.5;">${loc.description}</p>
                    </div>
                </div>
            `, { maxWidth: 300 });
    });

    // Focus on a specific location (called from card buttons)
    function focusLocation(lat, lng, name) {
        map.flyTo([lat, lng], 12, { animate: true, duration: 1.2 });
    }
</script>
@endpush