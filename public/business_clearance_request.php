<?php
require "include/header.php";

?>


  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #1977cc">
      <div class="container" data-aos="fade-up">
        <div class="card-haha maangas">
          <div class="section-title">
            <h5 class="h5-title text-center pb-0 fs-3">Barangay Business Clearance</h5>
            <p class="text-center"> Barangay Business Clearance is one of the permits or documents required when registering a new business in the Philippines. This certificate is also needed when renewing your expired Mayor's Permit or Business License, changing a new business location, and changing a new business commercial name.</p>
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


        <div class="row mt-4">


            <div class="col-lg-4 mt-2">
              <div class="info">
                <div class="address">
                  <i class="fa-solid fa-peso-sign fs-5"></i>
                  <?php if ($fees['business_clearance_price'] == 0): ?>
                  <h4>Fees: Free</h4>
                  <?php else: ?>
                    <h4>Fees: <?= $fees['business_clearance_price'] ?></h4>
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
                <input type="hidden" name="business_clearance_price" value="<?= $fees['business_clearance_price'] ?>">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label class="form-label mt-2">Payment Method</label>
                    <select class="form-select" name="payment_type" id="payment_type" aria-label="Default select example" style="cursor: pointer;">
                      <?php
                      if($fees['business_clearance_price'] == 0):
                      ?>
                      <option value="Free">Free</option>
                      <?php else: ?>
                      <option value="Cash on pick-up"<?php if (isset($_SESSION['payment_type']) && $_SESSION['payment_type']=="Cash on pick-up") echo "selected"; ?>>Cash on Pick Up</option>
                      <option value="Gcash"<?php if (isset($_SESSION['payment_type']) && $_SESSION['payment_type']=="Gcash") echo "selected"; unset($_SESSION['payment_type']) ?>>Gcash</option>
                    <?php endif; ?>
                    </select>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0" id="opt12">
                     <label class="form-label mt-2">Gcash Reference Number</label>
                    <input type="text" class="form-control form-control-sm" name="reference_number" placeholder="Enter Gcash Reference Number" id="required" value="<?php if(isset($_SESSION['reference_number'])) echo $_SESSION['reference_number']; unset($_SESSION['reference_number']);  ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label">Business Name</label>
                    <input type="text" class="form-control form-control-sm" name="business_name" placeholder="Enter Business Name" value="<?php if(isset($_SESSION['business_name'])) echo $_SESSION['business_name']; unset($_SESSION['business_name']);  ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Business Type</label>
                    <input type="text" class="form-control form-control-sm" name="business_type" placeholder="Enter Business Type" value="<?php if(isset($_SESSION['business_type'])) echo $_SESSION['business_type']; unset($_SESSION['business_type']);  ?>" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label class="form-label">Business Location</label>
                  <select class="form-select" name="business_location" required>
                    <option>-Select Location-</option>
                    <?php foreach($combine_result as $row): ?>
                    <option value="<?= $row['purok'].", ".$row['brgy'].", ".$row['city'].", ".$row['province'] ?>"><?= $row['purok'].", ".$row['brgy'].", ".$row['city'].", ".$row['province'] ?></option>
                  <?php endforeach; ?>
                  </select>
                  <!-- <textarea class="form-control" name="business_location" rows="2" placeholder="Ex. Purok 1, San Josef, Penaranda, Nueva Ecija" required value="<?php if(isset($_SESSION['business_location'])) echo $_SESSION['business_location']; ?>"><?php if(isset($_SESSION['business_location'])) echo $_SESSION['business_location']; unset($_SESSION['business_location']);  ?></textarea> -->
                </div>
                <div class="form-group mt-3">
                  <label class="form-label">Purpose</label>
                  <textarea class="form-control" name="purpose" rows="3" placeholder="Enter Purpose" required value="<?php if(isset($_SESSION['purpose'])) echo $_SESSION['purpose']; ?>"><?php if(isset($_SESSION['purpose'])) echo $_SESSION['purpose']; unset($_SESSION['purpose']);  ?></textarea>
                </div>
                <input type="hidden" name="business_clearance_price" value="<?= $fees['business_clearance_price'] ?>">
                <?php if(isset($_SESSION['unique_id'])): ?>
                <div class="text-center"><button type="submit" name="brgyBusinessClearance">Submit</button></div>
              <?php endif; ?>
              </form>

            </div>

          </div>

      </div>
    </div>
  </section>


  

  </main><!-- End #main -->

<?php require "include/footer.php" ?>