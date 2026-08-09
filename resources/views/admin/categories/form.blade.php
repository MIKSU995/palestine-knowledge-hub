<div class="mb-5">

    <label class="font-semibold">
        Category Name
    </label>

    <input
        type="text"
        name="name"
        class="w-full border rounded-lg p-3"
        value="{{ old('name', $category->name ?? '') }}">

</div>

<button
    class="bg-green-600 text-white px-5 py-2 rounded">

    Save

</button>