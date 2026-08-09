@extends('layouts.admin')

@section('title', 'Articles')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>
        <h1 class="text-3xl font-bold">
            Articles
        </h1>

        <p class="text-gray-500">
            Manage all articles.
        </p>
    </div>

    <a href="{{ route('admin.articles.create') }}"
        class="bg-green-700 text-white px-5 py-2 rounded-lg hover:bg-green-800">

        + New Article

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded mb-5">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

    <thead class="bg-gray-100">

        <tr>

            <th class="text-left p-4">Title</th>

            <th class="text-left p-4">Category</th>

            <th class="text-left p-4">Status</th>

            <th class="text-left p-4">Action</th>

        </tr>

    </thead>

    <tbody>

@forelse($articles as $article)

<tr class="border-b">

    <td class="p-4">

        {{ $article->title }}

    </td>

    <td class="p-4">

        {{ $article->category->name ?? '-' }}

    </td>

    <td class="p-4">

        {{ ucfirst($article->status) }}

    </td>

    <td class="p-4 flex gap-2">

        <a href="{{ route('admin.articles.edit',$article) }}"
            class="text-blue-600">

            Edit

        </a>

        <form
            action="{{ route('admin.articles.destroy',$article) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Delete this article?')"
                class="text-red-600">

                Delete

            </button>

        </form>

    </td>

</tr>

@empty

<tr>

<td colspan="4" class="text-center py-10">

No Articles Found

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