<header id="header" class="header header-sticky header-sticky-smart disable-transition-all z-index-5">
    <div class="topbar">
        <div class="overflow-hidden" style="background-color:#13a2d5!important">
            <div class="pt-4 pb-3 text-white move-text-animate fw-semibold text-nowrap">
                <span class="text-uppercase me-16 d-none">
                </span>
                {!! $setting['setting_header_spinning_text_opt'] !!}
            </div>
        </div>
        <div class="border-bottom">
            <div class="container-wide container py-2">
                <div class="row py-4">
                    <div class="w-70 d-flex align-items-center">
                        <span class="d-none d-md-flex align-items-center pe-8"><svg class="icon me-4">
                                <use xlink:href="#mobile"></use>
                            </svg> Pozovite odmah: {{ $setting['setting_phone_opt'] }}</span>
                        <span class="d-flex align-items-center"><svg class="icon me-4">
                                <use xlink:href="#envelope"></use>
                            </svg>{{ $setting['setting_email_opt'] }}</span>
                    </div>
                    <div class="icons-actions d-flex justify-content-end w-30 fs-28px text-body-emphasis">
                        <div class="px-6 me-n4 d-inline-block cart-number-container">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-area">
        <div class="main-header nav navbar bg-body navbar-light navbar-expand-xl py-6 py-xl-0">
            <div class="container-wide container flex-nowrap">
                <div class="w-72px d-flex d-xl-none">
                    <button class="navbar-toggler align-self-center border-0 shadow-none px-0 canvas-toggle p-4"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasNavBar"
                        aria-controls="offCanvasNavBar" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="fs-24 toggle-icon"></span>
                    </button>
                </div>
                <div class="d-none d-xl-flex w-xl-100">
                    <ul class="navbar-nav">
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px"
                                href="{{ route('frontend.index') }}" id="menu-item-home">{{ __('Home') }}</a>
                        </li>
                        <li
                            class="nav-item transition-all-xl-1 py-xl-11 py-0 dropdown dropdown-hover dropdown-fullwidth position-static">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px dropdown-toggle"
                                href="{{ route('frontend.products') }}" id="menu-item-shop" aria-haspopup="true"
                                aria-expanded="false">Webshop</a>
                            <div class="dropdown-menu mega-menu start-0 py-6  w-100" aria-labelledby="menu-item-shop">
                                <div class="megamenu-shop container-wide py-8 px-12">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                @foreach ($productCategories as $key => $pCategory)
                                                    <div class="col-3" style="min-height:100px">
                                                        <h5>
                                                            @if ($pCategory->slug != 'pametna-brava')
                                                                @if ($pCategory->slug == 'pametna-vrata')
                                                                    <a class="text-black"
                                                                        href="{{ route('frontend.smartDoor') }}">
                                                                        {{ $pCategory->name }}
                                                                    </a>
                                                                @else
                                                                    <a class="text-black"
                                                                        href="{{ route('frontend.category.products', $pCategory->slug) }}">
                                                                        {{ $pCategory->name }}
                                                                    </a>
                                                                @endif
                                                            @else
                                                                <a class="text-black"
                                                                    href="https://www.nuki.rs/proizvodi/nuki-pametna-brava-3-0-pro/"
                                                                    target="_blank">
                                                                    {{ $pCategory->name }}
                                                                </a>
                                                            @endif
                                                        </h5>
                                                        @if (count($pCategory->products) > 0)
                                                            <ul class="list-unstyled mb-0">
                                                                @foreach ($pCategory->products as $key => $cProduct)
                                                                    @if ($key < 3)
                                                                        <li>
                                                                            <a href="{{ route('frontend.product', $cProduct->slug) }}"
                                                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                                                    class="border-hover-target">{{ $cProduct->name }}
                                                                                </span></a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if ($productAction)
                                            <div class="col-md-3 d-xxl-block d-none megamenu-shop-banner"
                                                data-bs-theme="light">
                                                <div class="card border-0 mt-4">
                                                    @if ($productAction->image)
                                                        <img src="{{ $storageUrl }}{{ $productAction->image->path }}"
                                                            alt="bg mega menu" class="card-img">
                                                    @endif

                                                    <div class="card-img-overlay d-flex flex-column mx-2 px-9 py-6">
                                                        <p class="text-body-emphasis ls-1 fw-semibold mb-4 mt-6 text-uppercase"
                                                            style="background-color: rgba(255,255,255,0.5);
                                                            padding: 5px;">
                                                            {{ $productAction->name }}
                                                        </p>
                                                        <div class="mt-auto">
                                                            <a href="{{ route('frontend.action.products', $productAction->slug) }}"
                                                                class="btn btn-white">Pogledaj ponudu</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        @if ($productAction)
                            <li class="nav-item transition-all-xl-1 py-xl-11 py-0">
                                <a style="color:#d20328"
                                    class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-bold ls-1 fs-15px fs-xl-14px"
                                    href="{{ route('frontend.action.products', $productAction->slug) }}">SUPER
                                    UŠTEDA</a>
                            </li>
                        @endif
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px"
                                href="{{ route('frontend.about') }}">Talaris</a>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px"
                                href="{{ route('frontend.services') }}">Servis</a>
                        </li>

                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px"
                                href="{{ route('frontend.posts') }}">Blog</a>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px"
                                href="{{ route('frontend.stores') }}">Prodajna Mesta</a>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px"
                                href="{{ route('frontend.contact') }}">Kontakt</a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('frontend.index') }}" class="navbar-brand py-4 mx-auto float-end text-end">
                    <img class="header-image" src="/themes/modern-2023/assets/images/logo.jpg" width="50%"
                        alt="" />
                </a>
            </div>
        </div>
    </div>
</header>
