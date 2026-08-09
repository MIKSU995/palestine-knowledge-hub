@extends('layouts.app')

@section('title', 'Interactive Geography & Maps of Palestine | Palestine Knowledge Hub')
@section('meta_description', 'Explore historic cities, ports, sacred sanctuaries, and cultural centers across Palestine using our interactive map.')

@push('styles')
<style>
    #palestine-map {
        height: 620px;
        width: 100%;
        border-radius: 1.5rem;
        z-index: 1;
    }
    .leaflet-popup-content-wrapper {
        border-radius: 1.25rem !important;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
        border: 1px solid rgba(226,232,240,0.8);
        padding: 0 !important;
        overflow: hidden;
    }
    .dark .leaflet-popup-content-wrapper {
        background: #0f172a !important;
        border-color: #1e293b !important;
        color: white !important;
    }
    .leaflet-popup-content {
        margin: 0 !important;
        width: 280px !important;
    }
    .leaflet-container {
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }
</style>
@endpush

@section('content')

{{-- Hero --}}
<section class="bg-slate-900 text-white py-16 border-b border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-blue-900/20 via-slate-900 to-slate-950"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <span class="px-3.5 py-1.5 rounded-full bg-blue-500/20 text-blue-300 font-bold text-xs uppercase tracking-wider">
                🗺️ Interactive Geographic Atlas
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
                Geography & Historical Cities of Palestine
            </h1>
            <p class="mt-4 text-slate-300 text-base sm:text-lg leading-relaxed">
                Click any city or historical marker on the interactive map to explore its history, landmarks, maritime trade legacy, and cultural heritage.
            </p>
        </div>
    </div>
</section>

<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Map Filter Bar --}}
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm mb-6 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 sm:pb-0">
                <span class="font-bold text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider mr-2">Filter Region:</span>
                <button onclick="filterMap('All')" class="map-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-emerald-600 text-white transition">
                    All Locations
                </button>
                <button onclick="filterMap('Historic Capital')" class="map-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-emerald-600 hover:text-white transition">
                    🏛️ Historic Capitals
                </button>
                <button onclick="filterMap('Port City')" class="map-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-emerald-600 hover:text-white transition">
                    ⚓ Ports & Coastal
                </button>
                <button onclick="filterMap('Sacred Site')" class="map-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-emerald-600 hover:text-white transition">
                    ✨ Sacred Sites
                </button>
            </div>

            <div class="text-xs text-slate-400">
                <span>Coordinates: <strong class="text-slate-700 dark:text-slate-200">31.9° N, 35.2° E</strong></span>
            </div>
        </div>

        {{-- Leaflet Map Container --}}
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 dark:border-slate-800 p-3 relative">
            <div id="palestine-map"></div>
        </div>

        {{-- Locations Grid --}}
        <div class="mt-12">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Historical Cities & Regions</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Click any card below to fly directly to its location on the map above</p>
                </div>
                <span class="text-xs font-bold text-slate-400">{{ count($locations) }} locations mapped</span>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($locations as $index => $loc)
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:border-emerald-500/50 transition duration-300 cursor-pointer flex flex-col justify-between group"
                     onclick="focusLocation({{ $loc['lat'] }}, {{ $loc['lng'] }}, '{{ addslashes($loc['name']) }}')">
                    <div>
                        <div class="relative h-40 rounded-2xl overflow-hidden bg-slate-900 mb-4">
                            <img src="{{ $loc['image'] }}" alt="{{ $loc['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-2 left-2">
                                <span class="px-2.5 py-1 rounded-lg bg-slate-950/80 backdrop-blur-md text-emerald-400 text-[10px] font-bold">
                                    {{ $loc['category'] }}
                                </span>
                            </div>
                        </div>
                        <h3 class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                            {{ $loc['name'] }}
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 leading-relaxed line-clamp-3">
                            {{ $loc['description'] }}
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs font-bold text-emerald-600 dark:text-emerald-400">
                        <span class="flex items-center gap-1">
                            📍 {{ number_format($loc['lat'], 2) }}°N, {{ number_format($loc['lng'], 2) }}°E
                        </span>
                        <span>Fly to Map →</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const locations = @json($locations);
        let mapMarkers = [];

        // Check if Leaflet is loaded
        if (typeof L === 'undefined') {
            console.error('Leaflet JS is not loaded.');
            return;
        }

        // Initialize Map
        const map = L.map('palestine-map', {
            center: [31.8, 35.1],
            zoom: 8,
            scrollWheelZoom: false
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 18
        }).addTo(map);

        // Marker Color Map
        const colors = {
            'Historic Capital': '#10b981',
            'Coastal Region': '#3b82f6',
            'Heritage Site': '#f59e0b',
            'Trade & Artisan Center': '#8b5cf6',
            'Cultural & Administrative Hub': '#06b6d4',
            'Port City': '#3b82f6',
            'Historic Port & Citadel': '#6366f1',
            'Sacred Site': '#ef4444'
        };

        function createPinIcon(category) {
            const color = colors[category] || '#10b981';
            return L.divIcon({
                className: '',
                html: `<div style="width:32px;height:32px;background:${color};border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:3px solid white;box-shadow:0 6px 16px rgba(0,0,0,0.3);display:flex;align-items:center;justify-content:center;"></div>`,
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -34]
            });
        }

        // Populate markers
        locations.forEach(loc => {
            const marker = L.marker([loc.lat, loc.lng], { icon: createPinIcon(loc.category) })
                .addTo(map)
                .bindPopup(`
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;">
                        <img src="${loc.image}" style="width:100%;height:130px;object-fit:cover;" alt="${loc.name}">
                        <div style="padding:12px 14px;">
                            <span style="font-size:10px;font-weight:800;color:#10b981;text-transform:uppercase;letter-spacing:0.05em;">${loc.category}</span>
                            <h3 style="font-size:15px;font-weight:800;margin:4px 0 6px;">${loc.name}</h3>
                            <p style="font-size:11px;line-height:1.5;color:#64748b;">${loc.description}</p>
                        </div>
                    </div>
                `, { maxWidth: 280 });

            marker.category = loc.category;
            mapMarkers.push(marker);
        });

        // Global Fly To Function
        window.focusLocation = function(lat, lng, name) {
            map.flyTo([lat, lng], 12, { animate: true, duration: 1.2 });
            document.getElementById('palestine-map').scrollIntoView({ behavior: 'smooth', block: 'center' });

            const targetMarker = mapMarkers.find(m => m.getLatLng().lat === lat && m.getLatLng().lng === lng);
            if (targetMarker) {
                setTimeout(() => targetMarker.openPopup(), 1200);
            }
        };

        // Global Filter Function
        window.filterMap = function(category) {
            mapMarkers.forEach(m => {
                if (category === 'All' || m.category.includes(category)) {
                    map.addLayer(m);
                } else {
                    map.removeLayer(m);
                }
            });
        };
    });
</script>
@endpush