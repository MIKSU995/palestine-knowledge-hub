@extends('layouts.app')

@section('title', $quiz->title . ' - Palestine Knowledge Quiz')

@section('content')

<div class="min-h-screen bg-slate-950 text-white">

    {{-- Quiz Header --}}
    <div class="bg-gradient-to-br from-purple-900 via-indigo-900 to-slate-900 py-12 border-b border-slate-800">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <span class="px-3.5 py-1.5 rounded-full bg-purple-500/30 text-purple-300 font-bold text-xs uppercase tracking-wider">
                🧠 Knowledge Quiz
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold mt-3 leading-tight">{{ $quiz->title }}</h1>
            @if($quiz->description)
            <p class="text-slate-300 mt-3 text-base leading-relaxed max-w-xl mx-auto">{{ $quiz->description }}</p>
            @endif
            <div class="flex items-center justify-center gap-6 mt-6 text-sm">
                <span class="flex items-center gap-1.5 text-slate-300">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    {{ $quiz->questions->count() }} Questions
                </span>
                <span class="flex items-center gap-1.5 text-slate-300">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Pass at {{ $quiz->pass_score ?? 70 }}%
                </span>
                <span class="flex items-center gap-1.5 text-slate-300">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    ~{{ round($quiz->questions->count() * 1.5) }} min
                </span>
            </div>
        </div>
    </div>

    {{-- Quiz Form --}}
    <div class="max-w-3xl mx-auto px-6 py-10">

        {{-- Progress Bar --}}
        <div class="mb-8">
            <div class="flex items-center justify-between text-sm text-slate-400 mb-2">
                <span>Question <span id="current-q">1</span> of {{ $quiz->questions->count() }}</span>
                <span id="progress-pct">0%</span>
            </div>
            <div class="h-2 bg-slate-800 rounded-full overflow-hidden">
                <div id="quiz-progress-bar" class="h-full bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>

        @if($quiz->questions->isEmpty())
        <div class="text-center py-20 text-slate-400">
            <div class="text-5xl mb-4">📝</div>
            <p class="text-lg">Questions are being prepared for this quiz.</p>
            <a href="{{ route('quiz') }}" class="mt-6 inline-block px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-semibold text-sm transition">
                ← Back to Quizzes
            </a>
        </div>
        @else

        <form action="{{ route('quiz.submit', $quiz->slug) }}" method="POST" id="quiz-form">
            @csrf

            @foreach($quiz->questions as $index => $question)
            <div class="quiz-question {{ $index === 0 ? '' : 'hidden' }}" data-index="{{ $index }}">

                <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 mb-4 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-2xl bg-purple-600/30 border border-purple-500/30 flex items-center justify-center text-purple-300 font-extrabold text-lg">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1">
                            <p class="text-white font-semibold text-lg leading-relaxed">{{ $question->question }}</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-3 mb-8">
                    @foreach($question->options as $optIndex => $option)
                    <label class="quiz-option flex items-center gap-4 p-4 rounded-2xl border border-slate-700 hover:border-purple-500/60 cursor-pointer transition duration-200 group"
                           data-index="{{ $optIndex }}">
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $optIndex }}"
                               class="sr-only quiz-radio" required>
                        <div class="w-6 h-6 rounded-lg border-2 border-slate-600 group-hover:border-purple-400 flex-shrink-0 flex items-center justify-center transition option-indicator">
                            <div class="w-3 h-3 rounded bg-purple-500 hidden option-dot"></div>
                        </div>
                        <span class="text-slate-200 text-base">{{ $option }}</span>
                    </label>
                    @endforeach
                </div>

                {{-- Navigation Buttons --}}
                <div class="flex items-center justify-between">
                    @if($index > 0)
                    <button type="button" onclick="goToQuestion({{ $index - 1 }})" class="px-6 py-3 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white rounded-2xl font-semibold text-sm transition">
                        ← Previous
                    </button>
                    @else
                    <a href="{{ route('quiz') }}" class="px-6 py-3 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white rounded-2xl font-semibold text-sm transition">
                        ← Back to Quizzes
                    </a>
                    @endif

                    @if($index < $quiz->questions->count() - 1)
                    <button type="button" onclick="nextQuestion({{ $index }})" id="next-btn-{{ $index }}"
                            class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-semibold text-sm transition disabled:opacity-50">
                        Next Question →
                    </button>
                    @else
                    <button type="submit" id="submit-quiz-btn"
                            class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-sm transition shadow-lg hover:shadow-emerald-700/30">
                        Submit Quiz ✓
                    </button>
                    @endif
                </div>
            </div>
            @endforeach
        </form>
        @endif

    </div>
</div>

@endsection

@push('scripts')
<script>
    const totalQuestions = {{ $quiz->questions->count() }};
    let answeredQuestions = {};

    function goToQuestion(index) {
        document.querySelectorAll('.quiz-question').forEach(q => q.classList.add('hidden'));
        document.querySelector(`.quiz-question[data-index="${index}"]`).classList.remove('hidden');
        updateProgress(index);
    }

    function nextQuestion(currentIndex) {
        const radios = document.querySelector(`.quiz-question[data-index="${currentIndex}"]`).querySelectorAll('.quiz-radio');
        const answered = Array.from(radios).some(r => r.checked);
        if (!answered) {
            alert('Please select an answer before continuing.');
            return;
        }
        goToQuestion(currentIndex + 1);
    }

    function updateProgress(currentIndex) {
        const pct = Math.round(((currentIndex + 1) / totalQuestions) * 100);
        document.getElementById('current-q').textContent = currentIndex + 1;
        document.getElementById('progress-pct').textContent = pct + '%';
        document.getElementById('quiz-progress-bar').style.width = pct + '%';
    }

    // Option selection visual feedback
    document.querySelectorAll('.quiz-option').forEach(label => {
        label.addEventListener('click', function() {
            const question = this.closest('.quiz-question');
            question.querySelectorAll('.quiz-option').forEach(opt => {
                opt.classList.remove('border-purple-500', 'bg-purple-900/30');
                opt.querySelector('.option-indicator').classList.remove('border-purple-500');
                opt.querySelector('.option-dot').classList.add('hidden');
            });
            this.classList.add('border-purple-500', 'bg-purple-900/30');
            this.querySelector('.option-indicator').classList.add('border-purple-500');
            this.querySelector('.option-dot').classList.remove('hidden');
            this.querySelector('.quiz-radio').checked = true;
        });
    });

    // Initialize
    updateProgress(0);
</script>
@endpush
