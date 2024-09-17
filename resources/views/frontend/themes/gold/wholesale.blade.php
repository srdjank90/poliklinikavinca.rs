@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Veleprodaja zlata')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')

    <!-- Breadcrumbs With Background -->
    <div class="container-fluid"
        style="background: url('/themes/gold/assets/img/veleprodaja-zlata.webp') no-repeat scroll center center/cover">
        <div class="row align-items-center">
            <div class="col-12 pb-5">
                <div class="banner_text text-white">
                    <a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> / Veleprodaja zlata
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs With Background -->

    <div class="text-center mt-5">
        <h1>Veleprodaja zlata</h1>
    </div>

    <div class="services_gallery mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_services">
                        <div class="services_thumb">
                            <img src="/themes/gold/assets/img/service/zlatni-standard1.jpg" alt="">
                        </div>
                        <div class="services_content">
                            <h3>IZUZETNA REPUTACIJA</h3>
                            <p>Naši osnivači imaju izuzetnu domaću i internacionalnu profesionalnu reputaciju</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_services">
                        <div class="services_thumb">
                            <img src="/themes/gold/assets/img/service/zlatni-standard2.jpg" alt="">
                        </div>
                        <div class="services_content">
                            <h3>PRVI U SRBIJI</h3>
                            <p>Naši osnivači prvi pionirski krenuli sa ovim poslom i otvorili tržište u Srbiji još 2013.
                                godine </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_services">
                        <div class="services_thumb">
                            <img src="/themes/gold/assets/img/service/zlatni-standard3.jpg" alt="">
                        </div>
                        <div class="services_content">
                            <h3>ZLATO BEZ PDV-a</h3>
                            <p>Naši osnivači inicirali i istrajno se izborili za ukidanje PDV-a na investiciono zlato u
                                Srbiji</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Services Img -->

    <!-- Our Services -->
    <div class="our_services py-5" style="background-color: #fdf7e7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="services_title">
                        <h2>ZAŠTO DA KUPOPRODAJU INVESTICIONOG ZLATA RADITE SA ZLATNIM STANDARDOM?</h2>
                        <p>Nudimo kontinuitet u snabdevanju i legalno uvezenu robu sa opcijom avansne kupovine i najboljim
                            otkupnim cenama za zlato, koristeći najnoviju tehnologiju za analizu metala.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="services_item">
                        <div class="services_icone">
                            <i class="fa fa-cog"></i>
                        </div>
                        <div class="services_desc">
                            <h3>UVEK NA STANJU</h3>
                            <p>Imamo kontinuitet u snabdevanju i raspoloživu robu na zalihama</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="services_item">
                        <div class="services_icone">
                            <i class="fa fa-umbrella"></i>
                        </div>
                        <div class="services_desc">
                            <h3>NAJBOLJI USLOVI</h3>

                            <p>Nudimo opciju avansne kupovine i nabavke koja je još povoljnija za kupca</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="services_item">
                        <div class="services_icone">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="services_desc">
                            <h3>DIREKTNO OD PROIZVOĐAČA</h3>
                            <p>Naša roba uvezena legalno sa svim zakonom propisanim dozvolama, uz završen carinski postupak
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="services_item">
                        <div class="services_icone">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        </div>
                        <div class="services_desc">
                            <h3>NAJBOLJE OTKUPNE CENE</h3>
                            <p>Nudimo najbolje otkupne cene zlata, uz upotrebu najnovije tehnologije za analizu dragocenih
                                metala (Vanta™ GX)</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- #Our Services -->

    <!-- Services Section-->
    <div class="unlimited_services py-5" style="background: #f6e9d1;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="services_section_thumb">
                        <img src="/themes/gold/assets/img/service/zlatni-standard4.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="unlimited_services_content">
                        <h2>Veleprodaja zlata</h2>
                        <p>
                            <b>Konkurentne veleprodajne cene</b>
                            <br><b>Širok asortiman proizvoda</b>
                            <br><b>Online platforma za narudžbine</b>
                            <br><b>Završavanje dokumentacije za uvozne/izvozne procese</b>
                            <br><b>Account Manager dostupan 0-24h</b>
                            <br><br><b><a href="tel:+381 63 7709 128">+381 63 7709 128</a></b><br>
                            <br><b><a href="mailto:veleprodaja@zlatnistandard.rs">veleprodaja@zlatnistandard.rs</a></b>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Services Section-->

    <!-- Choose Us Section -->
    <div class="choseus_area py-5" style="background-color: #fdf7e7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chose_title">
                        <h2>PROCES KUPOPRODAJE</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="shipping_icone icone_1">

                        </div>
                        <div class="chose_content">
                            <h3>REGISTRACIJA KUPCA</h3>
                            <p>Prijavite Vaše preduzeće za saradnju sa Zlatnim Standardom putem formulara na ovoj stranici
                                ili slanjem upita na veleprodaja@zlatnistandard.rs kako biste ostvarili mogućnost
                                naručivanja proizvoda po veleprodajnim cenama.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="shipping_icone icone_2">

                        </div>
                        <div class="chose_content">
                            <h3>POTPISIVANJE UGOVORA</h3>
                            <p>Nakon uspešne registracije, odobravamo status veleprodajnog kupca, izrađujemo račun kupca na
                                online platformi za narudžbine i stupamo u kontakt s kupcem radi potpisivanja ugovora.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="shipping_icone icone_3">

                        </div>
                        <div class="chose_content">
                            <h3>KUPOPRODAJA</h3>
                            <p>Registrovani i odobreni kupac s potpisanim ugovorom može kupovinu po veleprodajnim cenama
                                obaviti preko online platforme za narudžbine ili direktnom narudžbinom preko e-maila ili
                                telefona.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-md-7 col-lg-7 d-flex align-items-center flex-column">
                    <div class="contact_message">
                        <div class="text-center">
                            <h2>POPUNITE FORMULAR</h2>
                            <h3> I POSTANITE NAŠ PARTNER</h3>
                            <p class="text-center">
                                Ostavite vaše podatke, i mi ćemo vas kontaktirati u najbržem vremenskom roku
                                kako bismo što pre
                                uspostavili partnerski odnos</p>
                        </div>

                        <form id="wholesaleForm" method="POST" action="{{ route('frontend.wholesale.send') }}">
                            @csrf
                            <div class="mb-2">
                                <label>Naziv kompanije/biznisa ili ime i prezime (obavezno)</label>
                                <input name="name" required type="text" required>
                            </div>
                            <div class="mb-2">
                                <label>Adresa (obavezno)</label>
                                <input name="address" type="text" required>
                            </div>
                            <div class="mb-2">
                                <label>Email (obavezno)</label>
                                <input name="email" required type="email">
                            </div>
                            <div class="mb-2">
                                <label>Telefon (obavezno)</label>
                                <input name="phone" required type="text">
                            </div>
                            <div class="mb-2">
                                <label>Kontakt osoba (obavezno)</label>
                                <input name="person" required type="text">
                            </div>
                            <div class="contact_textarea">
                                <label>Pošaljite nam detaljniju poruku (obavezno)</label>
                                <textarea name="message" required class="form-control"></textarea>
                            </div>
                            <button type="submit"><i class="fa fa-refresh fa-spin me-2 send-loading d-none"></i>
                                Pošaljite zahtev</button>
                            <div id="responseMessage" class="d-flex justify-content-center mt-3"> </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Posts -->
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h5>SVE ŠTO JE POTREBNO DA ZNAŠ O</h5>
                <h3>KUPOVINI INVESTICIONOG ZLATA</h3>
            </div>
            @foreach ($footerPosts as $post)
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            @if ($post->image)
                                <img style="border-radius: 4px" src="{{ $storageUrl }}{{ $post->image->path }}"
                                    alt="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="blog_content">
                            <h3><a href="{{ route('frontend.post', $post->slug) }}">{{ $post->title }}</a></h3>
                            <div class="post_desc">
                                {!! $post->excerpt !!}
                            </div>
                            <div class="read_more">
                                <a href="{{ route('frontend.post', $post->slug) }}">Detaljnije</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
@section('scripts')
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#wholesaleForm').submit(function(event) {
                event.preventDefault();
                $('.send-loading').removeClass('d-none')
                $('.send-loading').attr('disabled', true)
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessage').text(response.message);
                        $('#wholesaleForm')[0].reset();
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

@endsection
