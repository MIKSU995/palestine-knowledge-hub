<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\EducationalResource;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Quiz;
use App\Models\TimelineEvent;
use App\Services\NewsService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Homepage
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $latestArticles = Article::with('category')
            ->where('status', 'published')
            ->latest('published_at')
            ->take(6)
            ->get();

        $popularArticles = Article::with('category')
            ->where('status', 'published')
            ->orderByDesc('views')
            ->take(3)
            ->get();

        $categories = Category::orderBy('name')->get();

        $timelinePreview = TimelineEvent::orderBy('year')->take(4)->get();

        $galleryPreview = Gallery::take(6)->get();

        $newsService = app(NewsService::class);
        $liveNews = $newsService->getLatestNews(6);

        $stats = [
            'total_articles' => Article::where('status', 'published')->count(),
            'total_timeline' => TimelineEvent::count(),
            'total_resources' => EducationalResource::count(),
            'total_quizzes' => Quiz::count(),
        ];

        return view('landing.index', compact(
            'latestArticles',
            'popularArticles',
            'categories',
            'timelinePreview',
            'galleryPreview',
            'liveNews',
            'stats'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Articles List
    |--------------------------------------------------------------------------
    */
    public function articles(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $featured = Article::where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first() ?? Article::where('status', 'published')->latest('published_at')->first();

        $query = Article::where('status', 'published');

        if ($featured && !$request->filled('search') && !$request->filled('category')) {
            $query->where('id', '!=', $featured->id);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->latest('published_at')->paginate(9);

        return view('landing.article', compact(
            'articles',
            'categories',
            'featured'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Article Detail
    |--------------------------------------------------------------------------
    */
    public function showArticle($slug)
    {
        $article = Article::with(['category', 'user', 'comments.user', 'comments.replies'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $article->increment('views');

        $relatedArticles = Article::with('category')
            ->where('status', 'published')
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $popularArticles = Article::with('category')
            ->where('status', 'published')
            ->orderByDesc('views')
            ->take(5)
            ->get();

        $categories = Category::orderBy('name')->get();

        $previousArticle = Article::where('status', 'published')
            ->where('published_at', '<', $article->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        $nextArticle = Article::where('status', 'published')
            ->where('published_at', '>', $article->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        return view('landing.article-detail', compact(
            'article',
            'relatedArticles',
            'popularArticles',
            'categories',
            'previousArticle',
            'nextArticle'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Timeline
    |--------------------------------------------------------------------------
    */
    public function timeline(Request $request)
    {
        $query = TimelineEvent::query();

        if ($request->filled('era') && $request->era !== 'All') {
            $query->where('era', $request->era);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $events = $query->orderBy('year', 'asc')->get();
        $eras = TimelineEvent::distinct()->pluck('era')->filter()->values();

        return view('landing.timeline', compact('events', 'eras'));
    }

    /*
    |--------------------------------------------------------------------------
    | Interactive Geography & Maps
    |--------------------------------------------------------------------------
    */
    public function maps()
    {
        $locations = [
            [
                'name' => 'Jerusalem (Al-Quds)',
                'lat' => 31.7683,
                'lng' => 35.2137,
                'category' => 'Historic Capital',
                'description' => 'The spiritual, historical, and cultural heart of Palestine. Home to Al-Aqsa Mosque and the Dome of the Rock.',
                'image' => asset('images/cities/jerusalem.jpg')
            ],
            [
                'name' => 'Gaza City',
                'lat' => 31.5017,
                'lng' => 34.4668,
                'category' => 'Coastal Region',
                'description' => 'A ancient coastal city with thousands of years of trade, port history, and resilient community spirit.',
                'image' => asset('images/cities/gaza.jpg')
            ],
            [
                'name' => 'Ramallah',
                'lat' => 31.9038,
                'lng' => 35.2034,
                'category' => 'Cultural & Administrative Hub',
                'description' => 'A vibrant center for Palestinian arts, education, government, and economic development in the West Bank.',
                'image' => asset('images/cities/ramallah.jpg')
            ],
            [
                'name' => 'Hebron (Al-Khalil)',
                'lat' => 31.5326,
                'lng' => 35.0998,
                'category' => 'Heritage Site',
                'description' => 'One of the oldest continuously inhabited cities in the world, famed for traditional glassblowing and pottery.',
                'image' => asset('images/cities/hebron.jpg')
            ],
            [
                'name' => 'Nablus',
                'lat' => 32.2226,
                'lng' => 35.2621,
                'category' => 'Trade & Artisan Center',
                'description' => 'Renowned for its historic olive oil soap industry, traditional Knafeh sweet, and ancient Old City alleys.',
                'image' => asset('images/cities/nablus.jpg')
            ],
            [
                'name' => 'Haifa',
                'lat' => 32.7940,
                'lng' => 34.9896,
                'category' => 'Port City',
                'description' => 'Historic coastal port on Mount Carmel known for multicultural history, terraced gardens, and maritime culture.',
                'image' => asset('images/cities/haifa.jpg')
            ],
            [
                'name' => 'Jaffa (Yafa)',
                'lat' => 32.0536,
                'lng' => 34.7570,
                'category' => 'Historic Port & Citadel',
                'description' => 'Famous as the "Bride of the Sea", historic port of Palestine renowned worldwide for its orange orchards and literature.',
                'image' => asset('images/cities/jaffa.jpg')
            ],
            [
                'name' => 'Bethlehem',
                'lat' => 31.7058,
                'lng' => 35.2024,
                'category' => 'Sacred Site',
                'description' => 'Global pilgrimage center housing the Church of the Nativity, famous for mother-of-pearl and olive wood handicrafts.',
                'image' => asset('images/cities/bethlehem.jpg')
            ]
        ];

        return view('landing.maps', compact('locations'));
    }

    /*
    |--------------------------------------------------------------------------
    | Gallery
    |--------------------------------------------------------------------------
    */
    public function gallery(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('caption', 'like', '%' . $request->search . '%');
        }

        $items = $query->latest()->paginate(12);
        $categories = Gallery::distinct()->pluck('category')->filter()->values();

        return view('landing.gallery', compact('items', 'categories'));
    }

    /*
    |--------------------------------------------------------------------------
    | Educational Resources
    |--------------------------------------------------------------------------
    */
    public function resources(Request $request)
    {
        $query = EducationalResource::with('category');

        if ($request->filled('type') && $request->type !== 'All') {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $resources = $query->latest()->paginate(9);
        $categories = Category::orderBy('name')->get();

        return view('landing.resources', compact('resources', 'categories'));
    }

    public function downloadResource($id)
    {
        $resource = EducationalResource::findOrFail($id);
        $resource->increment('downloads_count');

        if ($resource->external_url) {
            return redirect()->away($resource->external_url);
        }

        if ($resource->file_path && file_exists(storage_path('app/public/' . $resource->file_path))) {
            return response()->download(storage_path('app/public/' . $resource->file_path));
        }

        return back()->with('info', 'Viewing online resource link.');
    }
}