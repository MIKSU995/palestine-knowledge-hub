<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ModerationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\UserExperienceController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Public Educational Landing Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/articles', [LandingController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [LandingController::class, 'showArticle'])->name('articles.show');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/api/news/ticker', [NewsController::class, 'liveTicker'])->name('news.ticker');

Route::get('/timeline', [LandingController::class, 'timeline'])->name('timeline');
Route::get('/maps', [LandingController::class, 'maps'])->name('maps');
Route::get('/gallery', [LandingController::class, 'gallery'])->name('gallery');
Route::get('/resources', [LandingController::class, 'resources'])->name('resources');
Route::get('/resources/{id}/download', [LandingController::class, 'downloadResource'])->name('resources.download');

Route::get('/quiz', [LearningController::class, 'index'])->name('quiz');
Route::get('/quiz/{slug}', [LearningController::class, 'showQuiz'])->name('quiz.show');
Route::post('/quiz/{slug}/submit', [LearningController::class, 'submitQuiz'])->name('quiz.submit');

Route::get('/bookmarks', [UserExperienceController::class, 'bookmarksIndex'])->name('bookmarks');

/*
|--------------------------------------------------------------------------
| UX & API Interactivity Routes
|--------------------------------------------------------------------------
*/

Route::get('/api/search', [UserExperienceController::class, 'globalSearch'])->name('api.search');
Route::post('/api/bookmark', [UserExperienceController::class, 'toggleBookmark'])->name('api.bookmark');
Route::post('/api/like', [UserExperienceController::class, 'toggleLike'])->name('api.like');

Route::post('/comments', [UserExperienceController::class, 'submitComment'])->name('comments.store');
Route::post('/reports', [UserExperienceController::class, 'submitReport'])->name('reports.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| User Learning Dashboard (Auth Protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/learning/dashboard', [LearningController::class, 'userDashboard'])->name('learning.dashboard');
});

/*
|--------------------------------------------------------------------------
| Admin & CMS Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            $totalArticles = \App\Models\Article::count();
            $totalUsers = \App\Models\User::count();
            $totalQuizzes = \App\Models\Quiz::count();
            $pendingReports = \App\Models\Report::where('status', 'pending')->count();
            $recentArticles = \App\Models\Article::latest()->take(5)->get();
            $recentReports = \App\Models\Report::with('user')->latest()->take(5)->get();

            return view('admin.dashboard', compact(
                'totalArticles',
                'totalUsers',
                'totalQuizzes',
                'pendingReports',
                'recentArticles',
                'recentReports'
            ));
        })->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('articles', ArticleController::class);

        // Moderation
        Route::get('/moderation', [ModerationController::class, 'index'])->name('moderation.index');
        Route::patch('/moderation/comment/{id}', [ModerationController::class, 'updateCommentStatus'])->name('moderation.comment.update');
        Route::delete('/moderation/comment/{id}', [ModerationController::class, 'deleteComment'])->name('moderation.comment.delete');
        Route::patch('/moderation/report/{id}', [ModerationController::class, 'resolveReport'])->name('moderation.report.resolve');

        // User Management
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::patch('/users/{id}/role', [UserController::class, 'updateRole'])->name('users.role');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

require __DIR__.'/auth.php';