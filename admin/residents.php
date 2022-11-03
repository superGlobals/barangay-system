<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Residents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Residents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header" style="border: none;">
                  <a href="add_new_resident.php" class="btn btn-primary btn-sm float-end"><i class="bi bi-plus-lg"></i> New Resident</a>
                 </div>
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Photo</th> 
                          <th scope="col">Name</th>
                          <th scope="col">Purok</th>
                          <th scope="col">Age</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php

                    $query = $conn->prepare("SELECT * FROM resident WHERE delete_status != 'Archive' ORDER BY resident_id DESC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $resident_id =  $row['resident_id'];
                      $gender = $row['gender'];
                      $resident_status = $row['resident_status'];
                      $blotter_status = $row['blotter_records'];
                      $photo = $row['photo'];
        
                      if ($blotter_status == 'Pending') {
                      echo '<tr bgcolor="#fecac8">';
                      }
                      else {
                      echo '<tr>';
                      }
                       ?>
                      <td width="100">
                      <img class="rounded-circle" src="<?= $row['photo'] ?>" height="60" width="60">
                    </td>
                      <td class="text-dark text-sm font-weight-bolder"><?= ucwords($row['firstname'] . " ".$row['middlename']." " . $row['lastname']); ?></td>
                      <td class="text-dark text-sm font-weight-bolder"><?= $row['purok']; ?></td>
                      <td class="text-dark text-sm font-weight-bolder"><?= $row['age']; ?></td>
                      <td class="text-dark text-sm font-weight-bolder"><?= $row['contact_no']; ?></td>
                      <td class="text-dark text-sm font-weight-bolder" width="100">
                        <?php
                        if ($gender == 'Male') { ?>
                        
                         <a class="primary"><b><i class="fa-solid fa-mars"></i></a> <?= $row['gender']; ?></b>
                       <?php }elseif ($gender == 'Female') { ?>
                         <a style="color: pink;"><b><i class="fa-solid fa-venus"></i></a>
                          <?= $row['gender']; ?></b>

                     <?php } ?>                            
                      </td>
                      <td width="180">
                        <a title="Edit/View" href="edit_resident.php?id=<?= $resident_id; ?>" class="btn btn-primary btn-sm rounded-pill"><i class="bi bi-pencil-square"></i></a>
                        <a title="Delete" href="#delete_res<?= $resident_id; ?>" data-bs-toggle="modal" id="delete" class="btn btn-danger btn-sm  rounded-pill"><i class="bi bi-trash"></i></a>
                        <div class="btn-group" role="group">
                        <button title="Print" id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle btn-sm rounded-pill" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-printer"></i>
                        </button>
                        <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                        <li><a href="brgyClearance.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Brgy. Clearance</a></li>
                        <li><a href="certificateofIndigency.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Indigency</a></li>
                        <li><a href="certificate.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Brgy. Certificate</a></li>
                        <li><a href="certificateofResidency.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Brgy. Residency Cert.</a></li>
                        <li><a href="buildingClearance.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Brgy. Buiding Clearance</a></li>
                        <li><a href="clearanceNatID.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Brgy. Clearance(NAT'L ID)</a></li>
                        <li><a href="walkin_request_businessClearance.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Brgy. Business Clearance</a></li>
                        <li><a href="certificateofDemolished.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Certificate of Demolished</a></li>
                        <li><a href="certificateofGoodmoral.php?id=<?= $resident_id; ?>" class="dropdown-item mb-1"> Certificate of Good Moral</a></li>
                        <li><a href="#accept<?= $brgy_clearance_id; ?>" class="dropdown-item mb-1"> D. A Certification</a></li>
                        </ul>
                        </div>
                        </td>
                        </tr>
                        
                        <?php require 'include/deleteRes_modal.php'; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                   </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </main><!-- End #main -->
  <?php require 'include/footer.php'; ?>

</body>

</html>