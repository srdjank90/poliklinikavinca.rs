@extends('frontend.themes.gold.layout.layout')
@section('robots', 'noindex,nofollow')
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Novi korisnički nalog</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>></li>
                            <li>Novi korisnički nalog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumb Section -->

    <!-- Customer Login -->
    <div class="customer_login">
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-4">
                        <h3 class="mt-3">Kreiranje korisnickog naloga</h3>
                        <p>Kreiranjem korisničkog naloga dobijate rayne benefite.</p>
                        <p>Možete čuvati proizvode u listi želja, pregledati prethodne porudžbine i slično.</p>
                    </div>
                    <div class="col-12 col-lg-4 col-md-4">
                        <!-- First Name -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="firstName">Ime</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" id="firstName" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="lastName">Prezime</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" id="lastName" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-4">
                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="password">Lozinka</label>
                            <input type="password"
                                class="js-toggle-password form-control @error('password') is-invalid @enderror"
                                name="password" id="password" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Password Confirm -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="passwordConfirm">Potvrdi lozinku</label>
                            <input type="password" class="form-control" name="password_confirmation" id="passwordConfirm"
                                required>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn-theme">Registrujte se</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- #Customer Login -->
@endsection
