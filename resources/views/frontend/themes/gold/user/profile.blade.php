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
                            <li><a href="index.php">Početna</a></li>
                            <li>></li>
                            <li>Moj nalog</li>
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

                        <!-- Basic Information -->
                        <div class="profile-section-wrapper">
                            <h4 class="mb-4">Osnovne informacije</h4>
                            <form method="POST" id="profileInfoForm" action="{{ route('frontend.profile.update') }}">
                                @csrf
                                <!-- First and Last name -->
                                <div class="row mb-4">
                                    <label for="firstName" class="col-sm-3 col-form-label form-label">Ime i prezime</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="first_name" id="firstName"
                                                value="{{ $user->first_name }} ">
                                            <input type="text" class="form-control" name="last_name" id="lastName"
                                                value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="email"
                                            aria-label="" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="js-add-field row mb-4">
                                    <label for="phone" class="col-sm-3 col-form-label form-label">Telefon <span
                                            class="form-label-secondary">(opciono)</span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="js-input-mask form-control" name="phone"
                                                id="phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="row mb-4 d-none">
                                    <label class="col-sm-3 col-form-label form-label">Pol <span
                                            class="form-label-secondary">(opciono)</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-md-down-break">
                                            <label class="form-control" for="genderTypeRadio1">
                                                <span class="form-check">
                                                    <input type="radio" class="form-check-input" value="male"
                                                        name="gender" id="genderTypeRadio1"
                                                        {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                    <span class="form-check-label">Male</span>
                                                </span>
                                            </label>
                                            <label class="form-control" for="genderTypeRadio2">
                                                <span class="form-check">
                                                    <input type="radio" class="form-check-input" value="female"
                                                        name="gender" id="genderTypeRadio2"
                                                        {{ $user->gender == 'female' ? 'checked' : '' }}>
                                                    <span class="form-check-label">Female</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Date of Birth -->
                                <div class="row mb-4 d-none">
                                    <label for="dob" class="col-sm-3 col-form-label form-label">Datum rođenja<span
                                            class="form-label-secondary"> (opciono)</span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="date" class="js-input-mask form-control" name="dob"
                                                id="dob" value="{{ $user->dob }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="row mb-4 d-none">
                                    <label for="country" class="col-sm-3 col-form-label form-label">Država
                                        <span class="form-label-secondary"> (opciono)</span></label>

                                    <div class="col-sm-9">
                                        <!-- Select -->
                                        <div class="tom-select-custom mb-3">
                                            <input type="text" class="form-control" value="{{ $user->country }}"
                                                name="country">
                                        </div>
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
