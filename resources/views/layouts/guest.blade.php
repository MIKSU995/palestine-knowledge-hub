<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Palestine Knowledge Hub') }} — Autentikasi Akun</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex flex-col justify-between selection:bg-red-600 selection:text-white relative overflow-x-hidden">

    {{-- Glowing background accents --}}
    <div class="fixed top-0 left-1/4 w-[500px] h-[500px] bg-red-600/15 rounded-full blur-3xl pointer-events-none -translate-y-1/2"></div>
    <div class="fixed bottom-0 right-1/4 w-[500px] h-[500px] bg-rose-600/10 rounded-full blur-3xl pointer-events-none translate-y-1/2"></div>

    {{-- Top Bar Navigation back to Home --}}
    <header class="p-6 relative z-10">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-red-600 to-rose-700 flex items-center justify-center text-white text-xl font-extrabold shadow-lg shadow-red-900/40 group-hover:scale-105 transition border border-red-500">
                    P
                </div>
                <div>
                    <span class="font-extrabold text-white text-lg tracking-tight block">Palestine <span class="text-red-500">Hub</span></span>
                    <span class="text-xs text-red-400 font-semibold tracking-wider uppercase block -mt-1">Knowledge Hub</span>
                </div>
            </a>
            <a href="{{ route('home') }}" class="text-xs font-bold text-slate-400 hover:text-white flex items-center gap-2 transition bg-slate-900/80 px-4 py-2 rounded-xl border border-slate-800">
                ← Kembali ke Platform
            </a>
        </div>
    </header>

    {{-- Main Container --}}
    <main class="flex-1 flex items-center justify-center p-6 relative z-10">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="py-6 text-center text-xs text-slate-500 relative z-10 border-t border-slate-900 flex flex-col items-center justify-center gap-1.5">
        <p>© {{ date('Y') }} Palestine Knowledge Hub. Pelajari, Lestarikan, Berdayakan.</p>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-[11px] font-bold">
            🇮🇩 Karya Anak Indonesia
        </span>
    </footer>

</body>
</html>
