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
                            <li><a href="{{ route('frontend.profile.address') }}">Adrese</a></li>
                            <li>></li>
                            <li>Dodavanje adrese</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumb Section -->

    <!-- My Account - Addresses - Edit -->
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
                                    <li>Došlo je do greške, proverite da li ste uneli sve podatke</li>
                                </ul>
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success d-none">
                                <i class="bi bi-info-circle"></i> {{ session('message') }}
                            </div>
                        @endif

                        <!-- Password Change -->
                        <div class="profile-section-wrapper">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex justify-content-start align-items-center">
                                    <h4 class=" p-0">Dodavanje nove adrese</h4>
                                </div>
                                <div>
                                    <a href="{{ route('frontend.profile.address') }}" class="btn-theme">Povratak</a>
                                </div>
                            </div>

                            <div class="address-wrapper">
                                <form method="POST" action="{{ route('frontend.profile.address.store') }}">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="editAddressFirstName" class="">Ime *</label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                                            class="form-control form-control-sm" id="editAddressFirstName">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressLastName" class="">Prezime *</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                                            class="form-control form-control-sm" id="editAddressLastName">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressPhone" class="">Telefon *</label>
                                        <input type="text" name="phone" value="{{ old('phone') }}"
                                            class="form-control form-control-sm" id="editAddressPhone">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressJmbg" class="">JMBG</label>
                                        <input type="text" name="jmbg" value="{{ old('jmbg') }}"
                                            class="form-control form-control-sm" id="editAddressJmbg">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressAddress" class="">Adresa *</label>
                                        <input type="text" name="address" value="{{ old('address') }}"
                                            class="form-control form-control-sm" id="editAddressAddress">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressCity" class="">Grad *</label>
                                        <input type="text" name="city" value="{{ old('city') }}"
                                            class="form-control form-control-sm" id="editAddressCity">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressZip" class="">Poštanski broj *</label>
                                        <input type="text" name="zip" value="{{ old('zip') }}"
                                            class="form-control form-control-sm" id="editAddressZip">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressCountry" class="">Država</label>
                                        <input type="text" name="country" value="{{ old('country') }}"
                                            class="form-control form-control-sm" id="editAddressCountry">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressNote" class="">Napomena</label>
                                        <textarea name="note" class="form-control form-control-sm" id="editAddressNote" rows="3">{{ old('note') }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="primary" type="checkbox"
                                                id="editAddressPrimaryAddress">
                                            <label class="form-check-label" for="editAddressPrimaryAddress">Postavi za
                                                moju
                                                primarnu adresu</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn-theme-dark">Kreiraj</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #My Account - Addresses - Edit -->
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
