<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'seuil',
        'image',
        'estArchive'
    ];

    public function produitsCommandes(): HasMany
    {
        return $this->hasMany(ProduitCommande::class);
    }

    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }
}
