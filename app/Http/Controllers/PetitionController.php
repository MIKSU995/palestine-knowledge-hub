<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Models\PetitionSignature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::where('is_active', true)->latest()->get();
        return view('landing.petition', compact('petitions'));
    }

    public function show(Petition $petition)
    {
        $recentSignatures = $petition->signatures()
            ->latest()
            ->take(10)
            ->get();

        return view('landing.petition-detail', compact('petition', 'recentSignatures'));
    }

    public function sign(Request $request, Petition $petition)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'email'   => 'nullable|email|max:150',
            'city'    => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Prevent duplicate from same IP in 24 hours
        $existingSign = PetitionSignature::where('petition_id', $petition->id)
            ->where('ip_address', $request->ip())
            ->where('created_at', '>=', now()->subDay())
            ->exists();

        if ($existingSign) {
            return back()->with('info', 'Anda sudah menandatangani petisi ini dalam 24 jam terakhir. Terima kasih atas dukungan Anda!');
        }

        PetitionSignature::create([
            'petition_id' => $petition->id,
            'name'        => $request->name,
            'email'       => $request->email,
            'city'        => $request->city,
            'country'     => $request->country ?? 'Indonesia',
            'message'     => $request->message,
            'ip_address'  => $request->ip(),
        ]);

        $petition->increment('signature_count');

        if ($request->ajax()) {
            return response()->json([
                'success'         => true,
                'message'         => 'Terima kasih! Tanda tangan Anda berhasil dicatat.',
                'signature_count' => $petition->fresh()->signature_count,
            ]);
        }

        return back()->with('success', 'Terima kasih, ' . $request->name . '! Tanda tangan Anda berhasil dicatat. Bersama kita bersuara!');
    }
}
