@extends('frontend.themes.medical.layout.layout')
@section('title', 'Poliklinika Vinča | Zakažite Vaš pregled')
@section('description', '')
@section('keywords', '')
@section('content')
    <!-- Page Content-->
    <div class="bg-primary py-5">
        <!-- Login -->
        <div class="container px-5 py-5 login">
            <!-- Login -->
            <div class="row align-items-center gx-5">
                <div class="col-lg-6">
                    <div class="bg-white shadow-sm p-5 rounded-3">
                        <h3 class="fw-bold text-black mb-2">Zakažite Vaš pregled!</h3>
                        <p class="text-muted fw-light">Online forma za zakazivanje</p>
                        <form id="appointmentForm" method="POST" action="{{ route('frontend.appointment.send') }}"
                            class="text-start pt-3">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-12 pe-2">
                                    <label for="exampleInputFirst" class="form-label small text-muted">Ime <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="name" class="form-control" id="exampleInputFirst"
                                        placeholder="Upišite ime">
                                </div>
                                <div class="mb-3 col-6 ps-2 d-none">
                                    <label for="exampleInputLast" class="form-label small text-muted">Prezime</label>
                                    <input type="text" class="form-control" id="exampleInputLast"
                                        placeholder="Upišite prezime">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6 pe-2">
                                    <label class="form-label small text-muted">Telefon <small
                                            class="text-danger">*</small></label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Unesite vaš broj">
                                </div>
                                <div class="mb-3 col-6 ps-2">
                                    <label class="form-label small text-muted">E-mail adresa <small
                                            class="text-danger">*</small></label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Unesite vaš E-mail">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small text-muted">Poruka <small
                                        class="text-danger">*</small></label>
                                <textarea name="message" class="form-control hight-auto" placeholder="Unesite vašu poruku" rows="4"
                                    data-sb-validations="required"></textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-warning fw-bold fs-7 rounded-3 w-100 border-0 px-4 py-3 text-uppercase"><i
                                    class="fa fa-refresh fa-spin me-2 send-loading d-none"></i> Zakažite
                                Vaš pregled</button>
                            <div id="responseMessage" class="d-flex justify-content-center mt-3"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="/themes/medical/assets/img/appointment.svg" class="img-fluid" alt="yoursitename">
                    <h1 class="text-white display-4 fw-bold"> (060) 555 88 88
                    </h1>
                    <p class="fs-6 mb-5 text-white-50">U slučaju da imate problema da popunite formu za online zakazivanje,
                        pozovite nas!
                    </p>
                    <a href="tel:+381605558888"
                        class="btn btn-warning fw-bold fs-7 rounded-3 border-0 px-4 py-3 text-uppercase">
                        <i class="bi bi-telephone"></i> Pozovite nas
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#appointmentForm').submit(function(event) {
                event.preventDefault();
                $('.send-loading').removeClass('d-none')
                $('.send-loading').attr('disabled', true)
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessage').text(response.message);
                        $('#appointmentForm')[0].reset();
                        $('.send-loading').addClass('d-none')
                        $('.send-loading').attr('disabled', false)
                    },
                    error: function(xhr, status, error) {
                        $('#responseMessage').text('Proverite unete podatke!');
                        $('.send-loading').addClass('d-none')
                        $('.send-loading').attr('disabled', false)
                    }
                });
            });
        });
    </script>
@endsection
