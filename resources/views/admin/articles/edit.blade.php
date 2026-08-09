@extends('layouts.admin')

@section('title','Edit Article')

@section('content')

<h1 class="text-3xl font-bold mb-6">

Edit Article

</h1>

<form
action="{{ route('admin.articles.update',$article) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

@include('admin.articles.form')

<button
class="bg-green-700 text-white px-6 py-3 rounded-lg">

Update

</button>

</form>

@endsection