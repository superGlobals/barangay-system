<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
    $query = $conn->prepare("SELECT SUM(amount) AS TotalSum FROM `brgy_request_certificate` WHERE revenue_status = 'done'");
    $query->execute();
    $revenue = $query->fetch(PDO::FETCH_ASSOC);

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/berlin-sans-fb-demi');
@import url('https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/bookman-old-style');
</style>
 <main id="main" class="main">
    <div class="pagetitle">
      <h1>Revenues</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Revenues</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">

                 <div class="card-tools">
                      <form action="" method="get"> 
                      <div class="row">
                      <div class="col-md-2">
                        <label>From Date</label>
                        <input class="form-control" type="date" name="from" required>
                        </div>
                        <div class="col-md-2">
                        <label>To Date</label>
                        <input class="form-control" type="date" name="to" required>
                        </div>
                        <div class="col-md-2">
                        <label>Click to filter</label>
                        <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                        </div>
                        </form>
                        
                      <div class="col">
                      <button class="btn btn-dark btn-border btn-round btn-sm float-end" onclick="printDiv('printThis')">
                        <i class="fa fa-print"></i>
                        Print List
                      </button>
                      </div>
                     </div>
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
                    <?php if (isset($_GET['from']) && isset($_GET['to'])):?>
                      <p class="text-dark font-weight-bold text-sm">Total: <?= number_format($revenue['TotalSum']) ?></p>
                    <?php endif; ?>
                    
                  <thead>
                    <tr>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">Resident Name</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">Issued Certificate</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">Amount</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">Date Issued</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">Issued By</th>
                    <th class="text-uppercase text-dark text-sm font-weight-bolder">Origin</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    
                      <?php 
                                
                        if(isset($_GET['from']) && isset($_GET['to']))
                        {
                            $from = $_GET['from'];
                            $to = $_GET['to'];

                            $result1 = (filter_var($from, FILTER_SANITIZE_URL));
                            $result2 = (filter_var($to, FILTER_SANITIZE_URL));

                            $query = $conn->prepare("SELECT * FROM brgy_request_certificate LEFT JOIN resident ON brgy_request_certificate.resident_id = resident.resident_id LEFT JOIN user ON brgy_request_certificate.issued_by = user.user_id WHERE revenue_status = 'done' AND date_of_request BETWEEN :result1 AND :result2 ORDER BY date_of_request DESC");
                            $query->bindParam('result1', $result1);
                            $query->bindParam('result2', $result2);
                            $query->execute();

                            $result = $query->fetchAll(PDO::FETCH_ASSOC);

                            if($query->rowCount() > 0)
                            {
                                foreach($result as $row)
                                {
                                    ?>
                                    <tr>
                                    <td class="text-dark text-sm font-weight-bolder"><?php echo $row['firstname']." ".$row['lastname']; ; ?></td>
                                    <td class="text-dark text-sm font-weight-bolder"><?php echo $row['certificate_type']; ?></td>
                                    <td class="text-dark text-sm font-weight-bolder"><?php echo $row['amount']; ; ?></td>
                                    <td class="text-dark text-sm font-weight-bolder"><?php echo $row['date_of_request']; ?></td>
                                    <td class="text-dark text-sm font-weight-bolder"><?php echo $row['username']; ?></td>
                                    <td class="text-dark text-sm font-weight-bolder"><?php echo $row['origin']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Record Found";
                            }
                        }
                    ?>
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