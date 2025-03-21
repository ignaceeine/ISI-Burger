@extends('layouts.masterGest')
@section('title','Produits')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Modification de {{ $produit->nom }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produit.update') }}" method="POST" >
                            @csrf
                            <input type="number" name="id" value="{{ $produit->id }}" hidden>
                            <div class="mb-3">
                                <label class="form-label">Nom du Produit</label>
                                <input type="text" class="form-control" name="nom" value="{{ $produit->nom }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Prix</label>
                                <input type="number" class="form-control" name="prix" value="{{ $produit->prix }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stock" value="{{ $produit->stock }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Seuil</label>
                                <input type="number" class="form-control" name="seuil" value="{{ $produit->seuil }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" name="description" required>{{ $produit->description }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('produit.index') }}" class="btn btn-secondary">Annuler</a>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
