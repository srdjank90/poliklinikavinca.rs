<!-- Footer Services-->
<div class="bg-white shadow services-footer">
    <div>
        <div class="container px-5">
            <a class="w-100 text-body text-decoration-none py-3 d-block" data-bs-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class="d-flex flex-wrap justify-content-between align-items-center py-1">
                    <h6 class="m-0 text-body fw-bold">Najpopularnije usluge</h6>
                    <span>Pogledajte sve naše usluge <i class="bi bi-chevron-down"></i> </span>
                </div>
            </a>
        </div>
    </div>
    <div class="collapse border-top" id="collapseExample">
        <div class="container px-5 py-4">
            <div class="row">
                @foreach ($globalServices as $gService)
                    <div class="col-6 col-lg-3 col-md-3">
                        <a class="py-1 text-decoration-none d-block w-100 text-muted"
                            href="{{ route('frontend.service', $gService->slug) }}">{{ $gService->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<div class="py-5 footer bg-black d-flex flex-wrap d-xl-block">
    <div>
        <div class="container px-5 py-5">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6">
                    <a href="{{ route('frontend.index') }}"
                        class="brand d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                        <img src="/themes/medical/assets/img/logo.png" class="img-fluid"
                            alt="Poliklinika Vinča - logotip" />
                    </a>

                    <div class="d-flex gap-3 mb-3 py-1">
                        <i class="bi bi-chat-dots text-white h5 m-0"></i>
                        <div>
                            <p class="mb-1 fw-bold text-white"><a href="appointment.php">Zakažite Vaš pregled</a></p>
                            <small class="text-muted">U par klikova zakažite Vaš pregled.</small>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-3 py-1">
                        <i class="bi bi-telephone text-white h5 m-0"></i>
                        <div>
                            <p class="mb-1 fw-bold text-white"><a href="tel:+381605558888">Pozovite nas</a></p>
                            <small class="text-muted">Pozovite nas tokom radnog vremena na (060) 555 88 88.</small>
                        </div>
                    </div>
                    <div class="d-flex gap-3 py-1">
                        <i class="bi bi-geo-alt text-white h5 m-0"></i>
                        <div>
                            <p class="mb-1 fw-bold text-white"><a
                                    href="https://www.google.com/maps/dir//%D0%9F%D1%80%D0%BE%D1%84%D0%B5%D1%81%D0%BE%D1%80%D0%B0+%D0%92%D0%B0%D1%81%D0%B8%D1%9B%D0%B0+24,+%D0%92%D0%B8%D0%BD%D1%87%D0%B0+11351/@44.7465637,20.5187105,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x475a775655265b17:0xd4c5b3b13f6cebe3!2m2!1d20.6011111!2d44.7465933?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D"
                                    target="_blank">Naša lokacija</a></p>
                            <small class="text-muted">Profesora Vasića 24, 11351 Vinča, Srbija.</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-2 col-md-6">
                    <h6 class="mb-3 text-white fw-bold">INFORMACIJE</h6>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted" href="about.php">O nama</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted" href="blog-home.php">Saveti
                        stručnjaka</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted"
                        href="services-overview.php">Usluge</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted" href="doctors-overview.php">Lekari</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted" href="appointment.php">Zakazivanje</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted" href="pricing.php">Cenovnik</a>
                </div>
                <div class="col-12 col-lg-2 col-md-6">
                    <h6 class="mb-3 text-white fw-bold">PONUDA</h6>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted"
                        href="services-item.php">Ginekologija</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted"
                        href="services-item.php">Radiologija</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted"
                        href="services-item.php">Neurologija</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted"
                        href="services-item.php">Kardiologija</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted" href="services-item.php">Ultrazvuk</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted"
                        href="services-item.php">Laboratorija</a>
                    <a class="py-1 text-decoration-none d-block w-100 text-muted" href="services-overview.php"><b>Sve
                            usluge</b></a>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <h6 class="mb-3 text-white fw-bold">POLIKLINIKA | LABORATORIJA</h6>
                    <p class="text-white-50"><b>Poliklinika | Radno vreme</b>

                        <br>Pon-Pet: 07 – 20h

                        <br>Subota: 08 – 16h

                        <br>Nedelja: Neradni dan
                    </p>
                    <p class="text-white-50"><b>Laboratorija | Radno vreme</b>

                        <br>Pon-Pet: 07 – 19h

                        <br>Subota: 07 – 15h

                        <br>Nedelja: Neradni dan
                        <br>INFO I UZORKOVANJE <a href="tel:+381607808788"
                            class="btn btn-warning text-uppercase fw-bold"><i class="bi bi-telephone"></i> 060 78 08
                            788</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="bg-dark py-4 mt-auto copyright-footer">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white"><a href="https://da.org.rs">Copyright &copy; Allinclusive. 2024</a>
                </div>
            </div>

        </div>
    </div>
</footer>
