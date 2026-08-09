@extends('layouts.admin')

@section('title','Create Category')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Add Category
</h1>

<form action="{{ route('admin.categories.store') }}" method="POST">

    @csrf

    @include('admin.categories.form')

</form>

@endsection