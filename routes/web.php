<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('accueil');
})->name('home');

Route::get('/menu', [MenuController::class,'index'])->name('menu');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/new/gestionnaire', [GestionnaireController::class,'create'])->middleware(['auth', 'verified'])->name('admin.create');
    Route::post('/new/gestionnaire', [GestionnaireController::class,'store'])->middleware(['auth', 'verified'])->name('admin.store');
    Route::delete('/gestionnaire/{id}', [GestionnaireController::class,'destroy'])->middleware(['auth', 'verified'])->name('admin.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/panier', [PanierController::class,'index'])->name('panier');
    Route::post('/panier/update', [PanierController::class,'updateQuantite'])->name('panier.update');
    Route::post('/menu/produit/show',[PanierController::class,'show'])->name('menu.produit');
    Route::post('/menu/produit/add',[PanierController::class,'addToPanier'])->name('panier.add');
    Route::post('panier/checkout',[CommandeController::class,'store'])->name('panier.checkout');
    Route::delete('/panier/{id}', [PanierController::class, 'removeFromCart'])->name('panier.remove');
    Route::get('/commandes', [ClientController::class,'showCommandes'])->name('commandesClient');

    Route::prefix('gestionnaire')->group(function () {
        Route::get('/', [GestionnaireController::class,'index'])->name('gestionnaire.index');
        Route::get('/produit',[ProduitController::class,'index'])->name('produit.index');
        Route::get('/produit/edit/{id}',[ProduitController::class,'edit'])->name('produit.edit');
        Route::post('/produit/update',[ProduitController::class,'update'])->name('produit.update');
        Route::post('/produit/new',[ProduitController::class,'store'])->name('produit.store');
        Route::post('/produit/{id}',[ProduitController::class,'archive'])->name('produit.archive');
        Route::delete('/produit/delete/{id}',[ProduitController::class,'destroy'])->name('produit.destroy');
        Route::get('/commande',[CommandeController::class,'index'])->name('commande.index');
        Route::post('/commande/update',[CommandeController::class,'updateStatut'])->name('commande.update');
        Route::post('/commande/facture/{id}',[CommandeController::class,'validerPaiement'])->name('commande.pay');
        Route::delete('/commande/{id}',[CommandeController::class,'destroy'])->name('commande.destroy');
        Route::get('/facture',[FactureController::class,'index'])->name('facture.index');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
