<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         // Nom complet du membre
            $table->string('role')->nullable();             // Rôle / Fonction (ex: "Fondatrice")
            $table->string('label')->nullable();            // Signature Zeyada (ex: "Celle qui paie les salaires")
            $table->string('photo')->nullable();            // Fichier image uploadé
            $table->string('instagram_url')->nullable();    // Lien Instagram
            $table->string('facebook_url')->nullable();     // Lien Facebook
            $table->string('x_url')->nullable();            // Lien X (Twitter)
            $table->string('linkedin_url')->nullable();     // Lien LinkedIn
            $table->unsignedInteger('order')->default(0);   // Ordre d'affichage
            $table->boolean('is_active')->default(true);    // Visibilité en ligne
            $table->timestamps();

            $table->index(['is_active', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
