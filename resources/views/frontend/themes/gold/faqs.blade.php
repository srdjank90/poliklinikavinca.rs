@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Najčešća pitanja')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')

    <!-- Breadcrumbs With Background -->
    <div class="container-fluid"
        style="background: url('/themes/gold/assets/img/faq.webp') no-repeat scroll center center/cover">
        <div class="row align-items-center">
            <div class="col-12 pb-5">
                <div class="banner_text text-white">
                    <a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> / Najčešća pitanja
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs With Background -->

    <div class="text-center mt-5">
        <h1>Najčešća pitanja</h1>
    </div>

    <div class="accordion_area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="accordion" class="card__accordion">
                        @foreach ($faqs as $faq)
                            <div class="card  card_dipult">
                                <div class="card-header card_accor" id="heading{{ $faq->id }}">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $faq->id }}">
                                        {!! $faq->question !!}
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse"
                                    aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                    <div class="card-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Faq Area-->

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
