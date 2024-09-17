@extends('frontend.themes.gold.layout.layout')
@section('title', isset($product->seo->title) ? 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | '
    . $product->seo->title : 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | ' . $product->name)
@section('description', isset($product->seo->description) ? $product->seo->description : '')
@section('keywords', isset($product->seo->keywords) ? $product->seo->keywords : '')
@section('canonical', url()->current())
@section('schema')
    <!-- JSON-LD za product schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "{{ $product->name }}",
        "image": [
            "{{ url('/') . $storageUrl . $product->files[0]->path }}"
        ],
        "description": "{{ isset($product->seo->description) ? $product->seo->description : '' }}",
        "brand": {
          "@type": "Brand",
          "name": "{{ $product->brand }}"
        },
        "offers": {
          "@type": "Offer",
          "url": "{{ url()->current() }}",
          "priceCurrency": {{ $currency == 'dinara' ? 'RSD' : 'EUR' }},
          "price": "{{ $product->price }}",
        }
    }
    </script>
@endsection
@section('content')
    <!-- Breadcrumbs Section -->
    <div class="breadcrumbs_area product_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>></li>
                            <li><a href="{{ route('frontend.products') }}">Proizvodi</a></li>
                            <li>></li>
                            <li>{{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs Section -->

    <!-- Product Details-->
    <div class="product_details product_grouped">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">

                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ $storageUrl . $product->files[0]->path }}"
                                    data-zoom-image="{{ $storageUrl . $product->files[0]->path }}"
                                    alt="{{ $product->name }}">
                            </a>
                        </div>

                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                @foreach ($product->files as $image)
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                            data-image="{{ $storageUrl . $image->path }}"
                                            data-zoom-image="{{ $storageUrl . $image->path }}">
                                            <img title="{{ $product->slug }}" alt="{{ $product->slug }}"
                                                src="{{ $storageUrl . $image->path }}" alt="{{ $product->name }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">

                        <!-- Product Name -->
                        <h1>{{ $product->name }}</h1>
                        <!-- #Product Name -->

                        <!-- Product Prices -->
                        <div class="product_price">
                            <span class="current_price">Lager cena: <span
                                    class="text-dark ms-3">{{ number_format($product->price, 2, ',', '.') }}
                                    {{ $currency }}</span>
                                /
                                komad</span>
                        </div>
                        <!-- #Product Prices -->

                        <!-- Product Short Description -->
                        <div class="product_desc">
                            @if (isset($fields['kratak_opis']))
                                {!! $fields['kratak_opis'] !!}
                            @endif
                        </div>
                        <!-- #Product Short Description -->

                        <div class="form-check">
                            <input class="form-check-input active-price" type="radio" name="active_price" value="price"
                                id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Lager cena <span class="fw-bold">{{ number_format($product->price, 2, ',', '.') }}
                                    {{ $currency }}</span>
                            </label>
                        </div>

                        <div class="form-check">

                            <input class="form-check-input active-price" type="radio"
                                {{ \Carbon\Carbon::now()->setTimezone('Europe/Belgrade')->format('H') <= 8 || \Carbon\Carbon::now()->setTimezone('Europe/Belgrade')->format('H') >= 24 ? 'disabled' : '' }}
                                name="active_price" id="flexRadioDefault2" value="price_avans">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Avansna cena <span class="fw-bold">{{ number_format($product->price_avans, 2, ',', '.') }}
                                    {{ $currency }}</span>
                                <br>
                                <span style="font-size: 16px;">U skladu sa <a class="fw-bold text-decoration-underline"
                                        href="{{ route('frontend.page', 'opsti-uslovi-kupovine') }}"> opštim uslovima
                                        kupovine u INTERNET PRODAVNICI</a> , avansna kupoprodaja
                                    proizvoda je moguća od <b>08:00 - 17:00</b> svakog radnog dana, i to samo za kupovinu u
                                    vrednosti od najmanje <b>100.000 din</b>. Rok isporuke proizvoda u avansnoj kupoprodaji
                                    je
                                    od <b>2 do 4 nedelje</b>.</span>
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center my-3">
                            <div class="d-flex justify-content-start align-items-center">
                                <p class="p-0 m-0 me-3">Količina</p>
                                <input style="width:80px" class="form-control form-control-lg quantity-input" min="1"
                                    value="1" max="100" type="number">
                            </div>
                            <a href="javascript:void(0)" data-product="{{ $product }}"
                                class="btn btn-theme-dark add-to-cart">Dodaj u korpu</a>
                        </div>

                        <!-- Product Categories -->
                        <div class="product_meta">
                            <span>Kategorija:
                                @foreach ($product->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </span>
                        </div>
                        <!-- #Product Categories -->

                        {{ $product->value }}
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- #Product Details-->

    <!-- Product Info-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-bs-toggle="tab" href="#opisProizvoda" role="tab"
                                        aria-controls="opisProizvoda" aria-selected="false">Opis proizvoda</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#svojstvaProizvoda" role="tab"
                                        aria-controls="svojstvaProizvoda" aria-selected="false">Svojstva proizvoda</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#nacinPlacanja" role="tab"
                                        aria-controls="nacinPlacanja" aria-selected="false">Način i vreme plaćanja</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#deklaracijaProizvoda" role="tab"
                                        aria-controls="deklaracijaProizvoda" aria-selected="false">Deklaracija
                                        proizvoda</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#poreskiTretmani" role="tab"
                                        aria-controls="poreskiTretmani" aria-selected="false">Poreski i drugi relevantni
                                        tretmani</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Opis proizvoda -->
                            <div class="tab-pane fade show active" id="opisProizvoda" role="tabpanel">
                                {!! $product->description !!}
                            </div>
                            <!-- Svojstva proizvoda -->
                            <div class="tab-pane fade" id="svojstvaProizvoda" role="tabpanel">
                                @if (isset($fields['svojstva_proizvoda']))
                                    {!! $fields['svojstva_proizvoda'] !!}
                                @endif
                            </div>
                            <!-- Nacin i vreme placanja -->
                            <div class="tab-pane fade" id="nacinPlacanja" role="tabpanel">
                                <p><b>Lager </b><a href="https://zlatnistandard.rs/kupoprodaja/"><b>kupoprodaja
                                            zlata</b></a><span style="font-weight: 400"> se obavlja na sledeći način: Nakon
                                        ispostavljanja predračuna (i po potrebi zaključenja kupoprodajnog ugovora), isporuka
                                        investicionog zlata i prateće dokumentacije sledi odmah nakon što evidentiramo
                                        uplatu na izvodu našeg transakcionog računa kod poslovne banke; gotovinske uplate su
                                        takođe moguće. </span><b>Avansna kupoprodaja</b><span style="font-weight: 400"> se
                                        obavlja nakon ispostavljanja avansnog računa, dogovaranja avansnog procenta, nakon
                                        čega se čeka isporuka zlata u dogovorenom roku. Ono što je bitno istaći putem
                                        avansne kupoprodaje jeste da dobijate najbolje uslove za kupovinu u Srbiji.</span>
                                </p>
                                <p><span style="font-weight: 400">U našoj </span><b>Zlatni Standard prodavnici</b><span
                                        style="font-weight: 400"> možete izvršiti željene transakcije kada budete spremni.
                                        Možete nas i pozvati na <a href="tel:+381117709128">+381 (0)11 7709 128</a> i
                                        porazgovarati sa našim stručnjacima o vašim ličnim okolnostima i optimizaciji
                                        ulaganja u investiciono zlato. Ne zaboravite da nas pitate za specijalne količinske
                                        popuste!</span></p>
                            </div>
                            <!-- Deklaracija proizvoda -->
                            <div class="tab-pane fade" id="deklaracijaProizvoda" role="tabpanel">
                                @if (isset($fields['deklaracija_proizvoda']))
                                    {!! $fields['deklaracija_proizvoda'] !!}
                                @endif
                            </div>
                            <!-- Poreski i drugi relevantni tretmani -->
                            <div class="tab-pane fade" id="poreskiTretmani" role="tabpanel">
                                <p>
                                    <span style="font-weight: 400">U skladu sa odredbama Zakona o porezu na dodatu
                                        vrednost, na promet investicionog zlata ne plaća se porez na dodatu vrednost.
                                        Uzimajući u obzir da su individualne okolnosti kod investitora različite, savetujemo
                                        da potražite savet po pitanju poreskog tretmana investicije u zlato,
                                        kao i relevantnih optimizacija, od svog knjigovođe i/ili poreskog savetnika.
                                        Trenutne i potencijalne klijente pravna lica </span>
                                    <b>pozivamo da od nas zatraže</b><span style="font-weight: 400"> specijalan priručnik
                                        sa naslovom: „</span><b>Priručnik za računovodstveno priznavanje
                                        i vrednovanje investicionog zlata i poreski tretman – Za društva kojima pretežna
                                        delatnost nije trgovina investicionim zlatom, niti se bave proizvodnjom i
                                        preradom</b>
                                    <span style="font-weight: 400">“.</span> Za fizička lica smo pripremili<b> „Informator
                                        o poreskom tretmanu prometa investicionog zlata za fizička lica“</b>
                                    : kontaktirajte nas odmah, i zatražite vašu kopiju.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Product Info-->

    <!-- Posts -->
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h5>SVE ŠTO JE POTREBNO DA ZNAŠ O</h5>
                <h3>KUPOVINI INVESTICIONOG ZLATA</h3>
            </div>
            @foreach ($singleProductPosts as $post)
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
