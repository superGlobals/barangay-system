<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Blotter</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Blotter</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
                  <a href="add_blotter.php" class="btn btn-primary btn-sm float-end"><i class="bi bi-plus-lg"></i> New Blotter</a>
                 </div>
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Complainant</th>
                          <th scope="col">Complained Resident</th>
                          <th scope="col">Data of Filling</th>
                          <th scope="col">Time of Filling</th>
                          <th scope="col">Status</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                     <tbody>
                    <?php

                    $query = $conn->prepare("SELECT * FROM blotter LEFT JOIN resident ON blotter.complained_resident = resident.resident_id ORDER BY blotter_id DESC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($result as $row):
                  $blotter_id =  $row['blotter_id'];
                  $status = $row['status'];
                  $time = $row['time_of_filling'];
                  $idd = str_replace("CN-","",$blotter_id);
                  $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
                  $number = 'CN-' .$id;
                  date_default_timezone_set('Asia/Manila');
                       $date = $row['date_of_filling']; 
                       $date = new DateTime($date);
                       $result = $date->format("F j, Y"); 
                       $d=strtotime($time);
                       $time_format = date("h:i:a", $d);
                      ?>
                 <tr>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['complainant']; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['firstname']." ".  $row['lastname']; ; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $result; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $time_format; ?></td>
                  <td class="text-dark text-sm font-weight-bolder" width="150">
                    <?php
                  
                    if ($status == 'Pending') { ?>
                     <a class="badge rounded-pill bg-warning"><b> 
                      <?php echo $row['status']; ?></a></b>
                   <?php }elseif ($status == 'Active') {?>
                     <a class="badge rounded-pill bg-primary"><b>
                      <?php echo $row['status']; ?></a></b>
                 <?php }elseif ($status == 'Solve') {?>
                  <a class="badge rounded-pill bg-success"><b>
                      <?php echo $row['status']; ?></a></b>

                 <?php } ?>                              
                  </td>

                  <td width="180">
                   <a href="edit_blotter.php?id=<?php echo $blotter_id; ?>" class="btn btn-primary btn-xs rounded-pill"><i class="bi bi-pencil-square"></i></a>
                   <a href="#delete_blotter<?php echo $blotter_id; ?>"  data-bs-toggle="modal" id="delete"  class="btn btn-danger btn-xs rounded-pill" name=""><i class="bi bi-trash"></i></a>               
                 
                    </td>
                    </tr>
                    <?php 
                  require 'include/delete_modal.php'; ?>
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