<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin RendezVous',
            'email' => 'admin-rdv@allsmart.com',
            'password' => Hash::make('AdminPass2026!'),
            'role' => 'admin',
        ]);
    }

    /**
     * Un visiteur public peut soumettre avec succès une demande de rendez-vous.
     */
    public function test_guest_can_submit_public_appointment_request(): void
    {
        $payload = [
            'name' => 'Alain Mbarga',
            'email' => 'alain.mbarga@startup-douala.cm',
            'phone' => '+237699112233',
            'company' => 'Kmer Tech SARL',
            'meeting_type' => 'visio',
            'service' => 'Stratégie & Conseil',
            'date' => '2026-10-15',
            'time' => '14:30',
            'notes' => 'Nous souhaitons revoir notre stratégie de marque avant la fin d\'année.',
        ];

        $response = $this->postJson(route('appointments.store'), $payload);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                 ]);

        $this->assertDatabaseHas('appointments', [
            'name' => 'Alain Mbarga',
            'email' => 'alain.mbarga@startup-douala.cm',
            'company' => 'Kmer Tech SARL',
            'meeting_type' => 'visio',
            'service' => 'Stratégie & Conseil',
            'status' => 'nouveau',
        ]);
    }

    /**
     * La soumission publique rejette les champs obligatoires manquants.
     */
    public function test_public_appointment_requires_mandatory_fields(): void
    {
        $response = $this->postJson(route('appointments.store'), []);

        $response->assertStatus(422);
        $this->assertArrayHasKey('name', $response->json('errors'));
        $this->assertArrayHasKey('email', $response->json('errors'));
        $this->assertArrayHasKey('phone', $response->json('errors'));
    }

    /**
     * Un visiteur non connecté est redirigé s'il tente d'accéder à la liste admin des rendez-vous.
     */
    public function test_guest_cannot_access_admin_appointments(): void
    {
        $response = $this->get(route('admin.appointments.index'));
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * L'administrateur peut visualiser la liste des rendez-vous et filtrer par statut.
     */
    public function test_admin_can_view_appointments_and_filter_by_status(): void
    {
        $rdv1 = Appointment::create([
            'name' => 'Client Nouveau',
            'email' => 'nouveau@client.com',
            'phone' => '+237600000001',
            'meeting_type' => 'visio',
            'service' => 'Community Management',
            'date' => '2026-10-20',
            'time' => '11:00',
            'status' => Appointment::STATUS_NOUVEAU,
        ]);

        $rdv2 = Appointment::create([
            'name' => 'Client Confirmé',
            'email' => 'confirme@client.com',
            'phone' => '+237600000002',
            'meeting_type' => 'presentiel',
            'service' => 'Site Internet',
            'date' => '2026-10-21',
            'time' => '16:00',
            'status' => Appointment::STATUS_CONFIRME,
        ]);

        // Vue générale
        $responseAll = $this->actingAs($this->admin)->get(route('admin.appointments.index'));
        $responseAll->assertStatus(200);
        $responseAll->assertSee('Client Nouveau');
        $responseAll->assertSee('Client Confirmé');

        // Filtre 'confirme'
        $responseFiltered = $this->actingAs($this->admin)->get(route('admin.appointments.index', ['status' => 'confirme']));
        $responseFiltered->assertStatus(200);
        $responseFiltered->assertSee('Client Confirmé');
        $responseFiltered->assertDontSee('Client Nouveau');
    }

    /**
     * L'administrateur peut consulter le détail d'un rendez-vous.
     */
    public function test_admin_can_view_appointment_details(): void
    {
        $rdv = Appointment::create([
            'name' => 'Pauline Kamga',
            'email' => 'pauline@agence.cm',
            'phone' => '+237677889900',
            'company' => 'Kamga Group',
            'meeting_type' => 'visio',
            'service' => 'Marketing d\'Influence',
            'date' => '2026-11-05',
            'time' => '09:30',
            'notes' => 'Campagne influenceurs sur Douala et Yaoundé.',
            'status' => Appointment::STATUS_NOUVEAU,
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.appointments.show', $rdv));

        $response->assertStatus(200);
        $response->assertSee('Pauline Kamga');
        $response->assertSee('Kamga Group');
        $response->assertSee('Campagne influenceurs');
    }

    /**
     * L'administrateur peut modifier le statut et ajouter des notes internes.
     */
    public function test_admin_can_update_appointment_status_and_notes(): void
    {
        $rdv = Appointment::create([
            'name' => 'Samuel Eto',
            'email' => 'samuel@eto.cm',
            'phone' => '+237655443322',
            'meeting_type' => 'presentiel',
            'service' => 'Personal Branding',
            'date' => '2026-11-12',
            'time' => '17:15',
            'status' => Appointment::STATUS_NOUVEAU,
        ]);

        $response = $this->actingAs($this->admin)->put(route('admin.appointments.update', $rdv), [
            'status' => 'confirme',
            'admin_notes' => 'Appel passé le matin, rendez-vous confirmé dans nos bureaux.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('appointments', [
            'id' => $rdv->id,
            'status' => 'confirme',
            'admin_notes' => 'Appel passé le matin, rendez-vous confirmé dans nos bureaux.',
        ]);
    }

    /**
     * L'administrateur peut supprimer un rendez-vous.
     */
    public function test_admin_can_delete_appointment(): void
    {
        $rdv = Appointment::create([
            'name' => 'Demande Obsolète',
            'email' => 'obsolete@test.cm',
            'phone' => '+237600000099',
            'meeting_type' => 'visio',
            'service' => 'Stratégie',
            'date' => '2026-10-01',
            'time' => '10:00',
            'status' => Appointment::STATUS_ANNULE,
        ]);

        $response = $this->actingAs($this->admin)->delete(route('admin.appointments.destroy', $rdv));

        $response->assertRedirect(route('admin.appointments.index'));
        $this->assertDatabaseMissing('appointments', ['id' => $rdv->id]);
    }
}
