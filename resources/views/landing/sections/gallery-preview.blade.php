<section class="py-20 bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 transition-colors">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 font-bold text-xs uppercase tracking-wider">
                    Arsip Visual
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight mt-3">
                    Pratinjau Galeri Foto & Media Sejarah
                </h2>
            </div>
            <a href="{{ route('gallery') }}" class="inline-flex items-center gap-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 hover:underline">
                Buka Arsip Galeri →
            </a>
        </div>

        @if(isset($galleryPreview) && count($galleryPreview) > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($galleryPreview as $item)
            <a href="{{ route('gallery') }}" class="group relative h-48 rounded-2xl overflow-hidden shadow border border-slate-200 dark:border-slate-800">
                <img src="{{ \Illuminate\Support\Str::startsWith($item->image_url, 'http') ? $item->image_url : (str_starts_with($item->image_url, 'images/') ? asset($item->image_url) : asset('storage/' . $item->image_url)) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-3 text-white">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400">{{ $item->category }}</span>
                    <h4 class="text-xs font-bold line-clamp-2 leading-tight">{{ $item->title }}</h4>
                </div>
            </a>
            @endforeach
        </div>
        @endif

    </div>
</section>