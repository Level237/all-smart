<?php

namespace Tests\Feature;

use App\Models\PortfolioProject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Test Portfolio',
            'email' => 'admin-portfolio@allsmart.com',
            'password' => Hash::make('AdminPass2026!'),
            'role' => 'admin',
        ]);

        Storage::fake('public');
    }

    /**
     * Un visiteur non connecté ne peut pas accéder à l'administration du portfolio.
     */
    public function test_guest_cannot_access_portfolio_admin(): void
    {
        $response = $this->get(route('admin.portfolio.index'));
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * L'administrateur peut visualiser la liste des réalisations.
     */
    public function test_admin_can_view_portfolio_index(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.portfolio.index'));

        $response->assertStatus(200);
        $response->assertSee('Réalisations');
        $response->assertSee('Ajouter un projet');
    }

    /**
     * L'administrateur peut afficher le formulaire de création.
     */
    public function test_admin_can_view_create_form(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.portfolio.create'));

        $response->assertStatus(200);
        $response->assertSee('Ajouter une Réalisation au Portfolio');
    }

    /**
     * L'administrateur peut créer un projet avec upload d'image et métadonnées d'étude de cas.
     */
    public function test_admin_can_create_project_with_image_and_case_study_details(): void
    {
        $image = UploadedFile::fake()->create('project.jpg', 200, 'image/jpeg');

        $response = $this->actingAs($this->admin)->post(route('admin.portfolio.store'), [
            'title' => 'Campagne FECA-Scrabble 2026',
            'client' => 'Fédération Camerounaise de Scrabble',
            'service' => 'Community Management',
            'challenge' => 'Dynamiser l image de la discipline auprès des jeunes.',
            'description' => 'Couverture complète et stratégie d engagement social.',
            'deliverables' => 'Scénographie, 15 Reels, Captation 4K',
            'metrics' => [
                ['value' => '+180%', 'label' => 'Portée'],
                ['value' => '50K+', 'label' => 'Vues'],
            ],
            'image' => $image,
            'link' => 'https://feca-scrabble.cm',
            'order' => 1,
            'is_active' => '1',
            'is_featured' => '1',
        ]);

        $response->assertRedirect(route('admin.portfolio.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('portfolio_projects', [
            'title' => 'Campagne FECA-Scrabble 2026',
            'client' => 'Fédération Camerounaise de Scrabble',
            'service' => 'Community Management',
            'challenge' => 'Dynamiser l image de la discipline auprès des jeunes.',
            'deliverables' => 'Scénographie, 15 Reels, Captation 4K',
            'is_active' => true,
            'is_featured' => true,
        ]);

        $project = PortfolioProject::where('title', 'Campagne FECA-Scrabble 2026')->first();
        $this->assertNotNull($project->image);
        Storage::disk('public')->assertExists($project->image);
        $this->assertCount(2, $project->metrics);
    }

    /**
     * L'administrateur peut modifier un projet et ses métriques.
     */
    public function test_admin_can_update_project(): void
    {
        $project = PortfolioProject::create([
            'title' => 'Ancien Projet',
            'client' => 'Ancien Client',
            'service' => 'Stratégie & Conseil',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->put(route('admin.portfolio.update', $project), [
            'title' => 'Projet Mis à Jour',
            'client' => 'Nouveau Client',
            'service' => 'Site Internet',
            'challenge' => 'Nouveau défi relevé avec brio.',
            'deliverables' => 'Site web, SEO',
            'is_active' => '1',
            'is_featured' => '0',
            'order' => 5,
        ]);

        $response->assertRedirect(route('admin.portfolio.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('portfolio_projects', [
            'id' => $project->id,
            'title' => 'Projet Mis à Jour',
            'client' => 'Nouveau Client',
            'service' => 'Site Internet',
            'challenge' => 'Nouveau défi relevé avec brio.',
            'deliverables' => 'Site web, SEO',
            'order' => 5,
        ]);
    }

    /**
     * L'administrateur peut supprimer un projet et son image.
     */
    public function test_admin_can_delete_project(): void
    {
        $image = UploadedFile::fake()->create('cover.jpg', 100, 'image/jpeg');
        $path = $image->store('portfolio', 'public');

        $project = PortfolioProject::create([
            'title' => 'Projet à supprimer',
            'service' => 'Création de Contenus',
            'image' => $path,
            'is_active' => true,
        ]);

        Storage::disk('public')->assertExists($path);

        $response = $this->actingAs($this->admin)->delete(route('admin.portfolio.destroy', $project));

        $response->assertRedirect(route('admin.portfolio.index'));
        $this->assertDatabaseMissing('portfolio_projects', [
            'id' => $project->id,
        ]);
        Storage::disk('public')->assertMissing($path);
    }

    /**
     * La page publique /realisations affiche les projets actifs, le composant modal et masque les inactifs.
     */
    public function test_public_realisations_page_displays_active_projects_and_modal(): void
    {
        $activeProject = PortfolioProject::create([
            'title' => 'Activation Publique Visible',
            'service' => 'Personal Branding',
            'challenge' => 'Visibilité forte du dirigeant',
            'description' => 'Stratégie menée par AllSmart',
            'metrics' => [
                ['value' => '+200%', 'label' => 'Abonnés'],
            ],
            'is_active' => true,
        ]);

        $inactiveProject = PortfolioProject::create([
            'title' => 'Projet Furtif Brouillon',
            'service' => 'Site Internet',
            'is_active' => false,
        ]);

        $response = $this->get('/realisations');

        $response->assertStatus(200);
        $response->assertSee('Activation Publique Visible');
        $response->assertSee('Visibilité forte du dirigeant');
        $response->assertDontSee('Projet Furtif Brouillon');
        // Vérifie la présence du modal et des actions de conversion
        $response->assertSee('selectedProject !== null', false);
        $response->assertSee('Discuter d\'un projet similaire', false);
    }

    /**
     * La redirection /portfolio vers /realisations fonctionne.
     */
    public function test_portfolio_redirect_to_realisations(): void
    {
        $response = $this->get('/portfolio');
        $response->assertRedirect('/realisations');
    }
}
