@extends('layouts.admin')

@section('title', 'Manajemen Budaya & Warisan')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">🎨 Budaya & Warisan Palestina</h1>
        <p class="text-xs text-slate-500 mt-1">Kelola konten warisan budaya, kuliner, seni, dan tradisi Palestina.</p>
    </div>
    <a href="{{ route('admin.culture.create') }}" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-xl transition shadow-md flex items-center gap-2">
        <span>+</span> Tambah Warisan Baru
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 text-xs font-bold">
    {{ session('success') }}
</div>
@endif

<div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950/50 text-[11px] font-extrabold uppercase text-slate-500 tracking-wider">
                    <th class="p-4">Judul & Arab</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Wilayah</th>
                    <th class="p-4">Featured</th>
                    <th class="p-4">Urutan</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-xs">
                @forelse($cultures as $culture)
                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            @if($culture->image_url)
                            <img src="{{ $culture->image_url }}" alt="{{ $culture->title }}" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                            @else
                            <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/40 flex items-center justify-center text-lg flex-shrink-0">🎨</div>
                            @endif
                            <div>
                                <div class="font-extrabold text-slate-900 dark:text-white text-sm">{{ $culture->title }}</div>
                                @if($culture->arabic_title)
                                <span class="text-xs text-red-600 dark:text-red-400 font-serif" dir="rtl">{{ $culture->arabic_title }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 rounded-lg bg-red-100 dark:bg-red-950 text-red-700 dark:text-red-300 text-[10px] font-extrabold">
                            {{ $culture->category }}
                        </span>
                    </td>
                    <td class="p-4 text-slate-500 dark:text-slate-400">
                        {{ $culture->region ?? '-' }}
                    </td>
                    <td class="p-4">
                        @if($culture->is_featured)
                        <span class="px-2 py-1 rounded-lg bg-amber-100 dark:bg-amber-950/40 text-amber-700 dark:text-amber-300 text-[10px] font-extrabold">⭐ Ya</span>
                        @else
                        <span class="text-slate-400 text-[10px]">Tidak</span>
                        @endif
                    </td>
                    <td class="p-4 text-slate-500">{{ $culture->sort_order }}</td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.culture.edit', $culture) }}" class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-red-600 hover:text-white rounded-lg font-bold transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.culture.destroy', $culture) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus warisan budaya ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-red-100 dark:bg-red-950/60 text-red-600 hover:bg-red-600 hover:text-white rounded-lg font-bold transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-12 text-center text-slate-400 font-medium">
                        Belum ada data warisan budaya. Klik tombol di atas untuk menambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($cultures->hasPages())
    <div class="p-4 border-t border-slate-200 dark:border-slate-800">
        {{ $cultures->links() }}
    </div>
    @endif
</div>
@endsection
