<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php require_once('layout/head.php'); ?>

<body class="d-flex flex-column h-100 bg-light">
   <main class="flex-shrink-0">
      <div class="bg-primary">
         <!-- Navigation -->
         <?php require_once('layout/navigation.php'); ?>
         <!-- Header -->
         <header class="bg-primary py-5 inner-header">
            <div class="container py-4 px-5">
               <div class="row gx-5 align-items-center justify-content-center">
                  <div class="col-lg-12">
                     <div class="text-center">
                        <h1 class="fw-bold text-white">Frequently Asked Questions</h1>
                        <p class="lead fw-normal text-white-50 mb-0">How can we help you?</p>
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
               <div class="col-xl-8">
                  <!-- FAQ Accordion 1-->
                  <h5 class="fw-bolder mb-4">Account &amp; Billing</h5>
                  <div class="accordion mb-5" id="accordionExample">
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion Item #1</button></h3>
                        <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                              <strong>This is the first item's accordion body.</strong>
                              It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                              <code>.accordion-body</code>
                              , though the transition does limit overflow.
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Accordion Item #2</button></h3>
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
                  <h5 class="fw-bolder mb-4">Website Issues</h5>
                  <div class="accordion mb-5 mb-xl-0" id="accordionExample2">
                     <div class="accordion-item border-0 shadow-sm mb-2 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingOne1"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">Accordion Item #1</button></h3>
                        <div class="accordion-collapse collapse" id="collapseOne1" aria-labelledby="headingOne1" data-bs-parent="#accordionExample2">
                           <div class="accordion-body">
                              <strong>This is the first item's accordion body.</strong>
                              It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                              <code>.accordion-body</code>
                              , though the transition does limit overflow.
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
                              <div class="text-center">
                                 <div class="h6 fw-bolder">Have more questions?</div>
                                 <p class="text-muted mb-4">
                                    Contact us at
                                    <br />
                                    <a href="#!">support@domain.com</a>
                                 </p>
                                 <div class="h6 fw-bolder">Follow us</div>
                                 <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-twitter"></i></a>
                                 <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-facebook"></i></a>
                                 <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-linkedin"></i></a>
                                 <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-youtube"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
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