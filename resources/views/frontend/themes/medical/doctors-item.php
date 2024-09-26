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
                        <h1 class="fw-bold text-white">Doctor Profile</h1>
                        <p class="fw-normal text-white-50 mb-0"><a class="text-white" href="index.php">Home</a> <i class="bi-arrow-right"></i> Doctor Profile</p>
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
                           <div class="d-flex align-items-center justify-content-between border-top border-50 py-4 px-5">
                              <a class="px-2 text-white" href="#!"><i class="bi-twitter"></i></a>
                              <a class="px-2 text-white" href="#!"><i class="bi-facebook"></i></a>
                              <a class="px-2 text-white" href="#!"><i class="bi-linkedin"></i></a>
                              <a class="px-2 text-white" href="#!"><i class="bi-youtube"></i></a>
                           </div>
                        </div>
                        <a href="appointment.php" class="btn btn-warning fw-bold fs-7 shadow-sm rounded-3 w-100 border-0 px-4 py-3 text-uppercase">Get Appointment</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8">
                  <h2 class="mb-1 fw-bold text-primary">Dr. Tom Smith Bert</h2>
                  <p class="lead mb-3">Royal Prince Alfred Hospital – United Kingdom</p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident. </p>
                  <p class="mb-4">
                     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
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
      <section class="py-5 bg-white border-bottom">
         <div class="container px-5 mt-5">
            <div class="d-flex align-items-center mb-4">
               <h2 class="fw-bold fs-5 mb-0">Related Doctors</h2>
               <a class="text-decoration-none ms-auto" href="doctors-overview.php">
                  More Doctors
                  <i class="bi bi-arrow-right"></i>
               </a>
            </div>
            <div class="row gx-5">
               <div class="col-lg-4">
                  <div class="position-relative mb-5">
                     <div class="bg-white border p-4 rounded-3">
                        <div class="d-flex mb-3 align-items-center">
                           <img class="img-fluid rounded-circle" src="img/d2.png" alt="...">
                           <div class="ms-3">
                              <h5 class="fw-bold mb-1">Collis Molate <i class="bi bi-patch-check-fill small text-primary"></i></h5>
                              <p class="fw-light mb-0 text-muted small">Neurosurgeon</p>
                           </div>
                        </div>
                        <p class="text-muted fw-light mb-4">The sunrise and sunset gorges. Horses and local natural products. We are happy family. We look forward to host you.</p>
                        <div class="d-flex align-items-center justify-content-between">
                           <a href="appointment.php" class="btn btn-outline-primary fw-bold fs-7 rounded-3 w-100 px-4 py-3 text-uppercase">Get Appointment</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="position-relative mb-5">
                     <div class="bg-white border p-4 rounded-3">
                        <div class="d-flex mb-3 align-items-center">
                           <img class="img-fluid rounded-circle" src="img/d3.png" alt="...">
                           <div class="ms-3">
                              <h5 class="fw-bold mb-1">Domani Plavon</h5>
                              <p class="fw-light mb-0 text-muted small">Neurosurgeon</p>
                           </div>
                        </div>
                        <p class="text-muted fw-light mb-4">The sunrise and sunset gorges. Horses and local natural products. We are happy family. We look forward to host you.</p>
                        <div class="d-flex align-items-center justify-content-between">
                           <a href="appointment.php" class="btn btn-outline-primary fw-bold fs-7 rounded-3 w-100 px-4 py-3 text-uppercase">Get Appointment</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="position-relative mb-5">
                     <div class="bg-white border p-4 rounded-3">
                        <div class="d-flex mb-3 align-items-center">
                           <img class="img-fluid rounded-circle" src="img/d5.png" alt="...">
                           <div class="ms-3">
                              <h5 class="fw-bold mb-1">John Mard</h5>
                              <p class="fw-light mb-0 text-muted small">Dental Surgeon</p>
                           </div>
                        </div>
                        <p class="text-muted fw-light mb-4">The sunrise and sunset gorges. Horses and local natural products. We are happy family. We look forward to host you.</p>
                        <div class="d-flex align-items-center justify-content-between">
                           <a href="appointment.php" class="btn btn-outline-primary fw-bold fs-7 rounded-3 w-100 px-4 py-3 text-uppercase">Get Appointment</a>
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