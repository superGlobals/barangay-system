<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
 $id = $_GET['id'];

require 'function/viewFunction.php';
$query1 = $conn->prepare("SELECT * FROM brgy_official WHERE position NOT IN ('Chairman', 'Secretary', 'Treasurer', 'SK. Chairman') ORDER BY `position` ASC");
    $query1->execute();
   $officials = $query1->fetchAll(PDO::FETCH_ASSOC);

   $business_name = $conn->prepare("SELECT * FROM brgy_request_certificate ORDER BY brgy_clearance_id DESC LIMIT 1");
   $business_name->execute();
   $bobo = $business_name->fetch(PDO::FETCH_ASSOC);

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/berlin-sans-fb-demi');
@import url('https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/bookman-old-style');
</style>
 <main id="main" class="main">
    <div class="pagetitle">
      <h1>Business Clearance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Business Clearance</li>
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
                    Print Certificate
              </button>
            </div>
            <div contenteditable="true" class="card-body"  id="printThis">
                    <div class="d-flex flex-wrap justify-content-around" style="border-bottom: 10px double black;">
                    <div class="text-start mb-3">

                          <img src="<?php echo $brgy_info['city_logo'] ?>" class="img-fluid" width="120">
                      </div>
                      <div class="text-center">
                          <h5 style="color: black; font-size: 15px;" class="mb-0">Republika ng Pilipinas</h5>
                          <h5 style="color: black; font-size: 15px;" class="mb-0">Lalawigan ng <?=($brgy_info['province']) ?></h5>
                          <h5 style="color: black; font-size: 15px; " class="mb-0">Bayan ng <?=($brgy_info['city']) ?></h5>
                          <h3 style="color: black; font-size: 20px;" class="mb-0 text-uppercase">BARANGAY <?=($brgy_info['brgy']) ?></i></h3>
                          <h3 style="color: black; font-size: 20px;" class="mb-0 text-uppercase">TANGGAPAN NG PUNONG BARANGAY</i></h3>

                             </div>
                              <div class="text-center mb-3">
                             <img src="<?php echo $brgy_info['brgy_logo'] ?>" class="img-fluid" width="120">
  
                                        </div>

                                </div>
                                <img class="watermark" src="<?= $qwe_Water['brgy_logo'] ?>" style="position: absolute; top: 160px;
                                    left: 0;
                                    bottom: 0;
                                    right: 0;
                                    width: 100%;
                                    height: 80vh;
                                   
                                    background-position: center;
                                    background-repeat: no-repeat;


                                    opacity: 0.1;">


                                    <div class="row mt-2" style="border:4px solid black; margin: 0px; border-radius: 10px;">
                                        <div class="col-4" >
                                            <div class="text-center p-3" style="border-right:4px solid black;">
                                             <!--    <img src="../<?php echo $row['brgy_logo'] ?>" class="img-fluid" width="100"> -->

                                               <h6 style="text-decoration: underline; color: black; font-style: italic ;">BARANGAY OFFICIALS</h6>
                                               <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mb-0 text-uppercase"><?php echo $captain['firstname']." ". $captain['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $captain['chairmanship'] ?></h5>
                                                <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mb-0 text-uppercase"><?php echo $sec['firstname']." ". $sec['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $sec['position'] ?></h5>
                                             <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mb-0 text-uppercase"><?php echo $t['firstname']." ". $t['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $t['position'] ?></h5>
                                             <h6 style="color: black; text-decoration: underline; font-style: italic;" class="text-uppercase">Councilors</h6>
                                            <?php if(empty($officials)):?>
                                                 <h5>Please add Barangay official</h5>
   
                                                   <?php else: ?>
                                                    <?php    foreach($officials as $official): ?>
                                                   <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mt-4 mb-0 text-uppercase"><?= ucwords($official['firstname']." ". $official['lastname']) ?></h5>
                                                        <h5 style="font-weight: bold; color: black; font-size: 12px; " class="fw-bold mb-0 text-uppercase"><?= ucwords($official['chairmanship']) ?></h5>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                 <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mt-3 mb-0 text-uppercase"><?php echo $skk['firstname']." ". $skk['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $skk['position'] ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-8" >
                                            <div class="text-center">
                                                <h1 style="text-decoration: underline; color: black; font-size: 25px;" class="mt-2 mb-5 text-uppercase fw-bold">BARANGAY BUSINESS CLEARANCE</h1>
                                            </div>
                                           <h5>SA KINAUUKULAN:</h5>
                                            <p id="editor" class="mt-3 fw-normal" style="text-indent: 40px; color: black; font-size: 13px;">Ang <span class="fw-bold">BARANGAY BUSINESS CLEARANCE</span> naito ay ipinagkaloob kay <span class="fw-bold" style="font-size:13px;"><?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?></span> may sapatnagulang, Pilipino kasalukuyang naninirahan sa <?php echo ucwords ($resident['purok']." ".$resident['brgy']." ". $resident['city']." ". $resident['province'] )?> upang magpatakbo ng negosyong <span class="fw-bold"><?= $bobo['business_name'] ?></span> na matatagpuan sa <?= $bobo['business_loc'] ?>,  Peñaranda, Nueva Ecija.
                                           </p>
                                            <p class="mt-3 fw-normal" style="text-indent: 40px; color: black; font-size: 13px;">Ang BARANGAY BUSINESS CLEARANCE naito ay magkakabisa sasandaling makumpleto ang mga kailangan na itinakdang batas, at ito ay magkakabisa simula ngayong <?= date("F j, Y") ?> at matataposangbisanitohanggangika – 31ngDisyembretaong 2022. Ito ay naaayonsaArtikulo 246 Par.C. Rule and Regulations and Implementing the Local Government Code of 1991.</p>

                                            <div class="mt-5 text-center">

                                                <h2 style="font-family: 'Calibri'; text-decoration: underline; font-weight: bold; color: black; font-size:15px;" class="mb-0 text-uppercase"><?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?></h2>      <p style="color: black; font-size:10px;">Lagda</p>

                                            </div>
                                            <div class="mb-0">
                                            <h5 class="text-uppercase " style="font-family: 'Berlin Sans FB Demi', sans-serif;
                                         font-weight: bold; color: black; margin-top: 15px; font-size: 11px;">CTC NO: 15326631</h5>
                                            <h5 class="text-uppercase" style=" font-family: 'Berlin Sans FB Demi', sans-serif;
                                                 font-weight: bold; color: black; font-size: 11px;">Place of issue: Penaranda, N.E</h5>
                                            <h5 class="text-uppercase" style="font-family: 'Berlin Sans FB Demi', sans-serif;
                                                 font-weight: bold; color: black; font-size: 11px;">Date of issue: <?= date("F j, Y") ?></h5>
                                            </div>
                                            <div class="text-center">
                                                <h2 style="font-family: 'Bookman Old Style', sans-serif;
                                                 color: black; font-size:9px;" class="fw-bold mt-5 text-uppercase">Not valid without
                                                   OFFICIAL SEAL
                                            </h2>


                                            </div>

                                            <div class=" row">

                                                 <h5 style="color: black; font-size:15px; margin-left: 40px;" class="mb-0">ThumbMark</h5>
                                                <div style="border: 2px solid black; width:100px; height: 100px;">
                                                   <p style="color: black; margin-left: 20px;" class="mt-5 mb-0 pt-5">Left</p>
                                                </div>

                                                <div style="border: 2px solid black; width:100px; height: 100px;">
                                                   <p style="color: black; margin-left: 20px;" class="mt-5 mb-0 pt-5">Right</p>
                                                </div>
                                               <h2 style="color: black; font-size:15px;" class="mb-0 text-center">Approved by:
                                            </h2>
                                            </div>

                                             <div class="float-end mb-0" style="margin-right: 20px;">

                                                <h2 class="mb-0" style="text-decoration: underline; color: black; font-size:20px;"><?= ucwords($captain['firstname'].' '.$captain['middlename'].' '.$captain['lastname']) ?>
                                                    </h2>
                                            <p style="margin-left: 30px; color: black; font-size:15px;">Punong Barangay</p>

                                            </div>

                                          </div>
                                        </div>
                                    </div>
            
          </div>
        </div>
      </section>

    </main><!-- End #main -->

    <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Payment</h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="function/walkin_requestFuntion.php" >
                                <div class="form-group">
                                <label><i class="fa-solid fa-wallet"></i> Payment Per copy is <i class="fa-solid fa-peso-sign"></i><?php echo $bayad['business_clearance_price'] ?></label>
                                <input type="hidden" class="form-control" name="amount" value="<?php echo $bayad['business_clearance_price'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="mt-2">Business Name</label>
                                    <input type="text" class="form-control" name="business_name" required>
                                </div>
                                <div class="form-group">
                                    <label class="mt-2">Business Type</label>
                                    <input type="text" class="form-control" name="business_type" required>
                                </div>
                                <div class="form-group">
                                    <label class="mt-2">Business Location</label>
                                    <input type="text" class="form-control" name="business_location" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="form-control" name="resident_id" value="<?php echo $resident['resident_id'] ?>">
                            <input type="hidden" class="form-control" name="resident_name" value="<?php echo $resident['firstname']." ".$resident['lastname'] ?>">
                            <button type="button" class="btn btn-secondary" onclick="goBack()">Close</button>
                            <button type="submit" name="brgyBusiness" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    

      <?php include('include/footer.php') ?>

 
</body>
</html>