<footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">

            <!-- Col 1: Brand & Mission -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-600 to-rose-800 flex items-center justify-center text-white font-black text-xl shadow-sm border border-red-500">
                        P
                    </div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">
                        Palestine <span class="text-red-500">Hub</span>
                    </h2>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                    Platform edukasi terbuka, live feed Instagram @thegaza.update, dan saluran bantuan kemanusiaan terverifikasi untuk rakyat Palestina.
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-2">
                    <a href="https://www.instagram.com/thegaza.update/" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs font-semibold hover:bg-rose-500/20 transition">
                        <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                        @thegaza.update Instagram Live
                    </a>
                    <a href="/#humanitarian-hub" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-xs font-semibold hover:bg-red-500/20 transition">
                        Akses Bantuan Terverifikasi
                    </a>
                </div>
            </div>

            <!-- Col 2: Modul Utama -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Modul Utama</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="/#gaza-update" class="hover:text-rose-400 transition text-rose-300 font-bold">📸 Gaza Live Instagram Feed</a></li>
                    <li><a href="/#humanitarian-hub" class="hover:text-red-400 transition text-red-400 font-bold">❤️ Akses Bantuan Kemanusiaan</a></li>
                    <li><a href="{{ route('articles') }}" class="hover:text-red-400 transition">Artikel & Essay</a></li>
                    <li><a href="{{ route('timeline') }}" class="hover:text-red-400 transition">Linimasa Sejarah</a></li>
                    <li><a href="{{ route('maps') }}" class="hover:text-red-400 transition">Peta & Geografi</a></li>
                    <li><a href="{{ route('culture') }}" class="hover:text-red-400 transition">🎨 Budaya & Warisan</a></li>
                </ul>
            </div>

            <!-- Col 3: Edukasi & Fitur -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Fitur & Informasi</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('news.index') }}" class="hover:text-red-400 transition">Pusat Berita Terkini</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-red-400 transition">Galeri Foto Sejarah</a></li>
                    <li><a href="{{ route('resources') }}" class="hover:text-red-400 transition">Materi Pembelajaran</a></li>
                    <li><a href="{{ route('quiz') }}" class="hover:text-red-400 transition">Kuis Interaktif</a></li>
                    <li><a href="{{ route('glossary') }}" class="hover:text-red-400 transition">Glosarium Istilah</a></li>
                    <li><a href="{{ route('petition') }}" class="hover:text-red-400 transition text-red-400 font-semibold">✍️ Petisi Solidaritas</a></li>
                    <li><a href="{{ route('sitemap') }}" class="hover:text-red-400 transition">Peta Situs (Sitemap)</a></li>
                </ul>
            </div>

            <!-- Col 4: Buletin Edukasi -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Buletin Edukasi</h3>
                <p class="text-xs text-slate-400 mb-3">Dapatkan rangkuman laporan kemanusiaan mingguan dan rilis materi edukasi langsung ke email Anda.</p>
                <form onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan di Palestine Knowledge Hub!');" class="space-y-2">
                    <input type="email" required placeholder="Masukkan email Anda..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white placeholder-slate-500 outline-none focus:border-red-500">
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:opacity-95 text-white font-bold text-sm transition shadow-md">
                        Berlangganan
                    </button>
                </form>
            </div>

        </div>

        <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <div class="flex flex-wrap items-center gap-3">
                <p>© {{ date('Y') }} Palestine Knowledge Hub. Platform Edukasi, Live Gaza Feed & Akses Kemanusiaan.</p>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-600/20 border border-red-500/40 text-red-300 font-bold text-xs">
                    🇮🇩 Karya Anak Indonesia
                </span>
            </div>
            <div class="flex items-center gap-6">
                <span>Edukasi</span>
                <span>•</span>
                <span>Kemanusiaan</span>
                <span>•</span>
                <span>Solidaritas</span>
            </div>
        </div>
    </div>
</footer>