<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-0 osahan-nav">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ route('frontend.index') }}"><img class="img-fluid"
                src="/themes/medical/assets/img/logo.png" alt="Poliklinika Vinča - logotip" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Usluge</a>
                    <ul class="dropdown-menu m-0 border-0 shadow-sm p-2 dropdown-menu-end">
                        <li><a class="dropdown-item px-3 py-2 rounded" href="services-item.php">Ginekologija</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="services-item.php">Radiologija</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="services-item.php">Neurologija</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="services-item.php">Kardiologija</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="services-item.php">Ultrazvuk</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="services-item.php">Laboratorija</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="services-overview.php"><b>Sve
                                    usluge</b></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="doctors-overview.php">Lekari</a></li>

                <li class="nav-item"><a class="nav-link" href="pricing.php">Cenovnik</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Saveti stručnjaka</a>
                    <ul class="dropdown-menu m-0 border-0 shadow-sm p-2 dropdown-menu-end">
                        <li><a class="dropdown-item px-3 py-2 rounded" href="blog-post.php">Blog Post 1</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="blog-post.php">Blog Post 2</a></li>
                        <li><a class="dropdown-item px-3 py-2 rounded" href="blog-post.php">Blog Post 3</a></li>

                        <li><a class="dropdown-item px-3 py-2 rounded" href="blog-home.php"><b>Svi saveti</b></a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="about.php">O nama</a></li>

                <li class="nav-item"><a class="nav-link" href="contact.php">Kontakt</a></li>
            </ul>
            <div class="d-flex gap-4 align-items-center">
                <a href="appointment.php" class="text-decoration-none text-white text-uppercase fw-bold">Zakažite
                    pregled</a>
                <a href="tel:+381605558888" class="btn btn-warning text-uppercase fw-bold"><i
                        class="bi bi-telephone"></i> 060 555 88 88</a>
            </div>
        </div>
    </div>
</nav>
