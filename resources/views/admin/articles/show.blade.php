@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold">

{{ $article->title }}

</h1>

<p class="mt-4">

{!! nl2br(e($article->content)) !!}

</p>

@endsection