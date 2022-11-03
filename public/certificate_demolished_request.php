<?php
require "include/header.php";

?>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Certificate of Demolished</h2>
          <!-- <p> A Certificate of Indigency is issued by the MSWD OFFICE certifying that the said client belongs to an indigent family in their barangay as certified by the Barangay Captain.</p> -->
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

      <div class="card-haha" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="fa-solid fa-peso-sign fs-5"></i>
                <?php if ($fees['demolished_price'] == 0): ?>
                <h4>Fees: Free</h4>
                <?php else: ?>
                  <h4>Fees: <?= $fees['demolished_price'] ?></h4>
                <?php endif; ?>
              </div>

              <div class="email">
                <i class="fa-solid fa-hashtag"></i>
                <h4>Gcash Number: <?= $brgy_info['contact'] ?></h4>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="function/transactionFunction.php" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="form-label mt-2">Payment Method</label>
                  <select class="form-select" id="payment_type" aria-label="Default select example" style="cursor: pointer;">
                    <option value="Cash on pick-up">Cash on pick-up</option>
                    <option value="Gcash">Gcash</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0" id="opt12">
                   <label class="form-label mt-2">Gcash Reference Number</label>
                  <input type="text" class="form-control" name="gcash" placeholder="Enter Gcash Reference Number" id="required">
                </div>
              </div>
              <div class="form-group mt-3">
                <label class="form-label">Purpose</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Enter Purpose" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Submit</button></div>
            </form>

          </div>

        </div>
      </div>

      </div>
    </section>


  

  </main><!-- End #main -->

<?php require "include/footer.php" ?>