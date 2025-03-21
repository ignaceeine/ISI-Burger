<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        return view('panier');
    }

    public function show(Request $request)
    {
        $produit = Produit::findOrFail($request->id);
        return view('menu-unique', ['produit' => $produit]);
    }

    public function addToPanier(Request $request)
    {
        $request->validate([
            'quantite' => 'required|integer|min:1',
            'id' => 'required|integer'
        ]);

        $produit = Produit::findOrFail($request->id);
        $panier = session()->get('panier', []);

        if(isset($panier[$produit->id])){
            $panier[$produit->id]['quantite'] += $request->quantite;
        }
        else{
            $panier[$produit->id] = [
                'id' => $produit->id,
                'stock' => $produit->stock,
                'nom' => $produit->nom,
                'prix' => $produit->prix,
                'quantite' => $request->quantite,
                'image' => $produit->image,
            ];
        }

        session()->put('panier', $panier);
        return redirect()->route('menu')->with('success','Produit ajouté au panier !');
    }

    public function updateQuantite(Request $request)
    {
        $id = $request->input('id');
        $quantite = $request->input('qte');

        $cart = session()->get('panier', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantite'] = $quantite;
            session()->put('panier', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('panier', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('panier', $cart);
        }
        return redirect()->back()->with('success', 'Produit retiré du panier !');
    }
}
