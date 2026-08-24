@extends('layouts.admin')

@section('title', 'Tulis Artikel Baru')
@section('page_title', 'Tulis Artikel Baru')
@section('page_subtitle', 'Buat dan terbitkan artikel edukasi tentang Palestina')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('admin.articles.index') }}"
           class="flex items-center gap-1.5 text-xs font-bold text-slate-400 hover:text-slate-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Artikel
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">

        <div class="mb-8 pb-6 border-b border-slate-100">
            <h1 class="text-2xl font-extrabold text-slate-900">Tulis Artikel Baru</h1>
            <p class="text-sm text-slate-400 mt-1">Isi semua kolom di bawah ini untuk menerbitkan artikel edukasi.</p>
        </div>

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