<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreatorApplicationController extends Controller
{
    /**
     * Traite l'inscription d'un créateur depuis le formulaire public.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'handle' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1500'],
            'location' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:3072'],
            'languages' => ['nullable', 'array'],
            'languages.*' => ['string', 'max:50'],
            'niches' => ['nullable', 'array'],
            'niches.*' => ['string', 'max:50'],
            'platform' => ['required', 'string', 'max:50'],
            'platform_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'accept_conditions' => ['nullable'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('creators', 'public');
        }

        // Par défaut, le profil est dépublié (en attente de modération admin)
        $validated['is_active'] = false;
        $validated['order'] = 0;

        $creator = Creator::create($validated);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre candidature a été envoyée avec succès ! Notre équipe étudiera votre profil sous 48h.',
                'creator_id' => $creator->id,
            ], 201);
        }

        return back()->with('success', 'Votre candidature a été envoyée avec succès ! Notre équipe étudiera votre profil sous 48h.');
    }
}
