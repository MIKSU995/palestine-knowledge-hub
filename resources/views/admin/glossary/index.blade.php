@extends('layouts.admin')

@section('title', 'Manajemen Glosarium')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Glosarium Sejarah</h1>
        <p class="text-xs text-slate-500 mt-1">Kelola istilah, bahasa Arab, etimologi, dan definisi sejarah Palestina.</p>
    </div>
    <a href="{{ route('admin.glossary.create') }}" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-xl transition shadow-md flex items-center gap-2">
        <span>+</span> Tambah Istilah Baru
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
                    <th class="p-4">Istilah & Bahasa Arab</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Definisi Singkat</th>
                    <th class="p-4">Etimologi</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-xs">
                @forelse($glossaries as $glossary)
                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition">
                    <td class="p-4">
                        <div class="font-extrabold text-slate-900 dark:text-white text-sm">
                            {{ $glossary->term }}
                        </div>
                        @if($glossary->arabic_term)
                        <span class="text-xs text-red-600 dark:text-red-400 font-serif" dir="rtl">
                            {{ $glossary->arabic_term }}
                        </span>
                        @endif
                    </td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 rounded-lg bg-red-100 dark:bg-red-950 text-red-700 dark:text-red-300 text-[10px] font-extrabold">
                            {{ $glossary->category }}
                        </span>
                    </td>
                    <td class="p-4 text-slate-600 dark:text-slate-400 max-w-xs truncate">
                        {{ $glossary->definition }}
                    </td>
                    <td class="p-4 text-slate-500 max-w-xs truncate italic">
                        {{ $glossary->etymology ?? '-' }}
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.glossary.edit', $glossary) }}" class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-red-600 hover:text-white rounded-lg font-bold transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.glossary.destroy', $glossary) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus istilah ini?')">
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
                    <td colspan="5" class="p-12 text-center text-slate-400 font-medium">
                        Belum ada istilah glosarium. Klik tombol di atas untuk membuat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($glossaries->hasPages())
    <div class="p-4 border-t border-slate-200 dark:border-slate-800">
        {{ $glossaries->links() }}
    </div>
    @endif
</div>
@endsection
