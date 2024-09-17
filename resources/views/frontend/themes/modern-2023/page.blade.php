@extends('frontend.themes.modern-2023.layout.layout')
@section('title', isset($page->seo->title) ? $page->seo->title : $page->name)
@section('description', isset($page->seo->description) ? $page->seo->description : '')
@section('keywords', isset($page->seo->keywords) ? $page->seo->keywords : '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section>
            <div class="bg-body-secondary py-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                        <li class="breadcrumb-item"><a class="text-decoration-none text-body"
                                href="{{ route('frontend.index') }}">Početna</a>
                        </li>
                        <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">
                            {{ $page->name }}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="text-center pt-13 mb-13 mb-lg-15">
                    <div class="text-center">
                        <h2 class="fs-36px mb-7">{{ $page->name }}</h2>

                    </div>
                </div>
            </div>
        </section>
        <section class="py-15 py-lg-18">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
