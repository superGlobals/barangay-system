<?php 
require 'include/header.php'; 
require 'include/sidebar.php';

$pending = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE status ='pending'");
$pending->execute();
$count_pending = $pending->rowCount();

$accepted = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE status ='accepted'");
$accepted->execute();
$count_accepted = $accepted->rowCount();

$pickup = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE status ='ready to pick up'");
$pickup->execute();
$count_pickup = $pickup->rowCount();

?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Request Certificate</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Request Certificate</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <?php if($count_pending > 0): ?>
                     <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link active" data-bs-toggle="tab" data-bs-target="#pending" id="pending-tab">Pending<span class="badge rounded-pill bg-danger m-1 badge-sm"><?= $count_pending ?></span></button>
                  <?php else: ?>
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link active" data-bs-toggle="tab" data-bs-target="#pending" id="pending-tab">Pending</button>
                <?php endif; ?>
                </li>

                <li class="nav-item">
                  <?php if($count_accepted > 0): ?>
                     <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link" data-bs-toggle="tab" data-bs-target="#accepted" id="accepted-tab">Accepted<span class="badge rounded-pill bg-danger m-1 badge-sm"><?= $count_accepted ?></span></button>
                  <?php else: ?>
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link" data-bs-toggle="tab" data-bs-target="#accepted" id="accepted-tab">Accepted</button>
                  <?php endif; ?>
                </li>

                <li class="nav-item">
                  <?php if($count_pickup > 0): ?>
                    <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link" data-bs-toggle="tab" data-bs-target="#pickup" id="pickup-tab">Ready to pick up<span class="badge rounded-pill bg-danger m-1 badge-sm"><?= $count_pickup ?></span></button>
                  <?php else: ?>
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link" data-bs-toggle="tab" data-bs-target="#pickup" id="pickup-tab">Ready to pick up</button>
                <?php endif; ?>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link" data-bs-toggle="tab" data-bs-target="#decline" id="decline-tab">Decline</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))"  class="nav-link" data-bs-toggle="tab" data-bs-target="#completed" id="completed-tab">Completed</button>
                </li>
              
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade pending active show" id="pending">
                  <table class="table datatable">
                <thead>
                  <tr>
                   <th>Name</th>
                   <th>Purpose</th>
                   <th>Cert Type</th>
                   <th>Payment Type</th>
                   <th>Date of Request</th>
                   <th>Amount</th>
                   <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                    $query = $conn->prepare("SELECT * FROM brgy_request_certificate LEFT JOIN resident ON resident.resident_id = brgy_request_certificate.resident_id WHERE status = 'pending' ORDER BY brgy_clearance_id ASC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $row):
                      $status = $row['status'];
                      $brgy_clearance_id = $row['brgy_clearance_id'];
                      $certificate_type = $row['certificate_type'];
                      $resident_id = $row['resident_id'];
                      $blotter_status = $row['blotter_records'];
                    if ($blotter_status == '1') {
                      echo '<tr bgcolor="#fecac8">';
                      }
                      else {
                      echo '<tr>';
                      }
                        ?>
                   
                      <td><?php echo ucwords($row['firstname']." ". $row['lastname'])?></td>
                      <td><?php echo ucwords($row['purpose']) ?></td>
                      <td><?php echo ucwords($row['certificate_type']) ?></td>
                      <td><?php echo $row['payment_type'] ?></td>
                      <td><?php echo $row['date_of_request'] ?></td>
                      <td><i class="fa-solid fa-peso-sign"></i> <?php echo $row['amount'] ?></td>
                      <td>
                        <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle rounded-pill" data-bs-toggle="dropdown" aria-expanded="false">
                       Action
                      </button>
                      <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                     <?php if($row['payment_type'] == 'Gcash' ): ?>
                      <li>
                        <a href="#view<?php echo $brgy_clearance_id; ?>" data-bs-toggle="modal" class=" dropdown-item">View Ref. Number</a>
                       </li>
                     <?php endif; ?>
                      <li>
                        <a href="#accept<?php echo $brgy_clearance_id; ?>" data-bs-toggle="modal" class=" dropdown-item">Accept</a>
                       </li>
                      <li><a href="#decline<?php echo $brgy_clearance_id; ?>" data-bs-toggle="modal" class=" dropdown-item">Decline</a></li>
                      </ul>
                      </div>
                         
                    </tr>
                     <?php require 'include/accept_decline_modal.php'; ?>
                      <?php endforeach; ?>
                </tbody>
              </table>

                </div>

                <div class="tab-pane fade accepted pt-3" id="accepted">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Purpose</th>
                        <th>Cert Type</th>
                        <th>Payment Type</th>
                        <th>Date of Request</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Mark as</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = $conn->prepare("SELECT * FROM brgy_request_certificate LEFT JOIN resident ON resident.resident_id = brgy_request_certificate.resident_id where status = 'accepted' ORDER BY brgy_clearance_id DESC");
                      $query->execute();
                      $result = $query->fetchAll(PDO::FETCH_ASSOC);

                      foreach($result as $row):
                        $status = $row['status'];
                        $brgy_clearance_id = $row['brgy_clearance_id'];
                        $certificate_type = $row['certificate_type'];
                        $resident_id = $row['resident_id'];
                        $brgy_clearance_id = $row['brgy_clearance_id'];
                 
                      ?>
                      <tr>
                        <td><?php echo ucwords($row['firstname']." ". $row['lastname'])?></td>
                        <td><?php echo ucwords($row['purpose']) ?></td>
                        <td><?php echo ucwords($row['certificate_type']) ?></td>
                        <td><?php echo $row['payment_type'] ?></td>
                        <td><?php echo $row['date_of_request'] ?></td>
                        <td><i class="fa-solid fa-peso-sign"></i> <?php echo $row['amount'] ?></td>
                        <td><a class="badge rounded-pill bg-success"><?php echo $row['status'] ?></a></td>
                        <td><a href="#pickup<?php echo $brgy_clearance_id; ?>" data-bs-toggle="modal" class="badge rounded-pill btn bg-primary">ready to pickup</a></td>
                        <td>
                           <?php
                          if ($certificate_type == 'Barangay Indigency') {
                            ?>
                           <a href="generate_certificateofindigency.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                           <?php
                          }elseif($certificate_type == 'Barangay Clearance'){?>
                              <a href="generate_brgy_clearance.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                              <?php
                          }elseif($certificate_type == 'Barangay Business Clearance'){?>
                               <a href="generate_brgy_business_clearance.php?id=<?php echo $resident_id; ?>&bi=<?php echo $brgy_clearance_id?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                               <?php
                          }elseif($certificate_type == 'Barangay Residency'){?>
                            <a href="generate_certificateofresidency.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                            <?php
                          }elseif($certificate_type == 'Barangay Certificate'){?>
                            <a href="generate_certificate.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                            <?php
                          }elseif($certificate_type == 'Good Moral'){?>
                            <a href="generate_certificateofgoodmoral.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                            <?php
                          }elseif($certificate_type == 'Demolished'){?>
                            <a href="generate_certificateofdemolished.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                            <?php
                          }elseif($certificate_type == 'Business Clearance'){?>
                            <a href="generate_brgy_business_clearance.php?id=<?php echo $resident_id; ?>&bi=<?php echo $brgy_clearance_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                            <?php
                          }elseif($certificate_type == 'Barangay Clearance NAT ID'){?>
                            <a href="generate_brgy_clearanceNat_id.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                            <?php
                          }elseif($certificate_type == 'Building Clearance'){?>
                            <a href="generate_brgy_buildingclearance.php?id=<?php echo $resident_id; ?>" class="btn btn-dark "><i class="bi bi-printer"></i></a>
                            <?php
                          }
                        ?>
                        </td>
                        
                      </tr>
                        <?php require 'include/accept_decline_modal.php'; ?>
                        <?php endforeach; ?>
                    </tbody>
                 
                  </table>
                </div>

                 <div class="tab-pane fade pt-3" id="pickup">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Purpose</th>
                        <th>Cert Type</th>
                        <th>Payment Type</th>
                        <th>Date of Request</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Mark as</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = $conn->prepare("SELECT * FROM brgy_request_certificate LEFT JOIN resident ON resident.resident_id = brgy_request_certificate.resident_id where status = 'ready to pick up' ORDER BY brgy_clearance_id DESC");
                      $query->execute();
                      $result = $query->fetchAll(PDO::FETCH_ASSOC);

                      foreach($result as $row):
                        $status = $row['status'];
                        $brgy_clearance_id = $row['brgy_clearance_id'];
                        $certificate_type = $row['certificate_type'];
                        $resident_id = $row['resident_id'];
                        $brgy_clearance_id = $row['brgy_clearance_id'];
                 
                      ?>
                      <tr>
                        <td><?php echo ucwords($row['firstname']." ". $row['lastname'])?></td>
                        <td><?php echo ucwords($row['purpose']) ?></td>
                        <td><?php echo ucwords($row['certificate_type']) ?></td>
                        <td><?php echo $row['payment_type'] ?></td>
                        <td><?php echo $row['date_of_request'] ?></td>
                        <td><i class="fa-solid fa-peso-sign"></i> <?php echo $row['amount'] ?></td>
                        <td><a class="badge rounded-pill bg-success"><?php echo $row['status'] ?></a></td>
                        <td><a href="#completed<?php echo $brgy_clearance_id; ?>" data-bs-toggle="modal" class="badge rounded-pill btn bg-primary">completed</a></td>
                        
                        
                      </tr>
                        <?php require 'include/accept_decline_modal.php'; ?>
                        <?php endforeach; ?>
                    </tbody>
                 
                  </table>

                </div>

                <div class="tab-pane fade pt-3" id="decline">

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>Certificate Type</th>
                        <th>Purpose</th>
                        <th>Reason</th>
                        <th>Date of Request</th>
                        <th>Status</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE status = 'decline'");
                      $query->execute();

                      $result = $query->fetchAll();
                       foreach($result as $row):
                        $status = $row['status'];
                        $brgy_clearance_id = $row['brgy_clearance_id'];
                 
                      ?>
                      <tr>
                        <td><?php echo ucwords($row['certificate_type']) ?></td>
                        <td><?php echo ucwords($row['purpose']) ?></td>
                        <td><?php echo ucwords($row['reason']) ?></td>
                        <td><?php echo $row['date_of_request'] ?></td>
                        <td><a class="badge rounded-pill bg-danger"><i class="fa-solid fa-clock"></i> Decline</a>
                        </td>
                        <!-- <td><a href="#delete_decline<?php echo $brgy_clearance_id; ?>"  data-bs-toggle="modal" id="delete"  class="btn btn-danger btn-xs rounded-pill"><i class="fas fa-trash-alt"></i></a></td> -->
                      </tr>
                       
                       <?php endforeach; ?>
                    </tbody>
                 
                  </table>

                </div>

                <div class="tab-pane fade pt-3" id="completed">
                 <a href="generate_completed_request_cert.php" class="btn btn-dark btn-sm mb-3" ><i class="fas fa-plus"></i>
                  Generate List </a>
                 <table class="table datatable">
                    <thead>
                      <tr>
                        <th>Certificate Type</th>
                        <th>Payment Type</th>
                        <th>Purpose</th>
                        <th>Date of Request</th>
                        <th>Date Completed</th>
                        <th>Message</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                      $query = $conn->prepare("SELECT * FROM brgy_request_certificate LEFT JOIN resident ON resident.resident_id = brgy_request_certificate.resident_id where status = 'completed' ORDER BY brgy_clearance_id DESC");
                      $query->execute();
                      $result = $query->fetchAll();

                      foreach($result as $row):
                        $status = $row['status'];
                        $brgy_clearance_id = $row['brgy_clearance_id'];
                 
                      ?>
                      <tr>
                        <td><?php echo ucwords($row['certificate_type']) ?></td>
                        <td><?php echo ucwords($row['payment_type']) ?></td>
                        <td><?php echo ucwords($row['purpose']) ?></td>
                        <td><?php echo $row['date_of_request'] ?></td>
                        <td><?php echo $row['date_completed'] ?></td>
                        <td><a class="badge rounded-pill bg-primary"><?php echo $row['message'] ?></a></td>
                        <td><i class="fa-solid fa-peso-sign"></i> <?php echo $row['amount'] ?></td>
                        <td><a class="badge rounded-pill bg-success"><i class="fa-solid fa-clock"></i> Completed</a>
                      <td><a href="#delete_completed<?php echo $brgy_clearance_id; ?>"  data-bs-toggle="modal" id="delete"  class="btn btn-danger btn-xs rounded-pill"><i class="fas fa-trash-alt"></i></a></td>
                      </tr>
                       <?php require 'include/delete_modal.php'; ?>
                      <?php endforeach; ?>
                    </tbody>
                 
                  </table>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>
          
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php require 'include/footer.php'; ?>

</body>

</html>