@extends('frontend.themes.modern-2023.layout.layout')
@section('title', 'Servis')
@section('description', '')
@section('keywords', '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="pb-14 py-lg-18" data-animated-id="1">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border-0 hover-zoom-in">
                            <div class="image-box-4">
                                <img class="img-fluid loaded"
                                    src="/themes/modern-2023/assets/images/background/bg-about-01.jpg"
                                    data-src="./assets/images/background/bg-about-01.jpg" width="960" height="640"
                                    alt="" loading="lazy" data-ll-status="loaded">
                            </div>
                            <div class="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 px-xxl-18 mt-12 mt-lg-0">
                        <h2 class="mb-8">SLUŽBA HITNIH INTERVENCIJA 24 sata, 7 dana u nedelji</h2>
                        <p>Hitne intervencije se izvode preko spoljnih saradnika. Svaki dolazak van garantnog roka kao i
                            neopravdane reklamacije se naplaćuju.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>

                                        <div class="fs-6">
                                            <p class="mb-6 fs-15px">U slučaju hitnih intervencija van radnog vremena
                                                pozovite:</p>
                                            <p class="m-0 fs-6 fw-bold text-primary"><a href="tel:+381646139277">Tel: +381
                                                    64 613 92 77</a></p>
                                            <p class="m-0 fs-6 fw-bold text-primary"><a href="tel:+381637110011">Tel: +381
                                                    63 711 00 11</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
