<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public const STATUS_NOUVEAU = 'nouveau';
    public const STATUS_CONFIRME = 'confirme';
    public const STATUS_TERMINE = 'termine';
    public const STATUS_ANNULE = 'annule';

    /**
     * Les attributs assignables en masse.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'meeting_type',
        'service',
        'date',
        'time',
        'notes',
        'status',
        'admin_notes',
    ];

    /**
     * Typage des attributs.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Libellé humain du statut.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_NOUVEAU => 'Nouveau',
            self::STATUS_CONFIRME => 'Confirmé',
            self::STATUS_TERMINE => 'Terminé',
            self::STATUS_ANNULE => 'Annulé',
            default => ucfirst($this->status),
        };
    }

    /**
     * Classes CSS du badge de statut conformes à docs/DESIGN.md.
     */
    public function getStatusBadgeClassesAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_NOUVEAU => 'border-[#D97706]/30 bg-[#D97706]/10 text-[#D97706]',
            self::STATUS_CONFIRME => 'border-[#16A34A]/30 bg-[#16A34A]/10 text-[#16A34A]',
            self::STATUS_TERMINE => 'border-[#E5E7EB] bg-slate-100 text-[#555555]',
            self::STATUS_ANNULE => 'border-[#DC2626]/30 bg-[#DC2626]/10 text-[#DC2626]',
            default => 'border-[#E5E7EB] bg-white text-[#1A1A1A]',
        };
    }

    /**
     * Scope pour filtrer par statut.
     */
    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        if (empty($status) || $status === 'all') {
            return $query;
        }

        return $query->where('status', $status);
    }

    /**
     * Scope pour trier par demandes récentes.
     */
    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }
}
