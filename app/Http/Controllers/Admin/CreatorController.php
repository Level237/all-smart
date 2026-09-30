<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CreatorController extends Controller
{
    /**
     * Affiche la liste des créateurs du réseau avec filtres et pagination.
     */
    public function index(Request $request): View
    {
        $statusFilter = $request->query('status', 'all');
        $search = $request->query('search');

        $query = Creator::query();

        if ($statusFilter === 'published') {
            $query->where('is_active', true);
        } elseif ($statusFilter === 'pending') {
            $query->where('is_active', false);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('handle', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('platform', 'like', "%{$search}%");
            });
        }

        $creators = $query->orderBy('order', 'asc')
                          ->orderBy('id', 'desc')
                          ->paginate(15)
                          ->withQueryString();

        $counts = [
            'all' => Creator::count(),
            'published' => Creator::where('is_active', true)->count(),
            'pending' => Creator::where('is_active', false)->count(),
        ];

        return view('admin.creators.index', compact('creators', 'statusFilter', 'counts', 'search'));
    }

    /**
     * Affiche le formulaire de création manuelle d'un créateur.
     */
    public function create(): View
    {
        return view('admin.creators.create');
    }

    /**
     * Enregistre un nouveau profil créateur depuis l'administration.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'handle' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1500'],
            'location' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:3072'],
            'languages' => ['nullable', 'array'],
            'niches' => ['nullable', 'array'],
            'platform' => ['required', 'string', 'max:50'],
            'platform_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('creators', 'public');
        }

        Creator::create($validated);

        return redirect()->route('admin.creators.index')
            ->with('success', 'Le profil créateur a été créé avec succès.');
    }

    /**
     * Affiche la fiche de candidature détaillée d'un créateur.
     */
    public function show(Creator $creator): View
    {
        return view('admin.creators.show', compact('creator'));
    }

    /**
     * Affiche le formulaire d'édition d'un créateur.
     */
    public function edit(Creator $creator): View
    {
        return view('admin.creators.edit', compact('creator'));
    }

    /**
     * Met à jour les informations, le statut de publication et l'ordre d'un créateur.
     */
    public function update(Request $request, Creator $creator): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'handle' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1500'],
            'location' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:3072'],
            'languages' => ['nullable', 'array'],
            'niches' => ['nullable', 'array'],
            'platform' => ['required', 'string', 'max:50'],
            'platform_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            if ($creator->photo && Storage::disk('public')->exists($creator->photo)) {
                Storage::disk('public')->delete($creator->photo);
            }
            $validated['photo'] = $request->file('photo')->store('creators', 'public');
        }

        $creator->update($validated);

        return redirect()->route('admin.creators.index')
            ->with('success', 'Le profil créateur a été mis à jour avec succès.');
    }

    /**
     * Publie ou dépublie rapidement un créateur en 1 clic.
     */
    public function toggleActive(Creator $creator): RedirectResponse
    {
        $creator->update([
            'is_active' => ! $creator->is_active,
        ]);

        $message = $creator->is_active
            ? "Le profil de {$creator->name} a été mis en ligne."
            : "Le profil de {$creator->name} a été dépublié.";

        return back()->with('success', $message);
    }

    /**
     * Met à jour rapidement l'ordre d'affichage d'un créateur.
     */
    public function updateOrder(Request $request, Creator $creator): RedirectResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'integer', 'min:0'],
        ]);

        $creator->update(['order' => $validated['order']]);

        return back()->with('success', "L'ordre d'affichage de {$creator->name} a été mis à jour.");
    }

    /**
     * Supprime un créateur et nettoie sa photo du stockage.
     */
    public function destroy(Creator $creator): RedirectResponse
    {
        if ($creator->photo && Storage::disk('public')->exists($creator->photo)) {
            Storage::disk('public')->delete($creator->photo);
        }

        $creator->delete();

        return redirect()->route('admin.creators.index')
            ->with('success', 'La fiche du créateur a été supprimée avec succès.');
    }
}
