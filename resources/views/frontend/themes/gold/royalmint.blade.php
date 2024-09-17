@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Royal mint')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')

    <!-- Breadcrumbs With Background -->
    <div class="container-fluid"
        style="background: url('/themes/gold/assets/img/royal-mint.webp') no-repeat scroll center center/cover">
        <div class="row align-items-center">
            <div class="col-12 pb-5">
                <div class="banner_text text-white">
                    <a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> / The Royal Mint - official partner
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs With Background -->

    <div class="text-center mt-5">
        <h1>The Royal Mint - official partner</h1>
    </div>

    <!-- About Section -->
    <div class="about_section mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="about_thumb d-none d-md-block">
                        <img src="/themes/gold/assets/img/rm-desktop.webp" alt="">
                    </div>
                    <div class="about_thumb d-block d-md-none">
                        <img src="/themes/gold/assets/img/rm-mobile.webp" alt="">
                    </div>
                    <div class="wrapper d-flex justify-content-center align-items-center mb-4">
                        <video width="800px" style="margin-top: -60px" autoplay="" muted="" playsinline=""
                            loop="" data-wf-ignore="true" data-object-fit="cover">
                            <source src="https://investiciono-zlato.rs//media/video/britannia.mp4" type="video/mp4"
                                data-wf-ignore="true">
                        </video>
                    </div>


                    <div class="about_content">
                        <h2>The Royal Mint i Zlatni Standard: Partnerstvo u Srbiji u poslovima sa investicionim zlatom</h2>
                        <p>Kompanija Zlatni Standard, trgovac investicionim zlatom sa sedištem u Beogradu, je nedavno
                            proširila svoj uticaj na srpskom i regionalnom tržištu investicionog zlata, kroz partnerstvo sa
                            kompanijom The Royal Mint, svetski priznatoj kovnici sa dugom istorijom. Ovaj potez odražava
                            rastući značaj investicionog zlata i plemenitih metala na srpskom i regionalnom tržištu, kao i
                            apetite klijenata za investicionim formatima vrhunskog kvaliteta i najvišim likvidnosnim
                            profilom na globalnom tržištu dragocenih metala.</p>
                        <span>The Royal Mint je institucija koja se u svetu kovanja novca i proizvodnje plemenitih metala,
                            izdvaja svojom dugom istorijom i reputacijom. The Royal Mint, poznata i kao jedna od najstarijih
                            i najuglednijih kovnica na svetu, kombinuje vekovnu tradiciju sa savremenim inovacijama. </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #About Section -->
    <div class="unlimited_services">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="services_section_thumb">
                        <img src="/themes/gold/assets/img/service/zlatni-standard5.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="unlimited_services_content">
                        <h2>The Royal Mint - jedna od najstarijih i najuglednijih kovnica na svetu</h2>
                        <p>Ova prestižna kovnica, sa istorijom dugom preko 1100 godina, se danas ističe svojim jedinstvenim
                            proizvodima i visokim standardima kvaliteta proizvodnje i finalnih proizvoda. Koreni kovnice The
                            Royal Mint sežu čak do 9. veka, kada je osnovana za potrebe tadašnje Engleske. Tokom vekova,
                            kovnica je preseljena nekoliko puta, a njen najznačajniji trenutak dogodio se 1279. godine kada
                            je preseljena u Londonski Tower. Ovaj istorijski potez simbolizovao je njen značaj i bliskost s
                            kraljevskom porodicom.

                            <br>Kovnica je bila svedok brojnih istorijskih događaja, uključujući industrijsku revoluciju
                            koja je transformisala način proizvodnje novca. The Royal Mint je u vlasništvu Her Majesty's
                            Treasury, tj. britanskog kraljevskog trezora. Ova činjenica dodatno potvrđuje visok status i
                            značaj The Royal Mint u okviru Ujedinjenog kraljevstva, simbolizujući njen kontinuirani značaj
                            kroz istoriju. U poređenju sa evropskim i švajcarskim kovnicama, The Royal Mint zauzima posebno
                            mesto u pogledu prestiža i kvaliteta. Dok evropske i švajcarske kovnice takođe imaju svoju
                            tradiciju i prepoznatljivost, The Royal Mint se ističe svojom jedinstvenom istorijom i tesnom
                            vezom sa britanskom kraljevskom porodicom. Ovoj kovnici se pripisuje veći prestiž zbog njenog
                            kontinuiranog doprinosa i uticaja na istoriju novca, kao i zbog njenih inovativnih proizvoda
                            koji kombinuju tradicionalni dizajn sa savremenim tehnologijama.

                        </p>

                    </div>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-12">
                    <div class="unlimited_services_content">
                        <h2>Zlatne poluge Britannia Gold bars</h2>
                        <p>Britannia Gold bars su zlatne poluge koje se ističu svojom čistoćom i prepoznatljivim dizajnom.
                            Ove zlatne poluge predstavljaju simbol britanske tradicije i kvaliteta. Izrađene su od finog
                            zlata sa oznakom 9999 Fine Gold i omiljen su izbor investitora širom sveta koji traže pouzdane i
                            estetski privlačne opcije za ulaganje u zlato.

                            Pored toga, The Royal Mint je jedan od malog broja proizvođača koji poseduje LBMA sertifikat
                            (London Bullion Market Association – Udruženje učesnika tržišta dragocenih metala iz Londona).
                            Ovaj sertifikat dodatno podiže njen prestiž iznad mnogih međunarodnih kovnica, potvrđujući da su
                            njeni proizvodi od plemenitih metala proizvedeni u skladu sa najvišim međunarodnim standardima.
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="services_section_thumb">
                        <img src="/themes/gold/assets/img/service/zlatni-standard6.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h3>POGLEDAJTE I PORUČITE BRITANNIA GOLD BARS ZLATNE POLUGE</h3>
            </div>
            @foreach ($products as $product)
                <div class="col-6 col-lg-3 col-md-3 col-sm-6">
                    <x-products.item :product="$product" />
                </div>
            @endforeach
        </div>
    </div>


@endsection
@section('scripts')
    <script></script>
@endsection
