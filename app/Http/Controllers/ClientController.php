<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function showCommandes()
    {
        $commandes = Commande::where('user_id', Auth::id())->get();
        return view('commandesClient', ['commandes'=>$commandes]);
    }
}
