@extends('layouts.admin')

@section('title', 'Tanda Tangan - ' . $petition->title)

@section('content')
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.petition.index') }}" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </a>
    <div>
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Tanda Tangan</h1>
        <p class="text-xs text-slate-500 mt-0.5">{{ $petition->title }}</p>
    </div>
</div>

{{-- Stats Bar --}}
<div class="grid grid-cols-3 gap-5 mb-8">
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-5 text-center">
        <div class="text-2xl font-black text-slate-900 dark:text-white">{{ number_format($petition->signature_count) }}</div>
        <div class="text-xs text-slate-400 mt-1">Total Tanda Tangan</div>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-5 text-center">
        <div class="text-2xl font-black text-red-600">{{ $petition->progress_percent }}%</div>
        <div class="text-xs text-slate-400 mt-1">Dari Target</div>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-5 text-center">
        <div class="text-2xl font-black text-slate-900 dark:text-white">{{ number_format($petition->target_signatures) }}</div>
        <div class="text-xs text-slate-400 mt-1">Target Tanda Tangan</div>
    </div>
</div>

<div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950/50 text-[11px] font-extrabold uppercase text-slate-500 tracking-wider">
                    <th class="p-4">#</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Kota & Negara</th>
                    <th class="p-4">Pesan</th>
                    <th class="p-4">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-xs">
                @forelse($signatures as $sig)
                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition">
                    <td class="p-4 text-slate-400">{{ $loop->iteration + ($signatures->currentPage() - 1) * $signatures->perPage() }}</td>
                    <td class="p-4">
                        <div class="font-bold text-slate-900 dark:text-white">{{ $sig->name }}</div>
                        @if($sig->email)
                        <div class="text-slate-400 text-[10px]">{{ $sig->email }}</div>
                        @endif
                    </td>
                    <td class="p-4 text-slate-600 dark:text-slate-400">
                        {{ $sig->city ? $sig->city . ', ' : '' }}{{ $sig->country }}
                    </td>
                    <td class="p-4 text-slate-500 max-w-xs">
                        @if($sig->message)
                        <span class="italic">"{{ Str::limit($sig->message, 80) }}"</span>
                        @else
                        <span class="text-slate-300">-</span>
                        @endif
                    </td>
                    <td class="p-4 text-slate-400">{{ $sig->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-12 text-center text-slate-400 font-medium">
                        Belum ada tanda tangan untuk petisi ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($signatures->hasPages())
    <div class="p-4 border-t border-slate-200 dark:border-slate-800">
        {{ $signatures->links() }}
    </div>
    @endif
</div>
@endsection
