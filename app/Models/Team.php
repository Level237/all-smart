<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'label',
        'photo',
        'instagram_url',
        'facebook_url',
        'x_url',
        'linkedin_url',
        'order',
        'is_active',
    ];

    /**
     * Typage des attributs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Accesseur pour récupérer l'URL publique de la photo du collaborateur.
     */
    public function getPhotoUrlAttribute(): string
    {
        if (empty($this->photo)) {
            return asset('assets/Daniele-Nono.jpg');
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
     * Scope pour filtrer les membres actifs.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope pour ordonner les membres selon la priorité d'affichage.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}
