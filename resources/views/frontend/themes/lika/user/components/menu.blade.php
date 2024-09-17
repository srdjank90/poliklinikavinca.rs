<!-- Navbar -->
<div class="navbar-expand-lg navbar-light">
    <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
        <div class="card flex-grow-1 mb-5">
            <div class="card-body">
                <!-- Avatar -->
                <div class="d-none d-lg-block text-center mb-5">
                    <h4 class="card-title mb-0">{{ $user->first_name }} {{ $user->last_name }}</h4>
                    <p class="card-text small">{{ $user->email }}</p>
                </div>

                <span class="text-cap">{{ __('Account') }}</span>

                <!-- Profile -->
                <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('frontend.profile.index') ? 'active' : '' }}"
                            href="{{ route('frontend.profile.index') }}">
                            <i class="bi-person-badge nav-icon"></i> Personal info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('frontend.profile.security') ? 'active' : '' }}"
                            href="{{ route('frontend.profile.security') }}">
                            <i class="bi-shield-shaded nav-icon"></i> Security
                        </a>
                    </li>

                    <li class="nav-item d-none">
                        <a class="nav-link {{ Request::routeIs('frontend.profile.notifications') ? 'active' : '' }}"
                            href="{{ route('frontend.profile.notifications') }}">
                            <i class="bi-bell nav-icon"></i> Notifications
                        </a>
                    </li>
                </ul>

                <span class="text-cap">Shopping</span>

                <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('frontend.profile.orders') ? 'active' : '' }}"
                            href="{{ route('frontend.profile.orders') }}">
                            <i class="bi-basket nav-icon"></i> Your orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('frontend.profile.wishlist') ? 'active' : '' }}"
                            href="{{ route('frontend.profile.wishlist') }}">
                            <i class="bi-heart nav-icon"></i> Wishlist
                            <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge d-none">2</span>
                        </a>
                    </li>
                </ul>

                <span class="text-cap">Billing</span>

                <ul class="nav nav-sm nav-tabs nav-vertical">
                    <li class="nav-item d-none">
                        <a class="nav-link " href="./account-payments.html">
                            <i class="bi-credit-card nav-icon"></i> Payments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('frontend.profile.address') || Request::routeIs('frontend.profile.address.edit') ? 'active' : '' }}"
                            href="{{ route('frontend.profile.address') }}">
                            <i class="bi-geo-alt nav-icon"></i> Address
                        </a>
                    </li>
                </ul>

                <div class="d-lg-none">
                    <div class="dropdown-divider"></div>
                    <ul class="nav nav-sm nav-tabs nav-vertical">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi-box-arrow-right nav-icon"></i> Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar -->
