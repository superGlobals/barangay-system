<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Archive Residents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Archive Residents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
                 </div>
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                    
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

                    $query = $conn->prepare("SELECT * FROM resident LEFT JOIN purok ON purok.purok_id = resident.purok WHERE delete_status = 'Archive' ORDER BY resident_id DESC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $row):
                      $resident_id =  $row['resident_id'];
                      $gender = $row['gender'];
                      $resident_status = $row['resident_status'];
                      $blotter_status = $row['blotter_records'];
                      $photo = $row['photo'];
        
                      if ($blotter_status == '3') {
                      echo '<tr bgcolor="#fecac8">';
                      }
                      else {
                      echo '<tr>';
                      }
                       ?>
                      
                      <td class="text-dark text-sm font-weight-bolder"><?php echo ucwords($row['firstname'] . " ".$row['middlename']." " . $row['lastname']); ?></td>
                      <td class="text-dark text-sm font-weight-bolder"><?php echo $row['purok']; ?></td>
                      <td class="text-dark text-sm font-weight-bolder"><?php echo $row['age']; ?></td>
                      <td class="text-dark text-sm font-weight-bolder"><?php echo $row['contact_no']; ?></td>
                      <td class="text-dark text-sm font-weight-bolder" width="100">
                        <?php
                        if ($gender == 'Male') { ?>
                        
                         <a class="primary"><b><i class="fa-solid fa-mars"></i></a> <?php echo $row['gender']; ?></b>
                       <?php }elseif ($gender == 'Female') { ?>
                         <a style="color: pink;"><b><i class="fa-solid fa-venus"></i></a>
                          <?php echo $row['gender']; ?></b>

                     <?php } ?>                            
                      </td>
                      <td width="180">
                        <div class="btn-group" role="group">
                        <button title="Action" id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle btn-sm rounded-pill" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-archive"></i>
                        </button>
                        <ul class="dropdown-menu shadow-lg" aria-labelledby="btnGroupDrop1">
                        <li><a href="#deletePermanent<?php echo $resident_id; ?>" data-bs-toggle="modal" class="dropdown-item"> Delete Permanently</a></li>
                        <li><a href="#unarchive<?php echo $resident_id; ?>" data-bs-toggle="modal" class="dropdown-item"> Unarchive</a></li>
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