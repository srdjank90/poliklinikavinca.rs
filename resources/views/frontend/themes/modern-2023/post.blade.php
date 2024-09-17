@extends('frontend.themes.modern-2023.layout.layout')
@section('title', isset($post->seo->title) ? $post->seo->title : $post->title)
@section('description', isset($post->seo->description) ? $post->seo->description : '')
@section('keywords', isset($post->seo->keywords) ? $post->seo->keywords : '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1 mb-0">
                            <li class="breadcrumb-item"><a title="Home"
                                    href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="pt-10 pb-16 pb-lg-18 container">
            <div class="px-lg-25 px-0">
                <div class=" text-center mb-13">
                    <a href="#"
                        class="d-none btn btn-light btn-hover-bg-dark btn-hover-border-dark btn-hover-text-light shadow-none py-0 px-6 mb-6">
                        Life Style
                    </a>
                    <h2 class=" px-6 text-body-emphasis border-0 fw-500 mb-4 fs-3 ">
                        {{ $post->title }}
                    </h2>
                    <ul
                        class="list-inline fs-15px fw-semibold letter-spacing-01 d-flex justify-content-center align-items-center">
                        <li class="list-inline-item px-6">{{ $post->created_at }}</li>
                    </ul>
                </div>
            </div>
            <div class>
                {!! $post->content !!}
            </div>
        </section>
    </main>
@endsection
