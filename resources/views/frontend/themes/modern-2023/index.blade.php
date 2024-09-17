@extends('frontend.themes.modern-2023.layout.layout')
@section('title',
    isset($setting['setting_seo_title_opt'])
    ? $setting['setting_seo_title_opt']
    : 'Sigurnosna
    Vrata')
@section('description', isset($setting['setting_seo_description_opt']) ? $setting['setting_seo_description_opt'] : '')
@section('keywords', isset($setting['setting_seo_keywords_opt']) ? $setting['setting_seo_keywords_opt'] : '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <!-- Intro Callout -->
        <section>
            <div class="row align-items-center hero hero-header-03 mx-0 bg-section-2">
                <div class="col-lg-6 order-1 order-lg-0 text-center py-lg-0 py-16 px-sm-0 px-6">
                    <div data-animate="fadeInUp" class="fs-4 fw-semibold text-primary mb-8">KVALITET I SIGURNOST</div>
                    <h2 data-animate="fadeInUp" class="mx-auto hero-540 fs-1 mb-4 px-4">Vaša nova vrata, vrata za 21. vek
                    </h2>
                    <p data-animate="fadeInUp" class="mx-auto hero-desc fs-18px text-body-calculate">Kod nas je procedura
                        jednostavna, vaša nova vrata dobijate za svega 48h.</p>
                    <a data-animate="fadeInUp" href="{{ route('frontend.products') }}"
                        class="btn btn-lg btn-dark mt-6 btn-hover-bg-primary btn-hover-border-primary">Poručite odmah i
                        uštedite</a>
                </div>
                <div class="col-lg-6 order-0 order-lg-1 px-0">
                    <div class="d-block hover-zoom-in hover-shine">
                        <img src="#" data-src="/themes/modern-2023/assets/images/hero-slider/hero-slider-07.jpg"
                            class="lazy-image img-fluid w-100 vh-100 object-fit-cover" alt="slider" width="952"
                            height="770" />
                    </div>
                </div>
            </div>
        </section>
        <!-- #Intro Callout -->

        <!-- Highlighted Categories -->
        <section class="container container-xxl pt-14 pt-lg-17">
            <div class="mb-lg-13 mb-7">
                <div class="text-center">
                    <h2 class="mb-6">Izdvajamo specijalno za Vas</h2>
                    <p class="fs-18px mb-0">Naši kvalitetni proizvodi za vašu sigurnost.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($favoriteCategories as $key => $fCategory)
                    <div class="col-lg-2 col-md-4 col-sm-6 mt-lg-0 mt-10">
                        <div class="card border-0 fw-semibold">
                            @if ($fCategory->slug != 'pametna-brava')
                                @if ($fCategory->slug == 'pametna-vrata')
                                    <a href="{{ route('frontend.smartDoor') }}"
                                        class="rounded-circle mx-auto hover-zoom-in w-100 image-box-1">
                                        @if ($fCategory->image)
                                            <img class="lazy-image img-fluid card-img light-mode-img" src="#"
                                                data-src="{{ $storageUrl . $fCategory->image->path }}" width="160"
                                                height="160" alt="{{ $fCategory->name }}" />
                                        @endif
                                    </a>
                                @else
                                    <a href="{{ route('frontend.category.products', $fCategory->slug) }}"
                                        class="rounded-circle mx-auto hover-zoom-in w-100 image-box-1">
                                        @if ($fCategory->image)
                                            <img class="lazy-image img-fluid card-img light-mode-img" src="#"
                                                data-src="{{ $storageUrl . $fCategory->image->path }}" width="160"
                                                height="160" alt="{{ $fCategory->name }}" />
                                        @endif
                                    </a>
                                @endif
                            @else
                                <a target="_blank" href="https://www.nuki.rs/proizvodi/nuki-pametna-brava-3-0-pro/"
                                    class="rounded-circle mx-auto hover-zoom-in w-100 image-box-1">
                                    @if ($fCategory->image)
                                        <img class="lazy-image img-fluid card-img light-mode-img" src="#"
                                            data-src="{{ $storageUrl . $fCategory->image->path }}" width="160"
                                            height="160" alt="{{ $fCategory->name }}" />
                                    @endif
                                </a>
                            @endif

                            <div class="card-body pt-9 pb-0 d-flex justify-content-center px-0">
                                <h4 class="fs-5 text-center position-relative">
                                    <a href="{{ route('frontend.category.products', $fCategory->slug) }}"
                                        class="text-decoration-none">{{ $fCategory->name }}</a>
                                    @if ($fCategory->slug != 'pametna-brava' && $fCategory->slug != 'pametna-vrata')
                                        <span
                                            class="fw-bold fs-14px position-absolute top-0 me-n6 mt-n3 end-0 top-50 translate-middle-y">
                                            {{ count($fCategory->products) }} </span>
                                    @else
                                        <span
                                            class="fw-bold fs-14px position-absolute top-0 me-n6 mt-n3 end-0 top-50 translate-middle-y">
                                            1 </span>
                                    @endif
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- #Highlighted Categories -->

        <!-- Top Products -->
        <section class="pt-lg-16 pt-14">
            <div class="container container-xxl">
                <div class="row gy-30px gx-30px">
                    @foreach ($highlightedProducts as $key => $highlighted)
                        <div class="col-12 col-md-4">
                            <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                                @if (isset($highlighted->landing_image) && $highlighted->landing_image != '')
                                    <img title="{{ $highlighted->slug }}" alt="{{ $highlighted->slug }}"
                                        class="lazy-image card-img object-fit-cover lazy-image light-mode-img"
                                        src="#" data-src="{{ $storageUrl . $highlighted->landing_image }}"
                                        width="450" height="600" alt="{{ $highlighted->name }}" />
                                @else
                                    @if (count($highlighted->files) > 0)
                                        <img title="{{ $highlighted->slug }}" alt="{{ $highlighted->slug }}"
                                            class="lazy-image card-img object-fit-cover lazy-image light-mode-img"
                                            src="#" data-src="{{ $storageUrl . $highlighted->files[0]['path'] }}"
                                            width="450" height="600" alt="{{ $highlighted->name }}" />
                                    @endif
                                @endif

                                <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                                    <h3 class="card-title text-white lh-45px">{{ $highlighted->name }}</h3>
                                    <div>
                                        <a href="{{ route('frontend.product', $highlighted->slug) }}"
                                            class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Pogledajte
                                            više
                                            <svg class="icon">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- #Top Products -->

        <!-- Featured Products -->
        <section id="product_tabs">
            <div class="container container-xxl pt-14 pt-lg-16 pb-15 pb-lg-20 mb-4" data-bs-toggle="tab-dropdown">
                <!-- Desktop Tabs -->
                <ul class="nav nav-tabs border-0 d-lg-flex justify-content-center mb-12 d-none" role="tablist">
                    <li class="nav-item" role="presentation">
                        <h2 class="mb-0 px-2 mx-1">
                            <button class="nav-link px-10 py-0 border-0 text-body-emphasis opacity-30 active"
                                data-bs-toggle="tab" data-bs-target="#best-sellers-tab-pane" type="button" role="tab"
                                aria-controls="best-sellers-tab-pane" aria-selected="true">
                                Najprodavaniji
                            </button>
                        </h2>
                    </li>
                    <li class="nav-item" role="presentation">
                        <h2 class="mb-0 px-2 mx-1">
                            <button class="nav-link px-10 py-0 border-0 text-body-emphasis opacity-30"
                                data-bs-toggle="tab" data-bs-target="#new-arrivals-tab-pane" type="button"
                                role="tab" aria-controls="new-arrivals-tab-pane" aria-selected="false">
                                Noviteti
                            </button>
                        </h2>
                    </li>
                    <li class="nav-item" role="presentation">
                        <h2 class="mb-0 px-2 mx-1">
                            <button class="nav-link px-10 py-0 border-0 text-body-emphasis opacity-30"
                                data-bs-toggle="tab" data-bs-target="#sale-tab-pane" type="button" role="tab"
                                aria-controls="sale-tab-pane" aria-selected="false">Akcija</button>
                        </h2>
                    </li>
                </ul>
                <!-- Mobile Tabs -->
                <ul class="nav nav-tabs border-0 justify-content-center mb-12 d-flex d-lg-none py-2" role="tablist">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle text-body-emphasis text-decoration-none d-flex align-items-center h3 mb-0"
                            data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Najprodavaniji</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="dropdown-item m-0 h5 active" href="#"
                                    data-bs-toggle="tab" data-bs-target="#best-sellers-tab-pane" role="tab"
                                    aria-controls="best-sellers-tab-pane" aria-selected="true">Najprodavaniji</a></li>
                            <li class="nav-item"><a class="dropdown-item m-0 h5" href="#" data-bs-toggle="tab"
                                    data-bs-target="#new-arrivals-tab-pane" role="tab"
                                    aria-controls="new-arrivals-tab-pane" aria-selected="false">Noviteti</a></li>
                            <li class="nav-item"><a class="dropdown-item m-0 h5" href="#" data-bs-toggle="tab"
                                    data-bs-target="#sale-tab-pane" role="tab" aria-controls="sale-tab-pane"
                                    aria-selected="false">Akcija</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Tabs Content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="best-sellers-tab-pane" role="tabpanel" tabindex="0">
                        <div class="row gy-50px">
                            @foreach ($bestSellerProducts as $key => $bestSeller)
                                <div class="col-lg-4 col-xl-3 col-sm-6">
                                    <div class="card card-product grid-1 bg-transparent border-0">
                                        @if (count($bestSeller->files) > 0)
                                            <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                                <a href="{{ route('frontend.product', $bestSeller->slug) }}"
                                                    class="hover-zoom-in d-block" title="{{ $bestSeller->name }}">
                                                    <img src="#" title="{{ $bestSeller->slug }}"
                                                        alt="{{ $bestSeller->slug }}"
                                                        data-src="{{ $storageUrl . $bestSeller->files[0]['path'] }}"
                                                        class="img-fluid lazy-image w-100" alt="{{ $bestSeller->name }}"
                                                        width="330" height="440" />
                                                </a>
                                                @if (isset($bestSeller->action))
                                                    <div class="position-absolute product-flash z-index-2"
                                                        style="top:50px">
                                                        <span class="badge badge-product-flash on-sale bg-info">
                                                            {{ $bestSeller->action }}
                                                        </span>
                                                    </div>
                                                @endif
                                                @if (isset($bestSeller->price_old) && $bestSeller->price_old > 0)
                                                    <div class="position-absolute product-flash z-index-2">
                                                        <span class="badge badge-product-flash on-sale bg-primary">
                                                            Ušteda
                                                            {{ round(100 - ($bestSeller->price / $bestSeller->price_old) * 100) }}
                                                            %
                                                        </span>
                                                    </div>
                                                @endif
                                            </figure>
                                        @endif
                                        <div class="card-body text-center p-0">
                                            <span
                                                class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                                @if ($bestSeller->price_old)
                                                    <del class="text-body fw-500 me-4 fs-13px">@priceFormat($bestSeller->price_old)
                                                        {{ $currency }}</del>
                                                @endif
                                                <ins class="text-decoration-none">@priceFormat($bestSeller->price)
                                                    {{ $currency }}</ins>
                                            </span>
                                            <h4
                                                class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                <a class="text-decoration-none text-reset"
                                                    href="{{ route('frontend.product', $bestSeller->slug) }}">{{ $bestSeller->name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="new-arrivals-tab-pane" role="tabpanel" tabindex="0">
                        <div class="row gy-50px">
                            <div class="row gy-50px">
                                @foreach ($newProducts as $key => $new)
                                    <div class="col-lg-4 col-xl-3 col-sm-6">
                                        <div class="card card-product grid-1 bg-transparent border-0">
                                            @if (count($new->files) > 0)
                                                <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                                    <a href="{{ route('frontend.product', $new->slug) }}"
                                                        class="hover-zoom-in d-block" title="{{ $new->name }}">
                                                        <img src="#" title="{{ $new->slug }}"
                                                            alt="{{ $new->slug }}"
                                                            data-src="{{ $storageUrl . $new->files[0]['path'] }}"
                                                            class="img-fluid lazy-image w-100" alt="{{ $new->name }}"
                                                            width="330" height="440" />
                                                    </a>
                                                    @if (isset($new->action))
                                                        <div class="position-absolute product-flash z-index-2"
                                                            style="top:50px">
                                                            <span class="badge badge-product-flash on-sale bg-info">
                                                                {{ $new->action }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                    @if (isset($new->price_old) && $new->price_old > 0)
                                                        <div class="position-absolute product-flash z-index-2">
                                                            <span class="badge badge-product-flash on-sale bg-primary">
                                                                Ušteda
                                                                {{ round(100 - ($new->price / $new->price_old) * 100) }}
                                                                %
                                                            </span>
                                                        </div>
                                                    @endif
                                                </figure>
                                            @endif
                                            <div class="card-body text-center p-0">
                                                <span
                                                    class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                                    @if ($new->price_old)
                                                        <del class="text-body fw-500 me-4 fs-13px">@priceFormat($new->price_old)
                                                            {{ $currency }}</del>
                                                    @endif
                                                    <ins class="text-decoration-none">@priceFormat($new->price)
                                                        {{ $currency }}</ins>
                                                </span>
                                                <h4
                                                    class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                    <a class="text-decoration-none text-reset"
                                                        href="{{ route('frontend.product', $new->slug) }}">{{ $new->name }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sale-tab-pane" role="tabpanel" tabindex="0">
                        <div class="row gy-50px">
                            @foreach ($actionProducts as $key => $action)
                                <div class="col-lg-4 col-xl-3 col-sm-6">
                                    <div class="card card-product grid-1 bg-transparent border-0">
                                        @if (count($action->files) > 0)
                                            <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                                <a href="{{ route('frontend.product', $action->slug) }}"
                                                    class="hover-zoom-in d-block" title="{{ $new->action }}">
                                                    <img src="#" title="{{ $new->slug }}"
                                                        alt="{{ $new->slug }}"
                                                        data-src="{{ $storageUrl . $action->files[0]['path'] }}"
                                                        class="img-fluid lazy-image w-100" alt="{{ $new->action }}"
                                                        width="330" height="440" />
                                                </a>
                                                @if (isset($action->action))
                                                    <div class="position-absolute product-flash z-index-2"
                                                        style="top:50px">
                                                        <span class="badge badge-product-flash on-sale bg-info">
                                                            {{ $action->action }}
                                                        </span>
                                                    </div>
                                                @endif
                                                @if (isset($action->price_old) && $action->price_old > 0)
                                                    <div class="position-absolute product-flash z-index-2">
                                                        <span class="badge badge-product-flash on-sale bg-primary">
                                                            Ušteda
                                                            {{ round(100 - ($action->price / $action->price_old) * 100) }}
                                                            %
                                                        </span>
                                                    </div>
                                                @endif
                                            </figure>
                                        @endif
                                        <div class="card-body text-center p-0">
                                            <span
                                                class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                                @if ($action->price_old)
                                                    <del class="text-body fw-500 me-4 fs-13px">@priceFormat($action->price_old)
                                                        {{ $currency }}</del>
                                                @endif
                                                <ins class="text-decoration-none">@priceFormat($action->price)
                                                    {{ $currency }}</ins>
                                            </span>
                                            <h4
                                                class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                <a class="text-decoration-none text-reset"
                                                    href="{{ route('frontend.product', $action->slug) }}">{{ $action->name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="text-center mt-11 pt-3">
                    <a href="{{ route('frontend.products') }}" class="btn btn-outline-dark">Pogledajte sve proizvode u
                        webshop-u</a>
                </div>
            </div>
        </section>
        <!-- #Featured Products -->

        <!-- Time Offer -->
        @if ($productAction)
            <section id="specia_offer_save_on_sets_1">
                <div class="container container-xxl">
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-6 mb-12 mb-lg-0">
                            @if ($productAction->image)
                                <img title="{{ $productAction->slug }}" alt="{{ $productAction->slug }}"
                                    data-src="{{ $storageUrl }}/{{ $productAction->image->path }}" alt="banner"
                                    class="img-fluid lazy-image w-100" width="705" height="620" src="#" />
                            @endif
                        </div>
                        <div class="col-xl-5 col-lg-6 offset-xl-1 ps-lg-10 pe-xl-18">
                            <p class="text-uppercase text-body-emphasis fw-semibold ls-1 d-flex align-items-center pb-2">
                                Vremenski ograničena ponuda <span
                                    class="badge bg-primary fs-15px py-3 px-5 ms-5 ls-0 fw-bold lh-12">-{{ $productAction->discount }}%</span>
                            </p>
                            <h2 class="mb-5">{{ $productAction->name }}</h2>
                            <p class="fs-18px mb-5">{{ $productAction->description }}</p>
                            <div class="d-flex countdown ms-n4 ms-md-n7" data-countdown="true"
                                data-countdown-end="{{ $productAction->ends_at }}">
                                <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                    <span class="day fw-semibold text-primary font-primary"></span>
                                </div>
                                <div class="separate fw-semibold fs-1 text-primary">:</div>
                                <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                    <span class="hour fw-semibold text-primary font-primary"></span>
                                </div>
                                <div class="separate fw-semibold fs-1 text-primary">:</div>
                                <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                    <span class="minute fw-semibold text-primary font-primary"></span>
                                </div>
                                <div class="separate fw-semibold fs-1 text-primary">:</div>
                                <div class="countdown-item text-center px-md-7 px-4 fs-1">
                                    <span class="second fw-semibold text-primary font-primary"></span>
                                </div>
                            </div>
                            <a href="{{ route('frontend.action.products', $productAction->slug) }}"
                                class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary mt-9">
                                Pogledajte ponudu
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- #Time Offer -->

        <section id="with_client_logo_4" class="" data-animated-id="3">
            <div class="container pt-lg-20 pb-lg-19 pt-15 pb-16">
                <div class="row mb-11 mb-lg-15">
                    <div class="col-lg-9 offset-lg-1 col-xl-8 offset-xl-2">
                        <div class="slick-slider main"
                            data-slick-options='{"slidesToShow": 1,"dots":false,"arrows":false, "asNavFor": "#with_client_logo_4 .thumb"}'>
                            <div class="text-center">
                                <h4 class="mb-0">"Milioni kombinacija, znači da ćete dobiti ono što želite, i to potpuno
                                    jedinstveno na tržištu."</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slick-slider thumb"
                    data-slick-options='{"slidesToShow": 6,"focusOnSelect": true,"arrows": false, "dots": false, "asNavFor": "#with_client_logo_4 .main", "responsive":[{"breakpoint":992,"settings":{"dots":true,"slidesToShow":4}},{"breakpoint":768,"settings":{"dots":true,"slidesToShow":3}},{"breakpoint":576,"settings":{"dots":true,"slidesToShow":2}}] }'>
                    <div class="client-logo-item">
                        <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#"
                            data-src="/themes/modern-2023/assets/images/client-logo/client-logo-01.png" width="150"
                            height="82" alt="goodness">
                    </div>
                    <div class="client-logo-item">
                        <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#"
                            data-src="/themes/modern-2023/assets/images/client-logo/client-logo-02.png" width="150"
                            height="82" alt="grandgolden">
                    </div>
                    <div class="client-logo-item">
                        <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#"
                            data-src="/themes/modern-2023/assets/images/client-logo/client-logo-03.png" width="150"
                            height="82" alt="parker">
                    </div>
                    <div class="client-logo-item">
                        <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#"
                            data-src="/themes/modern-2023/assets/images/client-logo/client-logo-04.png" width="150"
                            height="82" alt="thebeast">
                    </div>
                    <div class="client-logo-item">
                        <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#"
                            data-src="/themes/modern-2023/assets/images/client-logo/client-logo-05.png" width="150"
                            height="82" alt="hayden">
                    </div>
                    <div class="client-logo-item">
                        <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#"
                            data-src="/themes/modern-2023/assets/images/client-logo/client-logo-06.png" width="150"
                            height="82" alt="goodmood">
                    </div>
                    <div class="client-logo-item">
                        <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#"
                            data-src="/themes/modern-2023/assets/images/client-logo/client-logo-01.png" width="150"
                            height="82" alt="goodness">
                    </div>
                </div>
            </div>
        </section>

        <!-- Special Offer -->
        <section class="bg-section-2 overflow-hidden" id="specia_offer_beauty_inspired_by_real_life_1">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-lg-6 ps-6">
                        <div class="py-lg-23 py-16 mt-lg-3 mb-lg-5 ms-lg-auto content-wrap">
                            <div class="text-left">
                                <p class="fs-15px mb-7 ls-1 text-body-emphasis fw-semibold text-uppercase">Specijalna
                                    ponuda
                                </p>
                                <h2 class="mb-6 mw-xl-50 mw-lg-60 pt-1">NUKI pametne brave</h2>
                                <p class="fs-18px mb-0 mw-xl-60 mw-lg-75">EU standard, nemački kvalitet, sigurnost za
                                    21.vek.</p>
                            </div>
                            <a target="_blank" href="https://www.nuki.rs/proizvodi/nuki-pametna-brava-3-0-pro/"
                                class="btn btn-white mt-10 mb-2">Pogledajte
                                više</a>
                        </div>
                    </div>
                    <div class="col-lg-6 py-25 py-lg-0 position-relative">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center w-lg-half-screen">
                            <div class="lazy-bg bg-overlay position-absolute z-index-0 w-100 h-100 bg-col-lg-half-screen-right light-mode-img"
                                data-bg-src="/themes/modern-2023/assets/images/others/video-01.jpg"></div>
                            <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-0 w-100 h-100 bg-col-lg-half-screen-right"
                                data-bg-src="/themes/modern-2023/assets/images/others/video-white-01.jpg"></div>
                            <a href="https://www.youtube.com/watch?v=BF2dy0fyTeo&t=7s"
                                class="square view-video rounded-circle z-index-1 bg-body text-body-emphasis fs-2 bg-dark-hover text-light-hover"
                                style="--square-size: 115px"><svg class="icon">
                                    <use xlink:href="#icon-play-fill"></use>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #Special Offer -->

    </main>
@endsection
