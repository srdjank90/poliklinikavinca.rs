@extends('frontend.themes.medical.layout.layout')

@section('content')
    <div class="container content-space-1 content-space-lg-2 my-5">
        <div class="container content-space-3 content-space-t-lg-4 content-space-b-lg-3">
            <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                <!-- Heading -->
                <div class="text-center mb-5 mb-md-7">
                    <h1 class="h2">{{ __('Welcome back') }}</h1>
                    <p>{{ __('Login to your account') }}</p>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="email">{{ __('Email Address') }}</label>
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email" id="email" value="{{ old('email') }}" placeholder="email@site.com"
                            aria-label="email@site.com" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <a class="form-label-link"
                                href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        </div>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <input type="password"
                                class="js-toggle-password form-control form-control-lg @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="8+ characters required"
                                aria-label="8+ characters required" required minlength="8">
                            <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                                <i id="changePassIcon" class="bi-eye"></i>
                            </a>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- End Form -->

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">{{ __('Login') }}</button>
                    </div>

                    <div class="text-center">
                        <p>{{ __("Don't have an account yet?") }} <a class="link"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </p>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
@endsection
