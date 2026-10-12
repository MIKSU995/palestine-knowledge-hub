{{-- Important Dates & Upcoming Events Section --}}
<section class="py-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex items-center gap-3 mb-10">
            <span class="w-1.5 h-8 rounded-full bg-red-600"></span>
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white flex items-center gap-2.5">
                    <svg class="w-6 h-6 text-red-600 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Hari-Hari Penting Palestina</span>
                </h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Tanggal bersejarah yang harus kita ingat dan maknai bersama</p>
            </div>
        </div>

        @php
            $importantDates = [
                [
                    'date'  => '15 Mei',
                    'name'  => 'Hari Nakba',
                    'arabic'=> 'يوم النكبة',
                    'desc'  => 'Memperingati pengusiran massal 700.000+ rakyat Palestina pada tahun 1948.',
                    'color' => 'red',
                    'icon_type' => 'dove',
                ],
                [
                    'date'  => '29 November',
                    'name'  => 'Hari Solidaritas Internasional',
                    'arabic'=> 'يوم التضامن الدولي',
                    'desc'  => 'Ditetapkan PBB pada 1977 sebagai Hari Solidaritas Internasional untuk Rakyat Palestina.',
                    'color' => 'green',
                    'icon_type' => 'globe',
                ],
                [
                    'date'  => '5 Juni',
                    'name'  => 'Hari Naksa (Perang 1967)',
                    'arabic'=> 'يوم النكسة',
                    'desc'  => 'Memperingati pendudukan Tepi Barat, Gaza, dan Yerusalem Timur dalam Perang Enam Hari 1967.',
                    'color' => 'amber',
                    'icon_type' => 'map',
                ],
                [
                    'date'  => '2 November',
                    'name'  => 'Hari Deklarasi Balfour',
                    'arabic'=> 'وعد بلفور',
                    'desc'  => 'Peringatan Deklarasi Balfour 1917 yang mengubah nasib tanah Palestina selamanya.',
                    'color' => 'blue',
                    'icon_type' => 'document',
                ],
                [
                    'date'  => '9 Desember',
                    'name'  => 'Hari Intifada Pertama',
                    'arabic'=> 'ذكرى الانتفاضة',
                    'desc'  => 'Memperingati dimulainya Intifada Pertama pada 1987 — kebangkitan massal rakyat Palestina.',
                    'color' => 'purple',
                    'icon_type' => 'shield',
                ],
                [
                    'date'  => '13 September',
                    'name'  => 'Perjanjian Oslo',
                    'arabic'=> 'اتفاقيات أوسلو',
                    'desc'  => 'Penandatanganan Perjanjian Oslo 1993 antara PLO dan Israel yang masih kontroversial hingga kini.',
                    'color' => 'slate',
                    'icon_type' => 'handshake',
                ],
            ];

            $colorMap = [
                'red'    => 'bg-red-50 dark:bg-red-950/30 border-red-200 dark:border-red-900/50 text-red-700 dark:text-red-400',
                'green'  => 'bg-green-50 dark:bg-green-950/30 border-green-200 dark:border-green-900/50 text-green-700 dark:text-green-400',
                'amber'  => 'bg-amber-50 dark:bg-amber-950/30 border-amber-200 dark:border-amber-900/50 text-amber-700 dark:text-amber-400',
                'blue'   => 'bg-blue-50 dark:bg-blue-950/30 border-blue-200 dark:border-blue-900/50 text-blue-700 dark:text-blue-400',
                'purple' => 'bg-purple-50 dark:bg-purple-950/30 border-purple-200 dark:border-purple-900/50 text-purple-700 dark:text-purple-400',
                'slate'  => 'bg-slate-50 dark:bg-slate-800/50 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-400',
            ];
        @endphp

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($importantDates as $event)
            @php $classes = $colorMap[$event['color']] ?? $colorMap['slate']; @endphp
            <div class="group flex gap-4 p-5 rounded-2xl border {{ $classes }} hover:shadow-lg transition duration-300">
                <div class="w-12 h-12 rounded-2xl bg-white/80 dark:bg-slate-800/80 border border-current/20 flex items-center justify-center flex-shrink-0 shadow-sm group-hover:scale-105 transition-transform">
                    @if($event['icon_type'] === 'dove')
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    @elseif($event['icon_type'] === 'globe')
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8"/></svg>
                    @elseif($event['icon_type'] === 'map')
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    @elseif($event['icon_type'] === 'document')
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    @elseif($event['icon_type'] === 'shield')
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    @else
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                    @endif
                </div>
                <div class="min-w-0">
                    <div class="text-xs font-extrabold uppercase tracking-wider opacity-70 mb-1">{{ $event['date'] }}</div>
                    <h3 class="font-extrabold text-slate-900 dark:text-white text-sm leading-snug">{{ $event['name'] }}</h3>
                    <p class="text-[11px] font-semibold opacity-60 mt-0.5" dir="rtl">{{ $event['arabic'] }}</p>
                    <p class="text-xs text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                        {{ $event['desc'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('timeline') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 dark:bg-slate-800 hover:bg-red-600 hover:text-white text-slate-700 dark:text-slate-300 rounded-2xl text-sm font-bold border border-slate-200 dark:border-slate-700 transition group">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Lihat Linimasa Sejarah Lengkap
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>
