@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Palestine Knowledge Hub overview and quick stats')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-11 h-11 rounded-2xl bg-emerald-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg">Articles</span>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalArticles }}</p>
        <p class="text-sm text-slate-400 mt-1.5">Total articles published</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-lg">Users</span>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalUsers }}</p>
        <p class="text-sm text-slate-400 mt-1.5">Registered users</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between mb-4">
            <div class="w-11 h-11 rounded-2xl bg-purple-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-2 py-1 rounded-lg">Quizzes</span>
        </div>
        <p class="text-4xl font-extrabold text-slate-900">{{ $totalQuizzes }}</p>
        <p class="text-sm text-slate-400 mt-1.5">Knowledge quizzes</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition {{ $pendingReports > 0 ? 'border-red-200 bg-red-50' : '' }}">
        <div class="flex items-center justify-between mb-4">
            <div class="w-11 h-11 rounded-2xl {{ $pendingReports > 0 ? 'bg-red-100' : 'bg-slate-100' }} flex items-center justify-center">
                <svg class="w-5 h-5 {{ $pendingReports > 0 ? 'text-red-600' : 'text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <span class="text-xs font-semibold {{ $pendingReports > 0 ? 'text-red-600 bg-red-100' : 'text-slate-600 bg-slate-100' }} px-2 py-1 rounded-lg">Reports</span>
        </div>
        <p class="text-4xl font-extrabold {{ $pendingReports > 0 ? 'text-red-700' : 'text-slate-900' }}">{{ $pendingReports }}</p>
        <p class="text-sm {{ $pendingReports > 0 ? 'text-red-400' : 'text-slate-400' }} mt-1.5">Pending review</p>
    </div>

</div>

{{-- Main Panels --}}
<div class="grid lg:grid-cols-2 gap-6">

    {{-- Recent Articles --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
            <h2 class="font-bold text-slate-900 flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Recent Articles
            </h2>
            <a href="{{ route('admin.articles.create') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 hover:underline">+ New Article</a>
        </div>
        <div class="divide-y divide-slate-50">
            @forelse($recentArticles as $article)
            <div class="px-6 py-4 flex items-center gap-3 hover:bg-slate-50 transition">
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-slate-900 text-sm truncate">{{ $article->title }}</p>
                    <p class="text-xs text-slate-400 mt-0.5">
                        {{ $article->category->name ?? '—' }} •
                        {{ $article->published_at ? $article->published_at->format('d M Y') : 'Not published' }}
                    </p>
                </div>
                <span class="flex-shrink-0 px-2.5 py-1 rounded-lg text-xs font-bold
                    {{ $article->status === 'published' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                    {{ ucfirst($article->status) }}
                </span>
                <div class="flex gap-2 flex-shrink-0">
                    <a href="{{ route('admin.articles.edit', $article) }}" class="text-xs text-slate-400 hover:text-blue-600 transition font-semibold">Edit</a>
                </div>
            </div>
            @empty
            <div class="px-6 py-10 text-center text-slate-400 text-sm">
                No articles yet. <a href="{{ route('admin.articles.create') }}" class="text-emerald-600 font-semibold hover:underline">Create the first one →</a>
            </div>
            @endforelse
        </div>
        @if($recentArticles->isNotEmpty())
        <div class="px-6 py-3 border-t border-slate-100">
            <a href="{{ route('admin.articles.index') }}" class="text-xs font-semibold text-slate-400 hover:text-emerald-600 transition">View all articles →</a>
        </div>
        @endif
    </div>

    {{-- Recent Reports --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
            <h2 class="font-bold text-slate-900 flex items-center gap-2">
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Recent Reports
            </h2>
            <a href="{{ route('admin.moderation.index') }}" class="text-xs font-bold text-red-500 hover:text-red-600 hover:underline">View All</a>
        </div>
        <div class="divide-y divide-slate-50">
            @forelse($recentReports as $report)
            <div class="px-6 py-4 flex items-start gap-3 hover:bg-slate-50 transition">
                <div class="w-8 h-8 rounded-xl bg-slate-100 flex items-center justify-center text-sm flex-shrink-0">
                    {{ strtoupper(substr($report->user->name ?? 'G', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-slate-900 text-sm">{{ $report->reason }}</p>
                    <p class="text-xs text-slate-400 mt-0.5">
                        By {{ $report->user->name ?? 'Guest' }} • {{ $report->created_at->diffForHumans() }}
                    </p>
                </div>
                <span class="flex-shrink-0 px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-100 text-amber-700">
                    {{ ucfirst($report->status) }}
                </span>
            </div>
            @empty
            <div class="px-6 py-10 text-center text-slate-400 text-sm">
                No reports yet. All clear! ✅
            </div>
            @endforelse
        </div>
    </div>

</div>

{{-- Quick Actions --}}
<div class="mt-6 grid sm:grid-cols-3 gap-4">
    <a href="{{ route('admin.articles.create') }}" class="flex items-center gap-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl px-5 py-4 font-bold text-sm transition shadow-lg shadow-emerald-900/20 group">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Write New Article
        <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
    <a href="{{ route('admin.categories.create') }}" class="flex items-center gap-3 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 rounded-2xl px-5 py-4 font-bold text-sm transition shadow-sm">
        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 012-2z"/></svg>
        Add Category
    </a>
    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 rounded-2xl px-5 py-4 font-bold text-sm transition shadow-sm">
        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        View Public Site
    </a>
</div>

@endsection