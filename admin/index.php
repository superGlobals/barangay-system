<?php require'include/header.php' ?>

<?php 
$query = "SELECT COUNT(*) FROM brgy_request_certificate WHERE status = 'pending'";
$res = $conn->query($query);
$count = $res->fetchColumn();

$query_cert = $conn->prepare("SELECT certificate_type, COUNT(certificate_type) AS TotalCert, amount, SUM(amount) AS TotalSum FROM brgy_request_certificate WHERE revenue_status ='done' GROUP BY certificate_type ORDER BY COUNT(certificate_type) DESC");
$query_cert->execute();
$result_cert = $query_cert->fetchAll(PDO::FETCH_ASSOC);
$count_cert = $query_cert->rowCount();
$id = 1;
 ?>
  <?php require 'include/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="col-lg-12">
         <div class="card bg-dark">
            <div class="card-body p-3">
              <!-- <h5 class="card-title">Sales <span>| Today</span></h5> -->
              <div class="d-flex align-items-center">
                  <img class="img-fluid" src="<?= $result['brgy_logo'] ?>" style="border-radius: 100%; height: 100px; width: 100px;">
                <div class="ps-3">
                  <h4 class="text-white">Barangay <?= $result['brgy'] ?></h4>
                 <span class="text-white small pt-2 ps-1">Municipality of <?= $result['city'] ?></span>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Pending Request | <span class="text-danger fs-5"><?= $count ?></span></h5>

                  <table class="table datatable">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Cert. Type</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Date of Request</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = $conn->prepare("SELECT * FROM brgy_request_certificate LEFT JOIN resident ON resident.resident_id = brgy_request_certificate.resident_id WHERE status = 'pending' ORDER BY brgy_clearance_id DESC");
                      $query->execute();
                      $result = $query->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($result as $row):
                       $brgy_clearance_id = $row['brgy_clearance_id'];
                       $date = $row['date_of_request']; 
                       $date = new DateTime($date);
                       $result = $date->format("F j, Y, g:i a"); ?>
                      <tr>
                        <td><?= ucwords($row['firstname']." ".$row['lastname']) ?></td>
                        <td><?= $row['purpose'] ?></td>
                        <td><?= $row['certificate_type'] ?></td>
                        <td><?= $row['payment_type'] ?></td>
                        <td><?= $result ?></td>
                        <td>
                          <div class="dropdown">
                            <a class="btn bg-primary bg-gradient text-white btn-sm dropdown-toggle rounded-pill" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <?php if($row['payment_type'] == 'Gcash' ): ?>
                              <li>
                                <a href="#view<?php echo $brgy_clearance_id; ?>" data-bs-toggle="modal" class=" dropdown-item">View Ref. Number</a>
                              </li>
                             <?php endif; ?>
                              <li><a class="dropdown-item" href="#accept<?= $brgy_clearance_id ?>" data-bs-toggle="modal">Accept</a></li>
                              <li><a class="dropdown-item" href="#decline<?php echo $brgy_clearance_id; ?>" data-bs-toggle="modal">Decline</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    <?php require 'include/accept_decline_modal.php'; ?>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body pb-0">
                  <h5 class="card-title">Most Request Certificate</h5>

                  <table class="table table-borderless">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Total Request</th>
                        <th scope="col">Price</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($result_cert as $row): ?>
                      <tr>
                        <td><?= $id++ ?></td>
                        <td class="fw-bold"><?= $row['certificate_type'] ?></td>
                        <td><?= number_format($row['TotalCert']) ?></td>
                        <td><?= $row['amount'] ?></td>
                        <td><?= number_format($row['TotalSum']) ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

            <!-- <h3 class="text-center mb-3"><span style="border-bottom: 2px solid red;">List of Barangay Official</span></h3>   -->
            <!-- brgy official Card -->
           <!--  <?php 
            $query = $conn->prepare("SELECT * FROM brgy_official LEFT JOIN position ON brgy_official.position = position.position_id
                ORDER BY position_id ASC");
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($result):
              foreach($result as $row):
                $date = $row['start_term']; 
                $date = new DateTime($date);
                $result = $date->format("F j, Y"); 
                $date_end = $row['end_term']; 
                $date_end = new DateTime($date_end);
                $result_end = $date_end->format("F j, Y"); 
            
             ?>
            <div class="col-xxl-4 col-md-6">
              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                  <img src="<?= $row['picture'] ?>" alt="Profile" class="rounded-circle" height="120" width="120">
                  <h5 class="mt-3 fw-bold"><?= ucwords($row['firstname']." ".$row['middlename'].". ".$row['lastname']) ?></h5 class="mt-3 fw-bold">
                  <h6><?= $row['position'] ?></h6>
                 
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <h2 class="text-center">Please add Barangay Official</h2>
        <?php endif; ?> -->
            <!-- End brgy official Card -->

            

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">To verify account <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <a href="to_verify_account.php" title="To Verify Account">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-badge"></i>
                    </div>
                    <?php
                    $query = $conn->prepare("SELECT * FROM resident WHERE to_verify_status = 1");
                    $query->execute();
                    $count = $query->rowCount();
                    ?>
                    <div class="ps-3 text-center">
                      <h6><?= $count ?></h6>
                      </a>

                    </div>
                  </div>
                </div>
              </div> <!-- End Recent Activity -->

              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Resident <span>| Total</span></h5>
                  <?php
                  $query = $conn->prepare("SELECT * FROM resident");
                  $query->execute();
                  $count = $query->rowCount();
                  ?>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3 text-center">
                      <h6><?= $count ?></h6>
                    <!--   <button class="btn bg-success bg-gradient text-white btn-sm rounded-pill" style="width: 100px;">View</button> -->

                    </div>
                  </div>
                </div>
              </div>

              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Male <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-gender-male"></i>
                    </div>
                    <div class="ps-3 text-center">
                    <?php
                    $query = $conn->prepare("SELECT * FROM resident WHERE gender = 'male'");
                    $query->execute();
                    $count = $query->rowCount();
                    ?>
                      <h6><?= $count ?></h6>

                    </div>
                  </div>
                </div>
              </div>

              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Female <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-gender-female"></i>
                    </div>
                    <div class="ps-3 text-center">
                    <?php
                    $query = $conn->prepare("SELECT * FROM resident WHERE gender = 'female'");
                    $query->execute();
                    $count = $query->rowCount();
                    ?>
                      <h6><?= $count ?></h6>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Voters <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="ps-3 text-center">
                    <?php
                    $query = $conn->prepare("SELECT * FROM resident WHERE voters_status = 'yes'");
                    $query->execute();
                    $count = $query->rowCount();
                    ?>
                      <h6><?= $count ?></h6>
                    </div>
                  </div>
                </div>
              </div>


              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Non Voters <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-x-lg"></i>
                    </div>
                    <div class="ps-3 text-center">
                    <?php
                    $query = $conn->prepare("SELECT * FROM resident WHERE voters_status = 'no'");
                    $query->execute();
                    $count = $query->rowCount();
                    ?>
                      <h6><?= $count ?></h6>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Blotter Records <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-archive"></i>
                    </div>
                    <div class="ps-3 text-center">
                     <?php
                      $query = $conn->prepare("SELECT * FROM blotter");
                      $query->execute();
                      $count = $query->rowCount();
                      ?>
                      <h6><?= $count ?></h6>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Senior Citizen <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-person-cane"></i>
                    </div>
                    <div class="ps-3 text-center">
                     <?php
                      $query = $conn->prepare("SELECT * FROM resident WHERE age >= 60");
                      $query->execute();
                      $count = $query->rowCount();
                      ?>
                      <h6><?= $count ?></h6>
                    </div>
                  </div>
                </div>
              </div>

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php require 'include/footer.php'; ?>

</body>

</html>