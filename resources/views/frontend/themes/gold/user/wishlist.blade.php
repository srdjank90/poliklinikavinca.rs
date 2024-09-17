@extends('frontend.themes.gold.layout.layout')

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Moj nalog</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>></li>
                            <li>Lista želja</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumb Section -->

    <!-- My Account -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        @include('frontend.themes.gold.user.components.menu')
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                <i class="bi bi-info-circle"></i> {{ session('message') }}
                            </div>
                        @endif

                        <!-- Password Change -->
                        <div class="profile-section-wrapper">
                            <h4 class="mb-4">Lista želja</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #My Account -->
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#profileInfoDataSubmit').on('click', function() {
                $('#profileInfoForm').submit();
            })
        })
    </script>
@endsection
