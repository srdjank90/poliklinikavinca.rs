<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php require_once('layout/head.php'); ?>

<body class="d-flex flex-column h-100 bg-light">
   <main class="flex-shrink-0">
      <div class="bg-primary">
         <!-- Navigation -->
         <?php require_once('layout/navigation.php'); ?>
      </div>
      <!-- Page Content-->
      <div class="bg-primary py-5">
         <!-- Login -->
         <div class="container px-5 py-5 login">
            <!-- Login -->
            <div>
               <div class="text-center col-lg-5 mx-auto">
                  <img src="img/404.svg" class="img-fluid" alt="yoursitename">
                  <h1 class="text-white fw-bold">Ooops, Page not found</h1>
                  <p class="fs-6 mb-5 text-white-50">Oops! Looks like you followed a bad link.<br>
                     If you think this is a problem with us, please tell us.
                  </p>
                  <a href="index.php" class="btn btn-warning fw-bold fs-7 rounded-3 border-0 px-4 py-3 text-uppercase">
                     <i class="bi bi-house me-2"></i> Go Back
                  </a>
               </div>
            </div>
         </div>
      </div>
   </main>
   <!-- Footer -->
   <?php require_once('layout/footer.php'); ?>
   <!-- Scripts -->
   <?php require_once('layout/scripts.php'); ?>
</body>

</html>