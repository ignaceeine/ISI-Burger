@extends('layouts.master')
@section('title', 'Connexion')
@section('content')
<section class="login-section section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="login-wrapper bg-white p-5 rounded-3 shadow">
                    <div class="section-title text-center mb-4">
                        <h2 class="wow fadeInUp">Connexion</h2>
                        <p class="wow fadeInUp" data-wow-delay=".3s">Connectez-vous pour commander vos burgers préférés</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="single-input-wrap mb-3">
                                    <label for="email">Email</label>
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Votre email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="single-input-wrap mb-3">
                                    <label for="password">Mot de passe</label>
                                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Votre mot de passe" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <label class="form-check-label" for="remember_me">
                                            Se souvenir de moi
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-primary">
                                            Mot de passe oublié?
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="theme-btn w-100">
                                    <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                                        <span class="button-text">Se connecter</span>
                                    </span>
                                </button>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <p>Vous n'avez pas de compte? <a href="{{ route('register') }}" class="text-primary">Inscrivez-vous</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="burger-shape-2">
        <img src="{{ asset('img/shape/burger-shape-2.png') }}" alt="shape-img">
    </div>
</section>
@endsection
