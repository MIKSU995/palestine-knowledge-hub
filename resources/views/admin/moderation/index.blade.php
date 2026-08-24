@extends('layouts.admin')

@section('title', 'Moderasi Komunitas')
@section('page_title', 'Moderasi Komunitas')
@section('page_subtitle', 'Setujui komentar, kelola laporan konten, dan jaga standar komunitas')

@section('content')

{{-- Reports Section --}}
<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden mb-8">
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-red-500 inline-block"></span>
                Konten Dilaporkan
            </h2>
            <p class="text-xs text-slate-400 mt-0.5">Konten yang ditandai pengguna sebagai tidak pantas atau tidak akurat</p>
        </div>
        <span class="text-xs font-bold text-slate-400">{{ $reports->total() }} laporan</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 font-semibold border-b border-slate-100">
                <tr>
                    <th class="p-4 pl-6">Pelapor</th>
                    <th class="p-4">Alasan</th>
                    <th class="p-4">Tipe Konten</th>
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 pr-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($reports as $report)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 pl-6 font-semibold text-slate-900">
                        {{ $report->user->name ?? 'Pengguna Tamu' }}
                    </td>
                    <td class="p-4 text-slate-600 max-w-xs truncate">
                        {{ $report->reason }}
                    </td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-100 text-slate-700">
                            {{ class_basename($report->reportable_type) }} #{{ $report->reportable_id }}
                        </span>
                    </td>
                    <td class="p-4 text-xs text-slate-400">
                        {{ $report->created_at->diffForHumans() }}
                    </td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold
                            {{ $report->status === 'resolved' ? 'bg-emerald-100 text-emerald-700' : ($report->status === 'dismissed' ? 'bg-slate-100 text-slate-600' : 'bg-amber-100 text-amber-700') }}">
                            {{ $report->status === 'resolved' ? 'Selesai' : ($report->status === 'dismissed' ? 'Diabaikan' : 'Menunggu') }}
                        </span>
                    </td>
                    <td class="p-4 pr-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            @if($report->status === 'pending')
                            <form action="{{ route('admin.moderation.report.resolve', $report->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="resolved">
                                <button type="submit" class="px-3 py-1 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition">
                                    Selesaikan
                                </button>
                            </form>
                            <form action="{{ route('admin.moderation.report.resolve', $report->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="dismissed">
                                <button type="submit" class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition">
                                    Abaikan
                                </button>
                            </form>
                            @else
                            <span class="text-xs text-slate-400 font-medium">Selesai</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-slate-400 text-sm">
                        Belum ada konten yang dilaporkan saat ini. 🎉
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($reports->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $reports->links() }}
    </div>
    @endif
</div>

{{-- All Comments Section --}}
<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                💬 Moderasi Komentar
            </h2>
            <p class="text-xs text-slate-400 mt-0.5">Setujui, tolak, atau hapus komentar diskusi komunitas</p>
        </div>
        <span class="text-xs font-bold text-slate-400">{{ $allComments->total() }} total komentar</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 font-semibold border-b border-slate-100">
                <tr>
                    <th class="p-4 pl-6">Penulis</th>
                    <th class="p-4">Komentar</th>
                    <th class="p-4">Artikel</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 pr-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($allComments as $comment)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 pl-6">
                        <p class="font-semibold text-slate-900">{{ $comment->user->name ?? 'Tamu' }}</p>
                        <p class="text-xs text-slate-400">{{ $comment->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="p-4 text-slate-700 max-w-sm">
                        <p class="line-clamp-2">{{ $comment->content }}</p>
                    </td>
                    <td class="p-4 text-xs font-medium text-slate-500 max-w-xs truncate">
                        {{ $comment->article->title ?? 'Umum' }}
                    </td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold
                            {{ $comment->status === 'approved' ? 'bg-emerald-100 text-emerald-700' : ($comment->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700') }}">
                            {{ $comment->status === 'approved' ? 'Disetujui' : ($comment->status === 'rejected' ? 'Ditolak' : 'Menunggu') }}
                        </span>
                    </td>
                    <td class="p-4 pr-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            @if($comment->status !== 'approved')
                            <form action="{{ route('admin.moderation.comment.update', $comment->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="px-3 py-1 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition">
                                    Setujui
                                </button>
                            </form>
                            @endif

                            @if($comment->status !== 'rejected')
                            <form action="{{ route('admin.moderation.comment.update', $comment->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="px-3 py-1 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-xs font-bold transition">
                                    Tolak
                                </button>
                            </form>
                            @endif

                            <form action="{{ route('admin.moderation.comment.delete', $comment->id) }}" method="POST" onsubmit="return confirm('Hapus komentar secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-bold transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-slate-400 text-sm">
                        Belum ada komentar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($allComments->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $allComments->links() }}
    </div>
    @endif
</div>

@endsection

