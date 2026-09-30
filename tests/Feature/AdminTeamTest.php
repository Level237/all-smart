<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminTeamTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Directeur Test',
            'email' => 'admin-team@allsmart.com',
            'password' => Hash::make('AdminPass2026!'),
            'role' => 'admin',
        ]);

        Storage::fake('public');
    }

    /**
     * Un visiteur non connecté ne peut pas accéder à la gestion de l'équipe.
     */
    public function test_guest_cannot_access_team_admin(): void
    {
        $response = $this->get(route('admin.team.index'));
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * L'administrateur peut visualiser la liste des membres de l'équipe.
     */
    public function test_admin_can_view_team_index(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.team.index'));

        $response->assertStatus(200);
        $response->assertSee('Smart Team');
        $response->assertSee('Ajouter un membre');
    }

    /**
     * L'administrateur peut créer un collaborateur avec upload de photo.
     */
    public function test_admin_can_create_team_member_with_photo(): void
    {
        $photo = UploadedFile::fake()->create('daniele.jpg', 100, 'image/jpeg');

        $response = $this->actingAs($this->admin)->post(route('admin.team.store'), [
            'name' => 'Danièle Nono',
            'role' => 'Fondatrice & Directrice Générale',
            'label' => 'Celle qui paie les salaires',
            'photo' => $photo,
            'order' => 1,
            'is_active' => '1',
            'linkedin_url' => 'https://linkedin.com/in/daniele-nono',
        ]);

        $response->assertRedirect(route('admin.team.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('teams', [
            'name' => 'Danièle Nono',
            'role' => 'Fondatrice & Directrice Générale',
            'label' => 'Celle qui paie les salaires',
            'order' => 1,
            'is_active' => true,
        ]);

        $member = Team::where('name', 'Danièle Nono')->first();
        $this->assertNotNull($member->photo);
        Storage::disk('public')->assertExists($member->photo);
    }

    /**
     * L'administrateur peut modifier un collaborateur.
     */
    public function test_admin_can_update_team_member(): void
    {
        $member = Team::create([
            'name' => 'Rich Tientcheu',
            'role' => 'Chef de Projet',
            'label' => 'Le stratège',
            'order' => 2,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->put(route('admin.team.update', $member), [
            'name' => 'Rich TIENTCHEU',
            'role' => 'Directeur des Opérations',
            'label' => 'Le maestro',
            'order' => 1,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.team.index'));
        $this->assertDatabaseHas('teams', [
            'id' => $member->id,
            'name' => 'Rich TIENTCHEU',
            'role' => 'Directeur des Opérations',
            'label' => 'Le maestro',
            'order' => 1,
        ]);
    }

    /**
     * L'administrateur peut supprimer un collaborateur et sa photo.
     */
    public function test_admin_can_delete_team_member(): void
    {
        $photo = UploadedFile::fake()->create('member.jpg', 100, 'image/jpeg');
        $storedPath = $photo->store('teams', 'public');

        $member = Team::create([
            'name' => 'Membre Test',
            'role' => 'Consultant',
            'photo' => $storedPath,
            'order' => 3,
            'is_active' => true,
        ]);

        Storage::disk('public')->assertExists($storedPath);

        $response = $this->actingAs($this->admin)->delete(route('admin.team.destroy', $member));

        $response->assertRedirect(route('admin.team.index'));
        $this->assertDatabaseMissing('teams', ['id' => $member->id]);
        Storage::disk('public')->assertMissing($storedPath);
    }

    /**
     * La page publique Qui Sommes-Nous n'affiche pas la Smart Team si la table est vide,
     * et l'affiche dynamiquement quand des membres existent.
     */
    public function test_about_us_page_handles_team_dynamically(): void
    {
        // 1. Table vide : aucune Smart Team affichée
        $responseEmpty = $this->get('/qui-sommes-nous');
        $responseEmpty->assertStatus(200);
        $responseEmpty->assertDontSee('La Smart team');

        // 2. Avec membre actif : affichage effectif
        Team::create([
            'name' => 'Danièle Nono',
            'role' => 'Fondatrice',
            'label' => 'Celle qui paie les salaires',
            'order' => 1,
            'is_active' => true,
        ]);

        $responseWithTeam = $this->get('/qui-sommes-nous');
        $responseWithTeam->assertStatus(200);
        $responseWithTeam->assertSee('La Smart team');
        $responseWithTeam->assertSee('Danièle Nono');
        $responseWithTeam->assertSee('Fondatrice');
    }

    /**
     * La page publique Qui Sommes-Nous limite l'affichage à 4 membres et propose le lien vers /equipe.
     */
    public function test_about_us_page_limits_to_four_members_and_links_to_team(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            Team::create([
                'name' => "Membre Numéro {$i}",
                'role' => "Rôle {$i}",
                'order' => $i,
                'is_active' => true,
            ]);
        }

        $response = $this->get('/qui-sommes-nous');
        $response->assertStatus(200);
        $response->assertSee('Membre Numéro 1');
        $response->assertSee('Membre Numéro 4');
        $response->assertDontSee('Membre Numéro 5');
        $response->assertDontSee('Membre Numéro 6');
        $response->assertSee(route('team.index'));
        $response->assertSee('Découvrir toute la Smart Team');
    }

    /**
     * La page /equipe liste tous les membres actifs et /team redirige vers /equipe.
     */
    public function test_equipe_page_renders_all_members_and_redirects(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            Team::create([
                'name' => "Membre AllSmart {$i}",
                'role' => "Expert {$i}",
                'order' => $i,
                'is_active' => true,
            ]);
        }

        $response = $this->get('/equipe');
        $response->assertStatus(200);
        for ($i = 1; $i <= 6; $i++) {
            $response->assertSee("Membre AllSmart {$i}");
            $response->assertSee("Expert {$i}");
        }
        $response->assertSee('Toute la Smart Team (6)');

        // Test redirection de /team vers /equipe
        $redirectResponse = $this->get('/team');
        $redirectResponse->assertRedirect('/equipe');
    }
}
