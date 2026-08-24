<footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">

            <!-- Col 1: Brand & Mission -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-slate-800 flex items-center justify-center text-white font-black text-xl shadow-sm border border-slate-700">
                        P
                    </div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">
                        Palestine <span class="text-emerald-500">Hub</span>
                    </h2>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                    Platform edukasi terbuka dan pusat berita terkini yang didedikasikan untuk mengarsipkan sejarah, kebudayaan, geografi, dan wawasan otentik tentang Palestina.
                </p>
                <div class="pt-2 flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Pembaruan Berita Real-Time Aktif
                    </span>
                </div>
            </div>

            <!-- Col 2: Modul Utama -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Modul Utama</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('articles') }}" class="hover:text-emerald-400 transition">Artikel & Essay</a></li>
                    <li><a href="{{ route('timeline') }}" class="hover:text-emerald-400 transition">Linimasa Sejarah</a></li>
                    <li><a href="{{ route('maps') }}" class="hover:text-emerald-400 transition">Peta & Geografi</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-emerald-400 transition">Galeri Foto Sejarah</a></li>
                    <li><a href="{{ route('resources') }}" class="hover:text-emerald-400 transition">Materi Pembelajaran</a></li>
                </ul>
            </div>

            <!-- Col 3: Edukasi & Fitur -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Fitur & Informasi</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('news.index') }}" class="hover:text-emerald-400 transition">Pusat Berita Terkini</a></li>
                    <li><a href="{{ route('quiz') }}" class="hover:text-emerald-400 transition">Kuis Interaktif</a></li>
                    <li><a href="{{ route('learning.dashboard') }}" class="hover:text-emerald-400 transition">Dashboard Edukasi</a></li>
                    <li><a href="{{ route('bookmarks') }}" class="hover:text-emerald-400 transition">Artikel Tersimpan</a></li>
                    <li><a href="{{ route('sitemap') }}" class="hover:text-emerald-400 transition">Peta Situs (Sitemap)</a></li>
                </ul>
            </div>

            <!-- Col 4: Buletin Edukasi -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Buletin Edukasi</h3>
                <p class="text-xs text-slate-400 mb-3">Dapatkan artikel sejarah mingguan, rilis arsip baru, dan panduan edukasi langsung ke email Anda.</p>
                <form onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan di Palestine Knowledge Hub!');" class="space-y-2">
                    <input type="email" required placeholder="Masukkan email Anda..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white placeholder-slate-500 outline-none focus:border-emerald-500">
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">
                        Berlangganan
                    </button>
                </form>
            </div>

        </div>

        <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>© {{ date('Y') }} Palestine Knowledge Hub. Platform Edukasi & Informasi Otentik.</p>
            <div class="flex items-center gap-6">
                <span>Pelajari</span>
                <span>•</span>
                <span>Pahami</span>
                <span>•</span>
                <span>Ingat</span>
            </div>
        </div>
    </div>
</footer>