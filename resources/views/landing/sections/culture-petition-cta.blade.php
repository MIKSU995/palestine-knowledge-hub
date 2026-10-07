{{-- Culture & Petition Dual CTA Section --}}
<section class="py-16 bg-slate-50 dark:bg-slate-950">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8">

            {{-- Culture CTA --}}
            <a href="{{ route('culture') }}"
               class="group relative overflow-hidden rounded-3xl p-8 bg-gradient-to-br from-red-700 to-rose-800 text-white shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between min-h-[260px]">
                <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.6\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
                <div class="absolute top-0 right-0 w-48 h-48 rounded-full bg-white/10 blur-3xl group-hover:bg-white/15 transition-all duration-500"></div>

                <div class="relative z-10">
                    <div class="text-5xl mb-4">🎨</div>
                    <h2 class="text-2xl font-extrabold leading-tight">Jelajahi Budaya<br>& Warisan Palestina</h2>
                    <p class="text-red-100 text-sm mt-3 leading-relaxed max-w-sm">
                        Dari Tatreez hingga Knafeh Nablus, dari tarian Dabke hingga ladang zaitun ribuan tahun — kenali kekayaan budaya yang tak ternilai.
                    </p>
                </div>

                <div class="relative z-10 mt-6 flex items-center gap-2 font-extrabold text-sm group-hover:translate-x-1 transition-transform">
                    Jelajahi Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            {{-- Petition CTA --}}
            <a href="{{ route('petition') }}"
               class="group relative overflow-hidden rounded-3xl p-8 bg-slate-900 dark:bg-slate-800 text-white shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between min-h-[260px] border border-slate-700 hover:border-red-500/50">
                <div class="absolute top-0 right-0 w-48 h-48 rounded-full bg-red-600/10 blur-3xl group-hover:bg-red-600/15 transition-all duration-500"></div>

                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-4">
                        <div class="text-5xl">✍️</div>
                        <span class="px-3 py-1 rounded-full bg-red-600/20 border border-red-500/30 text-red-300 text-xs font-extrabold uppercase tracking-wider">Aktif</span>
                    </div>
                    <h2 class="text-2xl font-extrabold leading-tight">Tandatangani Petisi<br>Solidaritas</h2>
                    <p class="text-slate-400 text-sm mt-3 leading-relaxed max-w-sm">
                        Bergabunglah dengan ribuan warga Indonesia yang telah menyuarakan dukungan untuk rakyat Palestina melalui petisi digital.
                    </p>
                </div>

                <div class="relative z-10 mt-6">
                    {{-- Mini Progress --}}
                    <div class="mb-4">
                        <div class="flex justify-between text-xs text-slate-400 mb-1.5">
                            <span>Total Pendukung</span>
                            <span class="font-bold text-white">87,342+</span>
                        </div>
                        <div class="h-1.5 bg-slate-700 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-red-600 to-rose-500 rounded-full" style="width: 87%"></div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 font-extrabold text-sm group-hover:translate-x-1 transition-transform text-red-400">
                        Tandatangani Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>
