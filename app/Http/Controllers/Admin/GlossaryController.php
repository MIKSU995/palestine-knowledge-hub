<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Glossary;
use Illuminate\Support\Str;

class GlossaryController extends Controller
{
    public function index()
    {
        $glossaries = Glossary::orderBy('term', 'asc')->paginate(15);
        return view('admin.glossary.index', compact('glossaries'));
    }

    public function create()
    {
        return view('admin.glossary.form', ['glossary' => new Glossary()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'term' => 'required|string|max:255',
            'arabic_term' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'definition' => 'required|string',
            'description' => 'nullable|string',
            'etymology' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['term']);

        Glossary::create($validated);

        return redirect()->route('admin.glossary.index')->with('success', 'Istilah Glosarium Berhasil Ditambahkan');
    }

    public function edit(Glossary $glossary)
    {
        return view('admin.glossary.form', compact('glossary'));
    }

    public function update(Request $request, Glossary $glossary)
    {
        $validated = $request->validate([
            'term' => 'required|string|max:255',
            'arabic_term' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'definition' => 'required|string',
            'description' => 'nullable|string',
            'etymology' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['term']);

        $glossary->update($validated);

        return redirect()->route('admin.glossary.index')->with('success', 'Istilah Glosarium Berhasil Diperbarui');
    }

    public function destroy(Glossary $glossary)
    {
        $glossary->delete();
        return redirect()->route('admin.glossary.index')->with('success', 'Istilah Glosarium Berhasil Dihapus');
    }
}
