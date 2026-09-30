<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioProject extends Model
{
    use HasFactory;

    public const SERVICES = [
        'Stratégie & Conseil',
        'Community Management',
        'Création de Contenus',
        'Personal Branding',
        'Site Internet',
        'Activations & Événementiel',
        'Marketing d\'Influence',
    ];

    protected $fillable = [
        'title',
        'slug',
        'client',
        'service',
        'challenge',
        'description',
        'metrics',
        'deliverables',
        'image',
        'link',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'metrics' => 'array',
    ];

    /**
     * Génère automatiquement un slug unique lors de la création si absent.
     */
    protected static function booted(): void
    {
        static::creating(function (PortfolioProject $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title) . '-' . Str::random(5);
            }
        });
    }

    /**
     * Accesseur pour l'URL de l'image du projet.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/success1.jpg');
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://') || str_starts_with($this->image, 'assets/')) {
            return asset($this->image);
        }

        return Storage::disk('public')->url($this->image);
    }

    /**
     * Scope pour les projets actifs/visibles.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope pour ordonner les projets.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'desc');
    }

    /**
     * Scope pour les projets mis en avant (featured).
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope pour filtrer par service/pôle.
     */
    public function scopeByService(Builder $query, string $service): Builder
    {
        return $query->where('service', $service);
    }
}
