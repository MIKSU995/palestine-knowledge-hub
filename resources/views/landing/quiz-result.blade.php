@extends('layouts.app')

@section('title', 'Quiz Results - ' . $quiz->title . ' | Palestine Knowledge Hub')

@section('content')

<div class="min-h-screen bg-slate-950 text-white">

    {{-- Result Hero --}}
    <div class="bg-gradient-to-br {{ $passed ? 'from-emerald-900 via-teal-900' : 'from-red-900 via-rose-900' }} to-slate-900 py-16 text-center border-b border-slate-800">
        <div class="max-w-xl mx-auto px-6">

            {{-- Score Circle --}}
            <div class="relative w-36 h-36 mx-auto mb-6">
                <svg class="w-36 h-36 transform -rotate-90" viewBox="0 0 144 144">
                    <circle cx="72" cy="72" r="64" fill="none" stroke="rgba(255,255,255,.1)" stroke-width="10"/>
                    <circle cx="72" cy="72" r="64" fill="none"
                            stroke="{{ $passed ? '#10b981' : '#ef4444' }}" stroke-width="10"
                            stroke-dasharray="{{ round($percentage * 4.02) }} 402"
                            stroke-linecap="round"/>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-4xl font-extrabold {{ $passed ? 'text-emerald-300' : 'text-red-300' }}">{{ $percentage }}%</span>
                    <span class="text-xs text-slate-400">Score</span>
                </div>
            </div>

            <div class="text-5xl mb-3">{{ $passed ? '🎉' : '📖' }}</div>
            <h1 class="text-3xl font-extrabold leading-tight">
                {{ $passed ? 'Congratulations!' : 'Keep Learning!' }}
            </h1>
            <p class="text-slate-300 mt-3 text-base">
                You answered <strong class="text-white">{{ $score }} out of {{ $total }}</strong> questions correctly.
            </p>
            <p class="text-sm text-slate-400 mt-1">
                {{ $passed ? 'You passed! Well done on expanding your knowledge of Palestine.' : 'You need ' . ($quiz->pass_score ?? 70) . '% to pass. Review the answers below and try again.' }}
            </p>

            <div class="flex items-center justify-center gap-3 mt-6">
                <a href="{{ route('quiz') }}" class="px-5 py-2.5 border border-slate-600 hover:border-slate-400 text-slate-300 hover:text-white rounded-2xl text-sm font-semibold transition">
                    ← All Quizzes
                </a>
                <a href="{{ route('quiz.show', $quiz->slug) }}" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl text-sm font-semibold transition">
                    🔄 Retake Quiz
                </a>
                @auth
                <a href="{{ route('learning.dashboard') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-2xl text-sm font-semibold transition">
                    📊 My Dashboard
                </a>
                @endauth
            </div>
        </div>
    </div>

    {{-- Answer Review --}}
    <div class="max-w-3xl mx-auto px-6 py-10">
        <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Answer Review
        </h2>

        <div class="space-y-5">
            @foreach($results as $i => $result)
            <div class="bg-slate-900 rounded-3xl border {{ $result['is_correct'] ? 'border-emerald-600/40' : 'border-red-600/40' }} p-6 shadow-lg">
                <div class="flex items-start gap-3 mb-4">
                    <div class="flex-shrink-0 w-8 h-8 rounded-xl {{ $result['is_correct'] ? 'bg-emerald-600/30' : 'bg-red-600/30' }} flex items-center justify-center text-sm font-bold {{ $result['is_correct'] ? 'text-emerald-300' : 'text-red-300' }}">
                        {{ $i + 1 }}
                    </div>
                    <p class="text-white font-semibold text-base leading-snug">{{ $result['question'] }}</p>
                </div>

                <div class="ml-11 space-y-2">
                    @foreach($result['options'] as $oi => $opt)
                    <div class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm
                        {{ $oi === $result['correct_answer'] ? 'bg-emerald-600/20 border border-emerald-500/40 text-emerald-200' : '' }}
                        {{ $oi === $result['user_answer'] && !$result['is_correct'] ? 'bg-red-600/20 border border-red-500/40 text-red-200' : '' }}
                        {{ ($oi !== $result['correct_answer'] && $oi !== $result['user_answer']) || ($result['is_correct'] && $oi !== $result['correct_answer']) ? 'text-slate-400' : '' }}">
                        @if($oi === $result['correct_answer'])
                            <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        @elseif($oi === $result['user_answer'] && !$result['is_correct'])
                            <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        @else
                            <div class="w-4 h-4 flex-shrink-0"></div>
                        @endif
                        <span>{{ $opt }}</span>
                    </div>
                    @endforeach
                </div>

                @if($result['explanation'])
                <div class="ml-11 mt-4 p-3 rounded-xl bg-blue-900/30 border border-blue-700/30 text-blue-200 text-sm leading-relaxed">
                    <span class="font-bold text-blue-300">💡 Explanation: </span>{{ $result['explanation'] }}
                </div>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Final CTA --}}
        <div class="mt-10 text-center">
            <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-sm transition shadow-lg">
                📚 Continue Learning with Articles →
            </a>
        </div>
    </div>
</div>

@endsection
