@extends('layouts.admin')

@section('title','Edit Category')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Category
</h1>

<form action="{{ route('admin.categories.update',$category) }}" method="POST">

    @csrf
    @method('PUT')

    @include('admin.categories.form')

</form>

@endsection