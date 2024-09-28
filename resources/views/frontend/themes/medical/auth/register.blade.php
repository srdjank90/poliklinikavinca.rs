@extends('frontend.themes.medical.layout.layout')

@section('content')
    <!-- Form -->
    <div class="container content-space-3 content-space-t-lg-4 content-space-b-lg-3 my-5">
        <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
            <!-- Heading -->
            <div class="text-center mb-5 mb-md-7">
                <h1 class="h2">{{ __('Welcome to') }} MinuteSHOP</h1>
                <p>{{ __('Fill out form to register and start shopping') }}</p>
            </div>
            <!-- End Heading -->

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{ $errors }}
                <!-- First Name -->
                <div class="mb-3">
                    <label class="form-label" for="firstName">{{ __('First Name') }}</label>
                    <input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                        name="first_name" id="firstName" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <span class="invalid-feedback">{{ __('Please enter your firstname') }}</span>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label class="form-label" for="lastName">{{ __('Last Name') }}</label>
                    <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                        name="last_name" id="lastName" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('Email Address') }}</label>
                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                        name="email" id="email" value="{{ old('email') }}" placeholder="email@site.com"
                        aria-label="email@site.com" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <div class="input-group input-group-merge" data-hs-validation-validate-class>
                        <input type="password"
                            class="js-toggle-password form-control form-control-lg @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="8+ characters required"
                            aria-label="8+ characters required" required>
                        <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:;">
                            <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
                        </a>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }} 1111</span>
                    @enderror
                </div>

                <!-- Password Confirm -->
                <div class="mb-3">
                    <label class="form-label" for="passwordConfirm">{{ __('Confirm Password') }}</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="js-toggle-password form-control form-control-lg"
                            name="password_confirmation" id="passwordConfirm" placeholder="8+ characters required"
                            aria-label="8+ characters required" required>
                        <a class="js-toggle-password-target-2 input-group-append input-group-text" href="javascript:;">
                            <i class="js-toggle-passowrd-show-icon-2 bi-eye"></i>
                        </a>
                    </div>
                </div>

                <!-- Privacy Policy -->
                {{-- <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="signupHeroFormPrivacyCheck"
                        name="signupFormPrivacyCheck" required>
                    <label class="form-check-label small" for="signupHeroFormPrivacyCheck"> By submitting this form I have
                        read and acknowledged the <a href=./page-privacy.html>Privacy Policy</a></label>
                    <span class="invalid-feedback">Please accept our Privacy Policy.</span>
                </div> --}}

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">{{ __('Register') }}</button>
                </div>

                <div class="text-center">
                    <p>{{ __('Already have an account?') }} <a class="link"
                            href="{{ route('login') }}">{{ __('Login') }}</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection
