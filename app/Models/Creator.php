<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'handle',
        'bio',
        'location',
        'photo',
        'languages',
        'niches',
        'platform',
        'platform_url',
        'status',
        'is_active',
        'order',
    ];

    /**
     * Typage des attributs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'languages' => 'array',
        'niches' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope pour filtrer les créateurs en ligne (publiés).
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope pour trier par ordre défini puis par date d'inscription.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'desc');
    }

    /**
     * Accesseur pour récupérer l'URL publique de la photo du créateur.
     */
    public function getPhotoUrlAttribute(): string
    {
        if (empty($this->photo)) {
            return asset('assets/services/marketing-influence/profil.jpg');
        }

        if (str_starts_with($this->photo, 'http://') || str_starts_with($this->photo, 'https://')) {
            return $this->photo;
        }

        if (str_starts_with($this->photo, 'assets/')) {
            return asset($this->photo);
        }

        return asset('storage/' . $this->photo);
    }

    /**
     * Mutateur pour normaliser le handle avec un arobase.
     */
    public function setHandleAttribute($value): void
    {
        $this->attributes['handle'] = '@' . ltrim(trim($value ?? ''), '@');
    }

    /**
     * Accesseur pour afficher le handle avec un arobase propre.
     */
    public function getFormattedHandleAttribute(): string
    {
        return '@' . ltrim($this->handle ?? '', '@');
    }
}
