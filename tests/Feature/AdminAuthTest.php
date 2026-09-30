<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * La page de connexion admin doit être accessible publiquement via son URL masquée.
     */
    public function test_admin_login_screen_can_be_rendered(): void
    {
        $response = $this->get(route('admin.login'));

        $response->assertStatus(200);
        $response->assertSee('Espace Administration');
    }

    /**
     * Leurre de sécurité : /admin et /admin/login doivent renvoyer 404.
     */
    public function test_old_admin_urls_return_404_not_found(): void
    {
        $responseAdmin = $this->get('/admin');
        $responseAdmin->assertStatus(404);

        $responseLogin = $this->get('/admin/login');
        $responseLogin->assertStatus(404);
    }

    /**
     * Un visiteur non authentifié doit être redirigé vers le login admin s'il tente d'accéder au dashboard.
     */
    public function test_unauthenticated_user_cannot_access_admin_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('admin.login'));
    }

    /**
     * L'administrateur peut se connecter avec les bons identifiants et accéder au tableau de bord.
     */
    public function test_admin_user_can_authenticate_and_access_dashboard(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin-test@allsmart.com'],
            [
                'name' => 'Admin Test',
                'password' => Hash::make('AdminSecret123!'),
                'role' => 'admin',
            ]
        );

        $response = $this->post(route('admin.login.submit'), [
            'email' => 'admin-test@allsmart.com',
            'password' => 'AdminSecret123!',
        ]);

        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect(route('admin.dashboard'));

        $dashboardResponse = $this->actingAs($admin)->get(route('admin.dashboard'));
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Tableau de Bord');
    }

    /**
     * Un mot de passe invalide rejette l'authentification.
     */
    public function test_users_cannot_authenticate_with_invalid_password(): void
    {
        User::updateOrCreate(
            ['email' => 'admin-test@allsmart.com'],
            [
                'name' => 'Admin Test',
                'password' => Hash::make('AdminSecret123!'),
                'role' => 'admin',
            ]
        );

        $response = $this->post(route('admin.login.submit'), [
            'email' => 'admin-test@allsmart.com',
            'password' => 'WrongPassword',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /**
     * Un utilisateur régulier (non admin) est bloqué s'il tente de se connecter sur l'espace admin.
     */
    public function test_non_admin_user_cannot_access_admin_dashboard(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'user-regular@allsmart.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('UserSecret123!'),
                'role' => 'user',
            ]
        );

        $response = $this->post(route('admin.login.submit'), [
            'email' => 'user-regular@allsmart.com',
            'password' => 'UserSecret123!',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');

        // Et s'il tente d'accéder directement au dashboard :
        $directResponse = $this->actingAs($user)->get(route('admin.dashboard'));
        $directResponse->assertRedirect(route('admin.login'));
    }

    /**
     * L'administrateur peut se déconnecter et sa session est détruite.
     */
    public function test_admin_user_can_logout(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin-test@allsmart.com'],
            [
                'name' => 'Admin Test',
                'password' => Hash::make('AdminSecret123!'),
                'role' => 'admin',
            ]
        );

        $this->actingAs($admin);

        $response = $this->post(route('admin.logout'));

        $this->assertGuest();
        $response->assertRedirect(route('admin.login'));
    }
}
