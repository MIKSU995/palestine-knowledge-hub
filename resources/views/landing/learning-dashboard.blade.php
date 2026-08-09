@extends('layouts.app')

@section('title', 'My Learning Dashboard | Palestine Knowledge Hub')

@section('content')

{{-- Hero --}}
<section class="bg-slate-900 text-white py-12 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <span class="px-3.5 py-1.5 rounded-full bg-purple-500/20 text-purple-300 font-bold text-xs uppercase tracking-wider">📊 Learning Dashboard</span>
            <h1 class="text-3xl font-extrabold mt-2">Welcome back, {{ $user->name }}!</h1>
            <p class="text-slate-400 mt-1 text-sm">Track your Palestine learning journey, quiz results, and earned badges.</p>
        </div>
        <a href="{{ route('quiz') }}" class="flex-shrink-0 px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-bold text-sm transition">
            ▶ Take a Quiz
        </a>
    </div>
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
