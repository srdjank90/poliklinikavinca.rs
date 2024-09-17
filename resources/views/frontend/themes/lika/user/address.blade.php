@extends('frontend.themes.lika.layout.layout')

@section('content')
    <!-- Breadcrumb -->
    <div class="navbar-dark bg-dark"
        style="background-image: url(/themes/lika/assets/svg/components/wave-pattern-light.svg);">
        <div class="container content-space-1 content-space-b-lg-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-none d-lg-block">
                        <h1 class="h2 text-white">{{ __('Account') }}</h1>
                    </div>

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light mb-0">
                            <li class="breadcrumb-item">{{ __('Account') }}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Address') }}</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <div class="d-none d-lg-block">
                        @if (Auth::user()->id < 3)
                            <a class="btn btn-soft-light btn-sm" href="{{ route('backend') }}">{{ __('Admin Panel') }}</a>
                        @endif
                        <a class="btn btn-soft-light btn-sm" href="#"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                    <!-- Responsive Toggle Button -->
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-default">
                            <i class="bi-list"></i>
                        </span>
                        <span class="navbar-toggler-toggled">
                            <i class="bi-x"></i>
                        </span>
                    </button>
                    <!-- End Responsive Toggle Button -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Content Section -->
    <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.themes.lika.user.components.menu')
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">My address</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($addresses as $key => $address)
                                <div class="col-sm-6 mb-5 mb-sm-7">
                                    <div class="form-check form-check-inline w-100 h-100">
                                        <input type="radio" id="billingRadio1" name="billingRadio"
                                            class="form-check-input" checked>
                                        <label class="form-check-label" for="billingRadio1">
                                            <span class="h5 d-block">{{ __('Address') }} #{{ $key + 1 }}</span>
                                            <span class="d-block mb-2">
                                                {{ $address->name }}<br>
                                                {{ $address->address }}<br>
                                                {{ $address->zip }}, {{ $address->city }}<br>
                                                {{ $address->country }}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary btn-sm"> <i class="bi bi-plus-circle"></i> Add new
                                    address</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
