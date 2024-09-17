<!-- Nav tabs -->
<div class="dashboard_tab_button">
    <ul role="tablist" class="nav flex-column dashboard-list">
        <li><a href="{{ route('frontend.profile.index') }}"
                class="nav-link {{ Request::routeIs('frontend.profile.index') ? 'active' : '' }}">Osnovne informacije</a>
        </li>
        <li> <a href="{{ route('frontend.profile.security') }}"
                class="nav-link {{ Request::routeIs('frontend.profile.security') ? 'active' : '' }}">Sigurnost</a></li>
        <li><a href="{{ route('frontend.profile.orders') }}"
                class="nav-link {{ Request::routeIs('frontend.profile.orders') ? 'active' : '' }}">Porudžbine</a></li>
        <li class="d-none"><a href="{{ route('frontend.profile.wishlist') }}"
                class="nav-link {{ Request::routeIs('frontend.profile.wishlist') ? 'active' : '' }}">Lista želja</a>
        </li>
        <li><a href="{{ route('frontend.profile.address') }}"
                class="nav-link {{ Request::routeIs('frontend.profile.address') || Request::routeIs('frontend.profile.address.edit') || Request::routeIs('frontend.profile.address.create') ? 'active' : '' }}">Adrese</a>
        </li>
    </ul>
</div>
