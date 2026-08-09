<div class="space-y-6">

    {{-- Title --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Article Title
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $article->title ?? '') }}"
            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600"
            placeholder="Enter article title">

        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Category --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Category
        </label>

        <select
            name="category_id"
            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

            <option value="">-- Select Category --</option>

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
            Thumbnail
        </label>

        @isset($article)
            @if(!empty($article->thumbnail))
                <img
                    src="{{ asset('storage/'.$article->thumbnail) }}"
                    class="w-48 rounded-lg mb-3">
            @endif
        @endisset

        <input
            type="file"
            name="thumbnail"
            class="w-full border rounded-lg px-4 py-2">

        @error('thumbnail')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>

    {{-- Excerpt --}}
    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Short Description
        </label>

        <textarea
            name="excerpt"
            rows="3"
            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600"
            placeholder="Short description...">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>

        @error('excerpt')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>

    {{-- Content --}}
    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Content
        </label>

        <textarea
            id="content"
            name="content"
            rows="12"
            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">{{ old('content', $article->content ?? '') }}</textarea>

        @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

    </div>

    {{-- Status --}}
    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Status
        </label>

        <select
            name="status"
            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

            <option value="draft"
                @selected(old('status', $article->status ?? 'draft') == 'draft')>
                Draft
            </option>

            <option value="published"
                @selected(old('status', $article->status ?? '') == 'published')>
                Published
            </option>

        </select>

    </div>

    {{-- Buttons --}}
    <div class="flex gap-3 pt-4">

        <button
            type="submit"
            class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

            Save Article

        </button>

        <a
            href="{{ route('admin.articles.index') }}"
            class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

            Cancel

        </a>

    </div>

</div>