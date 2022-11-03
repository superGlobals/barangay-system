<?php 

require "include/header.php";
require "include/time_ago.php";
?>
<style type="text/css">


</style>

    <?php if(isset($_SESSION['unique_id'])): ?>
    <section class="hero-area" >
        <div class="verticle-lines">
            <div class="vlines one"></div>
            <div class="vlines two"></div>
            <div class="vlines three"></div>
            <div class="vlines four"></div>
        </div>
        <!-- Single Slider -->
        <div class="hero-inner">
            <div class="container">
              <div class="row">
                <?php foreach($result as $row): ?>
                <div class="col-lg-12 justify-content-center mt-5 text-center ">
                  <img class="rounded-circle" src="admin/<?= $row['brgy_logo'] ?>" width="100" height="100" data-aos="zoom-in" data-aos-delay="100">
                <?php endforeach; ?>
                  <h1 class="fw-bold mt-3" data-aos="zoom-in" data-aos-delay="100">WELCOME, <span class="text-dark text-uppercase"><?= ucwords($_SESSION['resident_username']) ?></span></h1>
                  <h5 class="text-dark" data-aos="zoom-in" data-aos-delay="100">What would you like to do?</h5>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                  <a href="services">
                    <div class="icon-box">
                      <div class="icon"><i class="fa-solid fa-file"></i></div>
                      <h4>CERTIFICATION</h4>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                  <a href="my_request">
                    <div class="icon-box">
                      <div class="icon"><i class="fa-solid fa-clipboard-list"></i></div>
                      <h4>TRANSACTION</h4>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                  <a href="my_profile">
                    <div class="icon-box">
                      <div class="icon"><i class="fa-solid fa-user"></i></div>
                      <h4>PROFILE</h4>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                  <a href="blotter">
                    <div class="icon-box">
                      <div class="icon"><i class="fa-solid fa-database"></i></div>
                      <h4>BLOTTER</h4>
                    </div>
                    </a>
                  </div>
              </div>
              
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
<?php else: ?>
<!-- background-color: #1977cc -->
  <!-- Start Hero Area -->
    <section class="hero-area" >
        <div class="verticle-lines">
            <div class="vlines one"></div>
            <div class="vlines two"></div>
            <div class="vlines three"></div>
            <div class="vlines four"></div>
        </div>
        <!-- Single Slider -->
        <div class="hero-inner">
            <div class="container">
              <?php foreach($result as $row): ?>
                <div class="row ">
                    <div class="col-lg-6 co-12">
                        <div class="home-slider">
                            <div class="hero-text">
                                <h5 class="wow fadeInUp" data-aos="zoom-in" data-aos-delay="100">BARANGAY INFORMATION SYSTEM</h5>
                                <h1 class="wow fadeInUp text-uppercase" data-aos="zoom-in" data-aos-delay="300">BARANGAY PORTAL OF <?= $row['brgy'] ?>
                                </h1>
                                <p class="wow fadeInUp" data-aos="zoom-in" data-aos-delay="500">Contact number: <?= $row['contact'] ?></p>
                                <div class="button wow fadeInUp" data-aos="zoom-in" data-aos-delay="700">
                                    <a href="services" class="btn">REQUEST CERTIFICATE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-none d-sm-block" data-aos="zoom-in" data-aos-delay="100">
                        <div class="hero-image">
                            <img class="shape3" src="admin/<?= $row['brgy_logo'] ?>" alt="#">
                        </div>
                    </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Hero Area -->
<?php endif; ?>


<?php require "include/footer.php" ?>