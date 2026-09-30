<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Enregistre une nouvelle demande de rendez-vous depuis le formulaire public.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
            'meeting_type' => ['required', 'string', 'in:visio,presentiel'],
            'service' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'time' => ['required', 'string', 'max:20'],
            'notes' => ['nullable', 'string', 'max:1500'],
        ]);

        $validated['status'] = Appointment::STATUS_NOUVEAU;

        $appointment = Appointment::create($validated);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre demande de rendez-vous a été enregistrée avec succès. Nos équipes reviendront vers vous sous 24h ouvrées.',
                'appointment_id' => $appointment->id,
            ], 201);
        }

        return back()->with('success', 'Votre rendez-vous a bien été enregistré. Nos équipes reviendront vers vous pour confirmation.');
    }
}
