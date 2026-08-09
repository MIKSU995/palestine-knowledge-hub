@extends('layouts.app')

@section('title', 'My Learning Dashboard | Palestine Knowledge Hub')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden" style="min-height: 380px;">

    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/dome-of-rock.jpg') }}"
            alt="Dome of the Rock – Jerusalem"
            class="w-full h-full object-cover object-center"
            style="object-position: center 30%;">
    </div>

    {{-- Dark gradient overlay --}}
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(0,0,0,0.72) 0%, rgba(15,23,42,0.60) 50%, rgba(0,0,0,0.80) 100%);"></div>

    {{-- Animated shimmer line --}}
    <div class="absolute top-0 left-0 right-0 h-px" style="background: linear-gradient(90deg, transparent, rgba(167,243,208,0.6), transparent); animation: shimmer 3s infinite;"></div>

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-16 flex flex-col sm:flex-row items-start sm:items-end justify-between gap-8">

        {{-- Left: Welcome info --}}
        <div class="flex-1">
            {{-- Badge --}}
            <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-5"
                  style="background:rgba(139,92,246,0.25); border:1px solid rgba(167,139,250,0.4); color:#c4b5fd; backdrop-filter:blur(8px);">
                📊 Learning Dashboard
            </span>

            {{-- Greeting --}}
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight" style="text-shadow: 0 2px 16px rgba(0,0,0,0.5);">
                Welcome back,<br>
                <span style="background: linear-gradient(90deg, #6ee7b7, #a78bfa); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                    {{ $user->name }}!
                </span>
            </h1>

            <p class="mt-4 text-slate-300 text-base max-w-lg leading-relaxed" style="text-shadow: 0 1px 4px rgba(0,0,0,0.4);">
                Track your Palestine learning journey, quiz results, and earned badges.
                <span class="block mt-1 text-slate-400 text-sm italic">🕌 "Al-Quds will never be forgotten."</span>
            </p>

            {{-- Quick stats bar --}}
            <div class="flex flex-wrap gap-4 mt-7">
                <div class="flex items-center gap-2 px-4 py-2.5 rounded-2xl text-sm font-semibold"
                     style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.18); backdrop-filter:blur(10px); color:#fff;">
                    📝 <span>{{ $attempts->count() }} Attempts</span>
                </div>
                <div class="flex items-center gap-2 px-4 py-2.5 rounded-2xl text-sm font-semibold"
                     style="background:rgba(16,185,129,0.2); border:1px solid rgba(52,211,153,0.3); backdrop-filter:blur(10px); color:#6ee7b7;">
                    ✅ <span>{{ $totalCompletedQuizzes }} Passed</span>
                </div>
                <div class="flex items-center gap-2 px-4 py-2.5 rounded-2xl text-sm font-semibold"
                     style="background:rgba(245,158,11,0.2); border:1px solid rgba(251,191,36,0.3); backdrop-filter:blur(10px); color:#fde68a;">
                    📊 <span>{{ $avgScore }}% Avg</span>
                </div>
                <div class="flex items-center gap-2 px-4 py-2.5 rounded-2xl text-sm font-semibold"
                     style="background:rgba(99,102,241,0.2); border:1px solid rgba(129,140,248,0.3); backdrop-filter:blur(10px); color:#c7d2fe;">
                    🏅 <span>{{ count($badges) }} Badges</span>
                </div>
            </div>
        </div>

        {{-- Right: CTA --}}
        <div class="flex flex-col items-center gap-3 flex-shrink-0">
            <a href="{{ route('quiz') }}"
               class="inline-flex items-center gap-2 px-7 py-3.5 rounded-2xl text-white font-bold text-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl"
               style="background: linear-gradient(135deg, #7c3aed, #4f46e5); box-shadow: 0 4px 24px rgba(124,58,237,0.5);">
                ▶ Take a Quiz
            </a>
            <a href="{{ route('articles') }}"
               class="inline-flex items-center gap-2 px-7 py-3 rounded-2xl font-semibold text-sm transition-all duration-300 hover:-translate-y-1"
               style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.25); backdrop-filter:blur(10px); color:#fff;">
                📚 Browse Articles
            </a>
            {{-- Image credit --}}
            <p class="text-xs text-slate-400 mt-1 opacity-60">📍 Dome of the Rock, Jerusalem</p>
        </div>

    </div>

    {{-- Bottom fade --}}
    <div class="absolute bottom-0 left-0 right-0 h-16" style="background: linear-gradient(to bottom, transparent, #f8fafc);"></div>

    <style>
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .dark section .absolute:last-child {
            background: linear-gradient(to bottom, transparent, #020617) !important;
        }
    </style>

</section>

<section class="py-10 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Stats Row --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-5 shadow-sm">
                <div class="w-10 h-10 rounded-2xl bg-purple-100 dark:bg-purple-950/60 flex items-center justify-center text-xl mb-3">📝</div>
                <p class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $attempts->count() }}</p>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Quiz Attempts</p>
            </div>
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-5 shadow-sm">
                <div class="w-10 h-10 rounded-2xl bg-emerald-100 dark:bg-emerald-950/60 flex items-center justify-center text-xl mb-3">✅</div>
                <p class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $totalCompletedQuizzes }}</p>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Quizzes Passed</p>
            </div>
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-5 shadow-sm">
                <div class="w-10 h-10 rounded-2xl bg-amber-100 dark:bg-amber-950/60 flex items-center justify-center text-xl mb-3">📊</div>
                <p class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $avgScore }}%</p>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Average Score</p>
            </div>
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-5 shadow-sm">
                <div class="w-10 h-10 rounded-2xl bg-blue-100 dark:bg-blue-950/60 flex items-center justify-center text-xl mb-3">🏅</div>
                <p class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ count($badges) }}</p>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Badges Earned</p>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- Left: Attempts & Badges --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Badges --}}
                @if(count($badges) > 0)
                <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        🏅 Earned Badges
                    </h2>
                    <div class="grid sm:grid-cols-2 gap-3">
                        @foreach($badges as $badge)
                        <div class="flex items-start gap-3 p-4 rounded-2xl {{ $badge['color'] }}">
                            <div class="text-3xl flex-shrink-0">{{ $badge['icon'] }}</div>
                            <div>
                                <p class="font-bold text-sm">{{ $badge['title'] }}</p>
                                <p class="text-xs opacity-80 mt-0.5">{{ $badge['description'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Quiz History --}}
                <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        Quiz History
                    </h2>

                    @if($attempts->isEmpty())
                    <div class="text-center py-10 text-slate-400">
                        <div class="text-4xl mb-3">🧠</div>
                        <p class="font-medium">No quiz attempts yet.</p>
                        <a href="{{ route('quiz') }}" class="mt-4 inline-block text-sm text-purple-600 dark:text-purple-400 font-semibold hover:underline">Take your first quiz →</a>
                    </div>
                    @else
                    <div class="space-y-3">
                        @foreach($attempts as $attempt)
                        <div class="flex items-center gap-4 p-4 rounded-2xl border {{ $attempt->passed ? 'border-emerald-200 dark:border-emerald-800/50 bg-emerald-50 dark:bg-emerald-950/30' : 'border-slate-200 dark:border-slate-800' }} transition">
                            <div class="w-12 h-12 rounded-2xl {{ $attempt->passed ? 'bg-emerald-100 dark:bg-emerald-950' : 'bg-slate-100 dark:bg-slate-800' }} flex items-center justify-center font-extrabold text-sm {{ $attempt->passed ? 'text-emerald-600 dark:text-emerald-400' : 'text-slate-500 dark:text-slate-400' }} flex-shrink-0">
                                {{ $attempt->score }}%
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-slate-900 dark:text-white text-sm truncate">{{ $attempt->quiz->title ?? 'Unknown Quiz' }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                                    {{ $attempt->total_questions }} questions •
                                    {{ $attempt->completed_at ? $attempt->completed_at->diffForHumans() : 'Recently' }}
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                @if($attempt->passed)
                                <span class="px-2.5 py-1 rounded-lg bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 text-xs font-bold">PASSED</span>
                                @else
                                <span class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-bold">RETRY</span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right: Recommended Articles --}}
            <div class="space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        📚 Recommended Reading
                    </h2>
                    <div class="space-y-4">
                        @foreach($recommendedArticles as $article)
                        <a href="{{ route('articles.show', $article->slug) }}" class="flex items-start gap-3 group">
                            @if($article->thumbnail)
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-14 h-14 rounded-xl object-cover flex-shrink-0">
                            @else
                            <div class="w-14 h-14 rounded-xl bg-emerald-100 dark:bg-emerald-950/50 flex items-center justify-center text-xl flex-shrink-0">📄</div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition line-clamp-2 leading-snug">
                                    {{ $article->title }}
                                </p>
                                @if($article->category)
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $article->category->name }}</p>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <a href="{{ route('articles') }}" class="mt-5 w-full block text-center py-2.5 border border-slate-200 dark:border-slate-700 hover:border-emerald-500 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 rounded-2xl transition">
                        Browse All Articles →
                    </a>
                </div>

                {{-- Quick Links --}}
                <div class="bg-gradient-to-br from-purple-600 to-indigo-700 rounded-3xl p-5 text-white">
                    <h3 class="font-bold mb-3">📖 Explore More</h3>
                    <div class="space-y-2">
                        <a href="{{ route('timeline') }}" class="flex items-center gap-2 text-sm text-purple-100 hover:text-white transition">
                            <span>⏳</span> Historical Timeline
                        </a>
                        <a href="{{ route('maps') }}" class="flex items-center gap-2 text-sm text-purple-100 hover:text-white transition">
                            <span>🗺️</span> Interactive Maps
                        </a>
                        <a href="{{ route('gallery') }}" class="flex items-center gap-2 text-sm text-purple-100 hover:text-white transition">
                            <span>📷</span> Photo Gallery
                        </a>
                        <a href="{{ route('resources') }}" class="flex items-center gap-2 text-sm text-purple-100 hover:text-white transition">
                            <span>📚</span> Educational Resources
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
