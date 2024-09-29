@extends('frontend.themes.medical.layout.layout')
@section('content')
    <div class="bg-primary">
        <header class="bg-primary py-5 inner-header">
            <div class="container py-4 px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="fw-bold text-white">Kompletan cenovnik usluga</h1>
                            <p class="lead fw-normal text-white-50 mb-0">Kompletna zdravstvena usluga na jednom mestu, sa 20
                                posto popusta i u oktobru</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-xl-8">
                    <!-- Service Prices -->
                    @foreach ($services as $service)
                        <div class="accordion mb-2" id="accordionExample">
                            <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                                <h3 class="accordion-header" id="heading-{{ $service->id }}"><button
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $service->id }}" aria-expanded="false"
                                        aria-controls="collapse-{{ $service->id }}">{{ $service->name }}
                                        cenovnik</button></h3>
                                <div class="accordion-collapse collapse" id="collapse-{{ $service->id }}"
                                    aria-labelledby="heading-{{ $service->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach ($service->items as $item)
                                            <div class="p-2 d-flex justify-content-between align-items-center">
                                                <span><i class="bi bi-check text-primary"></i>
                                                    {{ $item->name }}</span>

                                                @if ($item->price && $item->price != '')
                                                    <span class="fw-bold">{{ $item->price }} RSD</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-xl-4">
                    <div class="sidebar-fixed">
                        @foreach ($randomServices as $service)
                            <div class="card border-0 bg-white shadow-sm mt-xl-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="position-relative">
                                            <div class="bg-white shadow-sm overflow-hidden rounded-3">
                                                @if ($service->image)
                                                    <img class="card-img-top"
                                                        src="{{ $storageUrl }}{{ $service->image->path }}"
                                                        alt="{{ $service->name }}">
                                                @endif
                                                <div class="p-4">
                                                    <div class="mb-3">
                                                        <h5 class="fw-bold mb-1">{{ $service->name }}</h5>
                                                        <p class="fw-light mb-0 text-primary small">
                                                            Dijagnostika, prevencija i lečenje ženskog
                                                            reproduktivnog sistema
                                                        </p>
                                                    </div>
                                                    <p class="text-muted fw-light mb-0">
                                                        {{ $service->title }}
                                                    </p> <br><a href="{{ route('frontend.service', $service->slug) }}"
                                                        class="btn btn-warning text-uppercase fw-bold">Saznajte više</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="py-5 bg-warning">
        <div class="container px-5 my-5 text-center">
            <h2 class="display-5 fw-bolder text-black mb-1">Zakažite Vaš pregled</h2>
            <p class="mb-5 fs-5">U par klikova zakažite Vaš pregled ili nas pozovite tokom radnog vremena na <a
                    href="tel:+381605558888"><b>(060) 555 88 88</b></a></p>
            <a class="btn btn-outline-dark fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase"
                href="{{ route('frontend.appointment') }}">Zakažite pregled</a>
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

    <!-- Latest Posts Section-->
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
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow-sm rounded-3 border-0">
                            @if ($lPost->image)
                                <img class="card-img-top" src="{{ $storageUrl }}{{ $lPost->image->path }}"
                                    alt="{{ $lPost->title }}">
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
                                    {{ $lPost->excerpt }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="py-5 bg-primary">
        <div class="container px-5 my-4">
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
                            href="{{ route('frontend.appointment') }}"> Zakažite pregled </a>
                        <a class="btn btn-outline-light fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase"
                            href="tel:+381605558888"> <i class="bi bi-telephone"></i> 060 555 88 88 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
