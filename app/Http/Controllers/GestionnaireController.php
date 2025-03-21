<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Paiement;
use App\Models\Produit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GestionnaireController extends Controller
{
    public function index() : View
    {
        $nbrCommandes = Commande::all()->count();
        $nbrCmdEncours = Commande::where('statut', '!=', 'Payée')->count();
        $totalPaiements = Paiement::all()->sum('montant');
        $sommePaiements = Paiement::whereDate('created_at', Carbon::today())->sum('montant');

        $paiements = Paiement::selectRaw('EXTRACT(YEAR FROM created_at) as annee, EXTRACT(MONTH FROM created_at) as mois, EXTRACT(DAY FROM created_at) as jour, SUM(montant) as total')
            ->groupBy('annee', 'mois', 'jour')
            ->orderBy('annee')
            ->orderBy('mois')
            ->orderBy('jour')
            ->get();

        $labels = $paiements->map(function ($paiement) {
            return Carbon::create($paiement->annee, $paiement->mois, $paiement->jour)->format('d/m/Y');
        })->all();

        $data = $paiements->pluck('total')->all();

        $produits = Produit::withCount([
            'produitsCommandes as commandes_count' => function ($query) {
                $query->select(\DB::raw('count(distinct commande_id)'));
            }
        ])->get();
        $plabels = $produits->pluck('nom')->all();
        $pdata = $produits->pluck('commandes_count')->all();

        return view('gestionnaire.index', compact('nbrCommandes', 'sommePaiements', 'labels', 'data', 'totalPaiements', 'pdata', 'plabels','nbrCmdEncours'));
    }

    public function create() : View
    {
        return view('gestionnaire.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'adresse' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('gestionnaire');

        event(new Registered($user));

        return redirect(route('dashboard', absolute: false))->with('success','Utilisateur créé avec succès');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('dashboard'))->with('success','Utilisateur supprimé avec succès');
    }

}
