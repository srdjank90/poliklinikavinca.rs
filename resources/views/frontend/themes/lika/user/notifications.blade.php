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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Notifications') }}</li>
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
                <div class="d-grid gap-3 gap-lg-5">


                    <!-- Card -->
                    <div class="card card-sm">
                        <!-- Header -->
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                            <h5 class="card-header-title">Front emails</h5>

                            <a id="toggleAll3" class="js-toggle-state btn btn-white btn-sm btn-toggle" href="javascript:;"
                                data-hs-toggle-state-options='{
                           "targetSelector": "#accountNotificationSwitch5, #accountNotificationSwitch6, #accountNotificationSwitch7, #accountNotificationSwitch8"
                         }'>
                                <span class="btn-toggle-default">Toggle all</span>
                                <span class="btn-toggle-toggled">Untoggle all</span>
                            </a>
                        </div>
                        <!-- End Header -->

                        <div class="card-body">
                            <small class="card-subtitle">Subscribe me to:</small>

                            <!-- List Group -->
                            <div class="list-group list-group-flush list-group-no-gutters">
                                <!-- Item -->
                                <div class="list-group-item">
                                    <!-- Form Switch -->
                                    <label class="form-check form-switch" for="accountNotificationSwitch5">
                                        <input class="form-check-input mt-0" type="checkbox" id="accountNotificationSwitch5"
                                            checked>
                                        <span class="d-block">Company news</span>
                                        <span class="d-block small text-muted">Get Front news, announcements, and product
                                            updates</span>
                                    </label>
                                    <!-- End Form Switch -->
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="list-group-item">
                                    <!-- Form Switch -->
                                    <label class="form-check form-switch" for="accountNotificationSwitch6">
                                        <input class="form-check-input mt-0" type="checkbox"
                                            id="accountNotificationSwitch6">
                                        <span class="d-block">Replay <span class="badge bg-success ms-1">New</span></span>
                                        <span class="d-block small text-muted">A weekly email featuring popular
                                            shots</span>
                                    </label>
                                    <!-- End Form Switch -->
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="list-group-item">
                                    <!-- Form Switch -->
                                    <label class="form-check form-switch" for="accountNotificationSwitch7">
                                        <input class="form-check-input mt-0" type="checkbox"
                                            id="accountNotificationSwitch7">
                                        <span class="d-block">Courtside <span
                                                class="badge bg-success ms-1">New</span></span>
                                        <span class="d-block small text-muted">A weekly email featuring the latest stories
                                            from our blog</span>
                                    </label>
                                    <!-- End Form Switch -->
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="list-group-item">
                                    <!-- Form Switch -->
                                    <label class="form-check form-switch" for="accountNotificationSwitch8">
                                        <input class="form-check-input mt-0" type="checkbox"
                                            id="accountNotificationSwitch8">
                                        <span class="d-block">Weekly jobs</span>
                                        <span class="d-block small text-muted">Weekly digest of design jobs</span>
                                    </label>
                                    <!-- End Form Switch -->
                                </div>
                                <!-- End Item -->
                            </div>
                            <!-- End List Group -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
    </div>
@endsection
