@php use App\Enums\StatutCommande; @endphp
@extends('layouts.masterGest')
@section('title','Commandes')

@section('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white">{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Orders Content -->
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Gestion des Commandes</h2>
        </div>

        <!-- Orders Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Paiement</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commandes as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->user->name }}</td>
                                <td>{{ $c->date }}</td>
                                <td>
                                    <select class="form-select form-select-sm status-select" data-id="{{ $c->id }}">
                                        <option value="En attente" class="text-warning" {{ $c->statut == StatutCommande::EnAttente ? 'selected' : '' }}>
                                            En attente
                                        </option>
                                        <option value="En préparation" class="text-warning" {{ $c->statut == StatutCommande::EnPreparation ? 'selected' : '' }}>
                                            En préparation
                                        </option>
                                        <option value="Prête" class="text-primary" {{ $c->statut == StatutCommande::Prete ? 'selected' : '' }}>
                                            Prête
                                        </option>
                                        <option disabled value="Payée" class="text-primary" {{ $c->statut == StatutCommande::Payee ? 'selected' : '' }}>
                                            Payée
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    @if($c->statut == StatutCommande::Payee)
                                        <span class="badge bg-success">Payée</span>
                                    @else
                                        <span class="badge bg-danger">Non payée</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info me-2" data-bs-toggle="modal"
                                            data-bs-target="#orderDetailsModal">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <form action="{{ route('commande.pay',$c->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success me-2">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('commande.destroy',$c->id) }}" method="post"
                                          class="d-inline-block" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Détails de la Commande #CMD001</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Informations Client</h6>
                            <p>Nom: Jean Dupont<br>
                                Téléphone: +33 6 12 34 56 78<br>
                                Email: jean.dupont@email.com</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Informations Livraison</h6>
                            <p>Adresse: 123 Rue de Paris<br>
                                Ville: Paris<br>
                                Code Postal: 75001</p>
                        </div>
                    </div>
                    <h6>Articles Commandés</h6>
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
                        <tr>
                            <td>Classic Burger</td>
                            <td>2</td>
                            <td>8.99 €</td>
                            <td>17.98 €</td>
                        </tr>
                        <tr>
                            <td>Frites</td>
                            <td>2</td>
                            <td>3.99 €</td>
                            <td>7.98 €</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total</strong></td>
                            <td><strong>25.99 €</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <small>À l'instant</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white">
                Mise à jour réussie !
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $('.status-select').on('change', function () {
                let newStatus = $(this).val();
                let commandeId = $(this).data('id');

                $.ajax({
                    url: "{{ route('commande.update') }}",
                    type: "POST",
                    data: {
                        commande_id: commandeId,
                        statut: newStatus
                    },
                    success: function (response) {
                        console.log(response.message);
                        $("#liveToast .toast-body").text(response.message);
                        var toastEl = document.getElementById('liveToast');
                        var toast = new bootstrap.Toast(toastEl);
                        toast.show();
                    },
                    error: function (xhr, status, error) {
                        console.error("Erreur lors de la mise à jour du statut:", error);
                        alert("Une erreur est survenue lors de la mise à jour du statut.");
                    }
                });
            });
        });
    </script>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Empêche la soumission immédiate

            if (confirm("Êtes-vous sûr de vouloir supprimer cette commande ?")) {
                event.target.submit(); // Soumet le formulaire si l'utilisateur confirme
            }
        }
    </script>
@endsection
