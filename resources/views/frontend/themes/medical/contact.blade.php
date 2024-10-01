@extends('frontend.themes.medical.layout.layout')
@section('title', 'Kontakt  | Poliklinika Vinča')
@section('description', '')
@section('keywords', '')
@section('content')
    <!-- Page content-->
    <div class="py-5">
        <!-- Login -->
        <div class="container px-5 py-5 login">
            <!-- Login -->
            <div class="row align-items-center gx-5">
                <div class="col-lg-6">
                    <h1 class="text-black display-4 fw-bold">Budimo u kontaktu</h1>
                    <p class="fs-6 mb-0 text-dark-50">Zakazujemo Vam pregled kod naših lekara u najkraćem mogućem roku.</p>
                    <div class="row gx-5 row-cols-2 row-cols-lg-2 pt-5">
                        <div class="col my-3">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-chat-dots"></i></div>
                            <div class="h5 mb-2"><a href="{{ route('frontend.appointment') }}">Zakažite Vaš pregled</a>
                            </div>
                            <p class="text-muted mb-0">U par klikova zakažite Vaš pregled.</p>
                        </div>
                        <div class="col my-3">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-people"></i></div>
                            <div class="h5"><a href="tel:+381607808788">Informacije i uzorkovanje</a></div>
                            <p class="text-muted mb-0">Pozovite našu laboratoriju tokom radnog vremena na (060) 78 08 788.
                            </p>
                        </div>
                        <div class="col my-3">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-geo-alt"></i></div>
                            <div class="h5"><a
                                    href="https://www.google.com/maps/dir//%D0%9F%D1%80%D0%BE%D1%84%D0%B5%D1%81%D0%BE%D1%80%D0%B0+%D0%92%D0%B0%D1%81%D0%B8%D1%9B%D0%B0+24,+%D0%92%D0%B8%D0%BD%D1%87%D0%B0+11351/@44.7465637,20.5187105,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x475a775655265b17:0xd4c5b3b13f6cebe3!2m2!1d20.6011111!2d44.7465933?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D"
                                    target="_blank">Naša lokacija</a></div>
                            <p class="text-muted mb-0">Profesora Vasića 24, 11351 Vinča, Srbija.</p>
                        </div>
                        <div class="col my-3">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-telephone"></i></div>
                            <div class="h5"><a href="tel:+381605558888">Pozovite nas</a></div>
                            <p class="text-muted mb-0">Pozovite nas tokom radnog vremena na (060) 555 88 88.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white shadow-sm p-5 rounded-3">
                        <h3 class="fw-bold text-black mb-2">Pošaljite nam poruku</h3>
                        <p class="text-muted fw-light">Imate sugestiju, pitanje, pohvalu ili jednostavno želite da zakažete
                            pregled.</p>
                        <form id="contactForm" method="POST" action="{{ route('frontend.contact.send') }}"
                            class="text-start pt-3">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-12 pe-2">
                                    <label for="exampleInputFirst" class="form-label small text-muted">Ime <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="name" class="form-control" id="exampleInputFirst"
                                        placeholder="Upišite ime">
                                </div>
                                <div class="mb-3 col-6 ps-2 d-none">
                                    <label for="exampleInputLast" class="form-label small text-muted">Prezime</label>
                                    <input type="text" class="form-control" id="exampleInputLast"
                                        placeholder="Upišite prezime">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6 pe-2">
                                    <label class="form-label small text-muted">Telefon <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Upišite broj telefona">
                                </div>
                                <div class="mb-3 col-6 ps-2">
                                    <label class="form-label small text-muted">E-mail adresa <small
                                            class="text-danger">*</small></label>
                                    <input type="email" name="email" class="form-control" placeholder="Upišite E-mail">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted">Poruka <small
                                        class="text-danger">*</small></label>
                                <textarea name="message" class="form-control hight-auto" placeholder="Ovde upišite vašu poruku..." rows="4"
                                    data-sb-validations="required"></textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-warning fw-bold fs-7 rounded-3 w-100 border-0 px-4 py-3 text-uppercase">
                                <i class="fa fa-refresh fa-spin me-2 send-loading d-none"></i>
                                Pošaljite
                            </button>
                            <div id="responseMessage" class="d-flex justify-content-center mt-3"> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
                            href="{{ route('frontend.appointment') }}"> Zakažite pregled </a>
                        <a class="btn btn-outline-light fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase"
                            href="tel:+381605558888"> <i class="bi bi-telephone"></i> 060 555 88 88 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#contactForm').submit(function(event) {
                console.log('OVDE SAM!')
                event.preventDefault();
                $('.send-loading').removeClass('d-none')
                $('.send-loading').attr('disabled', true)
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessage').text(response.message);
                        $('#contactForm')[0].reset();
                        $('.send-loading').addClass('d-none')
                        $('.send-loading').attr('disabled', false)
                    },
                    error: function(xhr, status, error) {
                        $('#responseMessage').text('Proverite unete podatke!');
                        $('.send-loading').addClass('d-none')
                        $('.send-loading').attr('disabled', false)
                    }
                });
            });
        });
    </script>
@endsection
