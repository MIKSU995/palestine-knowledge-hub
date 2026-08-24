<section class="relative py-20 bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 transition-colors overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">

        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-emerald-500/10 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-300 font-bold text-xs uppercase tracking-widest border border-emerald-500/20 shadow-sm">
                Pilar Pengetahuan Utama
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Jelajahi 6 Modul Pembelajaran
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed">
                Pelajari sejarah, geografi, warisan budaya, berita terkini, kuis interaktif, dan arsip dokumen otentik dalam satu platform edukasi.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1: Artikel & Bacaan -->
            <div class="group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 shadow-sm hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/10 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">1. Artikel & Bacaan Edukasi</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Kajian mendalam mengenai peristiwa bersejarah, warisan budaya, kajian wilayah, dan studi sejarah otentik.
                    </p>
                </div>
                <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-emerald-600 dark:text-emerald-400 mt-6 group-hover:translate-x-1 transition-transform">
                    <span>Lihat Artikel</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 2: Linimasa Sejarah -->
            <div class="group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 shadow-sm hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center mb-6 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">2. Linimasa Sejarah</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Urutan peristiwa dari Deklarasi Balfour 1917, Nakba 1948, Perang 1967, hingga perkembangan modern.
                    </p>
                </div>
                <a href="{{ route('timeline') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-amber-600 dark:text-amber-400 mt-6 group-hover:translate-x-1 transition-transform">
                    <span>Lihat Linimasa</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 3: Geografi & Peta -->
            <div class="group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 shadow-sm hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center mb-6 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">3. Peta & Geografi Interaktif</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Peta interaktif kota-kota bersejarah seperti Yerusalem, Gaza, Ramallah, Hebron, Nablus, Jaffa, dan Bethlehem.
                    </p>
                </div>
                <a href="{{ route('maps') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-blue-600 dark:text-blue-400 mt-6 group-hover:translate-x-1 transition-transform">
                    <span>Buka Peta</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 4: Kuis Interaktif -->
            <div class="group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 shadow-sm hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center mb-6 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-4a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">4. Kuis Interaktif</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Uji pemahaman Anda melalui pertanyaan pilihan ganda, sistem timer, dan penjelasan komprehensif.
                    </p>
                </div>
                <a href="{{ route('quiz') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-purple-600 dark:text-purple-400 mt-6 group-hover:translate-x-1 transition-transform">
                    <span>Mulai Kuis</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 5: Integrasi Berita Real-Time -->
            <div class="group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 shadow-sm hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-red-500/10 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center mb-6 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">5. Berita Terkini (Nasional & Global)</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Pusat pembaruan berita real-time yang terhubung langsung ke API berita Indonesia dan Internasional.
                    </p>
                </div>
                <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-red-600 dark:text-red-400 mt-6 group-hover:translate-x-1 transition-transform">
                    <span>Baca Berita</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Card 6: Galeri Foto Sejarah -->
            <div class="group relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 shadow-sm hover:shadow-xl hover:border-emerald-500/40 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-teal-500/10 dark:bg-teal-950/60 text-teal-600 dark:text-teal-400 flex items-center justify-center mb-6 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-slate-900 dark:text-white group-hover:text-teal-600 dark:group-hover:text-teal-400 transition-colors">6. Galeri & Arsip Visual</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-3 leading-relaxed">
                        Koleksi foto arsip, dokumen bersejarah, dan seni kebudayaan Palestina yang dikurasi secara rapi.
                    </p>
                </div>
                <a href="{{ route('gallery') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-teal-600 dark:text-teal-400 mt-6 group-hover:translate-x-1 transition-transform">
                    <span>Lihat Galeri</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

        </div>

    </div>
</section>