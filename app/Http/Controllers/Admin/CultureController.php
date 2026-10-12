<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function index()
    {
        $cultures = Culture::orderBy('sort_order')->paginate(20);
        return view('admin.culture.index', compact('cultures'));
    }

    public function create()
    {
        return view('admin.culture.form', ['culture' => new Culture()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'arabic_title' => 'nullable|string|max:255',
            'category'     => 'required|string|max:100',
            'region'       => 'nullable|string|max:150',
            'description'  => 'required|string',
            'content'      => 'nullable|string',
            'image_url'    => 'nullable|url|max:500',
            'is_featured'  => 'boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order']  = $request->input('sort_order', 0);

        Culture::create($validated);

        return redirect()->route('admin.culture.index')->with('success', 'Warisan Budaya Berhasil Ditambahkan');
    }

    public function edit(Culture $culture)
    {
        return view('admin.culture.form', compact('culture'));
    }

    public function update(Request $request, Culture $culture)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'arabic_title' => 'nullable|string|max:255',
            'category'     => 'required|string|max:100',
            'region'       => 'nullable|string|max:150',
            'description'  => 'required|string',
            'content'      => 'nullable|string',
            'image_url'    => 'nullable|url|max:500',
            'is_featured'  => 'boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order']  = $request->input('sort_order', 0);

        $culture->update($validated);

        return redirect()->route('admin.culture.index')->with('success', 'Warisan Budaya Berhasil Diperbarui');
    }

    public function destroy(Culture $culture)
    {
        $culture->delete();
        return redirect()->route('admin.culture.index')->with('success', 'Warisan Budaya Berhasil Dihapus');
    }
}
