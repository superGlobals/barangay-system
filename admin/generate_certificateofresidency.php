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
      <h1>Residency</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Residency</li>
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
             <div contenteditable="true" class="card-body m-5" id="printThis">
                  <div class="d-flex flex-wrap justify-content-around" style="border-bottom:10px double black;">
                    <div class="text-center mb-3">

                      <img src="<?php echo $brgy_info['city_logo'] ?>" class="img-fluid" width="120">
                  </div>
                  <div class="text-center">
                      
                        <h5 style="color: black; font-size: 17px; font-family: 'Baskervville', serif;" class="mb-0">Republic of the Philippines</h5>
                        <h5 style="color: black;  font-size: 17px; font-family: 'Baskervville', serif;" class="mb-0">Province of <?php echo ucwords ($brgy_info['province']) ?></h5>
                        <h5 style="color: black;  font-size: 17px; font-family: 'Baskervville', serif;" class="mb-0">Municipality of <?php echo ucwords ($brgy_info['city']) ?></h5>
                        <h5 style="color: black; font-weight: bold; font-size: 20; font-family: 'Baskervville', serif;" class="mb-0 text-uppercase">Barangay <?php echo ucwords ($brgy_info['brgy']) ?></i></h5>
                        <h4 style="color: black; font-size: 14; font-family: 'Baskervville', serif;" class="mt-3 text-uppercase">OFFICE OF THE PUNONG BARANGAY</h4>
                  </div>
                  <div class="text-center">
                       <img src="<?php echo $brgy_info['brgy_logo'] ?>" class="img-fluid" width="120">

                  </div>
              </div>
              <div class="row mt-2 justify-content-center">
                <div class="col-10">
                    
                    <div class="text-center">
                        <h2 class="mt-4 fw-bold mb-0" style="color:black; font-family: 'Baskervville', serif;">C E R T I F I C A T I O N</h2>
                        <h4 class="fw-bold mb-5" style="color:black; font-family: 'Baskervville', serif;">( RESIDENCY )</h4>
                    </div>
                    
                    <h5 style="color:black; font-family: 'Baskervville', serif;" class="mt-5">To whom it may concern:</h5>
                    <h5 class="mt-4 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black; font-size: 17px;"><span class="fw-bold">THIS IS TO CERTIFY </span> that <span class="text-uppercase fw-bold" style="text-decoration: underline;"><?php echo $resident['firstname']." ". $resident['middlename']." ". $resident['lastname']; ?> </span> <span class="fw-bold"><?php echo $resident['age'] ?></span> years of  age,  is a bona fide resident of
                     <?php echo ucwords ($resident['purok']." ".$resident['brgy']." ". $resident['city']." ". $resident['province'] )?>.</h5>

                    <h5 class="mt-4 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black; font-size: 17px;"><span class="fw-bold">THIS IS TO CERTIFY FURTHER</span> that she/he is a resident of 
                     <?php echo ucwords ($resident['purok']." ".$resident['brgy']." ". $resident['city']." ". $resident['province'])?>, in <?php echo
                     $resident['years_of_residency']  ?> years.</h5>

                     <h5 class="mt-4 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black; font-size: 17px;"><span class="fw-bold">THIS CERTIFICATION </span> is hereby issued upon the request of the above-mentioned name for whatever legal purposes this may serve.</h5>

                     <h5 class="mt-4 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black; font-size: 17px;"><span class="fw-bold">ISSUED</span> this <?= date("F j, Y") ?> at Barangay <?php echo ucwords ($resident['brgy']." ". $resident['city']." ". $resident['province'])?>.</h5>
                  
               
               <div class="col-12">
                    <div style="margin-top: 100px" class="text-end">
                        <h5 style="color: black;  font-family: 'Baskervville', serif; text-decoration: underline; " class="fw-bold mb-0 text-uppercase"><?= ucwords($captain['firstname']." ". $captain['middlename'].". ". $captain['lastname']) ?></h5>
                        <p contenteditable="true"  style="color: black; font-family: 'Baskervville', serif;">Punong Barangay</p>
                    </div>
                     <div class="text-start">
                        
                        <p style="color: black; font-family: 'Baskervville', serif;" >Not valid without 
                          OFFICIAL SEAL
                          </p>
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