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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Security') }}</li>
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
                    <!-- 2-Step verification -->
                    <div class="card d-none">
                        <div class="card-header border-bottom">
                            <div class="d-flex align-items-center">
                                <h5 class="card-header-title">Two-step verification</h5>
                                <span class="badge bg-soft-danger text-danger ms-2">Disabled</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Start by entering your password so that we know it's you. Then we'll walk
                                you through two more simple steps.</p>
                            <form>
                                <div class="row mb-4">
                                    <label for="accountPasswordLabel" class="col-sm-3 col-form-label form-label">Account
                                        password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="currentPassword"
                                            id="accountPasswordLabel" placeholder="Enter current password"
                                            aria-label="Enter current password">
                                        <small class="form-text">This is the password you use to log in to your Front
                                            account.</small>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Set up</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Password Change -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h5 class="card-header-title">Password</h5>
                        </div>

                        <div class="card-body">
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
                            <form method="POST" action="{{ route('frontend.profile.security.passwordUpdate') }}">
                                @csrf
                                <!-- Current Password -->
                                <div class="row mb-4">
                                    <label for="currentPassword" class="col-sm-3 col-form-label form-label">Current
                                        password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="current_password"
                                            id="currentPassword" placeholder="Enter current password"
                                            aria-label="Enter current password">
                                    </div>
                                </div>

                                <!-- New Password -->
                                <div class="row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label form-label">New
                                        password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter new password" aria-label="Enter new password">
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="row mb-4">
                                    <label for="passwordConfirmation" class="col-sm-3 col-form-label form-label">Confirm
                                        new password</label>

                                    <div class="col-sm-9">
                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="passwordConfirmation" placeholder="Confirm your new password"
                                                aria-label="Confirm your new password">
                                        </div>

                                        <h5>Password requirements:</h5>

                                        <p class="card-text small">Ensure that these requirements are met:</p>

                                        <ul class="small">
                                            <li>Minimum 8 characters long - the more, the better</li>
                                            <li>At least one lowercase character</li>
                                            <li>At least one uppercase character</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
