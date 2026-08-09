@extends('layouts.admin')

@section('title','Create Article')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">
        <h1 class="text-4xl font-bold">
            Create Article
        </h1>

        <p class="text-gray-500 mt-2">
            Tambahkan artikel edukasi Palestina.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow p-8">

        <form
            action="{{ route('admin.articles.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @include('admin.articles.form')

        </form>

    </div>

</div>

@endsection