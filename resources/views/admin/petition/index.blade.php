@extends('layouts.admin')

@section('title', 'Manajemen Petisi')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">✍️ Petisi & Solidaritas</h1>
        <p class="text-xs text-slate-500 mt-1">Kelola petisi solidaritas dan pantau tanda tangan yang masuk.</p>
    </div>
    <a href="{{ route('admin.petition.create') }}" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-xl transition shadow-md flex items-center gap-2">
        <span>+</span> Buat Petisi Baru
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-600 dark:text-red-400 text-xs font-bold">
    {{ session('success') }}
</div>
@endif

<div class="grid md:grid-cols-2 gap-6 mb-8">
    @foreach($petitions as $petition)
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
        <div class="flex items-start justify-between gap-3 mb-4">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-2 h-2 rounded-full {{ $petition->is_active ? 'bg-green-500' : 'bg-slate-400' }} flex-shrink-0"></span>
                    <span class="text-xs font-bold {{ $petition->is_active ? 'text-green-600' : 'text-slate-400' }}">
                        {{ $petition->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
                <h3 class="font-extrabold text-slate-900 dark:text-white text-sm leading-snug">{{ $petition->title }}</h3>
            </div>
        </div>

        {{-- Progress --}}
        <div class="mb-4">
            <div class="flex justify-between text-xs mb-1.5">
                <span class="font-bold text-slate-900 dark:text-white">{{ number_format($petition->signature_count) }} tanda tangan</span>
                <span class="text-slate-400">Target: {{ number_format($petition->target_signatures) }}</span>
            </div>
            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-red-600 to-rose-500 rounded-full" style="width: {{ $petition->progress_percent }}%"></div>
            </div>
            <div class="flex justify-between mt-1">
                <span class="text-xs text-slate-400">{{ $petition->progress_percent }}%</span>
                <span class="text-xs text-slate-400">{{ number_format($petition->signatures_count ?? 0) }} via sistem</span>
            </div>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            <a href="{{ route('admin.petition.signatures', $petition) }}" class="px-3 py-1.5 bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 hover:bg-blue-100 rounded-lg font-bold text-xs transition">
                👁 Lihat Tanda Tangan
            </a>
            <a href="{{ route('admin.petition.edit', $petition) }}" class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-red-600 hover:text-white rounded-lg font-bold text-xs transition">
                Edit
            </a>
            <form action="{{ route('admin.petition.destroy', $petition) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus petisi ini? Semua tanda tangan juga akan dihapus.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1.5 bg-red-100 dark:bg-red-950/60 text-red-600 hover:bg-red-600 hover:text-white rounded-lg font-bold text-xs transition">
                    Hapus
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@if($petitions->hasPages())
<div class="p-4">
    {{ $petitions->links() }}
</div>
@endif
@endsection
