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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Wishlist') }}</li>
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
                <!-- Card -->
                <div class="card">
                    <div class="card-header d-sm-flex justify-content-sm-between align-items-sm-center border-bottom">
                        <h5 class="card-header-title">Recently added</h5>
                        <span>2 items</span>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-3 mb-3">
                            <div class="col mb-4">
                                <!-- Wishlist Item -->
                                <div class="card card-bordered shadow-none text-center h-100">
                                    <div class="card-pinned">
                                        <img class="card-img-top" src="/themes/lika/assets/img/300x180/img3.jpg"
                                            alt="Image Description">
                                        <div class="card-pinned-top-end"></div>
                                    </div>

                                    <div class="card-body">
                                        <div class="mb-1">
                                            <a class="link-sm link-secondary" href="#">Accessories</a>
                                        </div>
                                        <a class="text-body" href="#">Herschel backpack in dark blue</a>
                                        <p class="card-text text-dark">56.99 {{ $currency }}</p>
                                    </div>

                                    <div class="card-footer pt-0">
                                        <button type="button" class="btn btn-outline-danger btn-sm rounded-pill">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                                <!-- #Wishlist Item -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
