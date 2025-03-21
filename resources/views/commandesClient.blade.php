@php
    use Carbon\Carbon;
    use App\Enums\StatutCommande;
@endphp
@extends('layouts.master')
@section('title','Mes Commandes')
@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Historique des commandes</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commandes as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ Carbon::parse($c->date)->format('d M Y') }}</td>
                        <td>{{ Carbon::parse($c->created_at)->format('H:i:s') }}</td>
                        <td>
                            @if($c->statut == StatutCommande::EnAttente)
                                <i class="fas fa-clock text-warning"></i> En attente
                            @elseif($c->statut == StatutCommande::EnPreparation)
                                <i class="fas fa-clock text-warning"></i> En préparation
                            @elseif($c->statut == StatutCommande::Prete)
                                <i class="fas fa-check-circle text-primary"></i> Prête
                            @else
                                <i class="fas fa-check-circle text-success"></i> Payée
                            @endif
                        </td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Voir les détails</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
