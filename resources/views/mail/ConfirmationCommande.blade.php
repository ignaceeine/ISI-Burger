<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Confirmation de Commande</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .header h1 {
            font-size: 24px;
            color: #343a40;
            margin-top: 10px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h6 {
            font-size: 18px;
            color: #ff8e53;
            margin-bottom: 10px;
        }
        .info-section p {
            margin: 0;
            font-size: 14px;
            color: #495057;
        }
        .table {
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }
        .table th {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .table td {
            border-bottom: 1px solid #dee2e6;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #6c757d;
        }
        .footer a {
            color: #ff8e53;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- En-tête -->
    <div class="header">
        <img src="{{ asset('img/logo/ISI-burger-sf.png') }}" alt="Logo">
        <h1>Confirmation de Commande</h1>
    </div>

    <!-- Informations Client et Livraison -->
    <div class="row info-section">
        <div class="col-md-6">
            <h6><i class="fas fa-user me-2"></i>Informations Client</h6>
            <p>Nom: {{ Auth::user()->name }}<br>
                Téléphone: +221 {{ Auth::user()->telephone }}<br>
        </div>
        <div class="col-md-6">
            <h6><i class="fas fa-map-marker-alt me-2"></i>Informations Livraison</h6>
            <p>Adresse: {{ Auth::user()->adresse }}</p>
        </div>
    </div>

    <!-- Tableau des Articles Commandés -->
    <h6><i class="fas fa-shopping-cart me-2"></i>Articles Commandés</h6>
    <table class="table">
        <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach($produits as $p)
            @php
                $sousTotal = $p['prix'] * $p['quantite'];
                $total += $sousTotal;
            @endphp
            <tr>
                <td>{{ $p['nom'] }}</td>
                <td>{{ $p['quantite'] }}</td>
                <td>{{ $p['prix'] }} CFA</td>
                <td>{{ $sousTotal }} CFA</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" class="text-end"><strong>Livraison</strong></td>
            <td><strong>2000 CFA</strong></td>
        </tr>
        <tr>
            <td colspan="3" class="text-end"><strong>Total</strong></td>
            <td><strong>{{ $total + 2000 }} CFA</strong></td>
        </tr>
        </tfoot>
    </table>

    <!-- Pied de page -->
    <div class="footer">
        <p>Merci pour votre commande !</p>
        <p>Pour toute question, contactez-nous à contact@ISI-Burger.com</p>
    </div>
</div>
</body>
</html>
