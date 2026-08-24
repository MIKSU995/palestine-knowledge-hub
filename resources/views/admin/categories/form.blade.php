<div class="space-y-5">

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Nama Kategori
        </label>
        <input
            type="text"
            name="name"
            class="w-full border border-slate-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
            placeholder="Contoh: Sejarah, Budaya, Politik..."
            value="{{ old('name', $category->name ?? '') }}">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-3 pt-2">
        <button
            type="submit"
            class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg shadow-emerald-900/20">
            Simpan Kategori
        </button>
        <a href="{{ route('admin.categories.index') }}"
           class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-xl font-bold transition">
            Batal
        </a>
    </div>

</div>