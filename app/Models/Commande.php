<?php

namespace App\Models;

use App\Enums\StatutCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Commande extends Model
{
    protected $casts = [
        'statut' => StatutCommande::class
    ];

    protected $fillable = [
        'id',
        'date',
        'statut',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function produitsCommandes(): HasMany
    {
        return $this->hasMany(ProduitCommande::class);
    }

    public function paiement(): HasOne
    {
        return $this->hasOne(Paiement::class);
    }

    public function facture(): HasOne
    {
        return $this->hasOne(Facture::class);
    }
}
