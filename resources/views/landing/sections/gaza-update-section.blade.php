<section id="gaza-update" class="py-20 bg-slate-900 text-white relative overflow-hidden border-b border-slate-800">

    <!-- Ambient Glowing Background Elements -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-red-600/8 rounded-full blur-[100px] pointer-events-none animate-ambient-glow"></div>
    <div class="absolute bottom-0 left-10 w-[400px] h-[400px] bg-rose-600/8 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute top-1/2 right-0 w-[300px] h-[300px] bg-purple-600/5 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Top Header & Instagram Profile Banner -->
        <div class="bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl border border-slate-700/60 rounded-3xl p-6 sm:p-8 mb-12 shadow-2xl shadow-slate-950/50">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">

                <!-- Left Profile Info -->
                <div class="flex items-center gap-5 w-full lg:w-auto">
                    <!-- Instagram Gradient Ring Avatar -->
                    <div class="relative p-[3px] rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 shrink-0 shadow-lg shadow-rose-600/20">
                        <img src="https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop" alt="The Palestine Circle" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full object-cover border-[3px] border-slate-900">
                        <span class="absolute bottom-1 right-1 w-5 h-5 rounded-full bg-green-500 border-2 border-slate-900 flex items-center justify-center" title="Active Feed">
                            <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                        </span>
                    </div>

                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">The Palestine Circle</h2>
                            <!-- Verified Badge -->
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-blue-500/15 border border-blue-400/25 text-blue-400 text-xs font-bold">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                Verified
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full bg-rose-500/15 text-rose-400 border border-rose-500/25 text-xs font-semibold animate-pulse">
                                ● LIVE
                            </span>
                        </div>
                        <p class="text-slate-400 text-xs sm:text-sm mt-1.5 flex items-center gap-2 flex-wrap">
                            <span class="font-medium">@thepalestinecircle</span>
                            <span class="text-slate-600">•</span>
                            <span class="text-white font-bold">3.8M Followers</span>
                            <span class="text-slate-600">•</span>
                            <span class="text-rose-400 font-medium">24/7 Field Updates</span>
                        </p>
                        <p class="text-slate-300/80 text-xs sm:text-sm mt-2 line-clamp-2 max-w-2xl leading-relaxed">
                            Visual documentation, verified field reports, and humanitarian information directly from Palestine.
                        </p>
                    </div>
                </div>

                <!-- Right Action Buttons -->
                <div class="flex items-center gap-3 w-full lg:w-auto justify-stretch lg:justify-end">
                    <button onclick="refreshGazaUpdates()" class="flex-1 lg:flex-none px-5 py-3 rounded-2xl bg-slate-800/80 hover:bg-slate-700 text-white font-semibold text-xs sm:text-sm transition-all duration-200 flex items-center justify-center gap-2 border border-slate-600/40 hover:border-slate-500/60 shadow-lg">
                        <svg id="refresh-icon" class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        <span>Sync Feed</span>
                    </button>

                    <a href="https://www.instagram.com/thepalestinecircle/" target="_blank" rel="noopener" class="flex-1 lg:flex-none px-6 py-3 rounded-2xl bg-gradient-to-r from-amber-500 via-rose-600 to-purple-600 hover:opacity-90 text-white font-extrabold text-xs sm:text-sm transition-all duration-200 shadow-xl shadow-rose-900/30 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        <span>Follow</span>
                    </a>
                </div>

            </div>
        </div>

        <!-- Category Tabs Filter -->
        <div class="flex items-center justify-between gap-4 mb-8 flex-wrap">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none w-full sm:w-auto">
                <button onclick="filterGazaCategory('all')" class="gaza-cat-btn active px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200 bg-red-600 text-white shadow-lg shadow-red-600/20 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                    <span>Semua Update</span>
                </button>
                <button onclick="filterGazaCategory('Laporan Lapangan')" class="gaza-cat-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-800/80 text-slate-300 hover:bg-slate-700 border border-slate-700/40 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>Laporan</span>
                </button>
                <button onclick="filterGazaCategory('Kondisi Medis')" class="gaza-cat-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-800/80 text-slate-300 hover:bg-slate-700 border border-slate-700/40 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Medis</span>
                </button>
                <button onclick="filterGazaCategory('Bantuan Kemanusiaan')" class="gaza-cat-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-800/80 text-slate-300 hover:bg-slate-700 border border-slate-700/40 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Bantuan</span>
                </button>
                <button onclick="filterGazaCategory('Suara Warga Gaza')" class="gaza-cat-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 bg-slate-800/80 text-slate-300 hover:bg-slate-700 border border-slate-700/40 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Suara Warga</span>
                </button>
            </div>

            <div class="text-xs text-slate-400 flex items-center gap-2 font-medium bg-slate-800/50 px-3 py-1.5 rounded-full border border-slate-700/40">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                <span>Terhubung @thepalestinecircle</span>
            </div>
        </div>

        <!-- Instagram Feed Cards Grid -->
        <div id="gaza-updates-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @if(isset($gazaUpdates) && count($gazaUpdates) > 0)
                @foreach($gazaUpdates as $index => $post)
                <div class="gaza-card bg-gradient-to-b from-slate-800/95 to-slate-900/95 rounded-3xl border border-slate-700/50 overflow-hidden hover:border-rose-500/60 transition-all duration-300 shadow-xl shadow-slate-950/30 flex flex-col justify-between group hover:-translate-y-1.5 cursor-pointer" 
                     data-category="{{ $post['category'] }}"
                     onclick="openGazaModal({{ json_encode($post) }})">
                    
                    <div>
                        <!-- Card Top Header (Instagram Header style) -->
                        <div class="p-4 flex items-center justify-between border-b border-slate-700/40 bg-slate-900/50">
                            <div class="flex items-center gap-3">
                                <div class="p-[2px] rounded-full bg-gradient-to-tr from-amber-500 to-rose-600">
                                    <img src="{{ $post['avatar_url'] }}" alt="{{ $post['username'] }}" class="w-9 h-9 rounded-full object-cover border-2 border-slate-900">
                                </div>
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-xs font-bold text-white tracking-wide">{{ $post['username'] }}</span>
                                        <svg class="w-3.5 h-3.5 text-blue-400 fill-current" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                    </div>
                                    <div class="flex items-center gap-1 text-[11px] text-slate-400 mt-0.5">
                                        <svg class="w-3 h-3 text-rose-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span>{{ $post['location'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <span class="text-[10px] font-semibold text-slate-400 bg-slate-800/80 px-2.5 py-1 rounded-full border border-slate-700/60">
                                {{ $post['time_ago'] }}
                            </span>
                        </div>

                        <!-- Card Image / Video Preview -->
                        <div class="relative overflow-hidden aspect-video bg-slate-950">
                            <img src="{{ $post['image_url'] }}" alt="Post image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                            
                            <!-- Tag Overlay -->
                            <div class="absolute top-3 left-3 bg-slate-900/85 backdrop-blur-md px-3 py-1.5 rounded-full text-xs font-extrabold text-white border border-slate-700/60 shadow-lg">
                                {{ $post['tag'] }}
                            </div>

                            <!-- Media Type Badge -->
                            @if($post['media_type'] === 'video')
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 rounded-full bg-rose-600/90 text-white backdrop-blur-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-xl border border-white/20">
                                    <svg class="w-6 h-6 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                            <div class="absolute bottom-3 right-3 bg-gradient-to-r from-rose-600 to-purple-600 text-white text-[10px] font-extrabold px-3 py-1 rounded-lg uppercase tracking-wider shadow-lg flex items-center gap-1.5">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M18 3v2h-2V3H8v2H6V3H4v18h2v-2h2v2h8v-2h2v2h2V3h-2zM8 17H6v-2h2v2zm0-4H6v-2h2v2zm0-4H6V7h2v2zm10 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z"/></svg>
                                Reel Video
                            </div>
                            @else
                            <div class="absolute bottom-3 right-3 bg-slate-800/90 backdrop-blur-sm text-white text-[10px] font-bold px-2.5 py-1 rounded-lg uppercase tracking-wider shadow border border-slate-700/60">
                                Foto Update
                            </div>
                            @endif
                        </div>

                        <!-- Card Caption -->
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-red-950/80 text-red-400 border border-red-800/50">
                                    {{ $post['category'] }}
                                </span>
                                @if($post['media_type'] === 'video')
                                <span class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-purple-950/80 text-purple-400 border border-purple-800/50 inline-flex items-center gap-1.5">
                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11v11.78a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                                    <span>Video Reel</span>
                                </span>
                                @endif
                            </div>

                            <p class="text-xs sm:text-sm text-slate-200/90 line-clamp-3 leading-relaxed font-normal">
                                {{ $post['caption'] }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Engagement & Action Footer -->
                    <div class="p-4 border-t border-slate-700/40 bg-slate-900/30 flex items-center justify-between text-xs" onclick="event.stopPropagation()">
                        <div class="flex items-center gap-4 text-slate-400 font-medium">
                            <span class="flex items-center gap-1.5 hover:text-rose-400 transition cursor-pointer">
                                <svg class="w-4 h-4 text-rose-500 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                                <span>{{ number_format($post['likes_count']) }}</span>
                            </span>
                            <span class="flex items-center gap-1.5 hover:text-blue-400 transition cursor-pointer">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                <span>{{ number_format($post['comments_count']) }}</span>
                            </span>
                            @if(isset($post['shares_count']))
                            <span class="flex items-center gap-1.5 hover:text-green-400 transition cursor-pointer">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                                <span>{{ number_format($post['shares_count']) }}</span>
                            </span>
                            @endif
                        </div>

                        <a href="{{ $post['post_url'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-gradient-to-r from-rose-600 to-purple-600 hover:from-rose-500 hover:to-purple-500 text-white font-bold text-[11px] transition-all duration-200 shadow-md">
                            <span>Instagram</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                </div>
                @endforeach
            @else
                <div class="col-span-full py-16 text-center bg-slate-800/30 rounded-3xl border border-slate-700/40">
                    <div class="w-16 h-16 rounded-2xl bg-slate-800 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <p class="text-slate-400 text-sm font-medium">Memuat aliran update Gaza terbaru...</p>
                    <p class="text-slate-500 text-xs mt-1">Menghubungkan ke @thepalestinecircle</p>
                </div>
            @endif

        </div>

        <!-- Live Refresh & View All Action -->
        <div class="mt-14 text-center">
            <a href="https://www.instagram.com/thepalestinecircle/" target="_blank" rel="noopener" class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-gradient-to-r from-slate-800 to-slate-800/80 hover:from-slate-700 hover:to-slate-700/80 text-white font-bold text-sm border border-slate-700/60 transition-all duration-300 shadow-xl group">
                <svg class="w-5 h-5 text-rose-500 fill-current group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                <span>Lihat Seluruh Update di @thepalestinecircle</span>
                <svg class="w-4 h-4 text-slate-500 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>

    </div>
</section>

<!-- Instagram Post & Reel Lightbox Modal -->
<div id="gaza-post-modal" class="fixed inset-0 z-[9999] bg-slate-950/85 backdrop-blur-md hidden flex items-center justify-center p-4 sm:p-6" onclick="if(event.target === this) closeGazaModal()">
    <div class="relative w-full max-w-4xl bg-slate-900 border border-slate-700/80 rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row max-h-[92vh] animate-fadeIn">
        
        <!-- Media Container (Left) -->
        <div class="md:w-3/5 bg-black flex items-center justify-center relative overflow-hidden group min-h-[260px] md:min-h-[460px]">
            <img id="modal-img" src="" alt="Post media" class="w-full h-full max-h-[45vh] md:max-h-[92vh] object-contain">
            
            <!-- Video Overlay for Reels -->
            <div id="modal-video-overlay" class="hidden absolute inset-0 bg-slate-950/50 backdrop-blur-[2px] flex flex-col items-center justify-center p-6 text-center">
                <a id="modal-reel-play-btn" href="#" target="_blank" rel="noopener" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-tr from-amber-500 via-rose-600 to-purple-600 text-white flex items-center justify-center shadow-2xl hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 ml-1 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </a>
                <p class="text-white font-extrabold text-sm sm:text-base mt-4 drop-shadow">Tonton Video Reel di Instagram</p>
                <p class="text-rose-300 text-xs mt-1">@thepalestinecircle</p>
            </div>

            <div id="modal-tag" class="absolute top-4 left-4 bg-slate-900/85 backdrop-blur-md px-3 py-1.5 rounded-full text-xs font-black text-white border border-slate-700/60 shadow">
            </div>
        </div>

        <!-- Details Container (Right) -->
        <div class="md:w-2/5 p-6 flex flex-col justify-between overflow-y-auto max-h-[50vh] md:max-h-[92vh] bg-slate-900 border-t md:border-t-0 md:border-l border-slate-800">
            <div>
                <!-- Author Header -->
                <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="p-[2px] rounded-full bg-gradient-to-tr from-amber-500 to-rose-600 shrink-0">
                            <img id="modal-avatar" src="" alt="Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-slate-900">
                        </div>
                        <div>
                            <div class="flex items-center gap-1.5">
                                <span class="text-sm font-bold text-white tracking-wide">thepalestinecircle</span>
                                <svg class="w-3.5 h-3.5 text-blue-400 fill-current" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                            </div>
                            <span id="modal-location" class="text-xs text-slate-400 flex items-center gap-1 mt-0.5"></span>
                        </div>
                    </div>
                    <button onclick="closeGazaModal()" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white flex items-center justify-center transition" aria-label="Tutup">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Category badge & published time -->
                <div class="flex items-center justify-between gap-2 mb-3">
                    <span id="modal-category" class="px-2.5 py-1 rounded-lg bg-red-950/80 text-red-400 border border-red-800/50 text-xs font-bold"></span>
                    <span id="modal-time" class="text-xs text-slate-400"></span>
                </div>

                <!-- Full Caption -->
                <p id="modal-caption" class="text-xs sm:text-sm text-slate-200/90 leading-relaxed whitespace-pre-line"></p>
            </div>

            <!-- Footer & Actions -->
            <div class="pt-4 border-t border-slate-800 mt-6 space-y-3">
                <div class="flex items-center justify-between text-xs text-slate-400">
                    <span id="modal-likes" class="flex items-center gap-1.5 text-rose-400 font-bold"></span>
                    <span id="modal-comments" class="flex items-center gap-1.5 text-slate-300 font-medium"></span>
                </div>

                <div class="flex items-center gap-2">
                    <a id="modal-ig-btn" href="#" target="_blank" rel="noopener" class="flex-1 py-3 px-4 rounded-xl bg-gradient-to-r from-amber-500 via-rose-600 to-purple-600 hover:opacity-95 text-white font-extrabold text-xs text-center shadow-lg transition flex items-center justify-center gap-2">
                        <span>Buka di Instagram</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    <button onclick="copyModalLink()" class="p-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold border border-slate-700 transition flex items-center justify-center" title="Salin Tautan">
                        <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Client Side Interactive Script for Gaza Updates & Modal -->
<script>
    let currentModalPostUrl = '';

    function openGazaModal(post) {
        const modal = document.getElementById('gaza-post-modal');
        if (!modal) return;

        currentModalPostUrl = post.post_url || 'https://www.instagram.com/thepalestinecircle/';

        document.getElementById('modal-img').src = post.image_url;
        document.getElementById('modal-avatar').src = post.avatar_url;
        document.getElementById('modal-location').innerHTML = '<svg class="w-3.5 h-3.5 text-slate-400 shrink-0 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>' + post.location;
        document.getElementById('modal-category').innerText = post.category;
        document.getElementById('modal-time').innerText = post.time_ago;
        document.getElementById('modal-caption').innerText = post.caption;
        document.getElementById('modal-tag').innerText = post.tag;
        document.getElementById('modal-likes').innerHTML = '<svg class="w-3.5 h-3.5 text-rose-500 fill-current inline mr-1" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>' + Number(post.likes_count).toLocaleString() + ' suka';
        document.getElementById('modal-comments').innerHTML = '<svg class="w-3.5 h-3.5 text-slate-400 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>' + Number(post.comments_count).toLocaleString() + ' komentar';
        
        document.getElementById('modal-ig-btn').href = currentModalPostUrl;

        const videoOverlay = document.getElementById('modal-video-overlay');
        const reelPlayBtn = document.getElementById('modal-reel-play-btn');
        if (post.media_type === 'video') {
            videoOverlay.classList.remove('hidden');
            reelPlayBtn.href = post.video_url || currentModalPostUrl;
        } else {
            videoOverlay.classList.add('hidden');
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeGazaModal() {
        const modal = document.getElementById('gaza-post-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    function copyModalLink() {
        if (navigator.clipboard && currentModalPostUrl) {
            navigator.clipboard.writeText(currentModalPostUrl).then(() => {
                alert('Tautan Instagram @thepalestinecircle berhasil disalin!');
            });
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeGazaModal();
    });

    function filterGazaCategory(cat) {
        document.querySelectorAll('.gaza-cat-btn').forEach(btn => {
            btn.classList.remove('bg-red-600', 'text-white', 'shadow-lg', 'shadow-red-600/20', 'active');
            btn.classList.add('bg-slate-800/80', 'text-slate-300', 'border', 'border-slate-700/40');
        });
        if (event && event.target) {
            event.target.classList.remove('bg-slate-800/80', 'text-slate-300', 'border', 'border-slate-700/40');
            event.target.classList.add('bg-red-600', 'text-white', 'shadow-lg', 'shadow-red-600/20', 'active');
        }

        const cards = document.querySelectorAll('.gaza-card');
        cards.forEach((card, i) => {
            const shouldShow = cat === 'all' || card.getAttribute('data-category') === cat;
            if (shouldShow) {
                card.style.display = 'flex';
                card.style.opacity = '0';
                card.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, i * 50);
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
                }, 800);
            });
    }
</script>
