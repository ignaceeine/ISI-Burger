@extends('layouts.masterGest')
@section('title','Accueil')
@section('content')
    <!-- Dashboard Content -->
    <div class="container-fluid py-2">
        <div class="row">
            <!-- Total Menus Card -->
            <div class="col-md-4">
                <a href="" class="text-decoration-none">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Commandes en cours</h6>
                                    <h2 class="card-title mb-0 text-danger">{{ $nbrCmdEncours }}</h2>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-utensils"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Revenu Total Card -->
            <div class="col-md-4">
                <a href="" class="text-decoration-none">
                    <div class="card dashboard-card bg-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-white">Revenu Total</h6>
                                    <h2 class="card-title mb-0 text-white">{{ $totalPaiements }} CFA</h2>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-euro-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Commandes Card -->
            <div class="col-md-4">
                <a href="" class="text-decoration-none">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Total Commandes</h6>
                                    <h2 class="card-title mb-0 text-primary">{{ $nbrCommandes }}</h2>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Clients Card -->
            <div class="col-md-6">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="container">
                                <h6 class="card-subtitle mb-2 text-muted">Revenu par jour</h6>
                                <canvas id="revenusChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produits graphic Card -->
            <div class="col-md-6">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="container">
                                <h6 class="card-subtitle mb-2 text-muted">Commandes par produit</h6>
                                <canvas id="commandesChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenu Aujourd'hui Card -->
            <div class="col-md-6">
                <a href="" class="text-decoration-none">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Revenu Aujourd'hui</h6>
                                    <h2 class="card-title mb-0 text-success">{{ $sommePaiements }} CFA</h2>
                                </div>
                                <div class="icon-container">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endsection
            @section('scripts')
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('revenusChart').getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($labels), // Ex. ["20/03/2025", "21/03/2025", ...]
                            datasets: [{
                                label: 'Revenus',
                                data: @json($data), // Les montants par jour
                                borderColor: 'blue',
                                fill: false
                            }]
                        },
                        options: {
                            // Vos options de personnalisation
                        }
                    });
                </script>
                <script>
                    const ctx1 = document.getElementById('commandesChart').getContext('2d');
                    const chart1 = new Chart(ctx1, {
                        type: 'bar', // Type de graphique : barres
                        data: {
                            labels: @json($plabels), // Les noms des produits
                            datasets: [{
                                label: 'Nombre de Commandes',
                                data: @json($pdata), // Le nombre de commandes par produit
                                backgroundColor: 'rgb(241,96,96)',
                                borderColor: 'rgb(175,145,2)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true // Commencer l'axe Y à zéro
                                }
                            }
                        }
                    });
                </script>
@endsection
