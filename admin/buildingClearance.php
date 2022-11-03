<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
 $id = $_GET['id'];


require 'function/viewFunction.php';
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/berlin-sans-fb-demi');
@import url('https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Lobster&display=swap');
@import url('http://fonts.cdnfonts.com/css/bookman-old-style');
</style>
 <main id="main" class="main">
    <div class="pagetitle">
      <h1>Building Clearance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Building Clearance</li>
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
            <div contenteditable="true" class="card-body m-5"  id="printThis">
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
                                                <h3 style=" color: black;" class="mt-2 mb-5 text-uppercase">BARANGAY BUILDING CLEARANCE</h3>
                                            </div>
                                            <h5 style="color:black; font-family: 'Baskervville', serif;" class="mt-5">To whom it may concern:</h5>
                                            <h5 class="mt-4 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black; font-size: 17px;"><span class="fw-bold">THIS IS TO CERTIFY </span> that <span class="text-uppercase fw-bold" style="text-decoration: underline;"><?php echo $resident['firstname']." ". $resident['middlename']." ". $resident['lastname']; ?> </span> a resident of
                                            <?php echo ucwords ($resident['purok']." ".$resident['brgy']." ". $resident['city']." ". $resident['province'] )?>, has the intention to Construct/ demolish / excavate of fencingin <?php echo ucwords ($resident['purok']." ".$resident['brgy']." ". $resident['city'])?>. It is further certified that the Barangay interposes no objection on the said project.</h5>
                                            
                                            <h5 class="mt-4 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black; font-size: 17px;"><span class="fw-bold">ISSUED</span> upon request of the above-named person for whatever legal intents and purposes. </h5>

                                            <h5 class="mt-4 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black; font-size: 17px;"><span class="fw-bold">GIVEN</span> this <?= date("F j, Y") ?></h5>

                                           
                                             <div class="float-end mb-0" style="margin-right: 100px; margin-top: 100px;">
                                               <h5 style="font-family: 'Bookman Old Style', sans-serif;
                                                 color: black; margin-bottom: 50px;">Approved by:
                                                </h5>
 

                                                <h2 class="mb-0" style="text-decoration: underline; color: black; font-size:20px;"><?= ucwords($captain['firstname'].' '.$captain['middlename'].' '.$captain['lastname']) ?>
                                                    </h2>      
                                            <p style="margin-left: 30px; color: black; font-size:15px;">Punong Barangay</p>

                                            </div>
                                                 
                                          </div>
                                        </div>
                                    </div>
                                     </div>
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
                                <label><i class="fa-solid fa-wallet"></i> Payment Per copy is <i class="fa-solid fa-peso-sign"></i><?php echo $bayad['building_price'] ?></label>
                                <input type="hidden" class="form-control" name="amount" value="<?php echo $bayad['building_price'] ?>">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="form-control" name="resident_id" value="<?php echo $resident['resident_id'] ?>">
                            <input type="hidden" class="form-control" name="resident_name" value="<?php echo $resident['firstname']." ".$resident['lastname'] ?>">
                            
                            <button type="button" class="btn btn-secondary" onclick="goBack()">Close</button>
                            <button type="submit" name="brgyBuilding" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    

      <?php include('include/footer.php') ?>

 
</body>
</html>