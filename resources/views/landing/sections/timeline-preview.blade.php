<section class="py-20 bg-slate-900 text-white border-b border-slate-800 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-full bg-amber-500/20 text-amber-300 font-bold text-xs uppercase tracking-wider">
                    Kronologi Sejarah
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mt-3">
                    Peristiwa Penting Sejarah Modern Palestina
                </h2>
            </div>
            <a href="{{ route('timeline') }}" class="inline-flex items-center gap-2 text-sm font-bold text-amber-400 hover:underline">
                Buka Linimasa Interaktif →
            </a>
        </div>

        @if(isset($timelinePreview) && count($timelinePreview) > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($timelinePreview as $event)
            <div class="p-6 rounded-3xl bg-slate-800/80 border border-slate-700 hover:border-amber-500/60 transition duration-300 flex flex-col justify-between">
                <div>
                    <span class="px-3 py-1 rounded-lg bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-bold">
                        Tahun {{ $event->year }}
                    </span>
                    @if($event->image_url)
                    <div class="mt-3 rounded-xl overflow-hidden h-36 bg-slate-900 shadow">
                        <img src="{{ \Illuminate\Support\Str::startsWith($event->image_url, 'http') ? $event->image_url : asset($event->image_url) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                    </div>
                    @endif
                    <h3 class="text-lg font-bold text-white mt-4 line-clamp-2">
                        {{ $event->title }}
                    </h3>
                    <p class="text-xs text-slate-400 mt-2 font-medium">
                        Era: {{ $event->era }}
                    </p>
                    <p class="text-sm text-slate-300 mt-3 line-clamp-3 leading-relaxed">
                        {{ $event->description }}
                    </p>
                </div>

                <a href="{{ route('timeline') }}#event-{{ $event->id }}" class="mt-6 text-xs font-bold text-amber-400 hover:underline inline-flex items-center gap-1">
                    <span>Baca Konteks Sejarah</span>
                    <span>→</span>
                </a>
            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>