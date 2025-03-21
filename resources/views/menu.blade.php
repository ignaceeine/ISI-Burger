@extends('layouts.master')
@section('title','Menu')
@section('content')
    <!-- Food Catagory Section Start -->
    <section class="food-category-section fix section-padding section-bg">
        <div class="container">
            <div class="row g-5">
                @if(session('success'))
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                        <div class="text-white">{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-xl-3 col-lg-4 order-2 order-md-1 mt-5">
                    <div class="main-sidebar">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>catégories</h4>
                            </div>
                            <div class="widget-categories">
                                <ul>
                                    <li><a><i class="flaticon-burger"></i>burger</a></li>
                                    <li><a><i class="flaticon-chicken"></i>Fried Chiken</a></li>
                                    <li><a><i class="flaticon-french-fries"></i>French Fries</a></li>
                                    <li><a><i class="flaticon-pizza"></i>Hot Pizzas</a></li>
                                    <li><a><i class="flaticon-sandwich"></i>Sandwich</a></li>
                                    <li><a><i class="flaticon-bread"></i>Bread</a></li>
                                    <li><a><i class="flaticon-rice"></i>fried rice</a></li>
                                    <li><a><i class="flaticon-hotdog"></i>hot dog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-1 order-md-2">
                    <div class="row">
                        @foreach($produits as $p)
                        <div class="col-xl-12 col-lg-12">
                            <div class="shop-list-items">
                                <div class="shop-image">
                                    <img src="{{ asset('storage/'.$p->image) }}" alt="shop-img">
                                </div>
                                <div class="shop-content">
                                    <h3><a href="shop-single.blade.php">{{ $p->nom }}</a></h3>
                                    <p>
                                        {{ $p->description }}
                                    </p>
                                    <h5>{{ $p->prix }} CFA</h5>
                                    <div class="shop-list-btn">
                                        <form action="{{ route('menu.produit') }}" method="post">
                                            @csrf
                                            <input type="number" name="id" value="{{$p->id}}" hidden>
                                            <button class="theme-btn" type="submit">Commander</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="page-nav-wrap mt-5 text-center">
                        <ul>
                            <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-left"></i></a></li>
                            <li><a class="page-numbers" href="#">1</a></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="page-numbers" href="#">4</a></li>
                            <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
