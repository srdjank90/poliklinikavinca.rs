@extends('frontend.themes.medical.layout.layout')
@section('title', $doctor->seo->title)
@section('description', $doctor->seo->description)
@section('keywords', $doctor->seo->keywords)
@section('ogTitle', $doctor->seo->title)
@section('ogDescription', $doctor->seo->description)
@section('ogImage', '')
@section('ogUrl', route('frontend.doctor', $doctor->slug))
@section('content')
    <div class="bg-primary">

        <header class="bg-primary py-5 inner-header">
            <div class="container py-4 px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="fw-bold text-white">Doctor Profile</h1>
                            <p class="fw-normal text-white-50 mb-0"><a class="text-white" href="index.php">Home</a> <i
                                    class="bi-arrow-right"></i> Doctor Profile</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4">
                    <div class="sidebar-fixed">
                        <div class="position-relative mb-5">
                            <div class="bg-primary shadow-sm overflow-hidden rounded-3 mb-3">
                                <img class="card-img-top" src="img/d-profile.webp" alt="...">
                                <div class="p-4">
                                    <div>
                                        <h5 class="fw-bold text-white mb-1">Tom Smith Bert</h5>
                                        <p class="mb-0 text-white-50">Gynecology, Health Care & Obstetrics</p>
                                    </div>
                                </div>
                                <div class="p-4 border-top border-50">
                                    <div class="d-flex gap-3 pb-1 text-white">
                                        <i class="bi bi-telephone m-0"></i>
                                        <div>
                                            <p class="mb-1 text-white">(+44) 123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 pb-1 text-white">
                                        <i class="bi bi-envelope m-0"></i>
                                        <div>
                                            <p class="mb-1 text-white">name@domain.com</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 pb-0 text-white">
                                        <i class="bi bi-geo-alt m-0"></i>
                                        <div>
                                            <p class="mb-1 text-white">House 4111, Mancity, England</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center justify-content-between border-top border-50 py-4 px-5">
                                    <a class="px-2 text-white" href="#!"><i class="bi-twitter"></i></a>
                                    <a class="px-2 text-white" href="#!"><i class="bi-facebook"></i></a>
                                    <a class="px-2 text-white" href="#!"><i class="bi-linkedin"></i></a>
                                    <a class="px-2 text-white" href="#!"><i class="bi-youtube"></i></a>
                                </div>
                            </div>
                            <a href="appointment.php"
                                class="btn btn-warning fw-bold fs-7 shadow-sm rounded-3 w-100 border-0 px-4 py-3 text-uppercase">Get
                                Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h2 class="mb-1 fw-bold text-primary">Dr. Tom Smith Bert</h2>
                    <p class="lead mb-3">Royal Prince Alfred Hospital – United Kingdom</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur excepteur sint occaecat cupidatat non proident. </p>
                    <p class="mb-4">
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text.
                    </p>
                    <h3 class="mb-3 h5">Education</h3>
                    <div class="table-responsive bg-white rounded-3 shadow-sm p-3">
                        <table class="table table-borderless m-0">
                            <thead>
                                <tr>
                                    <th class="col-3">Year</th>
                                    <th class="col-3">Degree</th>
                                    <th>Institute</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-muted">2006</td>
                                    <td class="text-muted">MBBS, M.D</td>
                                    <td class="text-muted">University of London</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">2010</td>
                                    <td class="text-muted">M.D. of Medicine</td>
                                    <td class="text-muted">Australia Medical College</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="mb-3 mt-4 h5">Experienced</h3>
                    <div class="table-responsive bg-white rounded-3 shadow-sm p-3">
                        <table class="table table-borderless m-0">
                            <thead>
                                <tr>
                                    <th class="col-3">Year</th>
                                    <th class="col-3">Department</th>
                                    <th>Position</th>
                                    <th>Hospital</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-muted">2007 - 2008</td>
                                    <td class="text-muted">MBBS, M.D</td>
                                    <td class="text-muted">Senior Prof.</td>
                                    <td class="text-muted">ProHealth Medical Clinic</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">2010 - 2018</td>
                                    <td class="text-muted">M.D. of Medicine</td>
                                    <td class="text-muted">Associate Prof.</td>
                                    <td class="text-muted">Australia Medical College</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Posts Section -->
    <section class="py-5">
        <div class="container px-5 mt-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center mb-5">
                        <p class="text-uppercase text-primary mb-2">SAVETI STRUČNJAKA</p>
                        <h2 class="fw-bold mb-3 text-black">Poslednje novosti i stručni tekstovi iz sveta medicine</h2>
                        <p class="text-muted">Budite u toku sa najnovijim vestima i stručnim tekstovima iz sveta medicine!
                            🩺 Saznajte više o najnovijim otkrićima i savetima za vaše zdravlje.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                @foreach ($latestPosts as $lPost)
                    <!-- Post Items -->
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow-sm rounded-3 border-0">
                            @if ($lPost->image)
                                <img class="card-img-top" src="{{ $storageUrl }}{{ $lPost->image->path }}"
                                    alt="{{ $lPost->title }}">
                            @endif
                            <div class="card-body p-4">
                                @foreach ($lPost->categories as $lpCategory)
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $lpCategory->name }}
                                    </div>
                                @endforeach

                                <a class="text-decoration-none link-dark stretched-link"
                                    href="{{ route('frontend.post', $lPost->slug) }}">
                                    <h5 class="card-title mb-3 lh-base">
                                        {{ $lPost->title }}
                                    </h5>
                                </a>
                                <p class="card-text mb-0">
                                    {!! $lPost->excerpt !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
