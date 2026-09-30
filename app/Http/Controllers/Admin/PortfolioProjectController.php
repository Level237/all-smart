<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PortfolioProjectController extends Controller
{
    /**
     * Affiche la liste des réalisations / projets du portfolio.
     */
    public function index(Request $request): View
    {
        $query = PortfolioProject::query();

        if ($request->filled('service')) {
            $query->where('service', $request->input('service'));
        }

        $projects = $query->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        $services = PortfolioProject::SERVICES;

        return view('admin.portfolio.index', compact('projects', 'services'));
    }

    /**
     * Affiche le formulaire de création d'un projet.
     */
    public function create(): View
    {
        $services = PortfolioProject::SERVICES;

        return view('admin.portfolio.create', compact('services'));
    }

    /**
     * Enregistre un nouveau projet de réalisation.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client' => ['nullable', 'string', 'max:255'],
            'service' => ['required', 'string', Rule::in(PortfolioProject::SERVICES)],
            'challenge' => ['nullable', 'string', 'max:2000'],
            'description' => ['nullable', 'string', 'max:2000'],
            'deliverables' => ['nullable', 'string', 'max:500'],
            'metrics' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'],
            'link' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['is_featured'] = $request->boolean('is_featured', false);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        PortfolioProject::create($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Le projet a été ajouté avec succès aux réalisations.');
    }

    /**
     * Affiche le formulaire d'édition d'un projet.
     */
    public function edit(PortfolioProject $portfolio): View
    {
        $services = PortfolioProject::SERVICES;

        return view('admin.portfolio.edit', [
            'project' => $portfolio,
            'services' => $services,
        ]);
    }

    /**
     * Met à jour les informations d'un projet.
     */
    public function update(Request $request, PortfolioProject $portfolio): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client' => ['nullable', 'string', 'max:255'],
            'service' => ['required', 'string', Rule::in(PortfolioProject::SERVICES)],
            'challenge' => ['nullable', 'string', 'max:2000'],
            'description' => ['nullable', 'string', 'max:2000'],
            'deliverables' => ['nullable', 'string', 'max:500'],
            'metrics' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'],
            'link' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            // Nettoyage de l'ancienne image si stockée dans le disque public
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Les informations du projet ont été mises à jour.');
    }

    /**
     * Supprime un projet et son fichier image associé.
     */
    public function destroy(PortfolioProject $portfolio): RedirectResponse
    {
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Le projet a été retiré des réalisations.');
    }
}
