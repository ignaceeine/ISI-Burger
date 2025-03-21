@extends('layouts.master')
@section('title','Accueil')
@section('content')
    <!-- Hero Section Start -->
    <section class="hero-section">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-2 bg-cover" style="background-image: url({{ asset('img/hero/hero-bg-2.jpg') }});">
                        <div class="left-shape" data-animation="fadeInUp" data-delay="2.2s">
                            <img src="{{ asset('img/hero/left-shape.png') }}" alt="shape-img">
                        </div>
                        <div class="chili-shape" data-animation="fadeInUp" data-delay="2.4s">
                            <img src="{{ asset('img/hero/leaves-chilli.png') }}" alt="shape-img">
                        </div>
                        <div class="vagetable-shape" data-animation="fadeInUp" data-delay="2.8s">
                            <img src="{{ asset('img/hero/onion-tomato.png') }}" alt="shape-img">
                        </div>
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="hero-content">
                                        <p data-animation="fadeInUp" data-delay="1.3s">ISI Burger</p>
                                        <h1  data-animation="fadeInUp" data-delay="1.5s">
                                            Le plaisir
                                            instantané !
                                        </h1>
                                        <div class="hero-button">
                                            <a href="{{ route('menu') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.9s">
                                                <span class="button-content-wrapper d-flex align-items-center">
                                                <span class="button-icon"><i class="flaticon-delivery"></i></span>
                                                <span class="button-text">commander vite</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                                    <div class="burger-image" data-animation="fadeInUp" data-delay="1.4s">
                                        <img src="{{ asset('img/hero/burger.png') }}" alt="chiken-img">
                                        <div class="burger-text" data-animation="fadeInUp" data-delay="1.6s">
                                            <img src="{{ asset('img/hero/burger-text.png') }}" alt="shape-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-2 bg-cover" style="background-image: url({{ asset('img/hero/hero-bg-2.jpg') }});">
                        <div class="left-shape" data-animation="fadeInUp" data-delay="2.2s">
                            <img src="{{ asset('img/hero/left-shape.png') }}" alt="shape-img">
                        </div>
                        <div class="chili-shape" data-animation="fadeInUp" data-delay="2.4s">
                            <img src="{{ asset('img/hero/leaves-chilli.png') }}" alt="shape-img">
                        </div>
                        <div class="vagetable-shape" data-animation="fadeInUp" data-delay="2.8s">
                            <img src="{{ asset('img/hero/onion-tomato.png') }}" alt="shape-img">
                        </div>
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="hero-content">
                                        <p data-animation="fadeInUp" data-delay="1.3s">ISI Burger</p>
                                        <h1  data-animation="fadeInUp" data-delay="1.5s">
                                            Le rendez-vous
                                            des gourmands
                                        </h1>
                                        <div class="hero-button">
                                            <a href="{{ route('menu') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.9s">
                                                <span class="button-content-wrapper d-flex align-items-center">
                                                <span class="button-icon"><i class="flaticon-delivery"></i></span>
                                                <span class="button-text">commander vite</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                                    <div class="burger-image" data-animation="fadeInUp" data-delay="1.4s">
                                        <img src="{{ asset('img/hero/burger.png') }}" alt="chiken-img">
                                        <div class="burger-text" data-animation="fadeInUp" data-delay="1.6s">
                                            <img src="{{ asset('img/hero/burger-text.png') }}" alt="shape-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-2 bg-cover" style="background-image: url({{ asset('img/hero/hero-bg-2.jpg') }});">
                        <div class="left-shape" data-animation="fadeInUp" data-delay="2.2s">
                            <img src="{{ asset('img/hero/left-shape.png') }}" alt="shape-img">
                        </div>
                        <div class="chili-shape" data-animation="fadeInUp" data-delay="2.4s">
                            <img src="{{ asset('img/hero/leaves-chilli.png') }}" alt="shape-img">
                        </div>
                        <div class="vagetable-shape" data-animation="fadeInUp" data-delay="2.8s">
                            <img src="{{ asset('img/hero/onion-tomato.png') }}" alt="shape-img">
                        </div>
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="hero-content">
                                        <p data-animation="fadeInUp" data-delay="1.3s">ISI Burger</p>
                                        <h1  data-animation="fadeInUp" data-delay="1.5s">
                                            Nos priorités
                                            Qualité & Fraicheur
                                        </h1>
                                        <div class="hero-button">
                                            <a href="{{ route('menu') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.9s">
                                                <span class="button-content-wrapper d-flex align-items-center">
                                                <span class="button-icon"><i class="flaticon-delivery"></i></span>
                                                <span class="button-text">commander vite</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                                    <div class="burger-image" data-animation="fadeInUp" data-delay="1.4s">
                                        <img src="{{ asset('img/hero/burger.png') }}" alt="chiken-img">
                                        <div class="burger-text" data-animation="fadeInUp" data-delay="1.6s">
                                            <img src="{{ asset('img/hero/burger-text.png') }}" alt="shape-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-2 bg-cover" style="background-image: url({{ asset('img/hero/hero-bg-2.jpg') }});">
                        <div class="left-shape" data-animation="fadeInUp" data-delay="2.2s">
                            <img src="{{ asset('img/hero/left-shape.png') }}" alt="shape-img">
                        </div>
                        <div class="chili-shape" data-animation="fadeInUp" data-delay="2.4s">
                            <img src="{{ asset('img/hero/leaves-chilli.png') }}" alt="shape-img">
                        </div>
                        <div class="vagetable-shape" data-animation="fadeInUp" data-delay="2.8s">
                            <img src="{{ asset('img/hero/onion-tomato.png') }}" alt="shape-img">
                        </div>
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="hero-content">
                                        <p data-animation="fadeInUp" data-delay="1.3s">ISI Burger</p>
                                        <h1  data-animation="fadeInUp" data-delay="1.5s">
                                            Le Burger
                                            point final.
                                        </h1>
                                        <div data-animation="fadeInUp" data-delay="1.7s" class="price-text">
                                            <h3>limited offer  /</h3>
                                            <h2>$5</h2>
                                        </div>
                                        <div class="hero-button">
                                            <a href="{{ route('menu') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.9s">
                                                <span class="button-content-wrapper d-flex align-items-center">
                                                <span class="button-icon"><i class="flaticon-delivery"></i></span>
                                                <span class="button-text">commander vite</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                                    <div class="burger-image" data-animation="fadeInUp" data-delay="1.4s">
                                        <img src="{{ asset('img/hero/burger.png') }}" alt="chiken-img">
                                        <div class="burger-text" data-animation="fadeInUp" data-delay="1.6s">
                                            <img src="{{ asset('img/hero/burger-text.png') }}" alt="shape-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-dot text-center pt-5">
            <div class="dot"></div>
        </div>
    </section>

    <!-- Food Category Section Start -->
    <section class="food-category-section fix section-padding section-bg">
        <div class="tomato-shape">
            <img src="{{ asset('img/shape/tomato-shape.png') }}" alt="shape-img">
        </div>
        <div class="burger-shape-2">
            <img src="{{ asset('img/shape/burger-shape-2.png') }}" alt="shape-img">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-9">
                    <div class="section-title">
                        <span class="wow fadeInUp">Le burger, point final.</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">Produits Populaires</h2>
                    </div>
                </div>
                <div class="col-md-5 ps-0 col-3 text-end wow fadeInUp" data-wow-delay=".5s">
                    <div class="array-button">
                        <button class="array-prev"><i class="far fa-long-arrow-left"></i></button>
                        <button class="array-next"><i class="far fa-long-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="swiper food-catagory-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="catagory-product-card bg-cover" style="background-image: url({{ asset('img/shape/catagory-card-shape.jpg') }});">
                            <div class="catagory-product-image text-center">
                                <a href="{{ route('menu') }}">
                                    <img src="{{ asset('storage/produits/77FT3nccHfnvupDeA1nRC7f1tQhXTP0GlxjkqMQg.png') }}" alt="product-img" width="250">
                                    <div class="decor-leaf">
                                        <img src="{{ asset('img/shape/decor-leaf.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="decor-leaf-2">
                                        <img src="{{ asset('img/shape/decor-leaf-2.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="burger-shape">
                                        <img src="{{ asset('img/shape/burger-shape.png') }}" alt="shape-img">
                                    </div>
                                </a>
                            </div>
                            <div class="catagory-product-content text-center">
                                <div class="catagory-product-icon">
                                    <img src="{{ asset('img/shape/food-shape.svg') }}" alt="shape-text">
                                </div>
                                <h3>
                                    <a href="">
                                        Poulet pané
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="catagory-product-card bg-cover" style="background-image: url({{ asset('img/shape/catagory-card-shape.jpg') }});">
                            <div class="catagory-product-image text-center">
                                <a href="{{ route('menu') }}">
                                    <img src="{{ asset('storage/produits/IhJyjwsHVtNxAfG94LbNuGNMAKfFyjJDSzdWEQMP.png') }}" alt="product-img" width="250">
                                    <div class="decor-leaf">
                                        <img src="{{ asset('img/shape/decor-leaf.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="decor-leaf-2">
                                        <img src="{{ asset('img/shape/decor-leaf-2.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="burger-shape">
                                        <img src="{{ asset('img/shape/burger-shape.png') }}" alt="shape-img">
                                    </div>
                                </a>
                            </div>
                            <div class="catagory-product-content text-center">
                                <div class="catagory-product-icon">
                                    <img src="{{ asset('img/shape/food-shape.svg') }}" alt="shape-text">
                                </div>
                                <h3>
                                    <a href="">
                                        Tacos Fiesta
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="catagory-product-card bg-cover" style="background-image: url({{ asset('img/shape/catagory-card-shape.jpg') }});">
                            <div class="catagory-product-image text-center">
                                <a href="{{ route('menu') }}">
                                    <img src="{{ asset('storage/produits/b7r2GO892cEB032t9uTbdMDBCL5pabSbraFgsAwO.png') }}" alt="product-img" width="250">
                                    <div class="decor-leaf">
                                        <img src="{{ asset('img/shape/decor-leaf.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="decor-leaf-2">
                                        <img src="{{ asset('img/shape/decor-leaf-2.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="burger-shape">
                                        <img src="{{ asset('img/shape/burger-shape.png') }}" alt="shape-img">
                                    </div>
                                </a>
                            </div>
                            <div class="catagory-product-content text-center">
                                <div class="catagory-product-icon">
                                    <img src="{{ asset('img/shape/food-shape.svg') }}" alt="shape-text">
                                </div>
                                <h3>
                                    <a href="">
                                        Biryani au poulet
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="catagory-product-card bg-cover" style="background-image: url({{ asset('img/shape/catagory-card-shape.jpg') }});">
                            <div class="catagory-product-image text-center">
                                <a href="{{ route('menu') }}">
                                    <img src="{{ asset('storage/produits/pwYuQ75UitqYoel2Tj4ms4YRR7PtdzUlfpav8oeg.png') }}" alt="product-img" width="250">
                                    <div class="decor-leaf">
                                        <img src="{{ asset('img/shape/decor-leaf.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="decor-leaf-2">
                                        <img src="{{ asset('img/shape/decor-leaf-2.svg') }}" alt="shape-img">
                                    </div>
                                    <div class="burger-shape">
                                        <img src="{{ asset('img/shape/burger-shape.png') }}" alt="shape-img">
                                    </div>
                                </a>
                            </div>
                            <div class="catagory-product-content text-center">
                                <div class="catagory-product-icon">
                                    <img src="{{ asset('img/shape/food-shape.svg') }}" alt="shape-text">
                                </div>
                                <h3>
                                    <a href="">
                                        Coca Cola
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Food Banner Section Start -->
    <section class="food-banner-section section-padding fix">
        <div class="burger-shape-2">
            <img src="{{ asset('img/shape/burger-shape-2.png') }}" alt="shape-img">
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-offer-items bg-cover style-3" style="background-image: url({{ asset('img/banner/offer-bg-2.png') }});">
                        <div class="offer-content">
                            <h5>crispy, every bite taste</h5>
                            <h3>
                                Delicious & <br>
                                hot pizza
                            </h3>
                            <a href="shop-single.blade.php" class="link-btn">
                                order now <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="offer-image-2">
                            <img src="{{ asset('img/offer/50percent-off-2.png') }}" alt="offer-img">
                        </div>
                        <div class="small-pizza">
                            <img src="{{ asset('img/food/small-pizza.png') }}" alt="pizza-img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-offer-items bg-cover style-3" style="background-image: url({{ asset('img/banner/french-fry-bg.png') }});">
                        <div class="french-content">
                            <h4>
                                <span>Todays</span>Delicious
                            </h4>
                            <h3>french fry</h3>
                            <h5>This Weekend only</h5>
                            <a href="{{ route('menu') }}" class="theme-btn bg-yellow">
                                <span class="button-content-wrapper d-flex align-items-center">
                                <span class="button-icon"><i class="flaticon-delivery"></i></span>
                                <span class="button-text">Commander vite</span>
                                </span>
                            </a>
                        </div>
                        <div class="french-image">
                            <img src="{{ asset('img/food/french-fry.png') }}" alt="food-img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="single-offer-items bg-cover style-3" style="background-image: url({{ asset('img/banner/chiken-bg.png') }});">
                        <div class="offer-content">
                            <h5>crispy, every bite taste</h5>
                            <h3>
                                chiken & <br>
                                french fry
                            </h3>
                            <a href="shop-single.blade.php" class="link-btn">
                                order now <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="offer-shape-3">
                            <img src="{{ asset('img/offer/50percent-off-4.png') }}" alt="shape-img">
                        </div>
                        <div class="main-food-3">
                            <img src="{{ asset('img/food/main-food-3.png') }}" alt="pizza-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Choose Us Section Start -->
    <section class="choose-us fix section-padding pt-0 section-bg">
        <div class="container">
            <div class="food-icon-wrapper bg-cover" style="background-image: url({{ asset('img/shape/food-shape-2.png') }});">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="single-food-icon">
                            <div class="icon">
                                <i class="flaticon-quality"></i>
                            </div>
                            <div class="content">
                                <h4>Produits de qualité</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-food-icon">
                            <div class="icon">
                                <i class="flaticon-cooking"></i>
                            </div>
                            <div class="content">
                                <h4>Recettes originaux</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="single-food-icon">
                            <div class="icon">
                                <i class="flaticon-fast-delivery"></i>
                            </div>
                            <div class="content">
                                <h4>Livraison rapide</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                        <div class="single-food-icon">
                            <div class="icon">
                                <i class="flaticon-quality"></i>
                            </div>
                            <div class="content">
                                <h4>100% produits frais</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Banner Section Start -->
    <div class="instagram-banner fix">
        <div class="swiper instagram-banner-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="instagram-banner-items">
                        <div class="banner-image">
                            <img src="{{ asset('img/instagram-banner/insta-1.jpg') }}" alt="food-img">
                            <a href="{{ asset('img/instagram-banner/01.jpg') }}" class="icon img-popup">
                                <i class="far fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items">
                        <div class="banner-image">
                            <img src="{{ asset('img/instagram-banner/insta-2.jpg') }}" alt="food-img">
                            <a href="{{ asset('img/instagram-banner/02.jpg') }}" class="icon img-popup">
                                <i class="far fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items">
                        <div class="banner-image">
                            <img src="{{ asset('img/instagram-banner/03.jpg') }}" alt="food-img">
                            <a href="{{ asset('img/instagram-banner/03.jpg') }}" class="icon img-popup">
                                <i class="far fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items">
                        <div class="banner-image">
                            <img src="{{ asset('img/instagram-banner/04.jpg') }}" alt="food-img">
                            <a href="{{ asset('img/instagram-banner/04.jpg') }}" class="icon img-popup">
                                <i class="far fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items">
                        <div class="banner-image">
                            <img src="{{ asset('img/instagram-banner/05.jpg') }}" alt="food-img">
                            <a href="{{ asset('img/instagram-banner/05.jpg') }}" class="icon img-popup">
                                <i class="far fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
