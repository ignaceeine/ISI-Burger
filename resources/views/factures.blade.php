@extends('layouts.masterGest')
@section('title','Factures')
@section('content')
    <!-- Invoices Content -->
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Gestion des Factures</h2>
            <div>
                <button class="btn btn-outline-secondary me-2">
                    <i class="fas fa-filter me-2"></i>Filtrer
                </button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">
                    <i class="fas fa-plus me-2"></i>Nouvelle Facture
                </button>
            </div>
        </div>

        <!-- Invoices Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>N° Facture</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Échéance</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>#FAC001</td>
                            <td>Jean Dupont</td>
                            <td>2024-01-20</td>
                            <td>2024-02-20</td>
                            <td>25.99 €</td>
                            <td><span class="badge bg-success">Payée</span></td>
                            <td>
                                <button class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#viewInvoiceModal">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-primary me-2">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn btn-sm btn-success me-2">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Autres factures... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Invoice Modal -->
    <div class="modal fade" id="createInvoiceModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Créer une Nouvelle Facture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createInvoiceForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Client</label>
                                <select class="form-select">
                                    <option>Sélectionner un client</option>
                                    <option>Jean Dupont</option>
                                    <option>Marie Martin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date d'échéance</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6>Articles</h6>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Prix unitaire</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select">
                                            <option>Sélectionner un produit</option>
                                            <option>Classic Burger</option>
                                            <option>Frites</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" value="1"></td>
                                    <td>8.99 €</td>
                                    <td>8.99 €</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <button type="button" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-plus me-2"></i>Ajouter un article
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total HT</strong></td>
                                    <td>8.99 €</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>TVA (20%)</strong></td>
                                    <td>1.80 €</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total TTC</strong></td>
                                    <td><strong>10.79 €</strong></td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" form="createInvoiceForm" class="btn btn-primary">Créer la Facture</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Invoice Modal -->
    <div class="modal fade" id="viewInvoiceModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Facture #FAC001</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Template de facture -->
                    <div class="invoice-template">
                        <div class="row mb-4">
                            <div class="col-6">
                                <img src="{{ asset('img/logo/ISI-burger-sf.png') }}" alt="ISI Burger Logo" style="width: 150px;">
                                <p class="mt-3">
                                    ISI Burger<br>
                                    123 Rue de la Restauration<br>
                                    75000 Paris<br>
                                    Tél: +33 1 23 45 67 89
                                </p>
                            </div>
                            <div class="col-6 text-end">
                                <h4>FACTURE</h4>
                                <p>
                                    N° Facture: #FAC001<br>
                                    Date: 20/01/2024<br>
                                    Échéance: 20/02/2024
                                </p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <h6>Facturer à:</h6>
                                <p>
                                    Jean Dupont<br>
                                    456 Avenue du Client<br>
                                    75000 Paris<br>
                                    Email: jean.dupont@email.com
                                </p>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Description</th>
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
                                <td colspan="3" class="text-end">Total HT</td>
                                <td>25.96 €</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">TVA (20%)</td>
                                <td>5.19 €</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total TTC</strong></td>
                                <td><strong>31.15 €</strong></td>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="mt-4">
                            <h6>Conditions de paiement</h6>
                            <p>Paiement à 30 jours</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-print me-2"></i>Imprimer
                    </button>
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-download me-2"></i>Télécharger PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
