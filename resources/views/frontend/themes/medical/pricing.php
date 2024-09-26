<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php require_once('layout/head.php'); ?>

<body class="d-flex flex-column h-100 bg-light">
   <main class="flex-shrink-0">
      <div class="bg-primary">
         <!-- Navigation -->
         <?php require_once('layout/navigation.php'); ?>

         <!-- Header-->
         <header class="bg-primary py-5 inner-header">
            <div class="container py-4 px-5">
               <div class="row gx-5 align-items-center justify-content-center">
                  <div class="col-lg-12">
                     <div class="text-center">
                        <h1 class="fw-bold text-white">Kompletan cenovnik usluga</h1>
                        <p class="lead fw-normal text-white-50 mb-0">Kompletna zdravstvena usluga na jednom mestu, sa 20 posto popusta i u oktobru</p>
                     </div>
                  </div>
               </div>
            </div>
         </header>
      </div>
   <section class="py-5">
         <div class="container px-5 my-5">
            <div class="row gx-5">
               <div class="col-xl-8">
                  <!-- FAQ Accordion 1-->
                  <h5 class="fw-bolder mb-4">Pogledajte naš cenovnik i pronađite usluge koje su vam potrebne. 📋</h5>
                  <div class="accordion mb-5" id="accordionExample">
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Ginekologija cenovnik</button></h3>
                        <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                            <i class="bi bi-check text-primary"></i>Specijalistički pregled ginekologa			5500 RSD 4400.00 RSD
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Radiologija cenovnik</button></h3>
                        <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong>
                              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                              <code>.accordion-body</code>
                              , though the transition does limit overflow.
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Accordion Item #3</button></h3>
                        <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong>
                              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                              <code>.accordion-body</code>
                              , though the transition does limit overflow.
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- FAQ Accordion 2-->
                  <h5 class="fw-bolder mb-4">Najčešća pitanja i dodatne informacije</h5>
                  <div class="accordion mb-5 mb-xl-0" id="accordionExample2">
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingOne1"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">Šta podrazumeva pregled ginekologa</button></h3>
                        <div class="accordion-collapse collapse" id="collapseOne1" aria-labelledby="headingOne1" data-bs-parent="#accordionExample2">
                           <div class="accordion-body">
                       Ginekološki pregled podrzumeva posmatranje (inspekciju) stidnice, izgled velikih i malih usana, klitorisa, kao i određivanje ženskog i muškog tipa kosmatosti intimne regije, grubo sagledavanje eventualnih promena (polnih bradavica i sl.), konstatuje da li postoji himen ili ne, kako bi se nakon toga pristupilo daljem pregledu.
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingTwo2"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">Accordion Item #2</button></h3>
                        <div class="accordion-collapse collapse" id="collapseTwo2" aria-labelledby="headingTwo2" data-bs-parent="#accordionExample2">
                           <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong>
                              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                              <code>.accordion-body</code>
                              , though the transition does limit overflow.
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingThree3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree">Accordion Item #3</button></h3>
                        <div class="accordion-collapse collapse" id="collapseThree3" aria-labelledby="headingThree3" data-bs-parent="#accordionExample2">
                           <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong>
                              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                              <code>.accordion-body</code>
                              , though the transition does limit overflow.
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4">
                  <div class="sidebar-fixed">
                     <div class="card border-0 bg-white shadow-sm mt-xl-5">
                        <div class="card-body p-4 py-lg-5">
                           <div class="d-flex align-items-center justify-content-center">
                           
                  <div class="position-relative mb-5">
                     <div class="bg-white shadow-sm overflow-hidden rounded-3">
                        <img class="card-img-top" src="img/service-01.jpg" alt="...">
                        <div class="p-4">
                           <div class="mb-3">
                              <h5 class="fw-bold mb-1">Ovde ide RANDOM usluga x 3</h5>
                              <p class="fw-light mb-0 text-primary small">Operations & surgeries</p>
                           </div>
                           <p class="text-muted fw-light mb-0">The sunrise and sunset gorges. Horses and local natural products. We are happy family. We look forward to host you... <a href="services-item.php" class="text-dark stretched-link">more</a></p>
                        </div>
                     </div>
                  </div>
               
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	   <section class="py-5 bg-warning">
         <div class="container px-5 my-5 text-center">
            <h2 class="display-5 fw-bolder text-black mb-1">Zakažite Vaš pregled</h2>
            <p class="mb-5 fs-5">U par klikova zakažite Vaš pregled ili nas pozovite tokom radnog vremena na <a href="tel:+381605558888"><b>(060) 555 88 88</b></a></p>
            <a class="btn btn-outline-dark fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase" href="appointment.php">Zakažite pregled</a>
         </div>
      </section>
	   <!-- Testimonial section-->
    <section class="py-5 bg-white">
      <div class="container px-5 mt-5">
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-8 col-xl-6">
            <div class="text-center mb-5">
              <p class="text-uppercase text-primary mb-2">SVEDOČENJA</p>
              <h2 class="fw-bold mb-3 text-black">Šta naši pacijenti kažu o našim uslugama</h2>
            </div>
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-lg-4">
            <div class="text-left mb-5">
              <span class="text-warning fs-6">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </span>
              <p class="fs-5 mb-4 mt-2 fw-light text-primary">"Doktor Кajtazi, stara škola cenjenih lekara sa temeljnom primenom savremenih znanja medicine. Bravo za polikliniku. Divan i uigran tim u laboratoriji i na recepciji."</p>
              <h6 class="fw-bold mb-1">Gojko Nicić</h6>
              <p class="fw-light mb-0 text-muted">Beograd, Srbija</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="text-left mb-5">
              <span class="text-warning fs-6">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </span>
              <p class="fs-5 mb-4 mt-2 fw-light text-primary">"Pedijatrija je savremeno opremljena. Medicinske sestre su veoma ljubazne i imaju divan pristup detetu. Doktor je takođe bio divan i detaljno je pregledao dete. Sve je zaista vrhunsko!"</p>
              <h6 class="fw-bold mb-1">Aleksandra Lalević</h6>
              <p class="fw-light mb-0 text-muted">Vinča, Srbija</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="text-left mb-5">
              <span class="text-warning fs-6">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </span>
              <p class="fs-5 mb-4 mt-2 fw-light text-primary">"Odlična lokacija, sa mnogo parking mesta. Osoblje veoma profesionalno, klinika najsavremenije opremljena. Sve pohvale... 10+!"</p>
              <h6 class="fw-bold mb-1">Mira Stevanović</h6>
              <p class="fw-light mb-0 text-muted">Smederevo, Srbija</p>
            </div>
          </div>
        </div>
      </div>
    </section>
	 <!-- Blog preview section-->
    <section class="py-5">
      <div class="container px-5 mt-5">
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-8 col-xl-6">
            <div class="text-center mb-5">
              <p class="text-uppercase text-primary mb-2">SAVETI STRUČNJAKA</p>
              <h2 class="fw-bold mb-3 text-black">Poslednje novosti i stručni tekstovi iz sveta medicine</h2>
              <p class="text-muted">Budite u toku sa najnovijim vestima i stručnim tekstovima iz sveta medicine! 🩺 Saznajte više o najnovijim otkrićima i savetima za vaše zdravlje.</p>
            </div>
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow-sm rounded-3 border-0">
              <img class="card-img-top" src="img/blog-1.jpg" alt="..." />
              <div class="card-body p-4">
                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Novosti</div>
                <a class="text-decoration-none link-dark stretched-link" href="blog-post.php">
                  <h5 class="card-title mb-3 lh-base">Things Most People Don't Know About Medical Clinic</h5>
                </a>
                <p class="card-text mb-0">Adaptive height of each card this text is a bit longer to illustrate the. Some quick example text to build on the card title bulk of the card's content and make up the.</p>
              </div>
              <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle me-3" src="img/u1.png" alt="..." />
                    <div class="small">
                      <div class="fw-bold">Kelly Rowan</div>
                      <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow-sm rounded-3 border-0">
              <img class="card-img-top" src="img/blog-3.jpg" alt="..." />
              <div class="card-body p-4">
                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Saveti</div>
                <a class="text-decoration-none link-dark stretched-link" href="blog-post.php">
                  <h5 class="card-title mb-3 lh-base">The Ugly Truth About Medical Clinic</h5>
                </a>
                <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle me-3" src="img/u2.png" alt="..." />
                    <div class="small">
                      <div class="fw-bold">Josiah Barclay</div>
                      <div class="text-muted">March 23, 2021 &middot; 4 min read</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow-sm rounded-3 border-0">
              <img class="card-img-top" src="img/blog-4.jpg" alt="..." />
              <div class="card-body p-4">
                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Novosti</div>
                <a class="text-decoration-none link-dark stretched-link" href="blog-post.php">
                  <h5 class="card-title mb-3 lh-base">What NOT to Do in the Medical Clinic Industry</h5>
                </a>
                <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the card's content This text is a bit longer to illustrate the adaptive height of each card.</p>
              </div>
              <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle me-3" src="img/u3.png" alt="..." />
                    <div class="small">
                      <div class="fw-bold">Evelyn Martinez</div>
                      <div class="text-muted">April 2, 2021 &middot; 10 min read</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	   <section class="py-5 bg-primary">
      <div class="container px-5 my-4">
        <!-- Call to action-->
        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
          <div class="mb-4 mb-xl-0">
            <h2 class="fs-1 mb-1 fw-bold text-white"><b>Zakažite</b> Vaš pregled!</h2>
            <p class="text-white-50">U par klikova zakažite Vaš pregled ili nas pozovite tokom radnog vremena na (060) 555 88 88.</p>
          </div>
          <div class="ms-xl-4">
           <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                  <a class="btn btn-light fw-bold text-primary fs-7 rounded-3 px-4 py-3 text-uppercase me-sm-1" href="appointment.php"> Zakažite pregled </a>
                  <a class="btn btn-outline-light fw-bold fs-7 rounded-3 px-4 py-3 text-uppercase" href="tel:+381605558888"> <i class="bi bi-telephone"></i> 060 555 88 88 </a>
                </div>
          </div>
        </div>
      </div>
    </section>
   </main>

   <!-- Footer -->
   <?php require_once('layout/footer.php'); ?>
   <!-- Scripts -->
   <?php require_once('layout/scripts.php'); ?>
</body>

</html>