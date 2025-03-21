<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduitCommande extends Model
{
    protected $fillable = [
        'quantite',
        'commande_id',
        'produit_id'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
