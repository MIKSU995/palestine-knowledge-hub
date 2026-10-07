@extends('layouts.admin')

@section('title', $glossary->exists ? 'Edit Istilah Glosarium' : 'Tambah Istilah Glosarium')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                {{ $glossary->exists ? 'Edit Istilah Glosarium' : 'Tambah Istilah Glosarium' }}
            </h1>
            <p class="text-xs text-slate-500 mt-1">Isi formulir berikut untuk menambahkan atau memperbarui data glosarium.</p>
        </div>
        <a href="{{ route('admin.glossary.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-900 dark:hover:text-white">
            ← Kembali ke Daftar
        </a>
    </div>

    <form action="{{ $glossary->exists ? route('admin.glossary.update', $glossary) : route('admin.glossary.store') }}" method="POST" class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm space-y-5">
        @csrf
        @if($glossary->exists)
            @method('PUT')
        @endif

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">
                    Istilah (Term) *
                </label>
                <input type="text" name="term" value="{{ old('term', $glossary->term) }}" required placeholder="Contoh: Nakba" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm outline-none focus:ring-2 focus:ring-red-500">
                @error('term') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">
                    Tulisan Arab (Arabic Term)
                </label>
                <input type="text" name="arabic_term" value="{{ old('arabic_term', $glossary->arabic_term) }}" placeholder="Contoh: النكبة" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm outline-none focus:ring-2 focus:ring-red-500 font-serif" dir="rtl">
                @error('arabic_term') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">
                Kategori *
            </label>
            <select name="category" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm outline-none focus:ring-2 focus:ring-red-500">
                @foreach(['Sejarah', 'Geografi', 'Budaya', 'Hukum', 'Tokoh'] as $cat)
                <option value="{{ $cat }}" {{ old('category', $glossary->category) === $cat ? 'selected' : '' }}>
                    {{ $cat }}
                </option>
                @endforeach
            </select>
            @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">
                Definisi Ringkas *
            </label>
            <textarea name="definition" rows="3" required placeholder="Ringkasan definisi istilah..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm outline-none focus:ring-2 focus:ring-red-500">{{ old('definition', $glossary->definition) }}</textarea>
            @error('definition') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">
                Penjelasan Lengkap (Opsional)
            </label>
            <textarea name="description" rows="5" placeholder="Penjelasan rinci dan sejarah di balik istilah..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm outline-none focus:ring-2 focus:ring-red-500">{{ old('description', $glossary->description) }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">
                Etimologi / Asal-usul Kata (Opsional)
            </label>
            <input type="text" name="etymology" value="{{ old('etymology', $glossary->etymology) }}" placeholder="Contoh: Bahasa Arab: Nakba (bencana besar)" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm outline-none focus:ring-2 focus:ring-red-500">
            @error('etymology') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-end gap-3">
            <a href="{{ route('admin.glossary.index') }}" class="px-6 py-3 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs rounded-xl hover:bg-slate-200 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-xl transition shadow-md">
                {{ $glossary->exists ? 'Perbarui Istilah' : 'Simpan Istilah' }}
            </button>
        </div>
    </form>
</div>
@endsection
