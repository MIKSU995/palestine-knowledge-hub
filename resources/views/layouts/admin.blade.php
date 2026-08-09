<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Palestine Knowledge Hub CMS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @stack('styles')
</head>

<body class="bg-slate-100 h-full">
<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-slate-900 flex-shrink-0 flex flex-col h-screen sticky top-0">
        {{-- Logo --}}
        <div class="p-6 border-b border-slate-800">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-emerald-600 flex items-center justify-center text-white font-extrabold text-lg shadow-lg shadow-emerald-900/40">🕌</div>
                <div>
                    <p class="text-white font-extrabold text-sm leading-tight">Palestine</p>
                    <p class="text-slate-400 text-xs font-medium">Knowledge Hub CMS</p>
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest px-3 mb-2">Main</p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest px-3 mt-5 mb-2">Content</p>

            <a href="{{ route('admin.articles.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.articles*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Articles
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.categories*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 012-2z"/></svg>
                Categories
            </a>

            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest px-3 mt-5 mb-2">Community</p>

            <a href="{{ route('admin.moderation.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.moderation*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Moderation
                @php $pendingCount = \App\Models\Report::where('status','pending')->count(); @endphp
                @if($pendingCount > 0)
                <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ $pendingCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.users*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Users
            </a>
        </nav>

        {{-- Bottom: Public Site Link + User --}}
        <div class="px-3 py-4 border-t border-slate-800 space-y-2">
            <a href="{{ route('home') }}" target="_blank"
               class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 text-xs font-semibold transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Public Site
            </a>
            <div class="flex items-center gap-3 px-3 py-2">
                <div class="w-7 h-7 rounded-full bg-emerald-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-xs font-semibold truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-slate-500 hover:text-red-400 text-[10px] font-medium transition">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main Content Area --}}
    <div class="flex-1 flex flex-col min-w-0">

        {{-- Top Bar --}}
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between sticky top-0 z-30 shadow-sm">
            <div>
                <h2 class="text-lg font-bold text-slate-900">@yield('page_title', 'Dashboard')</h2>
                <p class="text-xs text-slate-400 mt-0.5">@yield('page_subtitle', 'Palestine Knowledge Hub CMS')</p>
            </div>
            <div class="flex items-center gap-3">
                @if(session('success'))
                <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-xl">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="flex items-center gap-2 bg-red-50 border border-red-200 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-xl">
                    ⚠ {{ session('error') }}
                </div>
                @endif
            </div>
        </header>

        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

</div>

@stack('scripts')
</body>
</html>