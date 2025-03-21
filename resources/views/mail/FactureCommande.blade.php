<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #333;
            background: linear-gradient(135deg, #f7f7f7 0%, #e8f1ff 100%);
            margin: 0;
            padding: 0;
        }
        .invoice-wrapper {
            max-width: 850px;
            margin: 50px auto;
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }
        .invoice-header {
            background: linear-gradient(90deg, #ff6b6b, #ff8e53);
            padding: 20px 40px;
            color: #fff;
            position: relative;
        }
        .invoice-header .logo {
            position: absolute;
            top: 20px;
            left: 40px;
        }
        .invoice-header .logo img {
            max-width: 150px;
            filter: brightness(0) invert(1);
        }
        .invoice-header .invoice-title {
            text-align: right;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 36px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .invoice-header p {
            margin: 5px 0;
            font-size: 12px;
            opacity: 0.9;
        }
        .invoice-content {
            padding: 40px;
        }
        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }
        .invoice-info h3 {
            margin: 0 0 10px 0;
            font-size: 16px;
            color: #ff6b6b;
            font-weight: 600;
        }
        .invoice-info p {
            margin: 5px 0;
            font-size: 13px;
            color: #555;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .invoice-table th, .invoice-table td {
            padding: 15px;
            text-align: left;
        }
        .invoice-table th {
            background: #ff8e53;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
        }
        .invoice-table td {
            border-bottom: 1px dashed #ddd;
        }
        .invoice-table .total-row td {
            font-weight: 600;
            font-size: 16px;
            background: #fff0e6;
            color: #333;
        }
        .invoice-footer {
            background: #333;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
            font-size: 12px;
            border-top: 4px solid #ff6b6b;
        }
        .invoice-footer p {
            margin: 5px 0;
        }
        .highlight-circle {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
        }
    </style>
</head>
<body>
<div class="invoice-wrapper">
    <!-- En-tête de la facture -->
    <div class="invoice-header">
        <div class="logo">
            <img src="{{ base_path('public/img/logo/ISI-burger-sf.png') }}" alt="Logo">
        </div>
        <div class="highlight-circle"></div>
        <div class="invoice-title">
            <h1>Facture</h1>
            <p>N° #FAC{{ date('Y-m-d-H-i-s') }}</p>
            <p>Date: {{ date('d-m-Y') }}</p>
        </div>
    </div>

    <!-- Contenu de la facture -->
    <div class="invoice-content">
        <!-- Informations de facturation et de commande -->
        <div class="invoice-info">
            <div class="billing-info">
                <h3><i class="fas fa-user-circle"></i> Facturé à :</h3>
                <p>{{ $commande->user->name }}</p>
                <p>Adresse : {{ $commande->user->adresse }}</p>
                <p>Tél : {{ $commande->user->telephone }}</p>
                <p>Email : {{ $commande->user->email }}</p>
            </div>
            <div class="order-info">
                <h3><i class="fas fa-shopping-cart"></i> Détails commande</h3>
                <p>N° commande : {{ $commande->id }}</p>
                <p>Date : {{ $commande->created_at->format('d-m-Y') }}</p>
                <p>Paiement : Espèces</p>
            </div>
        </div>

        <!-- Tableau des produits -->
        <table class="invoice-table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Qté</th>
                <th>Prix</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($commande->produitsCommandes as $p)
                @php
                    $lineTotal = $p->produit->prix * $p->quantite;
                    $grandTotal += $lineTotal;
                @endphp
                <tr>
                    <td>{{ $p->produit->nom }}</td>
                    <td>{{ $p->quantite }}</td>
                    <td>{{ number_format($p->produit->prix, 0, ',', ' ') }} CFA</td>
                    <td>{{ number_format($lineTotal, 0, ',', ' ') }} CFA</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="total-row">
                <td colspan="3">Sous-total</td>
                <td>{{ number_format($grandTotal, 0, ',', ' ') }} CFA</td>
            </tr>
            <tr class="total-row">
                <td colspan="3">Frais de livraison</td>
                <td>2 000 CFA</td>
            </tr>
            <tr class="total-row">
                <td colspan="3">Total</td>
                <td>{{ number_format($grandTotal + 2000, 0, ',', ' ') }} CFA</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <!-- Pied de page -->
    <div class="invoice-footer">
        <p><strong>Merci pour votre achat !</strong></p>
        <p>Conditions : Paiement sous 48h | Contact : contact@isiburger.com | Tél : +221 33 822 19 81</p>
    </div>
</div>
</body>
</html>
