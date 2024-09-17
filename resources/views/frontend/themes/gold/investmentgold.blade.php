@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Investiciono zlato')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1>Investiciono zlato</h1>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                            <li>></li>
                            <li>Investiciono zlato</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        Investiciono zlato content
    </div>


@endsection
@section('scripts')
    <script></script>
@endsection
