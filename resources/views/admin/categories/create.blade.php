@extends('layouts.admin')

@section('title', 'Tambah Kategori')
@section('page_title', 'Tambah Kategori Baru')
@section('page_subtitle', 'Buat kategori baru untuk mengelompokkan artikel')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6 flex items-center gap-4">
        <a href="{{ route('admin.categories.index') }}"
           class="flex items-center gap-1.5 text-xs font-bold text-slate-400 hover:text-slate-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Kategori
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">

        <div class="mb-8 pb-6 border-b border-slate-100">
            <h1 class="text-2xl font-extrabold text-slate-900">Tambah Kategori</h1>
            <p class="text-sm text-slate-400 mt-1">Kategori digunakan untuk mengelompokkan artikel berdasarkan topik.</p>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            @include('admin.categories.form')
        </form>

    </div>

</div>

@endsection