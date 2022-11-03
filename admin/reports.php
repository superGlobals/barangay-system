<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Reports</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
              <h5 class="text-dark"><i class="bi bi-list-ul"></i> Generate Report By Purok</h5>
            </div>
          <div class="card-body p-3 text-center">
             <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i> Total Resident in Purok
                </button>
                <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                <li>
                  <?php 
                    $query = $conn->prepare("SELECT * FROM purok ORDER BY purok ASC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $id = $row['purok_id'];
                     ?>
                     <a href="generate_res_purok.php?id=<?= $id ?>" class="dropdown-item mb-1"> <?= $row['purok'] ?></a>
                 
                    <?php endforeach; ?></li>
                </ul>
              </div>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i> Total Male in Purok
                </button>
                <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                <li>
                  <?php 
                    $query = $conn->prepare("SELECT * FROM purok ORDER BY purok ASC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $id = $row['purok_id'];
                     ?>
                     <a href="generate_res_male.php?id=<?= $id ?>" class="dropdown-item mb-1"> <?php echo $row['purok'] ?></a>
                 
                    <?php endforeach; ?></li>
                </ul>
              </div>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i> Total Female in Purok
                </button>
                <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                <li>
                  <?php 
                    $query = $conn->prepare("SELECT * FROM purok ORDER BY purok ASC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $id = $row['purok_id'];
                     ?>
                     <a href="generate_res_female.php?id=<?= $id ?>" class="dropdown-item mb-1"> <?php echo $row['purok'] ?></a>
                 
                    <?php endforeach; ?></li>
                </ul>
              </div>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i> Total Voters in Purok
                </button>
                <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                <li>
                  <?php 
                    $query = $conn->prepare("SELECT * FROM purok ORDER BY purok ASC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $id = $row['purok_id'];
                     ?>
                     <a href="generate_res_voters.php?id=<?= $id ?>" class="dropdown-item mb-1"> <?php echo $row['purok'] ?></a>
                 
                    <?php endforeach; ?></li>
                </ul>
              </div>
              <div class="btn-group mt-3" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i> Total Non Voters in Purok
                </button>
                <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                <li>
                  <?php 
                    $query = $conn->prepare("SELECT * FROM purok ORDER BY purok ASC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $id = $row['purok_id'];
                     ?>
                     <a href="generate_res_nonvote.php?id=<?= $id ?>" class="dropdown-item mb-1"> <?php echo $row['purok'] ?></a>
                 
                    <?php endforeach; ?></li>
                </ul>
              </div>
              <div class="btn-group mt-3" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i> Total Senior in Purok
                </button>
                <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                <li>
                  <?php 
                    $query = $conn->prepare("SELECT * FROM purok ORDER BY purok ASC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $id = $row['purok_id'];
                     ?>
                     <a href="generate_res_senior.php?id=<?= $id ?>" class="dropdown-item mb-1"> <?php echo $row['purok'] ?></a>
                 
                    <?php endforeach; ?></li>
                </ul>
              </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
              <h5 class="text-dark"><i class="bi bi-list-ul"></i> Generate Report</h5>
            </div>
          <div class="card-body p-3 text-center">
            <a href="generate_resident_list.php" class="btn btn-primary"><i class="fa-solid fa-users"></i> Total Resident</a>
            <a href="generate_resident_male.php" class="btn btn-success"><i class="fa-solid fa-mars"></i> Total Male Resident</a>
            <a href="generate_resident_female.php" class="btn btn-warning"><i class="fa-solid fa-venus"></i> Total Female Resident</a>
            <a href="generate_voters_list.php" class="btn btn-danger"><i class="fa-solid fa-check-to-slot"></i> Total Voter's</a>
            <a href="generate_nonvoters_list.php" class="btn btn-dark"><i class="fa-solid fa-xmark"></i> Total Non Voter's</a><br>
            <a href="generate_senior_list.php" class="btn btn-info mt-3"><i class="fa-solid fa-person-cane"></i> Total Senior Citizen</a>
            <a href="generate_revenues.php" class="btn btn-primary mt-3"><i class="fa-solid fa-peso-sign"></i> Revenues</a>
          </div>
        </div>
      </div>
    </div>
  </section>


      </main><!-- End #main -->

  <?php require 'include/footer.php'; ?>

</body>

</html>