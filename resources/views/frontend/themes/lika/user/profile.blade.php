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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Personal info') }}</li>
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

    <!-- Content -->
    <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.themes.lika.user.components.menu')
            </div>
            <!-- End Col -->

            <div class="col-lg-9">
                <div class="d-grid gap-3 gap-lg-5">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">Basic info</h4>
                        </div>
                        <!-- Body -->
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
                            <form method="POST" id="profileInfoForm" action="{{ route('frontend.profile.update') }}">
                                @csrf
                                <!-- First and Last name -->
                                <div class="row mb-4">
                                    <label for="firstName"
                                        class="col-sm-3 col-form-label form-label">{{ __('Full name') }}<i
                                            class="bi-question-circle text-body ms-1 d-none" data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Displayed on public forums, such as Front."></i></label>

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
                                    <label for="email"
                                        class="col-sm-3 col-form-label form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="email"
                                            aria-label="" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="js-add-field row mb-4">
                                    <label for="phone" class="col-sm-3 col-form-label form-label">Phone <span
                                            class="form-label-secondary">({{ __('Optional') }})</span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="js-input-mask form-control" name="phone"
                                                id="phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label form-label">Gender <span
                                            class="form-label-secondary">({{ __('Optional') }})</span></label>
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
                                <div class="row mb-4">
                                    <label for="dob"
                                        class="col-sm-3 col-form-label form-label">{{ __('Date of birth') }} <span
                                            class="form-label-secondary">({{ __('Optional') }})</span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="date" class="js-input-mask form-control" name="dob"
                                                id="dob" value="{{ $user->dob }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="row mb-4">
                                    <label for="country" class="col-sm-3 col-form-label form-label">{{ __('Country') }}
                                        <span class="form-label-secondary">({{ __('Optional') }})</span></label>

                                    <div class="col-sm-9">
                                        <!-- Select -->
                                        <div class="tom-select-custom mb-3">
                                            <input type="text" class="form-control" value="{{ $user->country }}"
                                                name="country">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer pt-0">
                            <div class="d-flex justify-content-end gap-3">
                                <button id="profileInfoDataSubmit" type="submit"
                                    class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>

                    <div class="card d-none">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">{{ __('Delete your account') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">When you delete your account, you lose access to Front account services,
                                and we permanently delete your personal data. You can cancel the deletion for 14 days.</p>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="deleteAccountCheckbox">
                                    <label class="form-check-label" for="deleteAccountCheckbox">Confirm that I want to
                                        delete my account.</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            console.log('Im Here!')
            $('#profileInfoDataSubmit').on('click', function() {
                $('#profileInfoForm').submit();
            })
        })
    </script>
@endsection
