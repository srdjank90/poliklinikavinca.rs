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
                            <li>Uređivanje adrese</li>
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
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex justify-content-start align-items-center">
                                    <h4 class=" p-0">Uređivanje adrese</h4>
                                </div>
                                <div>
                                    <a href="{{ route('frontend.profile.address') }}" class="btn-theme-rounded">Povratak</a>
                                </div>
                            </div>

                            <div class="address-wrapper">
                                <form method="POST" action="{{ route('frontend.profile.address.update', $address->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-2">
                                        <label for="editAddressFirstName" class="">Ime *</label>
                                        <input type="text" name="first_name" value="{{ $address->first_name }}"
                                            class="form-control form-control-sm" id="editAddressFirstName">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressLastName" class="">Prezime *</label>
                                        <input type="text" name="last_name" value="{{ $address->last_name }}"
                                            class="form-control form-control-sm" id="editAddressLastName">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressPhone" class="">Telefon *</label>
                                        <input type="text" name="phone" value="{{ $address->phone }}"
                                            class="form-control form-control-sm" id="editAddressPhone">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressJmbg" class="">JMBG</label>
                                        <input type="text" name="jmbg" value="{{ $address->jmbg }}"
                                            class="form-control form-control-sm" id="editAddressJmbg">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressAddress" class="">Adresa *</label>
                                        <input type="text" name="address" value="{{ $address->address }}"
                                            class="form-control form-control-sm" id="editAddressAddress">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressCity" class="">Grad *</label>
                                        <input type="text" name="city" value="{{ $address->city }}"
                                            class="form-control form-control-sm" id="editAddressCity">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressZip" class="">Poštanski broj *</label>
                                        <input type="text" name="zip" value="{{ $address->zip }}"
                                            class="form-control form-control-sm" id="editAddressZip">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressCountry" class="">Država</label>
                                        <input type="text" name="country" value="{{ $address->country }}"
                                            class="form-control form-control-sm" id="editAddressCountry">
                                    </div>
                                    <div class="mb-2">
                                        <label for="editAddressNote" class="">Napomena</label>
                                        <textarea name="note" class="form-control form-control-sm" id="editAddressNote" rows="3">{{ $address->note }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="primary"
                                                {{ $address->primary ? 'checked' : '' }} type="checkbox"
                                                id="editAddressPrimaryAddress">
                                            <label class="form-check-label" for="editAddressPrimaryAddress">Postavi za
                                                moju
                                                primarnu adresu</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn-theme-dark">Sačuvaj</button>
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
