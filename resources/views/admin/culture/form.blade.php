@extends('layouts.admin')

@section('title', isset($culture->id) ? 'Edit Warisan Budaya' : 'Tambah Warisan Budaya')

@section('content')
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.culture.index') }}" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </a>
    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
        {{ isset($culture->id) ? 'Edit: ' . $culture->title : 'Tambah Warisan Budaya Baru' }}
    </h1>
</div>

<form action="{{ isset($culture->id) ? route('admin.culture.update', $culture) : route('admin.culture.store') }}"
      method="POST" class="space-y-6">
    @csrf
    @if(isset($culture->id)) @method('PUT') @endif

    <div class="grid lg:grid-cols-2 gap-6">

        {{-- Left Column --}}
        <div class="space-y-5">

            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-5">
                <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800 pb-3">Informasi Utama</h3>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Judul <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $culture->title) }}" required
                           class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Nama Arab</label>
                    <input type="text" name="arabic_title" value="{{ old('arabic_title', $culture->arabic_title) }}" dir="rtl"
                           class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                        @foreach(['Pakaian & Seni', 'Kuliner', 'Seni & Musik', 'Tradisi', 'Kerajinan'] as $cat)
                        <option value="{{ $cat }}" {{ old('category', $culture->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Wilayah</label>
                    <input type="text" name="region" value="{{ old('region', $culture->region) }}"
                           placeholder="Contoh: Nablus, Gaza, Seluruh Palestina..."
                           class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Urutan (Sort Order)</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $culture->sort_order ?? 0) }}"
                               class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition">
                    </div>
                    <div class="flex items-end pb-3">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $culture->is_featured ?? false) ? 'checked' : '' }}
                                   class="w-4 h-4 accent-red-600">
                            <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">⭐ Featured</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">URL Gambar</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $culture->image_url) }}"
                           placeholder="https://images.unsplash.com/..."
                           class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition">
                </div>
            </div>

        </div>

        {{-- Right Column --}}
        <div class="space-y-5">

            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-5">
                <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800 pb-3">Konten</h3>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Deskripsi Singkat <span class="text-red-500">*</span></label>
                    <textarea name="description" required rows="4"
                              class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition resize-none">{{ old('description', $culture->description) }}</textarea>
                    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Konten Lengkap</label>
                    <textarea name="content" rows="10"
                              class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 transition">{{ old('content', $culture->content) }}</textarea>
                    <p class="text-xs text-slate-400 mt-1">Gunakan baris baru untuk memisahkan paragraf.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-2xl transition shadow-md text-sm">
            {{ isset($culture->id) ? 'Simpan Perubahan' : 'Tambah Warisan' }}
        </button>
        <a href="{{ route('admin.culture.index') }}" class="px-6 py-3 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-2xl text-sm font-bold transition hover:bg-slate-200 dark:hover:bg-slate-700">
            Batal
        </a>
    </div>
</form>
@endsection
