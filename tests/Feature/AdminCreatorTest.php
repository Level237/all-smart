<?php

namespace Tests\Feature;

use App\Models\Creator;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminCreatorTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin-creator@allsmart.com',
            'password' => Hash::make('Password2026!'),
            'role' => 'admin',
        ]);

        Storage::fake('public');
    }

    /**
     * Un visiteur non connecté ne peut pas accéder à la gestion des créateurs.
     */
    public function test_guest_cannot_access_creators_admin(): void
    {
        $response = $this->get(route('admin.creators.index'));
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Un candidat public peut soumettre sa candidature via le formulaire.
     */
    public function test_public_user_can_submit_creator_application(): void
    {
        $photo = UploadedFile::fake()->create('profil.jpg', 100, 'image/jpeg');

        $response = $this->post(route('creators.apply.submit'), [
            'name' => 'Marc Dupont',
            'handle' => '@marc_crea',
            'bio' => 'Créateur de contenu tech et astuces digitales.',
            'location' => 'Douala, Cameroun',
            'photo' => $photo,
            'platform' => 'TikTok',
            'platform_url' => 'https://tiktok.com/@marc_crea',
            'status' => 'Disponible immédiatement',
            'languages' => ['Français', 'Anglais'],
            'niches' => ['Tech / IA', 'Business / Entreprenariat'],
        ]);

        $this->assertDatabaseHas('creators', [
            'name' => 'Marc Dupont',
            'handle' => '@marc_crea',
            'platform' => 'TikTok',
            'location' => 'Douala, Cameroun',
            'is_active' => false,
            'order' => 0,
        ]);

        $creator = Creator::where('handle', '@marc_crea')->first();
        $this->assertNotNull($creator->photo);
        Storage::disk('public')->assertExists($creator->photo);
        $this->assertEquals(['Français', 'Anglais'], $creator->languages);
        $this->assertEquals(['Tech / IA', 'Business / Entreprenariat'], $creator->niches);
    }

    /**
     * L'administrateur peut visualiser la liste des créateurs.
     */
    public function test_admin_can_view_creators_index(): void
    {
        Creator::create([
            'name' => 'Sarah K',
            'handle' => '@sarahk',
            'location' => 'Yaoundé',
            'platform' => 'Instagram',
            'status' => 'Disponible immédiatement',
            'is_active' => true,
            'order' => 0,
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.creators.index'));

        $response->assertStatus(200);
        $response->assertSee('Réseau Créateurs');
        $response->assertSee('Sarah K');
        $response->assertSee('@sarahk');
    }

    /**
     * L'administrateur peut afficher la fiche détaillée d'un créateur.
     */
    public function test_admin_can_view_creator_show(): void
    {
        $creator = Creator::create([
            'name' => 'Jean Talent',
            'handle' => '@jeantalent',
            'bio' => 'Humoriste et acteur web.',
            'location' => 'Douala, Cameroun',
            'platform' => 'TikTok',
            'platform_url' => 'https://tiktok.com/@jeantalent',
            'status' => 'Disponible immédiatement',
            'niches' => ['Humour / Divertissement'],
            'languages' => ['Français'],
            'is_active' => false,
            'order' => 2,
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.creators.show', $creator));

        $response->assertStatus(200);
        $response->assertSee('Jean Talent');
        $response->assertSee('Humoriste et acteur web.');
        $response->assertSee('Dépublié / En attente');
    }

    /**
     * L'administrateur peut créer un créateur manuellement.
     */
    public function test_admin_can_create_creator_manually(): void
    {
        $photo = UploadedFile::fake()->create('manuel.jpg', 100, 'image/jpeg');

        $response = $this->actingAs($this->admin)->post(route('admin.creators.store'), [
            'name' => 'Alice Mode',
            'handle' => 'alicemode',
            'bio' => 'Passionnée de mode éthique et lifestyle.',
            'location' => 'Bafoussam',
            'photo' => $photo,
            'platform' => 'Instagram',
            'platform_url' => 'https://instagram.com/alicemode',
            'status' => 'Ouvert aux collabs marques',
            'niches' => ['Lifestyle / Mode'],
            'languages' => ['Français'],
            'order' => 1,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.creators.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('creators', [
            'name' => 'Alice Mode',
            'handle' => '@alicemode',
            'platform' => 'Instagram',
            'order' => 1,
            'is_active' => true,
        ]);

        $creator = Creator::where('name', 'Alice Mode')->first();
        Storage::disk('public')->assertExists($creator->photo);
    }

    /**
     * L'administrateur peut modifier un créateur.
     */
    public function test_admin_can_update_creator(): void
    {
        $creator = Creator::create([
            'name' => 'Paul Initial',
            'handle' => '@paul_ini',
            'location' => 'Douala',
            'platform' => 'YouTube',
            'status' => 'Disponible immédiatement',
            'is_active' => false,
            'order' => 5,
        ]);

        $response = $this->actingAs($this->admin)->put(route('admin.creators.update', $creator), [
            'name' => 'Paul Modifié',
            'handle' => 'paul_updated',
            'bio' => 'Nouvelle bio mise à jour.',
            'location' => 'Kribi',
            'platform' => 'YouTube',
            'status' => 'En projet actif',
            'order' => 2,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.creators.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('creators', [
            'id' => $creator->id,
            'name' => 'Paul Modifié',
            'handle' => '@paul_updated',
            'location' => 'Kribi',
            'status' => 'En projet actif',
            'order' => 2,
            'is_active' => true,
        ]);
    }

    /**
     * L'administrateur peut activer ou dépublier un créateur en 1 clic.
     */
    public function test_admin_can_toggle_creator_active_status(): void
    {
        $creator = Creator::create([
            'name' => 'Toggle User',
            'handle' => '@toggle_user',
            'location' => 'Douala',
            'platform' => 'TikTok',
            'status' => 'Disponible immédiatement',
            'is_active' => false,
            'order' => 0,
        ]);

        // 1er clic : mise en ligne
        $response = $this->actingAs($this->admin)->post(route('admin.creators.toggle-active', $creator));
        $response->assertSessionHas('success');
        $this->assertTrue($creator->fresh()->is_active);

        // 2eme clic : dépublication
        $response = $this->actingAs($this->admin)->post(route('admin.creators.toggle-active', $creator));
        $response->assertSessionHas('success');
        $this->assertFalse($creator->fresh()->is_active);
    }

    /**
     * L'administrateur peut modifier l'ordre d'affichage d'un créateur.
     */
    public function test_admin_can_update_creator_order(): void
    {
        $creator = Creator::create([
            'name' => 'Ordered Creator',
            'handle' => '@ordered_creator',
            'location' => 'Douala',
            'platform' => 'TikTok',
            'status' => 'Disponible immédiatement',
            'is_active' => true,
            'order' => 10,
        ]);

        $response = $this->actingAs($this->admin)->post(route('admin.creators.update-order', $creator), [
            'order' => 1,
        ]);

        $response->assertSessionHas('success');
        $this->assertEquals(1, $creator->fresh()->order);
    }

    /**
     * L'administrateur peut supprimer un créateur et son image est purgée.
     */
    public function test_admin_can_delete_creator_and_photo_cleaned(): void
    {
        $file = UploadedFile::fake()->create('todelete.jpg', 100, 'image/jpeg');
        $path = $file->store('creators', 'public');

        $creator = Creator::create([
            'name' => 'A Supprimer',
            'handle' => '@to_delete',
            'location' => 'Douala',
            'photo' => $path,
            'platform' => 'Instagram',
            'status' => 'Disponible',
            'is_active' => false,
            'order' => 99,
        ]);

        Storage::disk('public')->assertExists($path);

        $response = $this->actingAs($this->admin)->delete(route('admin.creators.destroy', $creator));

        $response->assertRedirect(route('admin.creators.index'));
        $this->assertDatabaseMissing('creators', ['id' => $creator->id]);
        Storage::disk('public')->assertMissing($path);
    }
}
