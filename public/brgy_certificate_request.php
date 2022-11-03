<?php
require "include/header.php";

?>


  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #1977cc">
      <div class="container" data-aos="fade-up">
        <div class="card-haha maangas">
          <div class="section-title">
            <h5 class="h5-title text-center pb-0 fs-3">Barangay Certificate</h5>
            <p class="text-center"> Otherwise known as Barangay Certificate of Residency. This document proves that you are a resident of a particular barangay. You can be issued a copy of this certificate if you have been residing in a particular barangay for at least 6 months or more.</p>
          </div>

        <?php if(!isset($_SESSION['unique_id'])): ?>
         <div class="row justify-content-center">
          <div class="card" style="border-radius: 0">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-1">
                <h5 style="color: #f0ad4e; font-size: 50px; border-radius: 50%;" class="text-center mt-4"><i class="bi bi-exclamation-circle"></i></h5>
               </div>
               <div class="col-lg-10">
                 <div class="p-2">
                   <h5 class="text-danger">Login Required</h5>
                   <span class="text-dark">Please log in to your account to continue requesting the certificate.</span>
                 </div>
                 <a class="btn btn-secondary btn-sm" href="register">Register</a>
                 <a class="btn btn-primary btn-sm" href="login">Login</a>
               </div></div>
              
             </div>
           </div>
         </div>
       <?php endif; ?>

          <div class="row mt-5">

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="fa-solid fa-peso-sign fs-5"></i>
                  <?php if ($fees['certificate_price'] == 0): ?>
                  <h4>Fees: Free</h4>
                  <?php else: ?>
                    <h4>Fees: <?= $fees['certificate_price'] ?></h4>
                  <?php endif; ?>
                </div>

                <div class="email">
                  <i class="fa-solid fa-hashtag"></i>
                  <h4>Gcash Number: <?= $brgy_info['contact'] ?></h4>
                </div>

              </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">

              <form action="transactionFunction.php" method="post">
                <input type="hidden" name="certificate_price" value="<?= $fees['certificate_price'] ?>">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label class="form-label mt-2">Payment Method</label>
                    <select class="form-select" name="payment_type" id="payment_type" aria-label="Default select example" style="cursor: pointer;">
                      <?php
                      if($fees['certificate_price'] == 0):
                      ?>
                      <option value="Free">Free</option>
                      <?php else: ?>
                      <option value="Cash on pick-up">Cash on Pick Up</option>
                      <option value="Gcash">Gcash</option>
                    <?php endif; ?>
                    </select>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0" id="opt12">
                     <label class="form-label mt-2">Gcash Reference Number</label>
                    <input type="text" class="form-control" name="reference_number" placeholder="Enter Gcash Reference Number" id="required">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label class="form-label">Purpose</label>
                  <textarea class="form-control" name="purpose" rows="5" placeholder="Enter Purpose" required></textarea>
                </div>
               <?php if(isset($_SESSION['unique_id'])): ?>
                <div class="text-center"><button type="submit" name="brgyCertificate">Submit</button></div>
              <?php endif; ?>
              </form>

            </div>

          </div>
        </div>

      </div>
    </section>


  

  </main><!-- End #main -->

<?php require "include/footer.php" ?>