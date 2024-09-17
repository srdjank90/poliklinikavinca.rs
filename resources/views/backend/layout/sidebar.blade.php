<aside class="lp-sidebar-wrapper">
    <div class="lp-sidebar">
        <div class="lp-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="minuteSHOP">
        </div>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'backend' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('backend') }}">
                        <span><i class="bi bi-house"></i> {{ __('Dashboard') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Str::contains(Route::currentRouteName(), 'backend.products') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('backend.products.index') }}">
                        <span><i class="bi bi-cart2"></i> {{ __('Products') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Str::contains(Route::currentRouteName(), 'backend.packages') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('backend.packages.index') }}">
                        <span><i class="bi bi-box-seam"></i> {{ __('Packages') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Str::contains(Route::currentRouteName(), 'backend.orders') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('backend.orders.index') }}">
                        <span><i class="bi bi-card-checklist"></i> {{ __('Orders') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Str::contains(Route::currentRouteName(), 'backend.pages') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('backend.pages.index') }}">
                        <span><i class="bi bi-file-earmark-richtext"></i> {{ __('Pages') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Str::contains(Route::currentRouteName(), 'backend.posts') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('backend.posts.index') }}">
                        <span><i class="bi bi-newspaper"></i> {{ __('Posts') }} </span>
                    </a>
                </li>

            </ul>

            <ul class="nav">
                @if (Auth::user()->email == 'srdjank90@gmail.com')
                    <li class="nav-item">
                        <a class="nav-link {{ Str::contains(Route::currentRouteName(), 'backend.menus') ? 'active' : '' }}"
                            aria-current="page" href="{{ route('backend.settings.index') }}">
                            <span><i class="bi bi-menu-button-wide-fill"></i> {{ __('Menus') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Str::contains(Route::currentRouteName(), 'backend.files') ? 'active' : '' }}"
                            aria-current="page" href="{{ route('backend.files.index') }}">
                            <span><i class="bi bi-folder"></i> {{ __('Files') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Str::contains(Route::currentRouteName(), 'backend.users') ? 'active' : '' }}"
                            aria-current="page" href="{{ route('backend.settings.index') }}">
                            <span><i class="bi bi-people"></i> {{ __('Users') }}</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ Str::contains(Route::currentRouteName(), 'backend.settings') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('backend.settings.index') }}">
                        <span><i class="bi bi-gear"></i> {{ __('Settings') }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
