@extends('frontend.themes.modern-2023.layout.layout')
@section('title', 'Prodajna Mesta')
@section('description', '')
@section('keywords', '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="mb-13 mb-lg-15 mb-xl-19">
            <div class="bg-body-secondary py-5 mb-13">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                        <li class="breadcrumb-item"><a class="text-decoration-none text-body"
                                href="{{ route('frontend.index') }}">Početna</a>
                        </li>
                        <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">
                            Prodajna mesta
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container container-xxl">
                <div class="text-center">
                    <div class="text-center">
                        <h2 class="fs-36px mb-7">Pronađite najbliže prodajno mesto</h2>
                        <p class="fs-18px mb-6 w-lg-60 w-xl-40 mx-md-13 mx-lg-auto">
                            TALARIS Engineering doo se nalazi na nekoliko lokacija u gradu, pronađite prodajno mesto koje
                            Vam najviše odgovara.
                        </p>
                    </div>
                </div>
                <div class="row mt-15 d-flex align-items-center">
                    <div class="col-md-6 mb-5">
                        <div class="row">
                            <h2 class="fs-3 mb-10 mb-md-11">TALARIS – Prodajno mesto Doro Centar</h2>
                            <div class="col-md-6 mb-11">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Adresa</h3>
                                        <div class="fs-6">
                                            <p class="mb-2 pb-4 fs-6">Savski nasip 9a – <br> 11070 Novi Beograd</p>
                                            <p class="mb-2 pb-4 fs-6">(preko puta buvlje pijace, pored autogas pumpe „Gile
                                                gas“)</p>
                                        </div>
                                        <a href="https://www.google.com/maps/d/u/0/viewer?mid=13OyN4YWFgIm5AYrYeSltuZ9NY-w&amp;femb=1&amp;ll=44.8030587%2C20.41633130000001&amp;z=17"
                                            class="text-decoration-none border-bottom border-currentColor fw-semibold fs-6">Pogledaj
                                            na mapi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-7">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Radno vreme</h3>
                                        <div class="fs-6">
                                            <dl class="d-flex mb-0">
                                                <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">Pon –
                                                    Pet:</dt>
                                                <dd class="mb-0"> 08:00 – 20:00</dd>
                                            </dl>
                                            <dl class="d-flex mb-0">
                                                <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">Subota:
                                                </dt>
                                                <dd class="mb-0"> 08:00 – 15:00</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-7">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Maloprodaja</h3>
                                        <div class="fs-6">
                                            <p class="mb-3 fs-6">tel:<span class="text-body-emphasis"><a
                                                        href="tel:+381112288100"> +381 (0)11 228 81 00</a></span></p>
                                            <p class="mb-3 fs-6">fax:<span class="text-body-emphasis"> +381 (0)11 228 81
                                                    03</span></p>
                                            <p class="mb-3 fs-6">mob:<span class="text-body-emphasis"><a
                                                        href="tel:+381652106310"> +381 (0)65 210 63 10</a></span></p>

                                            <p class="mb-0 fs-6">e-mail: dorocentar@talaris.rs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Zapratite nas</h3>
                                    </div>
                                </div>
                                <div class="socical-icon social-icon-style-1 ">
                                    <ul class="list-inline fs-18px mb-0">

                                        <li class="list-inline-item me-7"><a
                                                href="https://www.facebook.com/sigurnosnavratabeograd"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item me-7"><a
                                                href="https://www.instagram.com/talarisvrata/"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a
                                                href="https://www.youtube.com/channel/UCx5-VdBuGc3iL8KZ--vxhfQ"><i
                                                    class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="row">
                            <h2 class="fs-3 mb-10 mb-md-11">TALARIS – Prodajno mesto Doro Centar</h2>
                            <div class="col-md-6 mb-11">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Adresa</h3>
                                        <div class="fs-6">
                                            <p class="mb-2 pb-4 fs-6">Savski nasip 9a – <br> 11070 Novi Beograd</p>
                                            <p class="mb-2 pb-4 fs-6">(preko puta buvlje pijace, pored autogas pumpe „Gile
                                                gas“)</p>
                                        </div>
                                        <a href="https://www.google.com/maps/d/u/0/viewer?mid=13OyN4YWFgIm5AYrYeSltuZ9NY-w&amp;femb=1&amp;ll=44.8030587%2C20.41633130000001&amp;z=17"
                                            class="text-decoration-none border-bottom border-currentColor fw-semibold fs-6">Pogledaj
                                            na mapi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-7">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Radno vreme</h3>
                                        <div class="fs-6">
                                            <dl class="d-flex mb-0">
                                                <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">Pon –
                                                    Pet:</dt>
                                                <dd class="mb-0"> 08:00 – 16:00</dd>
                                            </dl>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-7">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Veleprodaja</h3>
                                        <div class="fs-6">
                                            <p class="mb-3 fs-6">tel:<span class="text-body-emphasis"><a
                                                        href="tel:+381112288102"> +381 (0)11 228 81 02</a></span></p>
                                            <p class="mb-3 fs-6">fax:<span class="text-body-emphasis"> +381 (0)11 228 81
                                                    03</span></p>
                                            <p class="mb-3 fs-6">mob:<span class="text-body-emphasis"><a
                                                        href="tel:+381658252747"> +381 (0)65 825 27 47</a></span></p>

                                            <p class="mb-0 fs-6">e-mail: office@talaris.rs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="row">
                            <h2 class="fs-3 mb-10 mb-md-11">TALARIS – Prodajno mesto Novi Beograd</h2>
                            <div class="col-md-6 mb-12 mb-13">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Adresa</h3>
                                        <div class="fs-6">
                                            <p class="mb-2 pb-4 fs-6">Nehruova 51 – <br> 11070 Novi Beograd</p>
                                            <p class="mb-2 pb-4 fs-6">(pored pijace i mesare „Matijević“ – BLOK 44)</p>
                                        </div>
                                        <a href="https://www.google.com/maps/d/u/0/viewer?mid=1yiT9ImCU6HtxTiajEdLgBH-wr7k&amp;femb=1&amp;ll=44.80140485909939%2C20.38164496421814&amp;z=17"
                                            class="text-decoration-none border-bottom border-currentColor fw-semibold fs-6">Pogledaj
                                            na mapi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-12 mb-13">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Radno vreme</h3>
                                        <div class="fs-6">
                                            <dl class="d-flex mb-0">
                                                <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">Pon –
                                                    Pet:</dt>
                                                <dd class="mb-0"> 09:00 – 17:00</dd>
                                            </dl>
                                            <dl class="d-flex mb-0">
                                                <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">
                                                    Subota:</dt>
                                                <dd class="mb-0"> 09:00 – 15:00</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-12 mb-md-0">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Kontakt</h3>
                                        <div class="fs-6">
                                            <p class="mb-3 fs-6">tel:<span class="text-body-emphasis"><a
                                                        href="tel:+381113188281"> +381 (0)11 318 82 81</a></span></p>
                                            <p class="mb-3 fs-6">fax:<span class="text-body-emphasis"> +381 (0)11 318 82
                                                    81</span></p>
                                            <p class="mb-3 fs-6">mob:<span class="text-body-emphasis"><a
                                                        href="tel:+381648277405"> +381 (0)64 827 74 05</a></span></p>

                                            <p class="mb-0 fs-6">e-mail: nehruova@talaris.rs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="row">
                            <h2 class="fs-3 mb-10 mb-md-11">TALARIS – Prodajno mesto Konjarnik</h2>
                            <div class="col-md-6 mb-12 mb-13">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Adresa</h3>
                                        <div class="fs-6">
                                            <p class="mb-2 pb-4 fs-6">Ustanička 244d – <br> 11050 Beograd</p>
                                            <p class="mb-2 pb-4 fs-6">(prekoputa okretnice autobusa 50)</p>
                                        </div>
                                        <a href="https://www.google.com/maps/d/u/0/viewer?mid=1_3Pw-s3DUtuCHeN8epzv9aAaCnw&amp;femb=1&amp;ll=44.78359799999999%2C20.517155499999994&amp;z=17"
                                            class="text-decoration-none border-bottom border-currentColor fw-semibold fs-6">Pogledaj
                                            na mapi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-12 mb-13">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Radno vreme</h3>
                                        <div class="fs-6">
                                            <dl class="d-flex mb-0">
                                                <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">Pon –
                                                    Pet:</dt>
                                                <dd class="mb-0"> 09:00 – 16:00</dd>
                                            </dl>
                                            <dl class="d-flex mb-0">
                                                <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">
                                                    Subota:</dt>
                                                <dd class="mb-0"> 09:00 – 13:00</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-12 mb-md-0">
                                <div class="d-flex align-items-start">
                                    <div class="d-none">
                                        <svg class="icon fs-2">
                                            <use xlink:href="#"></use>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="fs-5 mb-6">Kontakt</h3>
                                        <div class="fs-6">
                                            <p class="mb-3 fs-6">tel:<span class="text-body-emphasis"><a
                                                        href="tel:+381113476900"> +381 (0)11 347 69 00</a></span></p>
                                            <p class="mb-3 fs-6">fax:<span class="text-body-emphasis"> +381 (0)11 347 69
                                                    00</span></p>


                                            <p class="mb-0 fs-6">e-mail: ustanicka@talaris.rs</p>
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
