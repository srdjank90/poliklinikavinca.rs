@extends('frontend.themes.modern-2023.layout.layout')
@section('title', 'Kontakt')
@section('description', '')
@section('keywords', '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section>
            <div class="bg-body-secondary py-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                        <li class="breadcrumb-item"><a class="text-decoration-none text-body"
                                href="{{ route('frontend.index') }}">Početna</a>
                        </li>
                        <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">Kontaktirajte
                            nas
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="text-center pt-13 mb-13 mb-lg-15">
                    <div class="text-center">
                        <h2 class="fs-36px mb-7">Kontaktirajte nas</h2>
                        <p class="fs-18px mb-0 w-lg-60 w-xl-50 mx-md-13 mx-lg-auto">
                            Stojimo Vam na raspolaganju za sva dodatna pitanja, objašnjenja, kao i porudžbine. Kontaktirajte
                            nas putem telefona, email-a ili kontakt forme.
                        </p>
                    </div>
                </div>
                <div id="map" class="mapbox-gl map-point-animate map-box-has-effect d-none" style="height:530px"
                    data-mapbox-access-token="pk.eyJ1IjoiZzVvbmxpbmUiLCJhIjoiY2t1bWY4NzBiMWNycDMzbzZwMnI5ZThpaiJ9.ZifefVtp4anluFUbAMxAXg"
                    data-mapbox-options="{&#34;center&#34;:[-106.53671888774004,35.12362056187368],&#34;setLngLat&#34;:[-106.53671888774004,35.12362056187368],&#34;style&#34;:&#34;mapbox://styles/mapbox/light-v10&#34;,&#34;zoom&#34;:5}"
                    data-mapbox-marker="[{&#34;backgroundImage&#34;:&#34;/assets/images/others/marker.png&#34;,&#34;backgroundRepeat&#34;:&#34;no-repeat&#34;,&#34;className&#34;:&#34;marker&#34;,&#34;height&#34;:&#34;70px&#34;,&#34;position&#34;:[-102.53671888774004,38.12362056187368],&#34;width&#34;:&#34;70px&#34;},{&#34;backgroundImage&#34;:&#34;/assets/images/others/marker.png&#34;,&#34;backgroundRepeat&#34;:&#34;no-repeat&#34;,&#34;className&#34;:&#34;marker&#34;,&#34;height&#34;:&#34;70px&#34;,&#34;position&#34;:[-109.03671888774004,33.02362056187368],&#34;width&#34;:&#34;70px&#34;}]">
                </div>
            </div>
        </section>
        <section class="py-15 py-lg-18">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="mb-11 fs-3">Pošaljite nam poruku</h2>
                        <form class="contact-form" method="post" action="#">
                            <div class="row mb-8 mb-md-10">
                                <div class="col-md-6 col-12 mb-8 mb-md-0">
                                    <input type="text" class="form-control input-focus" placeholder="ime">
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="email" class="form-control input-focus" placeholder="e-mail">
                                </div>
                            </div>
                            <textarea class="form-control mb-6 input-focus" placeholder="poruka" rows="7"></textarea>

                            <button type="submit"
                                class=" btn btn-dark btn-hover-bg-primary btn-hover-border-primary px-11">Pošalji</button>
                        </form>
                    </div>
                    <div class="col-lg-5 ps-lg-18 ps-xl-21 mt-13 mt-lg-0">
                        <div class="d-flex align-items-start mb-11 me-15">
                            <div class="d-none">
                                <svg class="icon fs-2">
                                    <use xlink:href="#"></use>
                                </svg>
                            </div>
                            <div>
                                <h3 class="fs-5 mb-6">TALARIS Engineering d.o.o.</h3>
                                <div class="fs-6">
                                    <p class="mb-5 fs-6">ulica Savski Nasip 9a -<br> 11070 Novi Beograd</p>

                                </div>
                                <a href="https://www.google.com/maps/d/u/0/viewer?mid=13OyN4YWFgIm5AYrYeSltuZ9NY-w&amp;femb=1&amp;ll=44.8030587%2C20.41633130000001&amp;z=17"
                                    class="text-decoration-none border-bottom border-currentColor fw-semibold fs-6">Pogledaj
                                    na mapi</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="d-none">
                                <svg class="icon fs-2">
                                    <use xlink:href="#"></use>
                                </svg>
                            </div>
                            <div>
                                <h3 class="fs-5 mb-6">Kontakt</h3>
                                <div class="fs-6">
                                    <p class="mb-3 fs-6">tel:<span class="text-body-emphasis"> +381 (0)11 228 81 02</span>
                                    </p>
                                    <p class="mb-3 fs-6">tel:<span class="text-body-emphasis"> +381 (0)11 313 99 70</span>
                                    </p>
                                    <p class="mb-3 fs-6">mob:<span class="text-body-emphasis"> +381 (0)65 825 27 47</span>
                                    </p>
                                    <p class="mb-3 fs-6">mob:<span class="text-body-emphasis"> +381 (0)65 239 35 57</span>
                                    </p>
                                    <p class="mb-0 fs-6">e-mail: office@talaris.rs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
