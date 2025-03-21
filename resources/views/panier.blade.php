@extends('layouts.master')
@section('title','Panier')
@section('content')
    <!--<< Product Cart Section Start >>-->
    <section class="cart-section section-padding fix">
        <div class="container">
            <div class="main-cart-wrapper">
                @if(session('success'))
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                        <div class="text-white">{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="cart-wrapper">
                            @if(session('panier'))
                            <div class="cart-items-wrapper">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Soustotal</th>
                                        <th>Enlever</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(session('panier') as $p)
                                    <tr class="cart-item" data-product-id="{{ $p['id'] }}">
                                        <td class="cart-item-info">
                                            <img src="{{ asset('storage/'.$p['image']) }}" alt="Image" width="75">
                                        </td>
                                        <td>
                                            {{ $p['prix'] }}
                                        </td>
                                        <td>
                                            <input type="number" class="text-dark" name="quantite" value="{{ $p['quantite'] }}" min="1" max="{{ $p['stock'] }}">
                                        </td>
                                        <td class="subtotal">
                                            {{ $p['prix'] * $p['quantite'] }}
                                        </td>
                                        <td class="cart-item-remove">
                                            <form action="{{ route('panier.remove',$p['id']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fas fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <h3 class="text-center">Votre panier est vide !</h3>
                            @endif
                        </div>
                    </div>
                </div>
                @if(session('panier'))
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-xl-6">
                        <div class="cart-pragh-box">
                            <div class="cart-graph">
                                <h4>Total Panier</h4>
                                <ul>
                                    <li>
                                        <span>Soustotal</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Livraison</span>
                                        <span>2000 CFA</span>
                                    </li>
                                    <li>
                                        <span>Total</span>
                                        <span></span>
                                    </li>
                                </ul>
                                <div class="chck">
                                    <form action="{{ route('panier.checkout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="theme-btn border-radius-none">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.cart-item input[name="quantite"]');

            quantityInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const cartItem = this.closest('.cart-item');
                    const price = parseInt(cartItem.querySelector('td:nth-child(2)').textContent.replace(' CFA', ''));
                    const quantity = parseInt(this.value);

                    const subtotal = price * quantity;
                    cartItem.querySelector('.subtotal').textContent = subtotal + ' CFA';

                    updateCartTotal();

                    fetch('/panier/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id: cartItem.getAttribute('data-product-id'), qte: quantity })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Quantité mise à jour dans la session');
                            }
                        });

                });
            });

            function updateCartTotal() {
                const cartItems = document.querySelectorAll('.cart-item');
                let total = 0;

                cartItems.forEach(item => {
                    const subtotalText = item.querySelector('.subtotal').textContent.replace(' CFA', '');
                    const subtotal = parseInt(subtotalText);
                    total += subtotal;
                });

                const delivery = 2000;
                const grandTotal = total + delivery;

                document.querySelector('.cart-graph ul li:nth-child(1) span:nth-child(2)').textContent = total + ' CFA';
                document.querySelector('.cart-graph ul li:nth-child(3) span:nth-child(2)').textContent = grandTotal + ' CFA';
            }

            updateCartTotal();
        });
    </script>
@endsection
