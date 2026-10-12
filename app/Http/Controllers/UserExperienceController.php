<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\EducationalResource;
use App\Models\Gallery;
use App\Models\Like;
use App\Models\News;
use App\Models\Quiz;
use App\Models\Report;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExperienceController extends Controller
{
    /**
     * Global Search API (Modal Ctrl+K)
     */
    public function globalSearch(Request $request)
    {
        $q = trim($request->get('query', ''));

        if (empty($q)) {
            return response()->json(['results' => []]);
        }

        $articles = Article::where('status', 'published')
            ->where(function($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('excerpt', 'like', "%{$q}%");
            })->take(4)->get(['id', 'title', 'slug', 'thumbnail']);

        $timeline = TimelineEvent::where('title', 'like', "%{$q}%")
            ->orWhere('description', 'like', "%{$q}%")
            ->take(3)->get(['id', 'title', 'year', 'era']);

        $resources = EducationalResource::where('title', 'like', "%{$q}%")
            ->take(3)->get(['id', 'title', 'type', 'file_path', 'external_url']);

        $news = News::where('title', 'like', "%{$q}%")
            ->take(3)->get(['id', 'title', 'source', 'url']);

        $quizzes = Quiz::where('title', 'like', "%{$q}%")
            ->take(3)->get(['id', 'title', 'slug', 'difficulty']);

        return response()->json([
            'articles' => $articles->map(fn($item) => [
                'type' => 'Article',
                'title' => $item->title,
                'url' => route('articles.show', $item->slug),
                'meta' => 'Educational Article'
            ]),
            'timeline' => $timeline->map(fn($item) => [
                'type' => 'Timeline',
                'title' => $item->title . ' (' . $item->year . ')',
                'url' => url('/timeline#event-' . $item->id),
                'meta' => $item->era
            ]),
            'resources' => $resources->map(fn($item) => [
                'type' => 'Resource',
                'title' => $item->title,
                'url' => url('/resources'),
                'meta' => strtoupper($item->type)
            ]),
            'news' => $news->map(fn($item) => [
                'type' => 'News',
                'title' => $item->title,
                'url' => route('news.index'),
                'meta' => $item->source
            ]),
            'quizzes' => $quizzes->map(fn($item) => [
                'type' => 'Quiz',
                'title' => $item->title,
                'url' => route('quiz.show', $item->slug),
                'meta' => $item->difficulty . ' Quiz'
            ]),
        ]);
    }

    /**
     * Bookmark Toggle
     */
    public function toggleBookmark(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'type' => 'required|string|in:article,resource',
        ]);

        if (!Auth::check()) {
            return response()->json([
                'status' => 'guest',
                'message' => 'Saved to local browser storage.'
            ]);
        }

        $typeMap = [
            'article' => Article::class,
            'resource' => EducationalResource::class,
        ];

        $modelClass = $typeMap[$request->type];

        $existing = Bookmark::where('user_id', Auth::id())
            ->where('bookmarkable_id', $request->id)
            ->where('bookmarkable_type', $modelClass)
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['bookmarked' => false, 'message' => 'Bookmark removed.']);
        }

        Bookmark::create([
            'user_id' => Auth::id(),
            'bookmarkable_id' => $request->id,
            'bookmarkable_type' => $modelClass,
        ]);

        return response()->json(['bookmarked' => true, 'message' => 'Bookmarked successfully!']);
    }

    /**
     * View User Bookmarks Page
     */
    public function bookmarksIndex()
    {
        $bookmarks = [];
        if (Auth::check()) {
            $bookmarks = Bookmark::where('user_id', Auth::id())
                ->with('bookmarkable')
                ->latest()
                ->get();
        }

        return view('landing.bookmarks', compact('bookmarks'));
    }

    /**
     * Toggle Like (AJAX)
     */
    public function toggleLike(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'type' => 'required|string|in:article,gallery,comment',
        ]);

        $typeMap = [
            'article' => Article::class,
            'gallery' => Gallery::class,
            'comment' => Comment::class,
        ];

        $modelClass = $typeMap[$request->type];
        $target = $modelClass::findOrFail($request->id);

        $userId = Auth::id();
        $ip = $request->ip();

        $query = Like::where('likeable_type', $modelClass)->where('likeable_id', $request->id);

        if ($userId) {
            $existing = $query->where('user_id', $userId)->first();
        } else {
            $existing = $query->where('ip_address', $ip)->first();
        }

        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => $userId,
                'ip_address' => $ip,
                'likeable_id' => $request->id,
                'likeable_type' => $modelClass,
            ]);
            $liked = true;
        }

        $totalLikes = Like::where('likeable_type', $modelClass)->where('likeable_id', $request->id)->count();

        return response()->json([
            'liked' => $liked,
            'total_likes' => $totalLikes,
        ]);
    }

    /**
     * Submit Comment
     */
    public function submitComment(Request $request)
    {
        $request->validate([
            'article_id' => 'nullable|exists:articles,id',
            'news_id' => 'nullable|exists:news,id',
            'parent_id' => 'nullable|exists:comments,id',
            'content' => 'required|string|min:3|max:1000',
            'guest_name' => Auth::check() ? 'nullable' : 'required|string|max:100',
            'guest_email' => Auth::check() ? 'nullable' : 'required|email|max:150',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'guest_name' => Auth::check() ? null : $request->guest_name,
            'guest_email' => Auth::check() ? null : $request->guest_email,
            'article_id' => $request->article_id,
            'news_id' => $request->news_id,
            'parent_id' => $request->parent_id,
            'content' => clean($request->content),
            'status' => 'approved', // Instant approve or pending
        ]);

        return back()->with('success', 'Your comment has been posted successfully!');
    }

    /**
     * Submit Content Report
     */
    public function submitReport(Request $request)
    {
        $request->validate([
            'reportable_id' => 'required|integer',
            'reportable_type' => 'required|string|in:article,comment',
            'reason' => 'required|string|max:100',
            'details' => 'nullable|string|max:500',
        ]);

        $typeMap = [
            'article' => Article::class,
            'comment' => Comment::class,
        ];

        Report::create([
            'user_id' => Auth::id(),
            'reportable_id' => $request->reportable_id,
            'reportable_type' => $typeMap[$request->reportable_type],
            'reason' => $request->reason,
            'details' => $request->details,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Thank you. Your report has been submitted to moderators.');
    }
}
