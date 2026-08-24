@extends('layouts.admin')

@section('title', 'Kategori Artikel')
@section('page_title', 'Kategori Artikel')
@section('page_subtitle', 'Kelola dan kelompokkan artikel berdasarkan domain dan topik')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-slate-900">
            Manajemen Kategori
        </h1>
        <p class="text-xs text-slate-400 mt-0.5">
            Tambah, edit, atau tata ulang kategori artikel
        </p>
    </div>

    <a href="{{ route('admin.categories.create') }}"
       class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-2xl text-xs font-bold transition flex items-center gap-2 shadow-lg shadow-emerald-900/20">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="bg-slate-50 text-slate-500 font-semibold border-b border-slate-100">
            <tr>
                <th class="p-4 pl-6">#</th>
                <th class="p-4">Nama Kategori</th>
                <th class="p-4">Slug</th>
                <th class="p-4 pr-6 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($categories as $category)
            <tr class="hover:bg-slate-50 transition">
                <td class="p-4 pl-6 font-semibold text-slate-400 text-xs">
                    {{ $loop->iteration }}
                </td>
                <td class="p-4 font-bold text-slate-900">
                    {{ $category->name }}
                </td>
                <td class="p-4 text-xs font-mono text-slate-500">
                    {{ $category->slug }}
                </td>
                <td class="p-4 pr-6 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}"
                              method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-bold transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-8 text-center text-slate-400 text-sm">
                    Belum ada kategori yang ditemukan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($categories->hasPages())
<div class="mt-6">
    {{ $categories->links() }}
</div>
@endif

@endsection