@extends('layouts.masterGest')
@section('title','Produits')

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

    <!-- Products Content -->
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Gestion des Produits</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus me-2"></i>Ajouter un Produit
            </button>
        </div>

        <!-- Products Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produits as $p)
                        <tr>
                            <td><img src="{{ asset('storage/'.$p->image) }}" alt="Classic Burger" class="product-img" width="35"></td>
                            <td>{{ $p->nom }}</td>
                            <td>{{ $p->prix }} F</td>
                            <td>{{ $p->stock }}</td>
                            <td>
                                @if($p->estArchive)
                                    <span class="badge bg-warning">Archivé</span>
                                @else
                                    <span class="badge bg-success">Disponible</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('produit.edit',$p->id) }}" class="btn btn-sm btn-primary me-2">
                                    <i class="fa fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('produit.archive',$p->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        <i class="fa fa-box-archive"></i>
                                    </button>
                                </form>
                                <form action="{{ route('produit.destroy',$p->id) }}" method="post"
                                      class="d-inline-block" onsubmit="confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Autres produits... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addProductForm" action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Image du Produit</label>
                            <input type="file" class="form-control" accept="image/*" name="image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nom du Produit</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prix</label>
                            <input type="number" class="form-control" name="prix" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Seuil</label>
                            <input type="number" class="form-control" name="seuil" value="2" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" form="addProductForm" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal (similaire à Add Product Modal) -->
    <div class="modal fade" id="editProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier un Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addProductForm" action="{{ route('produit.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Image du Produit</label>
                            <input type="file" class="form-control" accept="image/*" name="image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nom du Produit</label>
                            <input type="text" class="form-control" name="nom" value="" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prix</label>
                            <input type="number" class="form-control" name="prix" value="" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Seuil</label>
                            <input type="number" class="form-control" name="seuil" value="2" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" form="addProductForm" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function confirmDelete(event) {
            event.preventDefault();

            if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
                event.target.submit();
            }
        }
    </script>
@endsection
