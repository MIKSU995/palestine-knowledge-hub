<div class="space-y-6">

    {{-- Title --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Judul Artikel
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $article->title ?? '') }}"
            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-600 border-slate-200"
            placeholder="Masukkan judul artikel">

        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Category --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Kategori
        </label>

        <select
            name="category_id"
            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-600 border-slate-200">

            <option value="">-- Pilih Kategori --</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $article->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach

        </select>

        @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Thumbnail --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Gambar Sampul (Thumbnail)
        </label>

        @isset($article)
            @if(!empty($article->thumbnail))
                <img
                    src="{{ asset('storage/'.$article->thumbnail) }}"
                    class="w-48 rounded-xl mb-3 border border-slate-200">
            @endif
        @endisset

        <input
            type="file"
            name="thumbnail"
            class="w-full border rounded-xl px-4 py-2 border-slate-200">

        @error('thumbnail')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Excerpt --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Deskripsi Singkat (Ringkasan)
        </label>

        <textarea
            name="excerpt"
            rows="3"
            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-600 border-slate-200"
            placeholder="Ringkasan singkat artikel...">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>

        @error('excerpt')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Content --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Isi Konten Artikel
        </label>

        <textarea
            id="content"
            name="content"
            rows="12"
            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-600 border-slate-200">{{ old('content', $article->content ?? '') }}</textarea>

        @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Status --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Status Publikasi
        </label>

        <select
            name="status"
            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-600 border-slate-200">

            <option value="draft"
                @selected(old('status', $article->status ?? 'draft') == 'draft')>
                Draf (Draft)
            </option>

            <option value="published"
                @selected(old('status', $article->status ?? '') == 'published')>
                Terbitkan (Published)
            </option>

        </select>
    </div>

    {{-- Buttons --}}
    <div class="flex gap-3 pt-4">
        <button
            type="submit"
            class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-bold transition">
            Simpan Artikel
        </button>

        <a
            href="{{ route('admin.articles.index') }}"
            class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-6 py-3 rounded-xl font-bold transition">
            Batal
        </a>
    </div>

</div>