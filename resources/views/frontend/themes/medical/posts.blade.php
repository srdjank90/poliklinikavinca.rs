@extends('frontend.themes.medical.layout.layout')
@section('title', 'Saveti stručnjaka | Poliklinika Vinča')
@section('description', '')
@section('keywords', '')
@section('content')
    <div class="bg-primary">
        <header class="bg-primary py-5 inner-header">
            <div class="container py-4 px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <div class="text-center">
                                <h1 class="fw-bold text-white">Saveti stručnjaka</h1>
                                <h2 class="fw-bold mb-3 text-black">Poslednje novosti i stručni tekstovi iz sveta
                                    medicine</h2>
                                <p class="fw-normal text-white-50 mb-0"><a class="text-white"
                                        href="{{ route('frontend.index') }}">Početna</a> <i class="bi-arrow-right"></i>
                                    Saveti stručnjaka
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 pt-5">
            <div class="row gx-5">
                @foreach ($posts as $post)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow-sm rounded-3 border-0">
                            @if ($post->image)
                                <img class="card-img-top" src="{{ $storageUrl }}{{ $post->image->path }}"
                                    alt="{{ $post->title }}" loading="lazy">
                            @endif
                            <div class="card-body p-4">
                                @foreach ($post->categories as $pcategory)
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $pcategory->name }}
                                    </div>
                                @endforeach

                                <a class="text-decoration-none link-dark stretched-link"
                                    href="{{ route('frontend.post', $post->slug) }}">
                                    <h5 class="card-title mb-3 lh-base">
                                        {{ $post->title }}
                                    </h5>
                                </a>
                                <p class="card-text mb-0">
                                    {!! $post->excerpt !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
