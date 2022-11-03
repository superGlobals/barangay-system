<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


require 'function/viewFunction.php';
$query1 = $conn->prepare("SELECT * FROM brgy_official WHERE position NOT IN ('Chairman', 'Secretary', 'Treasurer', 'SK. Chairman') ORDER BY `position` ASC");
    $query1->execute();
   $officials = $query1->fetchAll(PDO::FETCH_ASSOC);


?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/berlin-sans-fb-demi');
@import url('https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/bookman-old-style');
</style>
 <main id="main" class="main">
    <div class="pagetitle">
      <h1>Brgy. Clearance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Brgy. Clearance</li>
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
    
                                    <div class="row mt-2" style="border:4px solid black; margin: 0px; border-radius: 10px;">
                                          <img class="watermark" src="<?= $brgy_info['brgy_logo'] ?>" style="content: ''; position: absolute; top: 180px;
                                    left: 0;
                                    bottom: 0;
                                    right: 0;
                                    width: 100%;
                                    height: 65vh;
                                   
                                    background-position: center;
                                    background-repeat: no-repeat;


                                    opacity: 0.1;">
                                        <div class="col-4" >
                                            <div class="text-center p-3" style="border-right:4px solid black;">
                                             <!--    <img src="../<?php echo $row['brgy_logo'] ?>" class="img-fluid" width="100"> -->
                                             
                                               <h6 style="text-decoration: underline; color: black; font-style: italic ;">BARANGAY OFFICIALS</h6>
                                               <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mb-0 text-uppercase"><?php echo $captain['firstname']." ". $captain['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $captain['chairmanship'] ?></h5>
                                                
                                                <?php if(empty($sec)): ?>
                                                    <h3>Please add official with Secretary position</h3>
                                                <?php else: ?>
                                                    <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mb-0 text-uppercase"><?php echo $sec['firstname']." ". $sec['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $sec['position'] ?></h5>
                                         <?php endif; ?>
                                          <?php if(empty($t)): ?>
                                                    <h3>Please add official with Treasurer position</h3>
                                                <?php else: ?>
                                             <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mb-0 text-uppercase"><?php echo $t['firstname']." ". $t['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $t['position'] ?></h5>
                                         <?php endif; ?>
                                             <h6 style="color: black; text-decoration: underline; font-style: italic;" class="text-uppercase">Councilors</h6>
                                            <?php if(empty($officials)):?>
                                                 <h5>Please add Barangay official</h5>
   
                                                   <?php else: ?>
                                                    <?php    foreach($officials as $official): ?>
                                                   <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mt-4 mb-0 text-uppercase"><?= ucwords($official['firstname']." ". $official['lastname']) ?></h5>
                                                        <h5 style="font-weight: bold; color: black; font-size: 12px; " class="fw-bold mb-0 text-uppercase"><?= ucwords($official['chairmanship']) ?></h5>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                                <?php if(empty($skk)): ?>
                                                    <h5>Please add Sk official</h5>

                                                 <?php else: ?>   
                                                 <h5 style="font-weight: bold; color: black; font-size: 20px; " class="mt-3 mb-0 text-uppercase"><?php echo $skk['firstname']." ". $skk['lastname']?></h5>
                                             <h5 style="color: black; font-size: 12px; " class="mb-2 text-uppercase"><?php echo $skk['position'] ?></h5>
                                         <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-8" >
                                            <div class="text-center">
                                                <h1 style="text-decoration: underline; color: black; font-size: 40px;" class="mt-2 mb-5 text-uppercase">BARANGAY CLEARANCE</h1>
                                            </div>
                                           
                                            <p id="editor" class="mt-3 fw-bold" style="font-family: 'Baskervville', serif; text-indent: 40px; color: black; font-size: 14px;">This is to certify that <span class="fw-bold" style="font-size:14px;"><?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname'] .' '. $resident['age']) ?></span>years of age is a bonafide resident of is a permanent resident of <?php echo ucwords ($resident['purok']." ".$resident['brgy']." ". $resident['city']." ". $resident['province'] )?>
                                           </p>
                                            <p class="mt-3 fw-bold" style="font-family: 'Baskervville', serif; text-indent: 40px; color: black; font-size: 14px;">This certifies further that the bearer has good moral character, has no pending case filed against his/her in this office.</p>
                                            <p class="mt-3 fw-bold" style="font-family: 'Baskervville', serif; text-indent: 40px; color: black; font-size: 14px;">This certification is issued upon the request of the above-named person this <?= date("F j, Y") ?> for any Legal Purpose Only.</p>
                                            <div class="mt-5">

                                                <h2 style="font-family: 'Baskervville', serif; text-decoration: underline; font-weight: bold; color: black; font-size:14px;" class="mb-0 text-uppercase"><?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?></h2>      <p style="color: black; font-size:10px;">Signature Over Printed Name</p>
                                              
                                            </div>
                                            <div class="mb-0">
                                            <h5 class="text-uppercase " style="font-family: 'Berlin Sans FB Demi', sans-serif;
                                         font-weight: bold; color: black; margin-top: 80px; font-size: 11px;">CTC NO: 15326632</h5>
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
      </section>

    </main><!-- End #main -->
    

      <?php include('include/footer.php') ?>

 
</body>
</html>