<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('creators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('handle');
            $table->text('bio')->nullable();
            $table->string('location');
            $table->string('photo')->nullable();
            $table->json('languages')->nullable();
            $table->json('niches')->nullable();
            $table->string('platform')->default('instagram');
            $table->string('platform_url')->nullable();
            $table->string('status')->default('Disponible');
            $table->boolean('is_active')->default(false)->index();
            $table->integer('order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('creators');
    }
};
