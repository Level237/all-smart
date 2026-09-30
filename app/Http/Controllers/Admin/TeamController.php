<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * Affiche la liste des membres de la Smart Team.
     */
    public function index(): View
    {
        $members = Team::query()
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15);

        return view('admin.team.index', compact('members'));
    }

    /**
     * Affiche le formulaire de création d'un membre.
     */
    public function create(): View
    {
        return view('admin.team.create');
    }

    /**
     * Enregistre un nouveau membre en base de données.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'label' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'x_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teams', 'public');
        }

        Team::create($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Le membre a été ajouté avec succès à la Smart Team.');
    }

    /**
     * Affiche le formulaire d'édition d'un membre.
     */
    public function edit(Team $team): View
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Met à jour les informations d'un membre.
     */
    public function update(Request $request, Team $team): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'label' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'x_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            // Nettoyage de l'ancienne photo sur le disque
            if ($team->photo && Storage::disk('public')->exists($team->photo)) {
                Storage::disk('public')->delete($team->photo);
            }
            $validated['photo'] = $request->file('photo')->store('teams', 'public');
        }

        $team->update($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Les informations du membre ont été mises à jour.');
    }

    /**
     * Supprime un membre et son fichier image associé.
     */
    public function destroy(Team $team): RedirectResponse
    {
        if ($team->photo && Storage::disk('public')->exists($team->photo)) {
            Storage::disk('public')->delete($team->photo);
        }

        $team->delete();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Le membre a été retiré de la Smart Team.');
    }
}
