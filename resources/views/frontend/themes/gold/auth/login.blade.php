@extends('frontend.themes.gold.layout.layout')
@section('robots', 'noindex,nofollow')
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Prijava korisnika</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>></li>
                            <li>Prijava Korisnika</li>
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
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <h3>Registrovani korisnici</h3>
                    <p>Ako imate nalog, prijavite se sa svojom adresom e-pošte.</p>
                    <div class="account_form">

                        <form id="loginForm" method="POST" action="{{ route('login') }}" class="">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="email">Email <span>*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            </p>
                            <div class="form-group mb-3">
                                <label class="form-label" for="passowrd">Lozinka <span>*</span></label>
                                <input type="password"
                                    class="js-toggle-password form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" required minlength="8">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="login_submit">
                                <a href="#">Zaboravljena lozinka?</a>
                                <button type="submit">Prijavite se</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <h3>Novi korisnik</h3>
                    <p>Kreiranje naloga ima mnoge prednosti: odjavite se brže, zadržite više od jedne adrese, naloge za
                        praćenje i još mnogo toga.</p>
                    <a class="btn-theme" href="{{ route('register') }}">Registruj se</a>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- #Customer Login -->
@endsection

@section('scripts')
    <script>
        function getUrlParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }
        $(document).ready(function() {
            let page = getUrlParam('page')
            let formAction = $('#loginForm').attr('action');
            if (page) {
                $('#loginForm').attr('action', formAction + '?page=' + page)
            }
        })
    </script>
@endsection
