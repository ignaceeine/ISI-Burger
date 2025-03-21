<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(): View
    {
        $produits = Produit::all()->where('estArchive',  false);
        return view('menu', compact('produits'));
    }
}
