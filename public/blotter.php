<?php

require "include/header.php";

?>

  <main id="main">

    <!-- ======= About Section ======= -->
     <section id="about" class="doctors" style="background-color: #1977cc">
      <div class="container">
        <div class="card-haha maangas" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
          <div class="section-title">
            <h5 class="h5-title text-center pb-0 fs-2">BLOTTER RECORDS</h5>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">
          <div class="table-responsive">
            <table class="table table-hover" id="myTable">
              <thead class="table-dark">
                <tr>
                  <th scope="col">Complainant</th>
                  <th scope="col">Date of Filling</th>
                  <th scope="col">Time of Filling</th>
                  <th scope="col">Blotter Details</th>
                  <th scope="col">Blotter Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($blotter_results as $row): ?>
                <tr>
                  <td><?= ucwords($row['complainant']) ?></td>
                  <td><?= ucwords($row['date_of_filling']) ?></td>
                  <td><?= ucwords($row['time_of_filling']) ?></td>
                  <td><?= ucwords($row['description']) ?></td>
                  <td><?= ucwords($row['status']) ?></td>
                </tr>
              <?php endforeach; ?>
                
              </tbody>
              </table>


             </div>
           </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

<?php require "include/footer.php" ?>