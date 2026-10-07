<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function index(Request $request)
    {
        $categories = ['All', 'Pakaian & Seni', 'Kuliner', 'Seni & Musik', 'Tradisi', 'Kerajinan'];

        $query = Culture::query();

        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('region', 'like', '%' . $request->search . '%');
            });
        }

        $featured = Culture::where('is_featured', true)->orderBy('sort_order')->take(3)->get();
        $cultures  = $query->orderBy('sort_order')->get();

        return view('landing.culture', compact('cultures', 'categories', 'featured'));
    }

    public function show(Culture $culture)
    {
        $related = Culture::where('category', $culture->category)
            ->where('id', '!=', $culture->id)
            ->take(4)
            ->get();

        return view('landing.culture-detail', compact('culture', 'related'));
    }
}
