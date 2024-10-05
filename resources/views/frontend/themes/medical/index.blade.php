@extends('frontend.themes.medical.layout.layout')
@section('title', isset($seoIndex['setting_seo_title_opt']) ? $seoIndex['setting_seo_title_opt'] : '')
@section('description', isset($seoIndex['setting_seo_description_opt']) ? $seoIndex['setting_seo_description_opt'] : '')
@section('keywords', isset($seoIndex['setting_seo_keywords_opt']) ? $seoIndex['setting_seo_keywords_opt'] : '')
@section('content')
    <div class="bg-primary">
        <!-- Header-->
        <header class="bg-primary pt-0">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start py-5">
                            <h1 class="display-5 fw-bolder text-white mb-4">Poliklinika Vinča. <span
                                    class="fw-bold text-warning">Poliklinika budućnosti</span> vaš najbliži put do zdravlja!
                            </h1>
                            <p class="lead fw-light text-white-50 mb-4">Kompletna zdravstvena usluga na jednom mestu, u
                                saradnji i sa Vašim zdravstvenim osiguranjem.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-light fw-bold text-primary fs-7 rounded-3 px-4 py-3 text-uppercase me-sm-1"
                                    href="{{ route('frontend.pricing') }}"> Pogledajte cenovnik </a>
                                <a class="btn btn-outline-light fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase"
                                    href="{{ route('frontend.appointment') }}"> Zakažite pregled </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid"
                            src="/themes/medical/assets/img/banner.webp" loading="lazy" alt="..." /></div>
                </div>
            </div>
        </header>
    </div>

    <!-- Features section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0 pe-lg-5">
                    <p class="text-uppercase text-primary mb-2">NAŠA USLUGA</p>
                    <h2 class="fw-bold mb-3 text-black">Poliklinika budućnosti u vašem komšiluku</h2>
                    <p class="text-muted">Uz najsavremeniju opremu, vrhunski stručnjaci iz svojih medicinskih oblasti, koji
                        će stečeno znanje i iskustvo u višegodišnjem radu u našim i stranim prestižnim ustanovama, koristiti
                        u lečenju.</p>
                    <a class="btn btn-warning fw-bold fs-7 rounded-3 border-0 px-4 py-3 text-uppercase"
                        href="{{ route('frontend.services') }}">Pogledajte sve usluge</a>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-ui-checks-grid"></i></div>
                            <h2 class="h5">{{ $popularServices[0]->name }}</h2>
                            <p class="mb-0">{{ $popularServices[0]->title }}</p>
                            <a href="{{ route('frontend.service', $popularServices[0]->slug) }}"
                                class="btn btn-warning text-uppercase fw-bold">Saznajte više</a>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-rainbow"></i></div>
                            <h2 class="h5">{{ $popularServices[1]->name }}</h2>
                            <p class="mb-0">{{ $popularServices[1]->title }}</p>
                            <a href="{{ route('frontend.service', $popularServices[1]->slug) }}"
                                class="btn btn-warning text-uppercase fw-bold">Saznajte više</a>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-brilliance"></i></div>
                            <h2 class="h5">{{ $popularServices[2]->name }}</h2>
                            <p class="mb-0">{{ $popularServices[2]->title }}</p>
                            <a href="{{ route('frontend.service', $popularServices[2]->slug) }}"
                                class="btn btn-warning text-uppercase fw-bold">Saznajte više</a>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-heart-pulse-fill"></i></div>
                            <h2 class="h5">{{ $popularServices[3]->name }}</h2>
                            <p class="mb-0">{{ $popularServices[3]->title }}</p>
                            <a href="{{ route('frontend.service', $popularServices[2]->slug) }}"
                                class="btn btn-warning text-uppercase fw-bold">Saznajte više</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Testimonial section-->
    <section class="py-5 bg-white">
        <div class="container px-5 mt-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center mb-5">
                        <p class="text-uppercase text-primary mb-2">SVEDOČENJA</p>
                        <h2 class="fw-bold mb-3 text-black">Šta naši pacijenti kažu o našim uslugama</h2>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-lg-4">
                    <div class="text-left mb-5">
                        <span class="text-warning fs-6">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </span>
                        <p class="fs-5 mb-4 mt-2 fw-light text-primary">"Doktor Кajtazi, stara škola cenjenih lekara sa
                            temeljnom primenom savremenih znanja medicine. Bravo za polikliniku. Divan i uigran tim u
                            laboratoriji i na recepciji."</p>
                        <h6 class="fw-bold mb-1">Gojko Nicić</h6>
                        <p class="fw-light mb-0 text-muted">Beograd, Srbija</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-left mb-5">
                        <span class="text-warning fs-6">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </span>
                        <p class="fs-5 mb-4 mt-2 fw-light text-primary">"Pedijatrija je savremeno opremljena. Medicinske
                            sestre su veoma ljubazne i imaju divan pristup detetu. Doktor je takođe bio divan i detaljno je
                            pregledao dete. Sve je zaista vrhunsko!"</p>
                        <h6 class="fw-bold mb-1">Aleksandra Lalević</h6>
                        <p class="fw-light mb-0 text-muted">Vinča, Srbija</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-left mb-5">
                        <span class="text-warning fs-6">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </span>
                        <p class="fs-5 mb-4 mt-2 fw-light text-primary">"Odlična lokacija, sa mnogo parking mesta. Osoblje
                            veoma profesionalno, klinika najsavremenije opremljena. Sve pohvale... 10+!"</p>
                        <h6 class="fw-bold mb-1">Mira Stevanović</h6>
                        <p class="fw-light mb-0 text-muted">Smederevo, Srbija</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5 mt-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center mb-5">
                        <p class="text-uppercase text-primary mb-2">SAVETI STRUČNJAKA</p>
                        <h2 class="fw-bold mb-3 text-black">Poslednje novosti i stručni tekstovi iz sveta medicine</h2>
                        <p class="text-muted">Budite u toku sa najnovijim vestima i stručnim tekstovima iz sveta medicine!
                            🩺 Saznajte više o najnovijim otkrićima i savetima za vaše zdravlje.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                @foreach ($latestPosts as $lPost)
                    <!-- Post Items -->
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow-sm rounded-3 border-0">
                            @if ($lPost->image)
                                <img class="card-img-top" loading="lazy"
                                    src="{{ $storageUrl }}{{ $lPost->image->path }}" alt="{{ $lPost->title }}">
                            @endif
                            <div class="card-body p-4">
                                @foreach ($lPost->categories as $lpCategory)
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $lpCategory->name }}
                                    </div>
                                @endforeach

                                <a class="text-decoration-none link-dark stretched-link"
                                    href="{{ route('frontend.post', $lPost->slug) }}">
                                    <h5 class="card-title mb-3 lh-base">
                                        {{ $lPost->title }}
                                    </h5>
                                </a>
                                <p class="card-text mb-0">
                                    {!! $lPost->excerpt !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-5 bg-primary">
        <div class="container px-5 my-4">
            <!-- Call to action-->
            <div
                class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                <div class="mb-4 mb-xl-0">
                    <h2 class="fs-1 mb-1 fw-bold text-white"><b>Zakažite</b> Vaš pregled!</h2>
                    <p class="text-white-50">U par klikova zakažite Vaš pregled ili nas pozovite tokom radnog vremena na
                        (060) 555 88 88.</p>
                </div>
                <div class="ms-xl-4">
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-light fw-bold text-primary fs-7 rounded-3 px-4 py-3 text-uppercase me-sm-1"
                            href="{{ route('frontend.contact') }}"> Zakažite pregled </a>
                        <a class="btn btn-outline-light fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase"
                            href="tel:+381605558888"> <i class="bi bi-telephone"></i> 060 555 88 88 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
