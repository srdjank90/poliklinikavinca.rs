@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Besplatne konsultacije')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1>Besplatne konsultacije</h1>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                            <li>></li>
                            <li>Besplatne konsultacije</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conmtact Area Section -->
    <div class="contact_area">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6 col-md-6">
                    <div class="contact_message form">
                        <h3>Besplatne konsultacije za zlato i srebro</h3>
                        <p>Izaberite kako želite da se konsultacije odvijaju, a mi ćemo rado odgovoriti na sva vaša pitanja
                            o investicionim proizvodima koje nudimo.</p>
                        <form id="contactForm" method="POST" action="{{ route('frontend.contact.send') }}">
                            @csrf
                            <div class="mb-2">
                                <label>Ime (obavezno)</label>
                                <input name="name" required type="text">
                            </div>
                            <div class="mb-2">
                                <label>Email (obavezno)</label>
                                <input name="email" required type="email">
                            </div>
                            <div class="mb-2">
                                <label>Telefon</label>
                                <input name="phone" type="text">
                            </div>
                            <div class="contact_textarea">
                                <label> Napišite način na koji bi voleli da se konsultacije odvijaju (obavezno)
                                </label>
                                <textarea name="message" required class="form-control2"></textarea>
                            </div>
                            <button type="submit"><i class="fa fa-refresh fa-spin me-2 send-loading d-none"></i>
                                Pošalji</button>
                            <div id="responseMessage" class="d-flex justify-content-center mt-3"> </div>
                        </form>

                    </div>
                </div>

                <div class="col-12 col-lg-6 col-md-6 mb-4">
                    <div class="contact_message content">
                        <h3>Kontaktirajte nas ili nam pišite</h3>

                        <p>Spremni smo da odgovorimo na sve vaše zahteve u najkraćem mogućem roku. Kontaktirajte nas <a
                                href="tel:+381637709128">+381 63 7709 128</a> ili nam pišite <a
                                href="mailto:internet.prodavnica@zlatnistandard.rs">internet.prodavnica@zlatnistandard.rs.</a>
                        </p>
                        <ul>
                            <li><i class="fa fa-fax"></i> <a target="_blank" rel="noopener nofollow noreferrer"
                                    href="https://www.google.rs/maps/place/Balkanska+2,+Beograd/@44.8125304,20.4594604,17z/data=!3m1!4b1!4m6!3m5!1s0x475a7aadd6cc9529:0x1cf2565716b48577!8m2!3d44.8125304!4d20.4594604!16s%2Fg%2F1vk6x_s7?entry=ttu">Balkanska
                                    2, 11000 Beograd</a>
                            </li>
                            <li><i class="fa fa-phone"></i> <a
                                    href="mailto:internet.prodavnica@zlatnistandard.rs">internet.prodavnica@zlatnistandard.rs</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i><a href="tel:+381 63 7709 128">+381 63 7709 128</a> </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-5 mt-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.4433372824556!2d20.4594223!3d44.812532100000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aadd6cc9529%3A0x1cf2565716b48577!2sBalkanska%202%2C%20Beograd!5e0!3m2!1sen!2srs!4v1682067363099!5m2!1sen!2srs"
                        width="100%" height="900" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
                </div>

                <div class="col-12 col-md-6 mt-5">
                    <img src="{{ asset('themes/gold/assets/img/adresa-kontakt.jpeg') }}" alt="">

                    <h3 class="mt-4">Bezbedan parking</h3>
                    <p>Za sve naše klijente omogućili smo bezbedan parking u privatnoj garaži, do koje možete lako doći iz
                        svih delova grada. Ulazak u garažu je moguć samo uz prethodnu najavu (potrebno je da vaš dolazak i
                        broj tablica najavite telefonom ili putem e-maila)</p>
                    <p>Ukoliko dolazite iz pravca Brankovog mosta, potrebno je da skrenete desno u ulicu Kraljice Natalije i
                        nakon 200m sa leve strane nailazite na ulaz u garažu</p>
                    <p>Iz pravca Balkanske ulice, skrenite kod hotela “Prag” i nastavite ka Terazijskom tunelu. Na 200m od
                        skretanja sa vaše desne strane se nalazi ulaz u garažu</p>
                    <p>Skeniranjem bar koda dobićete instrukcije za najbrži dolazak do privatnog parkinga sa vaše trenutne
                        lokacije.</p>
                    <img width="100" src="{{ asset('themes/gold/assets/img/qr-kod-adresa.png') }}" alt="">
                </div>


            </div>
        </div>
    </div>
    <!-- #Conmtact Area Section -->

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
    <script>
        $(document).ready(function() {
            $('#contactForm').submit(function(event) {
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
