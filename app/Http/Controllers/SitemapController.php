<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\News;
use App\Models\Quiz;
use App\Models\TimelineEvent;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $articles = Article::where('status', 'published')->get();
        $categories = Category::all();
        $news = News::all();
        $quizzes = Quiz::all();

        $content = view('sitemap', compact('articles', 'categories', 'news', 'quizzes'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
