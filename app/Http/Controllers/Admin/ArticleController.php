<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display all articles in admin dashboard.
     */
    public function index(Request $request)
    {
        $query = Article::with(['category', 'user']);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $articles = $query->latest('created_at')->paginate(10)->withQueryString();
        $categories = Category::all();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'excerpt'     => 'nullable|max:500',
            'content'     => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('articles', 'public');
        }

        Article::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'excerpt'      => $request->excerpt,
            'content'      => $request->input('content'),
            'thumbnail'    => $thumbnail,
            'category_id'  => $request->category_id,
            'user_id'      => Auth::id() ?? 1,
            'status'       => $request->status,
            'is_featured'  => $request->boolean('is_featured'),
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'excerpt'     => 'nullable|max:500',
            'content'     => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
        ]);

        $thumbnail = $article->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('articles', 'public');
        }

        $article->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'excerpt'      => $request->excerpt,
            'content'      => $request->input('content'),
            'thumbnail'    => $thumbnail,
            'category_id'  => $request->category_id,
            'status'       => $request->status,
            'is_featured'  => $request->boolean('is_featured'),
            'published_at' => $request->status === 'published' && !$article->published_at ? now() : $article->published_at,
        ]);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}