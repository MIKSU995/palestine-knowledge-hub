{{-- Important Dates & Upcoming Events Section --}}
<section class="py-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex items-center gap-3 mb-10">
            <span class="w-1.5 h-8 rounded-full bg-red-600"></span>
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white">📅 Hari-Hari Penting Palestina</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Tanggal bersejarah yang harus kita ingat dan rayakan bersama</p>
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
                    'icon'  => '🕊️',
                ],
                [
                    'date'  => '29 November',
                    'name'  => 'Hari Solidaritas Internasional',
                    'arabic'=> 'يوم التضامن الدولي',
                    'desc'  => 'Ditetapkan PBB pada 1977 sebagai Hari Solidaritas Internasional untuk Rakyat Palestina.',
                    'color' => 'green',
                    'icon'  => '🌍',
                ],
                [
                    'date'  => '5 Juni',
                    'name'  => 'Hari Naksa (Perang 1967)',
                    'arabic'=> 'يوم النكسة',
                    'desc'  => 'Memperingati pendudukan Tepi Barat, Gaza, dan Yerusalem Timur dalam Perang Enam Hari 1967.',
                    'color' => 'amber',
                    'icon'  => '🗺️',
                ],
                [
                    'date'  => '2 November',
                    'name'  => 'Hari Deklarasi Balfour',
                    'arabic'=> 'وعد بلفور',
                    'desc'  => 'Peringatan Deklarasi Balfour 1917 yang mengubah nasib tanah Palestina selamanya.',
                    'color' => 'blue',
                    'icon'  => '📜',
                ],
                [
                    'date'  => '9 Desember',
                    'name'  => 'Hari Intifada Pertama',
                    'arabic'=> 'ذكرى الانتفاضة',
                    'desc'  => 'Memperingati dimulainya Intifada Pertama pada 1987 — kebangkitan massal rakyat Palestina.',
                    'color' => 'purple',
                    'icon'  => '✊',
                ],
                [
                    'date'  => '13 September',
                    'name'  => 'Perjanjian Oslo',
                    'arabic'=> 'اتفاقيات أوسلو',
                    'desc'  => 'Penandatanganan Perjanjian Oslo 1993 antara PLO dan Israel yang masih kontroversial hingga kini.',
                    'color' => 'slate',
                    'icon'  => '🤝',
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
                <div class="text-3xl flex-shrink-0">{{ $event['icon'] }}</div>
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
