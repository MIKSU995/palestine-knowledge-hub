<footer class="bg-slate-900 text-slate-300 relative overflow-hidden">

    <!-- Subtle top glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-px bg-gradient-to-r from-transparent via-red-500/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 pt-16 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800/80">

            <!-- Col 1: Brand & Mission -->
            <div class="lg:col-span-2 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl overflow-hidden flex items-center justify-center bg-white border border-slate-200 shadow-sm">
                        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-full h-full object-contain" />
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold text-white tracking-tight">
                            Palestina<span class="text-emerald-400">Learns</span>
                        </h2>
                        <span class="text-[9px] font-semibold text-slate-500 tracking-widest uppercase">Palestinian Educational Portal</span>
                    </div>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                    Platform edukasi terbuka, live feed Instagram @thepalestinecircle, dan saluran bantuan kemanusiaan terverifikasi untuk rakyat Palestina.
                </p>
                <div class="pt-1 flex flex-wrap items-center gap-2">
                    <a href="https://www.instagram.com/thepalestinecircle/" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-gradient-to-r from-amber-500/10 via-rose-500/10 to-purple-500/10 border border-rose-500/25 text-rose-400 text-xs font-semibold hover:bg-rose-500/15 transition-all duration-200 group">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        <svg class="w-3.5 h-3.5 fill-current group-hover:scale-110 transition-transform" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        @thepalestinecircle
                    </a>
                    <a href="/#humanitarian-hub" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-red-500/10 border border-red-500/25 text-red-400 text-xs font-semibold hover:bg-red-500/15 transition-all duration-200">
                        ❤️ Bantuan Terverifikasi
                    </a>
                </div>
            </div>

            <!-- Col 2: Modul Utama -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider mb-5 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                    Modul Utama
                </h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="/#gaza-update" class="hover:text-rose-400 transition-all duration-200 text-rose-300 font-semibold flex items-center gap-1.5">📸 Gaza Live Feed<span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span></a></li>
                    <li><a href="/#humanitarian-hub" class="hover:text-red-400 transition-all duration-200 text-red-400 font-semibold">❤️ Saluran Donasi</a></li>
                    <li><a href="{{ route('articles') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Artikel & Essay</a></li>
                    <li><a href="{{ route('timeline') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Linimasa Sejarah</a></li>
                    <li><a href="{{ route('maps') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Peta & Geografi</a></li>
                    <li><a href="{{ route('culture') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">🎨 Budaya & Warisan</a></li>
                </ul>
            </div>

            <!-- Col 3: Fitur & Informasi -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider mb-5 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                    Fitur & Informasi
                </h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('news.index') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Pusat Berita Terkini</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Galeri Foto Sejarah</a></li>
                    <li><a href="{{ route('resources') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Materi Pembelajaran</a></li>
                    <li><a href="{{ route('quiz') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Kuis Interaktif</a></li>
                    <li><a href="{{ route('glossary') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block">Glosarium Istilah</a></li>
                    <li><a href="{{ route('petition') }}" class="hover:text-red-400 transition-all duration-200 text-red-400 font-semibold">✍️ Petisi Solidaritas</a></li>
                    <li><a href="{{ route('sitemap') }}" class="hover:text-red-400 transition-all duration-200 hover:translate-x-0.5 inline-block text-slate-500 text-xs">Peta Situs</a></li>
                </ul>
            </div>

            <!-- Col 4: Buletin Edukasi -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider mb-5 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                    Buletin Edukasi
                </h3>
                <p class="text-xs text-slate-400 mb-4 leading-relaxed">Dapatkan rangkuman laporan kemanusiaan mingguan dan rilis materi edukasi langsung ke email Anda.</p>
                <form onsubmit="event.preventDefault(); this.querySelector('button').textContent = '✓ Terima kasih!'; setTimeout(() => this.querySelector('button').textContent = 'Berlangganan', 3000);" class="space-y-2.5">
                    <input type="email" required placeholder="Masukkan email Anda..." class="w-full px-4 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700/60 text-sm text-white placeholder-slate-500 outline-none focus:border-red-500/60 focus:ring-1 focus:ring-red-500/20 transition-all duration-200">
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-bold text-sm transition-all duration-200 shadow-lg shadow-red-900/20 hover:shadow-red-900/30">
                        Berlangganan
                    </button>
                </form>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <div class="flex flex-wrap items-center gap-3">
                <p>© {{ date('Y') }} PalestinaLearns. Platform Edukasi & Akses Kemanusiaan.</p>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-600/10 border border-red-500/30 text-red-300/80 font-bold text-[11px]">
                    🇮🇩 Karya Anak Indonesia
                </span>
            </div>
            <div class="flex items-center gap-4 text-slate-500/80">
                <span>Edukasi</span>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <span>Kemanusiaan</span>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <span>Solidaritas</span>
            </div>
        </div>
    </div>
</footer>