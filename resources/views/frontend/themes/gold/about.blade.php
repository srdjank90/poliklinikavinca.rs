@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | O nama')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('robots', 'noindex,nofollow')
@section('content')

    <!-- Breadcrumbs With Background -->
    <div class="container-fluid"
        style="background: url('/themes/gold/assets/img/o-nama.webp') no-repeat scroll center center/cover">
        <div class="row align-items-center">
            <div class="col-12 pb-5">
                <div class="banner_text text-white">
                    <a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> / O nama
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs With Background -->

    <div class="text-center mt-5">
        <h1>O nama</h1>
    </div>

    <!-- Services Img -->
    <div class="services_gallery py-5">
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
                        <h2>NAŠE USLUGE</h2>
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
                        <h1 class="">Zlatni Standard</h1>
                        <p style="font-size: 22px" class="">
                            <b>Ime društva:</b> Zlatni Standard d.o.o. Beograd
                            <br><b>Datum osnivanja:</b> 7. februar 2020. godine
                            <br><b>Matični broj:</b> 21554723
                            <br><b>Poreski identifikacioni broj:</b> 111859731
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Services Section-->

    <!-- Video Section -->
    <div class="video-section py-5" style="background-color: #3c2415">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="text-white text-center mb-3">Zlatni Standard - 12. jul 2023. godine - Crowne Plaza: Panel
                        "Koje su alternative za investitore"</h3>
                    <iframe class="about-video" loading="lazy" width="560" height="315"
                        src="https://www.youtube.com/embed/fJJ8Xr9Vchw" title="YouTube video player" frameborder="0"
                        allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- #Video Section -->

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
    <script></script>
@endsection
