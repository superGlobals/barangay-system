<?php
require "include/header.php";

?>

<style type="text/css">
  .icon-box {
  text-align: center;
  padding: 20px 10px;
  transition: all ease-in-out 0.3s;
  cursor: pointer;
  margin-top: 50px;
}

.icon-box .icon {
  margin: 0 auto;
  width: 44px;
  height: 44px;
  background: #1977cc;
  border-radius: 5px;
  transition: all 0.3s ease-out 0s;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  transform-style: preserve-3d;
  cursor: pointer;
}

.icon-box .icon i {
  color: #fff;
  font-size: 24px;
}

.icon-box .icon::before {
  position: absolute;
  content: "";
  left: -8px;
  top: -8px;
  height: 100%;
  width: 100%;
  border-radius: 5px;
  transition: all 0.3s ease-out 0s;
  transform: translateZ(-1px);
}

 .icon-box h4 {
  font-weight: 400;
  margin-bottom: 15px;
  font-size: 20px;
}
 .icon-box {
  color: #2c4964;
}
 .icon-box p {
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}
 .icon-box:hover {
  background: #1977cc;
  border-color: #1977cc;
}
 .icon-box:hover .icon {
  background: #fff;
}
 .icon-box:hover .icon i {
  color: #1977cc;
}
 .icon-box:hover .icon::before {
  background: #3291e6;
}
.icon-box:hover h4, .icon-box:hover p {
  color: #fff;
}

</style>

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
                  <img class="rounded-circle" src="admin/<?= $row['brgy_logo'] ?>" width="100" height="100">
                <?php endforeach; ?>
                  <h1 class="fw-bold">WELCOME, <span class="text-dark">EDWARD</span></h1>
                  <h5 class="text-dark">What would you like to do?</h5>
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
                  <a href="brgy_clearance_request">
                    <div class="icon-box">
                      <div class="icon"><i class="fa-solid fa-clipboard-list"></i></div>
                      <h4>TRANSACTION</h4>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                  <a href="brgy_clearance_request">
                    <div class="icon-box">
                      <div class="icon"><i class="fa-solid fa-user"></i></div>
                      <h4>PROFILE</h4>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                  <a href="brgy_clearance_request">
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

<?php require "include/footer.php" ?>

