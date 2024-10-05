@extends('frontend.themes.medical.layout.layout')
@section('content')
    <!-- Page Content-->
    <div class="bg-primary py-5">
        <!-- Login -->
        <div class="container px-5 py-5 login">
            <!-- Login -->
            <div>
                <div class="text-center col-lg-5 mx-auto">
                    <img src="/themes/medical/assets/img/404.svg" loading="lazy" class="img-fluid" alt="yoursitename">
                    <h1 class="text-white fw-bold">Ooops, Strana nije pronadjena</h1>
                    <p class="fs-6 mb-5 text-white-50">Izgleda da stranica koju tražite ne postoji ili je uklonjena. Molimo
                        vas da proverite URL ili se vratite na početnu stranu.<br>
                        Ako mislite da je ovo problem molimo vas kontaktirajte nas.
                    </p>
                    <a href="{{ route('frontend.index') }}"
                        class="btn btn-warning fw-bold fs-7 rounded-3 border-0 px-4 py-3 text-uppercase">
                        <i class="bi bi-house me-2"></i> Go Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
