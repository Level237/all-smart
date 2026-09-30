<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Affiche la liste des rendez-vous avec filtres de statut et recherche.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status', 'all');
        $search = $request->query('q');

        $query = Appointment::query()->recent();

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $appointments = $query->paginate(15)->withQueryString();

        // Compteurs globaux pour les onglets de filtrage
        $counts = [
            'all' => Appointment::count(),
            'nouveau' => Appointment::where('status', Appointment::STATUS_NOUVEAU)->count(),
            'confirme' => Appointment::where('status', Appointment::STATUS_CONFIRME)->count(),
            'termine' => Appointment::where('status', Appointment::STATUS_TERMINE)->count(),
            'annule' => Appointment::where('status', Appointment::STATUS_ANNULE)->count(),
        ];

        return view('admin.appointments.index', compact('appointments', 'status', 'search', 'counts'));
    }

    /**
     * Affiche les détails d'une demande de rendez-vous.
     */
    public function show(Appointment $appointment): View
    {
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Met à jour le statut et/ou les notes internes du rendez-vous.
     */
    public function update(Request $request, Appointment $appointment): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:nouveau,confirme,termine,annule'],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $appointment->update($validated);

        return back()->with('success', "Le rendez-vous avec {$appointment->name} a été mis à jour.");
    }

    /**
     * Supprime une demande de rendez-vous.
     */
    public function destroy(Appointment $appointment): RedirectResponse
    {
        $name = $appointment->name;
        $appointment->delete();

        return redirect()
            ->route('admin.appointments.index')
            ->with('success', "La demande de rendez-vous de {$name} a été supprimée.");
    }
}
