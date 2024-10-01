@extends('frontend.themes.medical.layout.layout')
@section('title', 'Naši lekari | Poliklinika Vinča')
@section('description', '')
@section('keywords', '')
@section('content')
    <div class="bg-primary">
        <header class="bg-primary py-5 inner-header">
            <div class="container py-4 px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="fw-bold text-white">Naši lekari</h1>
                            <p class="lead fw-normal text-white-50 mb-0">Upoznajte uigran tim Poliklinike Vinča</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 mt-5">
            <div class="row gx-5">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-4">
                        <div class="position-relative mb-5">
                            <div class="bg-white shadow-sm p-4 rounded-3">
                                <div class="d-flex mb-3 align-items-center">
                                    @if ($doctor->image)
                                        <img class="img-fluid rounded-circle" style="width: 150px;height:150px"
                                            src="{{ $storageUrl }}{{ $doctor->image->path }}" alt="{{ $doctor->name }}">
                                    @endif

                                    <div class="ms-3">
                                        <h5 class="fw-bold mb-1">{{ $doctor->name }} <i
                                                class="bi bi-patch-check-fill small text-primary"></i></h5>
                                        <p class="fw-light mb-0 text-muted small">{{ $doctor->area }}</p>
                                    </div>
                                </div>
                                <p class="text-muted fw-light mb-4"></p>
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('frontend.appointment') }}"
                                        class="btn btn-outline-primary stretched-link">
                                        Zakazivanje</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Appointment -->
    <section class="py-5 bg-warning">
        <div class="container px-5 my-5 text-center">
            <h2 class="display-5 fw-bolder text-black mb-1">Zakažite Vaš pregled</h2>
            <p class="mb-5 fs-5">U par klikova zakažite Vaš pregled ili nas pozovite tokom radnog vremena na <a
                    href="tel:+381605558888"><b>(060) 555 88 88</b></a></p>
            <a class="btn btn-outline-dark fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase"
                href="{{ route('frontend.appointment') }}">Zakažite
                pregled</a>
        </div>
    </section>

    <!-- Testimonials -->
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

    <!-- Latest Posts -->
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
                                    {!! $lPost->excerpt !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Appointment -->
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
