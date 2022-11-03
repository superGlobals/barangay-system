<?php
if (!isset($_SESSION['unique_id'])) {
  header("location: home");
}
require "include/header.php";

?>


  <main id="main">
   <?php if (isset($_SESSION['unique_id'])):?>
      <section id="my_request" class="departments" style="background-color: #1977cc">
      <div class="container">
        <div class="card-haha maangas">
          <div class="section-title">
            <h5 class="h5-title text-center pb-0 fs-3">My Request</h5>
            <p class="text-center">You can track your request here.</p>
          </div>

          <div class="row gy-4">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <?php if ($count_pending > 0): ?>
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Pending<span class="badge rounded-pill bg-danger m-1"><?= $count_pending ?></span></a>
                <?php else: ?>
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Pending</a>
                <?php endif; ?> 
                </li>
                <li class="nav-item">
                  <?php if ($count_process > 0): ?>
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-6">In Process<span class="badge rounded-pill bg-danger m-1"><?= $count_process ?></span></a>
                <?php else: ?>
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-6">In Process</a>
                <?php endif; ?>
                </li>
                <li class="nav-item">
                  <?php if ($count_pickup > 0): ?>
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Ready to Pickup<span class="badge rounded-pill bg-danger m-1"><?= $count_pickup ?></span></a>
                <?php else: ?>
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Ready to Pickup</a>
                <?php endif; ?>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Completed</a>
                </li>
                <li class="nav-item">

                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Decline</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Canceled</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                  <div class="row gy-4">
                    <?php if(empty($pending_result)): ?>
                      <div class="col-lg-12 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h6 class="text-center p-5"><i class="fa-solid fa-magnifying-glass"></i> No Pending Request</h6>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                    <?php
                      foreach($pending_result as $row):
                        $date = $row['date_of_request']; 
                        $date = new DateTime($date);
                        $result = $date->format("F j, Y, g:i a");
                      ?>
                    <div class="col-lg-6 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h5 class="fw-bold"><?= $row['certificate_type'] ?></h5>
                          <h6>Purpose: <?= ucwords($row['purpose']) ?></h6>
                          <h6>Date of Request: <?= $result?></h6>
                          <h6>Payment Type: <?= $row['payment_type'] ?></h6>
                          <?php
                          if($row['payment_type'] == 'Gcash'):
                          ?>
                          <h6>Gcash Reference #: <?= $row['reference_number'] ?></h6>
                          <?php
                          elseif($row['amount'] == 0):
                          ?>
                          <h6>Amount to pay: Free</h6>
                        <?php else: ?>
                          <h6>Amount to pay: <i class="fa-solid fa-peso-sign"></i><?= $row['amount'] ?></h6>
                        <?php endif; ?>
                          <h6>Status: <span class="badge bg-warning"><?= ucfirst($row['status']) ?></span></h6>
                          <button type="button" class="btn btn-dark btn-sm float-end" data-bs-toggle="modal" data-bs-target="#cancel<?= $row['brgy_clearance_id'] ?>">
                            Cancel Request
                          </button>
                        </div>
                      </div>
                    </div>
                    <?php include 'include/modal.php'; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
                <div class="tab-pane" id="tab-6">
                  <div class="row gy-4">
                    <?php if(empty($accept_result)): ?>
                      <div class="col-lg-12 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h6 class="text-center p-5"><i class="fa-solid fa-magnifying-glass"></i> No On Process Request</h6>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                    <?php
                      foreach($accept_result as $row):
                        $date = $row['date_of_request']; 
                        $date = new DateTime($date);
                        $result = $date->format("F j, Y, g:i a");
                      ?>
                    <div class="col-lg-6 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h5 class="fw-bold"><?= $row['certificate_type'] ?></h5>
                          <h6>Purpose: <?= ucwords($row['purpose']) ?></h6>
                          <h6>Date of Request: <?= $result?></h6>
                          <h6>Payment Type: <?= $row['payment_type'] ?></h6>
                          <?php
                          if($row['payment_type'] == 'Gcash'):
                          ?>
                          <h6>Gcash Reference #: <?= $row['reference_number'] ?></h6>
                          <?php
                          elseif($row['amount'] == 0):
                          ?>
                          <h6>Amount to pay: Free</h6>
                        <?php else: ?>
                          <h6>Amount to pay: <i class="fa-solid fa-peso-sign"></i><?= $row['amount'] ?></h6>
                        <?php endif; ?>
                          <h6>Status: <span class="badge bg-secondary">In Process</span></h6>                          

                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
                <div class="tab-pane" id="tab-2">
                  <div class="row gy-4">
                    <?php if(empty($pickup_result)): ?>
                      <div class="col-lg-12 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h6 class="text-center p-5"><i class="fa-solid fa-magnifying-glass"></i> No To Pick up Request</h6>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                    <?php
                      foreach($pickup_result as $row):
                        $date = $row['date_of_request']; 
                        $date = new DateTime($date);
                        $result = $date->format("F j, Y, g:i a");
                      ?>
                    <div class="col-lg-6 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h5 class="fw-bold"><?= $row['certificate_type'] ?></h5>
                          <h6>Purpose: <?= ucwords($row['purpose']) ?></h6>
                          <h6>Date of Request: <?= $result?></h6>
                          <h6>Payment Type: <?= $row['payment_type'] ?></h6>
                          <?php
                          if($row['payment_type'] == 'Gcash'):
                          ?>
                          <h6>Gcash Reference #: <?= $row['reference_number'] ?></h6>
                          <?php
                          elseif($row['amount'] == 0):
                          ?>
                          <h6>Amount to pay: Free</h6>
                        <?php else: ?>
                          <h6>Amount to pay: <i class="fa-solid fa-peso-sign"></i><?= $row['amount'] ?></h6>
                        <?php endif; ?>
                          <h6>Status: <span class="badge bg-primary"><?= ucwords($row['status']) ?></span></h6>
                          <h6>Message: <?= $row['message'] ?></h6>
                          

                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
                <div class="tab-pane" id="tab-3">
                  <div class="row gy-4">
                    <?php if(empty($decline_result)): ?>
                      <div class="col-lg-12 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h6 class="text-center p-5"><i class="fa-solid fa-magnifying-glass"></i> No Decline Request</h6>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                    <?php
                      foreach($decline_result as $row):
                        $date = $row['date_of_request']; 
                        $date = new DateTime($date);
                        $result = $date->format("F j, Y, g:i a");
                      ?>
                    <div class="col-lg-6 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h5 class="fw-bold"><?= $row['certificate_type'] ?></h5>
                          <h6>Purpose: <?= ucwords($row['purpose']) ?></h6>
                          <h6>Date of Request: <?= $result?></h6>
                          <h6>Payment Type: <?= $row['payment_type'] ?></h6>
                          <h6>Status: <span class="badge bg-danger"><?= ucfirst($row['status']) ?></span></h6>  
                          <h6>Reason: <span class="fw-bold"><?= ucfirst($row['reason']) ?></span></h6>                          

                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
                <div class="tab-pane" id="tab-4">
                  <div class="row gy-4">
                    <?php if(empty($complete_result)): ?>
                      <div class="col-lg-12 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h6 class="text-center p-5"><i class="fa-solid fa-magnifying-glass"></i> No Completed Request</h6>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                    <?php
                      foreach($complete_result as $row):
                        $date = $row['date_of_request']; 
                        $date = new DateTime($date);
                        $result = $date->format("F j, Y, g:i a");
                      ?>
                    <div class="col-lg-6 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h5 class="fw-bold"><?= $row['certificate_type'] ?></h5>
                          <h6>Purpose: <?= ucwords($row['purpose']) ?></h6>
                          <h6>Date of Request: <?= $result?></h6>
                          <h6>Payment Type: <?= $row['payment_type'] ?></h6>
                          <?php
                          if($row['payment_type'] == 'Gcash'):
                          ?>
                          <h6>Gcash Reference #: <?= $row['reference_number'] ?></h6>
                          <?php
                          elseif($row['amount'] == 0):
                          ?>
                          <h6>Amount to pay: Free</h6>
                        <?php else: ?>
                          <h6>Amount to pay: <i class="fa-solid fa-peso-sign"></i><?= $row['amount'] ?></h6>
                        <?php endif; ?>
                          <h6>Status: <span class="badge bg-success">Completed</span></h6>                     

                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
                <div class="tab-pane" id="tab-5">
                  <div class="row gy-4">
                    <?php if(empty($cancel_request)): ?>
                      <div class="col-lg-12 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h6 class="text-center p-5"><i class="fa-solid fa-magnifying-glass"></i> No Canceled Request</h6>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                    <?php
                      foreach($cancel_request as $row):
                        $date = $row['date_of_request']; 
                        $date = new DateTime($date);
                        $result = $date->format("F j, Y, g:i a");
                      ?>
                    <div class="col-lg-6 details order-2 order-lg-1">
                      <div class="card" style="padding: 7px; border-radius: 6px; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <div class="card-body text-dark">                        
                          <!-- <h5 class="mb-4">Pending Request</h5 >   -->
                          <h5 class="fw-bold"><?= $row['certificate_type'] ?></h5>
                          <h6>Purpose: <?= ucwords($row['purpose']) ?></h6>
                          <h6>Date of Request: <?= $result?></h6>
                          <h6>Payment Type: <?= $row['payment_type'] ?></h6>
                          <?php
                          if($row['payment_type'] == 'Gcash'):
                          ?>
                          <h6>Gcash Reference #: <?= $row['reference_number'] ?></h6>
                          <?php
                          elseif($row['amount'] == 0):
                          ?>
                          <h6>Amount to pay: Free</h6>
                        <?php else: ?>
                          <h6>Amount to pay: <i class="fa-solid fa-peso-sign"></i><?= $row['amount'] ?></h6>
                        <?php endif; ?>
                          <h6>Status: <span class="badge bg-danger"><?= ucfirst($row['status']) ?></span></h6>                         

                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  </main><!-- End #main -->

<?php require "include/footer.php" ?>

