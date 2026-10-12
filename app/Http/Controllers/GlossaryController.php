<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glossary;

class GlossaryController extends Controller
{
    public function index(Request $request)
    {
        $query = Glossary::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('term', 'like', "%{$search}%")
                  ->orWhere('arabic_term', 'like', "%{$search}%")
                  ->orWhere('definition', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->input('category') !== 'All') {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('letter')) {
            $query->where('term', 'like', $request->input('letter') . '%');
        }

        $terms = $query->orderBy('term', 'asc')->get();
        $categories = ['All', 'Sejarah', 'Geografi', 'Budaya', 'Hukum', 'Tokoh'];
        $alphabet = range('A', 'Z');

        return view('landing.glossary', compact('terms', 'categories', 'alphabet'));
    }
}
