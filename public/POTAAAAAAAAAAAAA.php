
<?php 

require "include/header.php";
require "include/time_ago.php";
?>
<!-- background-color: #1977cc -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  <div class="container">
    <!-- notif -->
    <?php if($total_notif > 0): ?>
      <?php foreach($notif_results as $notif_result):
       ?>
    <div class="row justify-content-center">
      <div class="card-haha maangas col-md-6 mt-4" data-aos="zoom-in" data-aos-delay="100" style="background-color: #e9e8e6; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <h2 class="text-dark"><?= $notif_result['notification'] ?></h2>
        <h2 class="text-dark"><?= $notif_result['reason'] ?></h2>
        <h6 class="mt-2"><i class="fa-solid fa-clock"></i> <?= facebook_time_ago($notif_result['date']); ?></h6>
        <form action="notifFunction.php" method="post">
          <button type="submit" class="btn btn-primary float-end mt-2" name="close"> Close</button>
        </form>
        </div>
      </div>
    <?php endforeach; ?>
    <?php endif; ?>
      <!-- notif -->

    <div class="card-haha maangas mt-4" data-aos="zoom-in" data-aos-delay="100" style="background-color: #e9e8e6;">
      <div class="row align-items-center">
        <div class="col-md-2 text-center">
          <div class="row">
              <div class="col">
                <?php foreach($result as $row): ?>
                  <img src="admin/<?= $row['city_logo'] ?>" class="img-fluid" style="border-radius: 100%; width: 100px;">
              </div>
              <div class="col d-lg-none d-md-none" id="img-town">
                  <img src="admin/<?= $row['brgy_logo'] ?>" class="img-fluid" style="border-radius: 100%; width: 100px; ">
              </div>
          </div>
      </div>
      <div class="col-md-8 container d-flex flex-column align-items-center" >
        <h1 class="text-center text-dark fs-1">Barangay Information System</h1>
        <h2 class="text-uppercase text-dark fw-bold">Brgy. PORTAL OF <?= $row['brgy'] ?></h2>
        <h6 class="text-uppercase text-dark fw-bold mt-2">Contact number: <?= $row['contact'] ?></h6>
        <a href="services" class="btn-about">Request Certificate</a>
      </div>
      <div class="col-md-2 text-center d-none d-md-block">
          <img  src="admin/<?= $row['brgy_logo'] ?>" class="img-fluid" style="border-radius: 100%; width: 100px;">
        <?php endforeach; ?>
          </div>
        </div>
        
      </div>
    </div>
  </section><!-- End Hero -->


<?php require "public/include/footer.php" ?>