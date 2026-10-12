@extends('layouts.admin')

@section('title', isset($petition->id) ? 'Edit Petisi' : 'Buat Petisi Baru')

@section('content')
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.petition.index') }}" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </a>
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
        {{ isset($petition->id) ? 'Edit: ' . $petition->title : 'Buat Petisi Baru' }}
    </h1>
</div>

<form action="{{ isset($petition->id) ? route('admin.petition.update', $petition) : route('admin.petition.store') }}"
      method="POST" class="space-y-6">
    @csrf
    @if(isset($petition->id)) @method('PUT') @endif

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-5">
                <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800 pb-3">Detail Petisi</h3>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Judul Petisi <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $petition->title) }}" required
                           class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Deskripsi Singkat <span class="text-red-500">*</span></label>
                    <textarea name="description" required rows="3"
                              class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition resize-none">{{ old('description', $petition->description) }}</textarea>
                    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Isi Petisi Lengkap</label>
                    <textarea name="content" rows="10"
                              class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition font-mono">{{ old('content', $petition->content) }}</textarea>
                    <p class="text-xs text-slate-400 mt-1">Teks lengkap surat petisi yang akan ditampilkan kepada penandatangan.</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Link Eksternal</label>
                    <input type="url" name="external_link" value="{{ old('external_link', $petition->external_link) }}"
                           placeholder="https://change.org/... (opsional)"
                           class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition">
                </div>
            </div>
        </div>

        <div class="space-y-5">
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-5">
                <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800 pb-3">Pengaturan</h3>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Target Tanda Tangan <span class="text-red-500">*</span></label>
                    <input type="number" name="target_signatures" value="{{ old('target_signatures', $petition->target_signatures ?? 10000) }}" required min="1"
                           class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition">
                </div>

                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $petition->is_active ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 accent-red-600">
                        <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">Petisi Aktif</span>
                    </label>
                    <p class="text-xs text-slate-400 mt-1">Petisi yang tidak aktif tidak akan ditampilkan ke publik.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-2xl transition shadow-md text-sm">
            {{ isset($petition->id) ? 'Simpan Perubahan' : 'Buat Petisi' }}
        </button>
        <a href="{{ route('admin.petition.index') }}" class="px-6 py-3 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-2xl text-sm font-bold transition hover:bg-slate-200 dark:hover:bg-slate-700">
            Batal
        </a>
    </div>
</form>
@endsection
