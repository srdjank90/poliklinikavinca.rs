@extends('frontend.themes.gold.layout.layout')
@section('title', '')
@section('description', '')
@section('keywords', '')
@section('content')

    <!-- Error Section -->
    <div class="error_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1>404</h1>
                        <h2>Tražena strana nije pronađena</h2>
                        <p>Izvinjavamo se ali tražena strana nije pronađena, možda je<br> obrisana, promenila naziv
                            ili trenutno nedostupna.</p>
                        <a href="{{ route('frontend.index') }}">Povratak na početnu stranu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script></script>
@endsection
