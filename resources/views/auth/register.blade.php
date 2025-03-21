@extends('layouts.master')
@section('title', 'Inscription')
@section('content')
<section class="register-section section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="register-wrapper bg-white p-5 rounded-3 shadow">
                    <div class="section-title text-center mb-4">
                        <h2 class="wow fadeInUp">Créez votre compte</h2>
                        <p class="wow fadeInUp" data-wow-delay=".3s">Rejoignez la communauté ISI Burger et profitez de nos offres exclusives</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="register-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-input-wrap mb-3">
                                    <label for="name">Nom complet</label>
                                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Votre nom complet" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="single-input-wrap mb-3">
                                    <label for="email">Email</label>
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Votre email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="single-input-wrap mb-3">
                                    <label for="telephone">Téléphone</label>
                                    <x-text-input id="telephone" class="form-control" type="tel" name="telephone" :value="old('telephone')" required placeholder="Votre numéro de téléphone" />
                                    <x-input-error :messages="$errors->get('telephone')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="single-input-wrap mb-3">
                                    <label for="adresse">Adresse de livraison</label>
                                    <x-text-input id="adresse" class="form-control" type="text" name="adresse" :value="old('adresse')" required placeholder="Votre adresse complète" />
                                    <x-input-error :messages="$errors->get('adresse')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="single-input-wrap mb-3">
                                    <label for="password">Mot de passe</label>
                                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Votre mot de passe" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="single-input-wrap mb-3">
                                    <label for="password_confirmation">Confirmer le mot de passe</label>
                                    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez votre mot de passe" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="theme-btn w-100">
                                    <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                                        <span class="button-text">Créer mon compte</span>
                                    </span>
                                </button>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <p>Vous avez déjà un compte? <a href="{{ route('login') }}" class="text-primary">Connectez-vous</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="burger-shape">
        <img src="{{ asset('img/shape/burger-shape.png') }}" alt="shape-img">
    </div>
    <div class="tomato-shape">
        <img src="{{ asset('img/shape/tomato-shape.png') }}" alt="shape-img">
    </div>
</section>
@endsection
