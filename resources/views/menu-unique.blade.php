@extends('layouts.master')
@section('title','Ajout au panier')
@section('content')
    <!-- Product Details Section Start -->
    <section class="product-details-section section-padding">
        <div class="container">
            <div class="product-details-wrapper">
                @if(session('warning'))
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show">
                        <div class="text-white">{{ session('warning') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product-image-items">
                            <div class="tab-content" id="nav-tab-Content">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="product-image">
                                        <img src="{{ asset('storage/'.$produit->image) }}" alt="img">
                                        <a href="{{ asset('storage/'.$produit->image) }}" class="icon img-popup">
                                            <i class="far fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mt-3 mt-lg-0">
                        <div class="product-details-content">
                            <h3 class="pb-3">{{ $produit->nom }}</h3>
                            <p class="mb-4">
                                {{ $produit->description }}
                            </p>
                            <div class="price-list d-flex align-items-center">
                                <span>{{ $produit->prix }} CFA</span>
                            </div>
                            <div class="cart-wrp">
                                <form action="{{ route('panier.add') }}" method="POST">
                                @csrf
                                <input type="number" name="id" value="{{$produit->id}}" hidden>
                                <div class="cart-quantity">
                                    <h5>QUANTITÉ:</h5>
                                    <input class="text-dark" type="number" name="quantite" max="{{ $produit->stock }}" value="1" required>
                                    <p class="text-warning">STOCK : {{ $produit->stock }}</p>
                                </div>
                                <div class="shop-button d-flex align-items-center">
                                    <button class="theme-btn btn-sm" type="submit">
                                        <i class="flaticon-shopping-cart"></i>Ajouter au panier
                                    </button>
                                </div>
                                </form>
                            </div>
                            <h6 class="shop-text">LIVRAISON A DOMICILE: <span>2000 CFA</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Cta Banner Section Start -->
    <section class="main-cta-banner-2 section-padding bg-cover" style="background-image: url({{ asset('img/banner/main-cta-bg-2.jpg') }});">
        <div class="tomato-shape-left float-bob-y">
            <img src="{{ asset('img/tomato.png') }}" alt="shape-img">
        </div>
        <div class="chili-shape-right float-bob-y">
            <img src="{{ asset('img/chilli.png') }}" alt="shape-img">
        </div>
        <div class="container">
            <div class="main-cta-banner-wrapper-2 d-flex align-items-center justify-content-between">
                <div class="section-title mb-0">
                    <span class="theme-color-3 wow fadeInUp">crispy, every bite taste</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                        30 minutes fast <br>
                        <span class="theme-color-3">delivery</span> challage
                    </h2>
                </div>
                <a href="{{ route('menu') }}" class="theme-btn bg-white wow fadeInUp" data-wow-delay=".5s">
                    <span class="button-content-wrapper d-flex align-items-center">
                    <span class="button-icon"><i class="flaticon-delivery"></i></span>
                    <span class="button-text">order now</span>
                    </span>
                </a>
                <div class="delivery-man">
                    <img src="{{ asset('img/delivery-man-2.png') }}" alt="img">
                </div>
            </div>
        </div>
    </section>
@endsection
