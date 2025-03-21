<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Paiement extends Model
{
    protected $fillable = [
        'date',
        'montant',
        'commande_id'
    ];

    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class);
    }

    public function facture(): HasOne
    {
        return $this->hasOne(Facture::class);
    }
}
