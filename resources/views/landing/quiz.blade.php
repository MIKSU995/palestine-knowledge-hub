@extends('layouts.app')

@section('title', 'Palestine Knowledge Quiz - Test Your Understanding | Palestine Knowledge Hub')
@section('meta_description', 'Test your knowledge of Palestinian history, culture, and geography through our interactive educational quizzes.')

@section('content')

{{-- Hero --}}
<section class="bg-slate-900 text-white py-16 border-b border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_70%_50%,#8b5cf6,transparent_60%)]"></div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
        <span class="px-3.5 py-1.5 rounded-full bg-purple-500/20 text-purple-300 font-bold text-xs uppercase tracking-wider">
            Interactive Learning
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-3">
            Palestine Knowledge Quizzes
        </h1>
        <p class="mt-4 text-slate-300 text-lg max-w-2xl leading-relaxed">
            Test and deepen your understanding of Palestinian history, culture, geography, and current affairs through our structured quiz modules.
        </p>

        @auth
        <div class="mt-6 flex items-center gap-3">
            <a href="{{ route('learning.dashboard') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-semibold text-sm transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                My Learning Dashboard
            </a>
        </div>
        @endauth
    </div>
</section>

{{-- Quiz Grid --}}
<section class="py-12 bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        @if($quizzes->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-20 h-20 rounded-3xl bg-purple-100 dark:bg-purple-950/50 flex items-center justify-center text-slate-400 mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-4a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Quizzes Coming Soon</h2>
            <p class="text-slate-500 dark:text-slate-400 max-w-md leading-relaxed">
                Our team is preparing comprehensive quiz modules on Palestinian history, culture, and geography. Sign up to be notified when they're ready.
            </p>
        </div>
        @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($quizzes as $quiz)
            @php
                $difficultyColors = [
                    'easy' => 'bg-emerald-100 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300',
                    'medium' => 'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300',
                    'hard' => 'bg-red-100 dark:bg-red-950/60 text-red-700 dark:text-red-300',
                ];
                $diffColor = $difficultyColors[$quiz->difficulty ?? 'medium'] ?? $difficultyColors['medium'];
                $userScore = $userAttempts[$quiz->id] ?? null;
            @endphp
            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl hover:border-purple-500/40 transition duration-300 group flex flex-col">

                {{-- Cover Image --}}
                <div class="h-44 bg-gradient-to-br from-purple-600 via-indigo-700 to-slate-900 relative overflow-hidden flex items-center justify-center">
                    <div class="absolute inset-0 opacity-20">
                        <div class="w-32 h-32 rounded-full bg-white/30 absolute -top-8 -right-8"></div>
                        <div class="w-24 h-24 rounded-full bg-white/20 absolute bottom-0 left-4"></div>
                    </div>
                    <div class="text-center relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center text-white mx-auto mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-4a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        </div>
                        <span class="text-white/80 text-sm font-semibold">{{ $quiz->questions_count ?? 0 }} Questions</span>
                    </div>
                    @if($userScore !== null)
                    <div class="absolute top-3 right-3 flex items-center gap-1.5 bg-emerald-500 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        {{ $userScore }}% Scored
                    </div>
                    @endif
                </div>

                <div class="p-6 flex flex-col flex-1">
                    {{-- Category & Difficulty --}}
                    <div class="flex items-center gap-2 mb-3">
                        @if($quiz->category)
                        <span class="text-xs font-semibold text-purple-600 dark:text-purple-400 bg-purple-50 dark:bg-purple-950/60 px-2.5 py-1 rounded-lg">
                            {{ $quiz->category->name }}
                        </span>
                        @endif
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-lg {{ $diffColor }}">
                            {{ ucfirst($quiz->difficulty ?? 'medium') }}
                        </span>
                    </div>

                    <h2 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition leading-snug">
                        {{ $quiz->title }}
                    </h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-2 leading-relaxed flex-1">
                        {{ $quiz->description ?? 'Test your knowledge with this comprehensive quiz module.' }}
                    </p>

                    {{-- Stats Row --}}
                    <div class="flex items-center gap-4 mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 text-xs text-slate-500 dark:text-slate-400">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            ~{{ round(($quiz->questions_count ?? 5) * 1.5) }} min
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Pass: {{ $quiz->pass_score ?? 70 }}%
                        </span>
                    </div>

                    <a href="{{ route('quiz.show', $quiz->slug) }}"
                       class="mt-5 w-full text-center py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-bold text-sm transition duration-200 group-hover:shadow-lg">
                        {{ $userScore !== null ? 'Retake Quiz' : 'Start Quiz' }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Learning CTA --}}
        @auth
        <div class="mt-16 bg-gradient-to-r from-purple-600 to-indigo-700 rounded-3xl p-8 text-white text-center shadow-xl">
            <h2 class="text-2xl font-bold mb-2">Track Your Learning Journey</h2>
            <p class="text-purple-200 mb-6 max-w-lg mx-auto">View your quiz history, earned badges, and personalized content recommendations on your Learning Dashboard.</p>
            <a href="{{ route('learning.dashboard') }}"
               class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-purple-700 rounded-2xl font-bold hover:bg-purple-50 transition shadow-lg">
                Go to My Dashboard →
            </a>
        </div>
        @else
        <div class="mt-16 bg-gradient-to-r from-purple-600 to-indigo-700 rounded-3xl p-8 text-white text-center shadow-xl">
            <h2 class="text-2xl font-bold mb-2">Track Your Progress</h2>
            <p class="text-purple-200 mb-6 max-w-lg mx-auto">Create a free account to save your quiz scores, earn badges, and get personalized content recommendations.</p>
            <a href="{{ route('register') }}"
               class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-purple-700 rounded-2xl font-bold hover:bg-purple-50 transition shadow-lg">
                Create Free Account →
            </a>
        </div>
        @endauth
    </div>
</section>

@endsection