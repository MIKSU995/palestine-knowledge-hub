@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold">
            Kelola Artikel
        </h1>
        <p class="text-gray-500">
            Kelola dan publikasikan artikel edukasi Palestina.
        </p>
    </div>

    <a href="{{ route('admin.articles.create') }}"
        class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-emerald-700 transition">
        + Artikel Baru
    </a>
</div>

@if(session('success'))
<div class="bg-emerald-100 text-emerald-700 p-4 rounded-xl mb-5 font-semibold">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
<table class="w-full text-sm">
    <thead class="bg-slate-50 border-b border-slate-200">
        <tr>
            <th class="text-left p-4 font-bold text-slate-700">Judul Artikel</th>
            <th class="text-left p-4 font-bold text-slate-700">Kategori</th>
            <th class="text-left p-4 font-bold text-slate-700">Status</th>
            <th class="text-left p-4 font-bold text-slate-700">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
@forelse($articles as $article)
<tr class="hover:bg-slate-50 transition">
    <td class="p-4 font-semibold text-slate-900">
        {{ $article->title }}
    </td>
    <td class="p-4 text-slate-600">
        {{ $article->category->name ?? '-' }}
    </td>
    <td class="p-4">
        <span class="px-2.5 py-1 rounded-lg text-xs font-bold {{ $article->status === 'published' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
            {{ $article->status === 'published' ? 'Terbit' : 'Draf' }}
        </span>
    </td>
    <td class="p-4 flex gap-3">
        <a href="{{ route('admin.articles.edit',$article) }}"
            class="text-blue-600 hover:underline font-semibold">
            Edit
        </a>
        <form
            action="{{ route('admin.articles.destroy',$article) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button
                onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')"
                class="text-red-600 hover:underline font-semibold">
                Hapus
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
<td colspan="4" class="text-center py-10 text-slate-400">
    Belum Ada Artikel
</td>
</tr>
@endforelse
    </tbody>
</table>
</div>

<div class="mt-6">
{{ $articles->links() }}
</div>

@endsection