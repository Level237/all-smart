<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage');
});

Route::view('/a-propos-de-nous', 'AboutUs');

Route::view('/services/strategie-et-conseil', 'Services', [
    'service' => require __DIR__ . '/../config/services/strategie-conseil.php',
]);

Route::view('/services/community-management', 'Services', [
    'service' => require __DIR__ . '/../config/services/community-management.php',
]);

Route::view('/services/creation-de-contenus', 'Services', [
    'service' => require __DIR__ . '/../config/services/creation-de-contenus.php',
]);
