<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\PetitionSignature;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::withCount('signatures')->latest()->paginate(15);
        return view('admin.petition.index', compact('petitions'));
    }

    public function create()
    {
        return view('admin.petition.form', ['petition' => new Petition()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'content'           => 'nullable|string',
            'target_signatures' => 'required|integer|min:1',
            'is_active'         => 'boolean',
            'external_link'     => 'nullable|url|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Petition::create($validated);

        return redirect()->route('admin.petition.index')->with('success', 'Petisi Berhasil Ditambahkan');
    }

    public function edit(Petition $petition)
    {
        return view('admin.petition.form', compact('petition'));
    }

    public function update(Request $request, Petition $petition)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'content'           => 'nullable|string',
            'target_signatures' => 'required|integer|min:1',
            'is_active'         => 'boolean',
            'external_link'     => 'nullable|url|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $petition->update($validated);

        return redirect()->route('admin.petition.index')->with('success', 'Petisi Berhasil Diperbarui');
    }

    public function destroy(Petition $petition)
    {
        $petition->delete();
        return redirect()->route('admin.petition.index')->with('success', 'Petisi Berhasil Dihapus');
    }

    public function signatures(Petition $petition)
    {
        $signatures = $petition->signatures()->latest()->paginate(30);
        return view('admin.petition.signatures', compact('petition', 'signatures'));
    }
}
