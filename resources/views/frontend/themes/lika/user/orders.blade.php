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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Orders') }}</li>
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
                    <!-- Header -->
                    <div class="card-header border-bottom">
                        <form class="input-group input-group-merge">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input type="search" class="form-control" placeholder="Search orders"
                                aria-label="Search orders">
                        </form>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">


                        <!-- Tab Content -->
                        <div class="tab-content" id="accountOrdersTabContent">
                            <div class="tab-pane fade show active" id="accountOrdersOne" role="tabpanel"
                                aria-labelledby="accountOrdersOne-tab">

                                <ul class="list-unstyled mb-5">

                                    <!-- Card -->
                                    <li class="card card-bordered shadow-none mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 col-md mb-3 mb-md-0">
                                                    <small class="card-subtitle mb-0">Total</small>
                                                    <small class="text-dark fw-semi-bold">$999.00</small>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-6 col-md mb-3 mb-md-0">
                                                    <small class="card-subtitle mb-0">Ship to</small>
                                                    <small class="text-dark fw-semi-bold">Natalie Curtis</small>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-6 col-md">
                                                    <small class="card-subtitle mb-0">Order no.</small>
                                                    <small class="text-dark fw-semi-bold">456853648</small>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-6 col-md">
                                                    <small class="card-subtitle mb-0">Shipped date:</small>
                                                    <small class="text-dark fw-semi-bold">30 April, 2020</small>
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Row -->

                                            <hr>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5>It's delivered!</h5>

                                                    <div class="row gx-2">
                                                        <div class="col">
                                                            <img class="img-fluid"
                                                                src="/themes/lika/assets/img/380x360/img6.jpg"
                                                                alt="Image Description">
                                                        </div>
                                                        <div class="col">
                                                            <img class="img-fluid"
                                                                src="/themes/lika/assets/img/380x360/img4.jpg"
                                                                alt="Image Description">
                                                        </div>
                                                        <div class="col">
                                                            <img class="img-fluid"
                                                                src="/themes/lika/assets/img/380x360/img5.jpg"
                                                                alt="Image Description">
                                                        </div>
                                                    </div>
                                                    <!-- End Row -->
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="d-grid gap-2">
                                                        <a class="btn btn-white btn-sm" href="#">
                                                            <i class="bi-basket small me-2"></i> View order
                                                        </a>
                                                        <a class="btn btn-white btn-sm" href="#">
                                                            <i class="bi-truck small me-2"></i> Track order
                                                        </a>
                                                        <a class="btn btn-white btn-sm" href="#">
                                                            <i class="bi-arrow-counterclockwise small me-2"></i> Return
                                                            item
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" href="#">Buy it again</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- End Card -->

                                </ul>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
@endsection
