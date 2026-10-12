<section class="py-20 bg-gradient-to-br from-red-700 via-rose-800 to-slate-950 text-white relative overflow-hidden w-full max-w-full">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-red-500/20 via-transparent to-transparent pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10 space-y-6">
        <span class="px-4 py-1.5 rounded-full bg-white/20 text-white text-xs font-extrabold uppercase tracking-wider border border-white/30">
            Uji Pemahaman Interaktif
        </span>

        <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
            Uji Wawasan Sejarah & Kebudayaan Palestina Anda
        </h2>

        <p class="text-base sm:text-lg text-rose-100 leading-relaxed max-w-2xl mx-auto">
            Ikuti kuis edukasi interaktif kami, raih lencana pencapaian, dan pantau perkembangan belajar Anda di dashboard pribadi.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="{{ route('quiz') }}" class="px-8 py-4 rounded-2xl bg-white text-red-700 font-black text-base hover:bg-red-50 transition shadow-2xl">
                Mulai Kuis Edukasi
            </a>
            <a href="{{ route('learning.dashboard') }}" class="px-8 py-4 rounded-2xl border-2 border-white/60 hover:bg-white/15 text-white font-bold text-base transition">
                Buka Dashboard Saya
            </a>
        </div>
    </div>
</section>