<!doctype html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ URL::asset('img/logo/ISI-burger-sf.png') }}" type="image/png">
    <title>@yield('title') | ISI Burger</title>

    @yield('css')

    <!--plugins-->
    <link href="{{ URL::asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/simplebar/css/simplebar.css') }}">
    <!--bootstrap css-->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ URL::asset('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('sass/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('sass/responsive.css') }}" rel="stylesheet">

</head>

<body>

@include('layouts.topbar')
@include('layouts.sidebar')

<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">

        @yield('content')

    </div>
</main>
<!--end main wrapper-->

<!--start overlay-->
<div class="overlay btn-toggle"></div>
<!--end overlay-->

<!--start footer-->
<footer class="page-footer" style="height: 60px">
    <p class="mb-0">Copyright © {{ date('Y') }} ISI Burger - Tous droits résérvés.</p>
</footer>

@include('layouts.vendor-scripts')

@yield('scripts')

</body>

</html>
