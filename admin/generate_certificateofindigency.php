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
      <h1>Indigency</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Indigency</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
                  <button class="btn btn-dark btn-border btn-round btn-sm float-end" id="qwe" onclick="printDiv('printThis')">
                        <i class="fa fa-print"></i>
                        Print Certificate
                      </button>
                 </div>
                <div class="card-body py-3"  contenteditable="true" id="printThis">
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
                        <h3 class="mt-4 fw-bold mb-5" style="color:black; font-family: 'Baskervville', serif;">CERTIFICATE OF INDIGENCY</h3>
                    </div>

                    <h5 style="color:black; font-family: 'Baskervville', serif;" class="mt-5">To whom it may concern:</h5>
                    <h5 class="mt-3 fw-normal" style="text-align: justify; text-justify: inter-word; text-indent: 80px; font-family: 'Baskervville', serif; color: black;">This is to certify thata resident of PurokBarangay Sto. Tomas, Peñaranda, Nueva Ecija, is known to me personally to belong to one of the <b>INDIGENT FAMILIES</b> in BarangaySto Tomas. Said person needs assistance for the following reason(s).</h5>

                    <h4 style="color:black; margin-left: 100px; font-size: 20px; font-family: 'Baskervville', serif;" class=" mt-4 mb-0 fw-normal">
                      <div class="row">
                        <div style="width: 20px; margin: 5px; height: 20px;
                           border: 1px solid black;"></div> Medical Assistance
                    </div>
                     </h4>
                    <h4 style="color:black; margin-left: 100px; font-size: 20px; font-family: 'Baskervville', serif;" class="mb-0 fw-normal">
                      <div class="row">
                        <div style="width: 20px; margin: 5px; height: 20px;
                           border: 1px solid black;"></div> Educational Assistance
                    </div>
                     </h4>
                    <h4 style="color:black; margin-left: 100px; font-size: 20px; font-family: 'Baskervville', serif;" class="mb-0 fw-normal">
                      <div class="row">
                        <div style="width: 20px; margin: 5px; height: 20px;
                           border: 1px solid black;"></div> Burial Assistance
                    </div>
                     </h4>
                    <h4 style="color:black; margin-left: 100px; font-size: 20px; font-family: 'Baskervville', serif;" class="mb-0 fw-normal">
                      <div class="row">
                        <div style="width: 20px; margin: 5px; height: 20px;
                           border: 1px solid black;"></div> Financial Assistance
                    </div>
                     </h4>
                    <h4 style="color:black; margin-left: 100px; font-size: 20px; font-family: 'Baskervville', serif;" class="mb-0 fw-normal">
                      <div class="row">
                        <div style="width: 20px; margin: 5px; height: 20px;
                           border: 1px solid black;"></div> Other’s(specify)___________
                    </div>
                     </h4>
                    <h5 contenteditable="true" class="mt-3 fw-normal" style="text-indent: 80px; font-family: 'Baskervville', serif; color: black;">Any assistance given to the bearer/relative(s) will be highly appreciated by the undersigned. Issued this day of_______________2022 at Sto. Tomas Peñaranda, Nueva Ecija.</h5>
                    
                    
               
               <div class="col-12">
                    <div class="mt-6 text-end">
                        <h5 style="color: black;  font-family: 'Baskervville', serif; text-decoration: underline; " class="fw-bold mb-0 text-uppercase"><?= ucwords($captain['firstname']." ". $captain['middlename'].". ". $captain['lastname']) ?></h5>
                        <p contenteditable="true"  style="color: black; font-family: 'Baskervville', serif;">Punong Barangay</p>
                    </div>

                    <div class="text-end">
                        <p style="color: black; font-size: 20px; font-family: 'Baskervville', serif;">For and with authority from the Punong Barangay.</p>
                    </div>

                    <div class="p-2 text-end">
                        <h5 style="color: black;  font-family: 'Baskervville', serif; text-decoration: underline; " class="fw-bold mb-0 text-uppercase"><?= ucwords($sec['firstname']." ". $sec['middlename'].". ".  $sec['lastname']) ?></h5>
                        <p contenteditable="true"  style="color: black; font-family: 'Baskervville', serif;">Barangay Secretary</p>
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
            </div>
          </div>
        </section>

      </main><!-- End #main -->
    

      <?php include('include/footer.php') ?>

 
</body>
</html>