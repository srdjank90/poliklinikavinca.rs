@extends('frontend.themes.gold.layout.layout')
@section('title', isset($page->seo->title) ? 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | ' .
    $page->seo->title : 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | ' . $page->name)
@section('description', isset($page->seo->description) ? $page->seo->description : '')
@section('keywords', isset($page->seo->keywords) ? $page->seo->keywords : '')
@section('canonical', url()->current())
@section('content')

    <!-- Page Details-->
    <div class="page-details">
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
    <!-- #Page Details-->


@endsection
@section('scripts')
    <script></script>
@endsection
