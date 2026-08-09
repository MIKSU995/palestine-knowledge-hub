<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(Request $request)
    {
        // Try live sync if requested or cached
        if ($request->has('refresh')) {
            $this->newsService->fetchAndSyncNews();
        }

        $query = News::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('summary', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        $newsList = $query->latest('published_at')->paginate(12);
        $categories = News::distinct()->pluck('category')->filter()->values();

        return view('landing.news', compact('newsList', 'categories'));
    }

    public function liveTicker()
    {
        $latest = News::latest('published_at')->take(8)->get(['id', 'title', 'source', 'published_at', 'url']);
        return response()->json($latest);
    }
}
