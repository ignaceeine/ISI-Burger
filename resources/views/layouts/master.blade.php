<!doctype html>
<html lang="fr">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ignace DIATTA">
    <meta name="description" content="ISI-BURGER - Fast Food Restaurant">
    <!--favicon-->
    <link rel="icon" href="{{ URL::asset('img/logo/ISI-burger-sf.png') }}" type="image/png">
    <title>@yield('title') - ISI-BURGER</title>
    @include('layouts.head-css')
    @yield('css')
</head>
<body>
    <!-- Proloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                        <span data-text-preloader="I" class="letters-loading">
                        I
                        </span>
                <span data-text-preloader="S" class="letters-loading">
                        S
                        </span>
                <span data-text-preloader="I" class="letters-loading">
                        I
                        </span>
                <span data-text-preloader="B" class="letters-loading">
                        B
                        </span>
                <span data-text-preloader="U" class="letters-loading">
                        U
                        </span>
                <span data-text-preloader="R" class="letters-loading">
                        R
                        </span>
                <span data-text-preloader="G" class="letters-loading">
                        G
                        </span>
                <span data-text-preloader="E" class="letters-loading">
                        E
                        </span>
                <span data-text-preloader="R" class="letters-loading">
                        R
                        </span>
            </div>
            <p class="text-center">Chargement...</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @yield('scripts')
    @include('layouts.foot-script')
</body>
</html>
