<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

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
      <h1>Brgy. Clearance NAT(ID)</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Brgy. Clearance NAT(ID)</li>
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
                    <div class="d-flex flex-wrap justify-content-around">
                    <div class="text-start mb-3">
                        <?php                             
                         $query = $conn->prepare("select * from brgy_info");
                         $query->execute();
                         foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row ):
                          ?> 
                          <img src="<?php echo $row['city_logo'] ?>" class="img-fluid" width="120">
                      </div>
                      <div class="text-center">
                          <h5 style="color: black; font-size: 15px;" class="mb-0">Republika ng Pilipinas</h5>
                          <h5 style="color: black; font-size: 15px;" class="mb-0">Lalawigan ng <?=($row['province']) ?></h5>
                          <h5 style="color: black; font-size: 15px; " class="mb-0">Bayan ng <?=($row['city']) ?></h5>
                          <h3 style="color: black; font-size: 20px;" class="mb-0 text-uppercase">BARANGAY <?=($row['brgy']) ?></i></h3>
                          <span style="color: black" class="font-weight-bold">-oOo-</span>     
                         <h3 style="color: black; font-size: 20px;" class="mb-0 text-uppercase">OFFICE OF THE BARANGAY CHAIRMAN</i></h3>     
                            
                             </div>
                              <div class="text-center mb-3">
                             <img src="<?php echo $row['brgy_logo'] ?>" class="img-fluid" width="120">
                                <?php endforeach; ?>
                                        </div>
                  
                                </div>
                                    <h3 style="color: black; font-size: 20px; border: 2px solid black;" class="mt-2 mb-0 text-uppercase text-center">BARANGAY CLEARANCE</h3>
                                    <div class="row" style="border:2px solid black; margin: 0px;">
                                        <div class="col-9" style="border-right: 2px solid black;">
                                            
                                                
                                            <h5 style="color:black; font-family: 'Baskervville', serif;">To whom it may concern:</h5>
                                            <h5 class="mt-3 fw-bold text-center" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-size: 15px; color: black;">This is to certify that the person, whose signature and right thumbmark that appear herein, is a resident of Barangay Sto Tomas, Penaranda, Nueva Ecija. He/She is known to me of good moral character and law-abiding citizen.</h5>

                                            <div style="text-indent: 80px" class="mb-0 mt-3">
                                            <h5 class="text-uppercase fw-normal" style="
                                             color: black; font-size: 15px;">Full Name <span class="fw-bold">: <?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?></span></h5>
                                            <h5 class="text-uppercase fw-normal" style="
                                             color: black; font-size: 15px;">Address <span class="fw-bold">: <?= ucwords($resident['purok'].', '.$resident['brgy'].', '.$resident['city'].', '.$resident['province']) ?></span></h5>
                                            <h5 class="text-uppercase fw-normal" style="
                                             color: black; font-size: 15px;">DOB/POB <span class="fw-bold">: <?= ucwords($resident['birthdate'].'/ '.$resident['birthplace']) ?></span></h5>
                                             <h5 class="text-uppercase fw-normal" style="
                                             color: black; font-size: 15px;">Sex/Civil Status <span class="fw-bold">: <?= ucwords($resident['gender'].'/ '.$resident['civil_status']) ?></span></h5>
                                             <h5 class="text-uppercase fw-normal" style="
                                             color: black; font-size: 15px;">Nationality <span class="fw-bold">: <?= ucwords($resident['citizenship']) ?></span></h5>
                                             <h5 class="text-uppercase fw-normal" style="
                                             color: black; font-size: 15px;">Purpose <span class="fw-bold">: For National ID purpose only</span></h5>            
                                            </div>
                                           
                                            
                                            <div class="mb-0">
                                            <h5 class="text-uppercase " style="
                                         font-weight: bold; color: black; margin-top: 80px; font-size: 11px;">RES. CERT : ____________________________</h5>
                                            <h5 class="text-uppercase" style="
                                                 font-weight: bold; color: black; font-size: 11px;">Issued at : ____________________________</h5>
                                            <h5 class="text-uppercase" style="
                                                 font-weight: bold; color: black; font-size: 11px;">Issued on : ___________________________</h5>
                                            </div>
                                           

                                           
                                            
                                             <div class="float-end text-center mx-4">
                                                 ___________________________
                                                <h2 class="text-uppercase" style="color: black; font-size:15px;">HON. <?= ucwords($captain['firstname'].' '.$captain['middlename'].' '.$captain['lastname']) ?>
                                                    </h2>      
                                            <p style="margin-left: 30px; color: black; font-size:15px;">Punong Barangay</p>
                                             
                                            </div>
                                             <div class="text-center">
                                                <h2 style="
                                                 color: black; font-size:9px;" class="fw-bold mt-5 text-uppercase">Not valid without 
                                                   OFFICIAL SEAL
                                            </h2>

                                                
                                           
                                        </div>
                                       
                                           </div>
                                            <div class="col-3 text-center">
                                            <div class="fw-normal ">
                                                <h5>Date : <?= date("F j, Y") ?></h5>
                                            </div>
                                            <div class="text-center mt-5">
                                                <img  style="border: 2px solid black; "  src="<?php echo $resident['photo'] ?>" width="100" height="100" >
                                            </div>
                                            <div class="mt-5">
                                            _______________________
                                            <h5>Signature</h5>
                                            </div>


                                            <div class="mt-5" style="border: 2px solid black; height: 100px;">
                                               <p style="color: black;" class="mt-5 mb-0 pt-5">Right ThumbMark</p>
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