<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage');
});

Route::view('/qui-sommes-nous', 'AboutUs');

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

Route::view('/services/marketing-d-influence', 'Services', [
    'service' => require __DIR__ . '/../config/services/marketing-influence.php',
]);
