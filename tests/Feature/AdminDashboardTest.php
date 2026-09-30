<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Marc Directeur',
            'email' => 'directeur@allsmart-consulting.com',
            'password' => Hash::make('SecretAdmin2026!'),
            'role' => 'admin',
        ]);
    }

    /**
     * Un visiteur non connecté est redirigé vers la page de login admin.
     */
    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Un utilisateur authentifié sans rôle admin est refoulé.
     */
    public function test_non_admin_cannot_access_dashboard(): void
    {
        $regularUser = User::create([
            'name' => 'Jean Client',
            'email' => 'client@allsmart.com',
            'password' => Hash::make('UserSecret123!'),
            'role' => 'user',
        ]);

        $response = $this->actingAs($regularUser)->get(route('admin.dashboard'));

        $response->assertRedirect(route('admin.login'));
    }

    /**
     * L'administrateur connecté a accès au tableau de bord avec le layout complet.
     */
    public function test_admin_can_view_dashboard_with_layout(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Smart Desk');
        $response->assertSee('Tableau de Bord');
        $response->assertSee('Marc Directeur');
        $response->assertSee('Rendez-vous');
        $response->assertSee('Smart Team');
        $response->assertSee('Réalisations');
        $response->assertSee('Session sécurisée');
    }

    /**
     * Le tableau de bord affiche les messages flash de session.
     */
    public function test_dashboard_displays_flash_messages(): void
    {
        $response = $this->actingAs($this->admin)
            ->withSession(['success' => 'Opération réussie avec succès !'])
            ->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Opération réussie avec succès !');
    }
}
