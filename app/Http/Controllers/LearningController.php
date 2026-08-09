<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('category')
            ->withCount('questions')
            ->get();

        $userAttempts = [];
        if (Auth::check()) {
            $userAttempts = QuizAttempt::where('user_id', Auth::id())
                ->pluck('score', 'quiz_id')
                ->toArray();
        }

        return view('landing.quiz', compact('quizzes', 'userAttempts'));
    }

    public function showQuiz($slug)
    {
        $quiz = Quiz::with(['category', 'questions'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('landing.quiz-take', compact('quiz'));
    }

    public function submitQuiz(Request $request, $slug)
    {
        $quiz = Quiz::with('questions')->where('slug', $slug)->firstOrFail();
        $answers = $request->input('answers', []);

        $score = 0;
        $total = $quiz->questions->count();

        $results = [];

        foreach ($quiz->questions as $q) {
            $userAnswer = isset($answers[$q->id]) ? intval($answers[$q->id]) : null;
            $isCorrect = ($userAnswer === $q->correct_option);
            if ($isCorrect) {
                $score++;
            }

            $results[] = [
                'question' => $q->question,
                'user_answer' => $userAnswer,
                'correct_answer' => $q->correct_option,
                'options' => $q->options,
                'is_correct' => $isCorrect,
                'explanation' => $q->explanation,
            ];
        }

        $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
        $passed = $percentage >= $quiz->pass_score;

        $attempt = null;
        if (Auth::check()) {
            $attempt = QuizAttempt::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'score' => $percentage,
                'total_questions' => $total,
                'passed' => $passed,
                'answers' => $answers,
                'completed_at' => now(),
            ]);
        }

        return view('landing.quiz-result', compact('quiz', 'percentage', 'passed', 'score', 'total', 'results'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $attempts = QuizAttempt::where('user_id', $user->id)
            ->with('quiz')
            ->latest('completed_at')
            ->get();

        $totalCompletedQuizzes = $attempts->where('passed', true)->pluck('quiz_id')->unique()->count();
        $avgScore = $attempts->count() > 0 ? round($attempts->avg('score')) : 0;

        // Badges evaluation
        $badges = [];
        if ($attempts->count() >= 1) {
            $badges[] = [
                'title' => 'First Step Scholar',
                'description' => 'Completed your first Palestinian knowledge quiz.',
                'icon' => '🎓',
                'color' => 'bg-emerald-100 text-emerald-800'
            ];
        }

        if ($totalCompletedQuizzes >= 3) {
            $badges[] = [
                'title' => 'History Explorer',
                'description' => 'Passed 3 or more knowledge quizzes with distinction.',
                'icon' => '📜',
                'color' => 'bg-amber-100 text-amber-800'
            ];
        }

        if ($avgScore >= 85 && $attempts->count() >= 2) {
            $badges[] = [
                'title' => 'Knowledge Champion',
                'description' => 'Maintained an average score above 85%.',
                'icon' => '🏆',
                'color' => 'bg-purple-100 text-purple-800'
            ];
        }

        // Recommended Content
        $recommendedArticles = Article::with('category')
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('landing.learning-dashboard', compact(
            'user',
            'attempts',
            'totalCompletedQuizzes',
            'avgScore',
            'badges',
            'recommendedArticles'
        ));
    }
}
