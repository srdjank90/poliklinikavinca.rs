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
                            <li>Adrese</li>
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
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex justify-content-start align-items-center">
                                    <h4 class=" p-0">Adrese</h4>
                                </div>
                                <div>
                                    <a href="{{ route('frontend.profile.address.create') }}" class="btn-theme-dark">+ Dodaj
                                        adresu</a>
                                </div>
                            </div>

                            <div class="address-wrapper row">
                                @foreach ($user->addresses as $key => $address)
                                    <div class="col-12 col-lg-6 col-md-6 mb-4 position-relative">
                                        <a class="address-item-link-wrapper"
                                            href="{{ route('frontend.profile.address.edit', $address->id) }}">
                                            <div class="address-item position-relative address-item-{{ $address->id }}"
                                                data-bs-toggle="modal" data-bs-target="#updateAddressModal">
                                                @if ($address->primary)
                                                    <span class="primary-address">Primarna</span>
                                                @endif
                                                <span><b>Ime i prezime:</b> {{ $address->first_name }}
                                                    {{ $address->last_name }}</span> <br>
                                                <span><b>Telefon:</b> {{ $address->phone }}</span> <br>
                                                <span><b>JMBG:</b> {{ $address->jmbg }}</span> <br>
                                                <span><b>Adresa:</b> {{ $address->address }}</span> <br>
                                                <span><b>Grad:</b> {{ $address->city }}</span> <br>
                                                <span><b>Poštanski broj:</b> {{ $address->zip }}</span> <br>
                                                <span><b>Država:</b> {{ $address->country }}</span> <br>
                                                <span><b>Napomena:</b> {{ $address->note }}</span> <br>
                                            </div>
                                        </a>
                                        <button class="delete-address" data-id="{{ $address->id }}">Obriši</button>
                                    </div>
                                @endforeach
                                @if (count($addresses) == 0)
                                    <div class="clo-12 text-center">
                                        <span>Trenutno nemate kreiranih adresa</span> <br>
                                        <span><a href="{{ route('frontend.profile.address.create') }}"
                                                class="text-primary">+
                                                Dodaj
                                                adresu</a></span>
                                    </div>
                                @endif
                            </div>
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
            $('.delete-address').click(function() {
                var addressId = $(this).data('id');
                Swal.fire({
                    title: "Da li ste sigurni?",
                    text: "Ako obrišete, nećete moći da povratite adresu!",
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Odustani",
                    confirmButtonText: "Potvrdi",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('frontend.profile.address.delete', ':id') }}'
                                .replace(':id',
                                    addressId),
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                window.location.reload();
                            },
                            error: function(xhr, status, error) {
                                swal("Oops!", "Something went wrong: " + xhr
                                    .responseText, "error");
                            }
                        });

                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });

            });
        });
    </script>
@endsection
