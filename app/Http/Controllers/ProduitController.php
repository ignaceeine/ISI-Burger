<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits', compact('produits'));
    }

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('editProduit', compact('produit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required',
            'stock' => 'required|numeric',
            'seuil' => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('produits', 'public');

        Produit::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'description' => $request->description,
            'seuil' => $request->seuil,
            'image' => $imagePath
        ]);

        return redirect()->back()->with('success','Produit ajouté avec succès');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'prix' => 'required|numeric',
            'description' => 'required',
            'stock' => 'required|numeric',
            'seuil' => 'required|numeric'
        ]);

        $produit = Produit::find($request->id);
        $produit->update($data);

        return redirect()->route('produit.index')->with('success','Le produit a été modifié avec succès !');
    }

    public function archive($id)
    {
        $produit = Produit::findOrFail($id);

        if ($produit->estArchive) {
            $produit->estArchive = false;
        }
        else
        {
            $produit->estArchive = true;
        }

        $produit->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produit.index')->with('success', 'Le produit a été supprimé avec succès !');
    }
}
