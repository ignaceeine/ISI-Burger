<?php

namespace App\Http\Controllers;

use App\Enums\StatutCommande;
use App\Mail\ConfirmationCommandeMail;
use App\Mail\FactureCommandeMail;
use App\Mail\NotificationCommandeMail;
use App\Models\Commande;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Produit;
use App\Models\ProduitCommande;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('user')->get();
        return view('commandes', compact('commandes'));
    }

    public function store()
    {
        $cart = session()->get('panier', []);

        $commande = new Commande();
        $commande->date = date("Y-m-d H:i:s");
        $commande->statut = StatutCommande::EnAttente;
        $commande->user_id = Auth::user()->id;
        $commande->save();

        foreach ($cart as $c) {
            $produit = Produit::findOrFail($c['id']);
            $produit->stock -= $c['quantite'];
            $produit->save();

            $produitCommande = new ProduitCommande();
            $produitCommande->quantite = $c['quantite'];
            $produitCommande->produit_id = $c['id'];
            $produitCommande->commande_id = $commande->id;
            $produitCommande->save();
        }

        Mail::to(Auth::user()->email)->send(new ConfirmationCommandeMail($cart));
        //Mail::to('seck10@gmail.com')->send(new NotificationCommandeMail());
        session()->forget('panier');

        return redirect()->back()->with('success','Votre commande a été bien prise en charge ! Vous recevrez un email de confirmation sous peu.');
    }

    public function updateStatut(Request $request)
    {
        $request->validate([
            'commande_id' => 'required|integer',
            'statut' => 'required|string'
        ]);

        $commande = Commande::find($request->commande_id);
        if (!$commande) {
            return response()->json(['message' => 'Commande introuvable.'], 404);
        }

        $commande->statut = $request->statut;
        $facturePath = null;

        if ($commande->statut == StatutCommande::Prete) {
            $facturePath = $this->createFacture($commande->id);
            try {
                Mail::to($commande->user->email)->send(new FactureCommandeMail($facturePath));
                $commande->save();
                return response()->json([
                    'message' => 'La facture a bien été envoyée au client.'
                ]);
            }catch (\Exception $exception){
                Log::error($exception->getMessage());
            }
        }
        $commande->save();

        return response()->json([
            'message' => 'Statut mis à jour avec succès.'
        ]);
    }

    public function validerPaiement($id)
    {
        $commande = Commande::with('produitsCommandes')->findOrFail($id);
        $montantTotal = $commande->produitsCommandes->sum(function ($produitCommande) {
            return $produitCommande->quantite * ($produitCommande->produit->prix ?? 0);
        });

        $paiement = new Paiement();
        $paiement->date = date("Y-m-d H:i:s");
        $paiement->montant  = $montantTotal+2000;
        $paiement->commande_id = $commande->id;
        $paiement->save();

        $commande->statut = StatutCommande::Payee;
        $commande->save();

        return redirect()->route('commande.index')->with('success','Paiement enregistré avec succès.');
    }

    private function createFacture($id)
    {
        $commande = Commande::with('produitsCommandes.produit')->findOrFail($id);

        Facture::create([
            'commande_id' => $commande->id,
            'numero_facture' => 'FAC'.date('YmdHis'),
            'date' => date('Y-m-d'),
        ]);

        $pdf = Pdf::loadView('mail.FactureCommande', compact('commande'));

        $fileName = 'facture_' . $commande->id . '.pdf';
        $filePath = storage_path('app/public/factures/' . $fileName);

        $pdf->save($filePath);

        return $filePath;
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commande.index')->with('success','Commande annulée avec succès !');
    }
}
