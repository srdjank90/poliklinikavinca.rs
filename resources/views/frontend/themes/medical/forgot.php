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
      <div class="bg-primary">
         <!-- Login -->
         <div class="container px-5 py-5 login">
            <!-- Login -->
            <div>
               <div class="m-auto bg-white shadow-sm p-5 rounded-3 text-center col-lg-5 mx-auto">
                  <h3 class="fw-bold text-black mb-2">Forgot password
                  </h3>
                  <p class="text-muted fw-light">Enter the email address you see on domain. We'll send you a link to reset your password</p>
                  <form action="https://webartinfo.com/themeforest/medicil/index.php" class="text-start pt-4 mb-3">
                     <div class="mb-3">
                        <label class="form-label small text-muted">E-Mail Address <small class="text-danger">*</small></label>
                        <input type="email" class="form-control" placeholder="Enter E-Mail">
                     </div>
                     <button type="button" class="btn btn-warning fw-bold fs-7 rounded-3 w-100 border-0 px-4 py-3 text-uppercase">RESET PASSWORD</button>
                  </form>
                  <p class="text-muted mb-0">Go back to <a href="signin.php" class="text-mdinfo">Sign In</a></p>
               </div>
               <p class="mb-0 text-center small text-white my-5">Having trouble loginng in? <a href="contact.php" class="text-decoration-underline text-white">Learn from our Knowledge Base</a></p>
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