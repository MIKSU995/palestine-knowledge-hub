<section id="gaza-update" class="py-20 bg-slate-900 text-white relative overflow-hidden border-b border-slate-800">

    <!-- Ambient Glowing Background Elements -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-0 left-10 w-96 h-96 bg-rose-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Top Header & Instagram Profile Banner -->
        <div class="bg-slate-800/80 backdrop-blur-xl border border-slate-700/80 rounded-3xl p-6 sm:p-8 mb-12 shadow-2xl">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">

                <!-- Left Profile Info -->
                <div class="flex items-center gap-5 w-full lg:w-auto">
                    <!-- Instagram Gradient Ring Avatar -->
                    <div class="relative p-1 rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 shrink-0">
                        <img src="https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop" alt="The Palestine Circle" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full object-cover border-2 border-slate-900">
                        <span class="absolute bottom-1 right-1 w-5 h-5 rounded-full bg-red-500 border-2 border-slate-900 flex items-center justify-center text-[10px]" title="Live Feed Connected">
                            <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                        </span>
                    </div>

                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">The Palestine Circle</h2>
                            <!-- Verified Badge -->
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-blue-500/20 border border-blue-400/30 text-blue-400 text-xs font-bold">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                Verified Instagram Feed
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full bg-red-500/20 text-red-400 border border-red-500/30 text-xs font-semibold">
                                Live Social API
                            </span>
                        </div>
                        <p class="text-slate-400 text-xs sm:text-sm mt-1 flex items-center gap-2">
                            <span>@thepalestinecircle</span>
                            <span>•</span>
                            <span class="text-slate-300 font-semibold">3.8M Pengikut</span>
                            <span>•</span>
                            <span class="text-red-400 font-medium">Pembaruan Lapangan 24/7</span>
                        </p>
                        <p class="text-slate-300 text-xs sm:text-sm mt-2 line-clamp-2 max-w-2xl">
                            Dokumentasi visual, laporan lapangan, dan informasi terverifikasi langsung dari komunitas kemanusiaan Palestina.
                        </p>
                    </div>
                </div>

                <!-- Right Action Buttons -->
                <div class="flex items-center gap-3 w-full lg:w-auto justify-stretch lg:justify-end">
                    <button onclick="refreshGazaUpdates()" class="flex-1 lg:flex-none px-4 py-3 rounded-2xl bg-slate-700/80 hover:bg-slate-700 text-white font-semibold text-xs sm:text-sm transition flex items-center justify-center gap-2 border border-slate-600/60">
                        <svg id="refresh-icon" class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        <span>Sinkronkan Live</span>
                    </button>

                    <a href="https://www.instagram.com/thepalestinecircle/" target="_blank" rel="noopener" class="flex-1 lg:flex-none px-5 py-3 rounded-2xl bg-gradient-to-r from-amber-500 via-rose-600 to-purple-600 hover:opacity-95 text-white font-extrabold text-xs sm:text-sm transition shadow-lg shadow-rose-950/40 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        <span>Follow @thepalestinecircle</span>
                    </a>
                </div>

            </div>
        </div>

        <!-- Category Tabs Filter -->
        <div class="flex items-center justify-between gap-4 mb-8 flex-wrap">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none w-full sm:w-auto">
                <button onclick="filterGazaCategory('all')" class="gaza-cat-btn active px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition bg-red-600 text-white shadow-md">
                    ✨ Semua Update
                </button>
                <button onclick="filterGazaCategory('Laporan Lapangan')" class="gaza-cat-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-800 text-slate-300 hover:bg-slate-700">
                    🚨 Laporan Lapangan
                </button>
                <button onclick="filterGazaCategory('Kondisi Medis')" class="gaza-cat-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-800 text-slate-300 hover:bg-slate-700">
                    🏥 Kondisi Medis
                </button>
                <button onclick="filterGazaCategory('Bantuan Kemanusiaan')" class="gaza-cat-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-800 text-slate-300 hover:bg-slate-700">
                    🍞 Bantuan Kemanusiaan
                </button>
                <button onclick="filterGazaCategory('Suara Warga Gaza')" class="gaza-cat-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-800 text-slate-300 hover:bg-slate-700">
                    ✨ Suara Warga
                </button>
            </div>

            <div class="text-xs text-slate-400 flex items-center gap-1.5 font-medium">
                <span class="w-2 h-2 rounded-full bg-red-400"></span>
                <span>Terhubung API Instagram @thepalestinecircle</span>
            </div>
        </div>

        <!-- Instagram Feed Cards Grid -->
        <div id="gaza-updates-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @if(isset($gazaUpdates) && count($gazaUpdates) > 0)
                @foreach($gazaUpdates as $post)
                <div class="gaza-card bg-slate-800/90 rounded-3xl border border-slate-700/80 overflow-hidden hover:border-rose-500/80 transition duration-300 shadow-xl flex flex-col justify-between group" data-category="{{ $post['category'] }}">
                    
                    <div>
                        <!-- Card Top Header (Instagram Header style) -->
                        <div class="p-4 flex items-center justify-between border-b border-slate-700/60 bg-slate-900/60">
                            <div class="flex items-center gap-3">
                                <div class="p-0.5 rounded-full bg-gradient-to-tr from-amber-500 to-rose-600">
                                    <img src="{{ $post['avatar_url'] }}" alt="{{ $post['username'] }}" class="w-9 h-9 rounded-full object-cover border border-slate-900">
                                </div>
                                <div>
                                    <div class="flex items-center gap-1">
                                        <span class="text-xs font-bold text-white tracking-wide">{{ $post['username'] }}</span>
                                        <svg class="w-3.5 h-3.5 text-blue-400 fill-current" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                    </div>
                                    <div class="flex items-center gap-1 text-[11px] text-slate-400">
                                        <svg class="w-3 h-3 text-rose-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>{{ $post['location'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <span class="text-[11px] font-semibold text-slate-400 bg-slate-800 px-2.5 py-1 rounded-full border border-slate-700">
                                {{ $post['time_ago'] }}
                            </span>
                        </div>

                        <!-- Card Image Preview -->
                        <div class="relative overflow-hidden aspect-video bg-slate-950">
                            <img src="{{ $post['image_url'] }}" alt="Post image" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            
                            <!-- Tag Overlay -->
                            <div class="absolute top-3 left-3 bg-slate-900/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-extrabold text-white border border-slate-700 shadow-md">
                                {{ $post['tag'] }}
                            </div>

                            <div class="absolute bottom-3 right-3 bg-rose-600 text-white text-[10px] font-extrabold px-2.5 py-0.5 rounded-md uppercase tracking-wider shadow">
                                Instagram Live
                            </div>
                        </div>

                        <!-- Card Caption -->
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-md bg-red-950 text-red-400 border border-red-800/80">
                                    {{ $post['category'] }}
                                </span>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-200 line-clamp-4 leading-relaxed font-normal">
                                {{ $post['caption'] }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Engagement & Action Footer -->
                    <div class="p-4 border-t border-slate-700/60 bg-slate-900/40 flex items-center justify-between text-xs">
                        <div class="flex items-center gap-4 text-slate-400 font-medium">
                            <span class="flex items-center gap-1 hover:text-rose-400 transition cursor-pointer">
                                <svg class="w-4 h-4 text-rose-500 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                                <span>{{ number_format($post['likes_count']) }}</span>
                            </span>
                            <span class="flex items-center gap-1 hover:text-blue-400 transition cursor-pointer">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                <span>{{ number_format($post['comments_count']) }}</span>
                            </span>
                        </div>

                        <a href="https://www.instagram.com/thepalestinecircle/" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-gradient-to-r from-rose-600 to-purple-600 text-white font-bold text-xs hover:opacity-90 transition shadow">
                            <span>Buka di Instagram</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                </div>
                @endforeach
            @else
                <div class="col-span-full py-12 text-center bg-slate-800/50 rounded-3xl border border-slate-700">
                    <p class="text-slate-400 text-sm">Memuat aliran update Gaza terbaru...</p>
                </div>
            @endif

        </div>

        <!-- Live Refresh & View All Action -->
        <div class="mt-12 text-center">
            <a href="https://www.instagram.com/thepalestinecircle/" target="_blank" rel="noopener" class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-sm border border-slate-700 transition shadow-xl group">
                <svg class="w-5 h-5 text-rose-500 fill-current group-hover:scale-110 transition" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                <span>Lihat Seluruh Update Langsung di @thepalestinecircle Instagram</span>
            </a>
        </div>

    </div>
</section>

<!-- Client Side Interactive Script for Gaza Updates -->
<script>
    function filterGazaCategory(cat) {
        document.querySelectorAll('.gaza-cat-btn').forEach(btn => {
            btn.classList.remove('bg-red-600', 'text-white', 'shadow-md', 'active');
            btn.classList.add('bg-slate-800', 'text-slate-300');
        });
        event.target.classList.remove('bg-slate-800', 'text-slate-300');
        event.target.classList.add('bg-red-600', 'text-white', 'shadow-md', 'active');

        const cards = document.querySelectorAll('.gaza-card');
        cards.forEach(card => {
            if (cat === 'all' || card.getAttribute('data-category') === cat) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function refreshGazaUpdates() {
        const icon = document.getElementById('refresh-icon');
        if(icon) icon.classList.add('animate-spin');

        fetch('/api/gaza-updates')
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success' && data.data) {
                    console.log('Live Palestine Circle Updates synced:', data.data.length, 'posts');
                }
            })
            .catch(err => console.log('Notice: Offline static feed used'))
            .finally(() => {
                setTimeout(() => {
                    if(icon) icon.classList.remove('animate-spin');
                }, 600);
            });
    }
</script>
