<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
    $query = $conn->prepare("SELECT * FROM resident LEFT JOIN purok ON purok.purok = resident.purok WHERE gender = 'female' AND delete_status != 'Archive'");
    $query->execute();
    $resident = $query->fetch(PDO::FETCH_ASSOC);

    $count = $query->rowCount();
    
    $purok = $resident['purok'];

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/berlin-sans-fb-demi');
@import url('https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/bookman-old-style');
</style>
 <main id="main" class="main">
    <div class="pagetitle">
      <h1>Resident Female List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Resident Female List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
              <button class="btn btn-dark btn-border btn-round btn-sm float-end" onclick="printDiv('printThis')">
                    <i class="fa fa-print"></i>
                    Print List
              </button>
            </div>
             <div contenteditable="true" class="card-body m-5" id="printThis">
                  <div class="d-flex flex-wrap justify-content-around" style="border-bottom:10px double black;">
                    <div class="text-center mb-3">
                      <?php
                      
                      $query = $conn->prepare("SELECT * FROM brgy_info");
                      $query->execute();
                      $result = $query->fetchAll(PDO::FETCH_ASSOC);
                      foreach($result as $row):
                        ?> 
                      <img src="<?php echo $row['city_logo'] ?>" class="img-fluid" width="100" >
                  </div>
                  <div class="text-center">
                      
                        <h5 style="color: black; font-size: 17px; font-family: 'Baskervville', serif;" class="mb-0">Republic of the Philippines</h5>
                        <h5 style="color: black;  font-size: 17px; font-family: 'Baskervville', serif;" class="mb-0">Province of <?php echo ucwords ($row['province']) ?></h5>
                        <h5 style="color: black;  font-size: 17px; font-family: 'Baskervville', serif;" class="mb-0">Municipality of <?php echo ucwords ($row['city']) ?></h5>
                        <h5 style="color: black; font-weight: bold; font-size: 20; font-family: 'Baskervville', serif;" class="mb-0 text-uppercase">Barangay <?php echo ucwords ($row['brgy']) ?></i></h5>
                        <!-- <h4 style="color: black; font-size: 14; font-family: 'Baskervville', serif;" class="mt-3 text-uppercase">OFFICE OF THE PUNONG BARANGAY</h4> -->
                  </div>
                  <div class="text-center">
                       <img src="<?php echo $row['brgy_logo'] ?>" class="img-fluid" width="100">
                          <?php endforeach; ?>
                  </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">

                  <table class="table text-center">
                    <p class="mb-0 text-dark text-sm">List of Female Resident></p>
                    <p class="text-dark font-weight-bold text-sm">Total: <span class="fw-bold"><?php echo $count ?></span></p>
                  <thead>
                    <tr>
                    <!-- <th></th> -->
                    
                    <th class="text-uppercase text-sm font-weight-bolder">Fullname</th>
                    <th class="text-uppercase text-sm font-weight-bolder">Purok</th>
                    <th class="text-uppercase text-sm font-weight-bolder">Age</th>
                    <th class="text-uppercase text-sm font-weight-bolder">Contact</th>
                    <th class="text-uppercase text-sm font-weight-bolder">Gender</th>
                    
                    </tr>
                  </thead>
                   <tbody>
                     <?php

                    $query = $conn->prepare("SELECT * FROM resident LEFT JOIN purok ON purok.purok = resident.purok WHERE gender = 'female' AND delete_status != 'Archive'");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                  $resident_id =  $row['resident_id'];
                  $gender = $row['gender'];
                  $resident_status = $row['resident_status'];
                  $blotter_status = $row['blotter_records'];
                  $photo = $row['photo'];
    
                 
                   ?>
                  <tr>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo ucwords($row['firstname'] . " ".$row['middlename']." " . $row['lastname']); ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['purok']; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['age']; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['contact_no']; ?></td>
                  <td class="text-dark text-sm font-weight-bolder" width="100"><?php echo $row['gender']; ?></td>                        
                 
                </tr>
                 
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
    

      <?php include('include/footer.php') ?>

 
</body>
</html>