@extends('frontend.themes.gold.layout.layout')

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Moj nalog</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>></li>
                            <li>Sigurnost</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumb Section -->

    <!-- My Account -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        @include('frontend.themes.gold.user.components.menu')
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                <i class="bi bi-info-circle"></i> {{ session('message') }}
                            </div>
                        @endif

                        <!-- Password Change -->
                        <div class="profile-section-wrapper">
                            <h4 class="mb-4">Promena lozinke</h5>
                                <form method="POST" action="{{ route('frontend.profile.security.passwordUpdate') }}">
                                    @csrf
                                    <!-- Current Password -->
                                    <div class="row mb-4">
                                        <label for="currentPassword" class="col-sm-3 col-form-label form-label">Trenutna
                                            lozinka</label>

                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="current_password"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <!-- New Password -->
                                    <div class="row mb-4">
                                        <label for="password" class="col-sm-3 col-form-label form-label">Nova
                                            lozinka</label>

                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="row mb-4">
                                        <label for="passwordConfirmation" class="col-sm-3 col-form-label form-label">Potvrdi
                                            novu lozinku</label>

                                        <div class="col-sm-9">
                                            <div class="mb-3">
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    id="passwordConfirmation">
                                            </div>

                                            <h5>Zahtevi lozinke:</h5>

                                            <p class="card-text small">Budite sigurni da vaša lozinka zadovoljava sledeće
                                                kriterijume:</p>

                                            <ul class="small">
                                                <li>Dužina od minimum 8 karaktera</li>
                                                <li>Da sadrži brojeve, slova i specijalne karaktere</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end gap-3">
                                        <button type="submit" class="btn-theme-dark">Sačuvaj</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #My Account -->
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#profileInfoDataSubmit').on('click', function() {
                $('#profileInfoForm').submit();
            })
        })
    </script>
@endsection
