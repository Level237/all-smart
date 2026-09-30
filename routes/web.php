<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\CreatorController as AdminCreatorController;
use App\Http\Controllers\Admin\PortfolioProjectController as AdminPortfolioProjectController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CreatorApplicationController;
use App\Models\Creator;
use App\Models\PortfolioProject;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage');
});

Route::get('/services', function () {
    return view('ServicesPage', [
        'services' => [
            [
                'title' => 'Stratégie & Conseil',
                'description' => 'Audit, positionnement et plan d’actions pour structurer votre marque et orienter votre croissance.',
                'image' => 'assets/services/strategie1.jpg',
                'url' => '/services/strategie-et-conseil',
            ],
            [
                'title' => 'Community Management',
                'description' => 'Pilotage de votre présence sociale avec une communication cohérente, engageante et performante.',
                'image' => 'assets/services/community1.jpg',
                'url' => '/services/community-management',
            ],
            [
                'title' => 'Création de Contenus',
                'description' => 'Photos, vidéos, couvertures et storytelling visuel pour donner vie à votre image de marque.',
                'image' => 'assets/services/contenu1.jpg',
                'url' => '/services/creation-de-contenus',
            ],
            [
                'title' => 'Personal Branding',
                'description' => 'Renforcez votre crédibilité et votre visibilité grâce à une identité personnelle solide et authentique.',
                'image' => 'assets/services/branding1.jpg',
                'url' => '/services/personal-branding',
            ],
            [
                'title' => 'Site Internet',
                'description' => 'Un site moderne, lisible et optimisé pour convertir vos visiteurs en clients.',
                'image' => 'assets/services/site1.jpg',
                'url' => '/services/site-internet',
            ],
            [
                'title' => 'Activations & Événementiel',
                'description' => 'Des expériences mémorables qui captent l’attention et renforcent votre présence sur le terrain.',
                'image' => 'assets/services/event1.jpg',
                'url' => '/services/activations-evenementiel',
            ],
            [
                'title' => 'Marketing d\'Influence',
                'description' => 'Des campagnes crédibles et efficaces pour amplifier votre message auprès de communautés engagées.',
                'image' => 'assets/services/marketing1.jpg',
                'url' => '/services/marketing-d-influence',
            ],
        ],
    ]);
});

Route::get('/qui-sommes-nous', function () {
    $teams = Team::query()->active()->ordered()->get();
    return view('AboutUs', compact('teams'));
});

Route::get('/equipe', function () {
    $teams = Team::query()->active()->ordered()->get();
    return view('Equipe', compact('teams'));
})->name('team.index');

Route::redirect('/team', '/equipe');

Route::redirect('/packs', '/packs/visibilite');

Route::view('/packs/visibilite', 'Pack', [
    'pack' => require __DIR__ . '/../config/packs/visibilite.php',
]);
Route::redirect('/pack/visibilite', '/packs/visibilite');

Route::view('/packs/croissance', 'Pack', [
    'pack' => require __DIR__ . '/../config/packs/croissance.php',
]);
Route::redirect('/pack/croissance', '/packs/croissance');

Route::view('/packs/image-premium', 'Pack', [
    'pack' => require __DIR__ . '/../config/packs/image-premium.php',
]);
Route::redirect('/pack/image-premium', '/packs/image-premium');

Route::view('/packs/activation-360', 'Pack', [
    'pack' => require __DIR__ . '/../config/packs/activation-360.php',
]);
Route::redirect('/pack/activation-360', '/packs/activation-360');

Route::view('/services/strategie-et-conseil', 'Services', [
    'service' => require __DIR__ . '/../config/services/strategie-conseil.php',
]);

Route::view('/services/community-management', 'Services', [
    'service' => require __DIR__ . '/../config/services/community-management.php',
]);

Route::view('/services/creation-de-contenus', 'Services', [
    'service' => require __DIR__ . '/../config/services/creation-de-contenus.php',
]);

Route::view('/services/personal-branding', 'Services', [
    'service' => require __DIR__ . '/../config/services/personal-branding.php',
]);

Route::view('/services/site-internet', 'Services', [
    'service' => require __DIR__ . '/../config/services/site-internet.php',
]);

Route::view('/services/activations-evenementiel', 'Services', [
    'service' => require __DIR__ . '/../config/services/activations-evenementiel.php',
]);

Route::view('/services/marketing-d-influence', 'MarketingInfluence');

Route::view('/influenceurs', 'Influenceurs');
Route::redirect('/services/marketing-d-influence/influenceurs', '/influenceurs');

Route::view('/createur-de-contenu', 'CreateurContenu');
Route::redirect('/services/marketing-d-influence/createur-de-contenu', '/createur-de-contenu');
Route::redirect('/je-suis-createur-de-contenu', '/createur-de-contenu');

Route::view('/rejoindre-le-reseau', 'RejoindreReseau')->name('creators.apply');
Route::post('/rejoindre-le-reseau', [CreatorApplicationController::class, 'store'])->middleware('throttle:5,1')->name('creators.apply.submit');
Route::redirect('/services/marketing-d-influence/rejoindre', '/rejoindre-le-reseau');
Route::redirect('/rejoindre-reseau', '/rejoindre-le-reseau');

Route::view('/contact', 'Contact');
Route::redirect('/nous-contacter', '/contact');

Route::view('/rendez-vous', 'RendezVous');
Route::post('/rendez-vous', [AppointmentController::class, 'store'])->middleware('throttle:5,1')->name('appointments.store');
Route::redirect('/prendre-rendez-vous', '/rendez-vous');
Route::redirect('/rendezvous', '/rendez-vous');

Route::get('/realisations', function () {
    $projects = PortfolioProject::query()->active()->ordered()->get();
    $services = PortfolioProject::SERVICES;
    return view('Realisations', compact('projects', 'services'));
})->name('portfolio.index');
Route::redirect('/portfolio', '/realisations');

/*
|--------------------------------------------------------------------------
| Espace Administration (Back-Office)
|--------------------------------------------------------------------------
| L'URL est masquée et personnalisable via la variable d'environnement ADMIN_PATH
| pour parer aux attaques ciblées et scanners de vulnérabilités sur /admin.
*/

$adminPrefix = env('ADMIN_PATH', 'smart-desk');

// Routes Publiques Admin (Guest)
Route::prefix($adminPrefix)->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

// Routes Protégées Admin (Middleware admin)
Route::prefix($adminPrefix)->middleware(['admin'])->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('team', AdminTeamController::class, ['as' => 'admin']);
    Route::resource('portfolio', AdminPortfolioProjectController::class, ['as' => 'admin']);
    Route::resource('appointments', AdminAppointmentController::class, ['as' => 'admin'])->only(['index', 'show', 'update', 'destroy']);
    Route::resource('creators', AdminCreatorController::class, ['as' => 'admin']);
    Route::post('creators/{creator}/toggle-active', [AdminCreatorController::class, 'toggleActive'])->name('admin.creators.toggle-active');
    Route::post('creators/{creator}/update-order', [AdminCreatorController::class, 'updateOrder'])->name('admin.creators.update-order');
});

// Leurre de sécurité : /admin renvoie systématiquement une erreur 404
if ($adminPrefix !== 'admin') {
    Route::any('/admin/{any?}', function () {
        abort(404);
    })->where('any', '.*');
}



