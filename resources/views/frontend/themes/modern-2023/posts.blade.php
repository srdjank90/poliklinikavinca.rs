@extends('frontend.themes.modern-2023.layout.layout')
@section('title', 'Blog')
@section('description', '')
@section('keywords', '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="page-title z-index-2 position-relative">
            <div class="bg-body-secondary">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="text-center py-13">
                <div class="container">
                    <h2 class="mb-0">{{ __('Blog') }}</h2>
                </div>
            </div>
        </section>
        <div class="container mb-lg-18 mb-15 pb-3">
            <div class="row gy-50px">
                @foreach ($posts as $key => $post)
                    <div class="col-md-6 col-lg-4">
                        <article class="card card-post-grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            @if ($post->image)
                                <figure class="card-img-top position-relative mb-10">
                                    <a href="{{ route('frontend.post', $post->slug) }}"
                                        class="hover-shine hover-zoom-in d-block">
                                        <img data-src="{{ $storageUrl }}{{ $post->image->path }}"
                                            class="img-fluid lazy-image w-100" alt="" width="370" height="450"
                                            src="#">
                                    </a>
                                </figure>
                            @endif
                            <div class="card-body text-center px-md-9 py-0">
                                <h4 class="card-title lh-base mb-9"><a class="text-decoration-none"
                                        href="{{ route('frontend.post', $post->slug) }}"
                                        title="{{ $post->title }}">{{ $post->title }}</a></h4>
                                <ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0">
                                    <li class="list-inline-item">{{ $post->created_at }}</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

        </div>
    </main>
@endsection
