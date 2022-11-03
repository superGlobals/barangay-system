<?php

require "include/header.php";

?>

  <main id="main">

    <!-- ======= About Section ======= -->
     <section id="about" class="doctors" style="background-color: #1977cc">
      <div class="container">
        <div class="card-haha maangas" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
          <div class="section-title">
            <h5 class="h5-title text-center pb-0 fs-2">LIST OF CURRENT BARANGAY OFFICIALS</h5>
        </div>

        <div class="row">

          <?php

            foreach($official_result as $official):
              $date = $official['start_term']; 
              $date = new DateTime($date);
              $result = $date->format("F j, Y"); 
              $date_end = $official['end_term']; 
              $date_end = new DateTime($date_end);
              $result_end = $date_end->format("F j, Y"); 
            ?>

         <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start mt-4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
              <img class="rounded-circle" src="admin/<?= $official['picture'] ?>" width="130" height="130" alt="Official Photo">
              <div class="member-info">
                <h4><?= ucwords($official['firstname']." ".$official['lastname']) ?></h4>
                <span><?= ucwords($official['position']) ?></span>
                <div class="row">
                <p class="col"><span class="fw-bold">Start Term</span> <?= $result ?></p>
                <p class="col"><span class="fw-bold">End Term</span> <?= $result_end ?></p>
                </div>
                </div>
              </div>
            </div>
         
        
         <?php endforeach; ?>
       </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

<?php require "include/footer.php" ?>