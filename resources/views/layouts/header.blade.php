<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="../index.blade.php">
                            <img src="{{ asset('img/logo/ISI-burger-sf.png') }}" alt="logo-img">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix mb-3"></div>

                <div class="offcanvas__contact">
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">Avenue Cheikh Anta DIOP, Dakar, Sénégal</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:+013-003-003-9993"><span class="mailto:info@enofik.com">info@isiburger.com</span></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:+11002345909">+221 33 822 19 81</a>
                            </div>
                        </li>
                    </ul>
                    <div class="social-icon d-flex align-items-center">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Bloc d'actions : icône panier et bouton profil/connexion -->
                <div class="offcanvas__actions mb-3 mt-3">
                    <!-- Bouton profil ou connexion -->
                    @if(Auth::user())
                        <div class="header-button">
                            <div class="dropdown">
                                <div class="profile d-flex align-items-center cursor-pointer" data-bs-toggle="dropdown">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down ms-2"></i>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mon Profil</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="header-button">
                            <a href="{{ route('login') }}" class="theme-btn bg-red-2">Connexion</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Area Start -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <ul>
                    <li>Livraison ultra rapide et <span>100%</span> sécurisée</li>
                    <li><i class="fas fa-truck"></i>Suivez votre commande</li>
                </ul>
                <div class="top-right">
                    <div class="social-icon d-flex align-items-center">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-sticky" class="header-1">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="logo">
                        <a href="../index.blade.php" class="header-logo">
                            <img src="{{ asset('img/logo/ISI-burger-sf.png') }}" alt="logo-img" width="110" height="110">
                        </a>
                    </div>
                    <div class="header-left">
                        <div class="mean__menu-wrapper d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">Accueil</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('menu') }}">Menu</a>
                                        </li>
                                        <li>
                                            <a href="">A Propos</a>
                                        </li>
                                        <li>
                                            <a href="../contact.blade.php">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- for wp -->
                            </div>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        @if(Auth::user())
                        <div class="menu-cart">
                            <div class="cart-box">
                                <ul>
                                    @if(session('panier'))
                                    @foreach(session('panier') as $p)
                                        <li>
                                            <img src="{{ asset('storage/'.$p['image']) }}" alt="image">
                                            <div class="cart-product">
                                                <span>{{$p['nom']}}</span>
                                                <span>{{$p['quantite']}}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                    <div class="cart-button d-flex justify-content-between mb-4">
                                        <a href="{{ route('panier') }}" class="theme-btn">
                                            Voir le Panier
                                        </a>
                                    </div>
                                @else
                                    <li>Votre panier est vide !</li>
                                @endif
                            </div>
                            <a href="{{ route('panier') }}" class="text-danger">
                                <i class="far fa-shopping-basket"></i>
                            </a>
                        </div>
                            <div class="header-button">
                                <div class="dropdown">
                                    <div class="profile d-flex align-items-center cursor-pointer" data-bs-toggle="dropdown">
                                        <span>{{ Auth::user()->name }}</span>
                                        <i class="fas fa-chevron-down ms-2"></i>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('commandesClient') }}"><i class="fas fa-shopping-cart me-2"></i>Mes Commandes</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="header-button">
                                <a href="{{ route('login') }}" class="theme-btn bg-red-2">connexion</a>
                            </div>
                        @endif
                        <div class="header__hamburger d-xl-block my-auto">
                            <div class="sidebar__toggle">
                                <div class="header-bar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
