<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light">
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="{{ route('frontend.index') }}" aria-label="Front">
                <img class="navbar-brand-logo" src="/themes/lika/assets/svg/logos/logo.svg" alt="Logo" />
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                </span>
                <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'frontend.index' ? 'active' : '' }}"
                            href="{{ route('frontend.index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'frontend.blog' ? 'active' : '' }}"
                            href="{{ route('frontend.index') }}">Blog</a>
                    </li>

                    @if (!Auth::check())
                    <li class="nav-item">
                        <a class="" href="{{ route('login') }}"> <i class="bi bi-door-open"></i>
                            {{ __('Login') }}</a>
                    </li>
                    <li class="nav-item d-none">
                        <a class="" href="{{ route('register') }}"><i class="bi bi-pencil"></i>
                            {{ __('Register') }}</a>
                    </li>
                    @endif

                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>