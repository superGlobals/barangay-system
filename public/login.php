<?php 
if (isset($_SESSION['unique_id'])) {
  header("location: home");
}
require "include/header.php";
require "include/time_ago.php";
?>
  <style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
  cursor: pointer;
}
  .maangas {
  border-radius: 0!important;
  border: 0.5rem solid rgba(255,255,255,.3);
  background-clip: padding-box;
  background-color: #fff;
  }

  label{
    color: #444444;
  }

  p a{
    color: #444444;
  }

  a:hover {
    color: #1977cc;
  }


</style>

   <body style="background-color: #1977cc">

    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center">
                
              </div><!-- End Logo -->
          
              <div class="maangas card mt-5">

                  <img class="p-2 pb-0" src="admin/<?= $brgy_info['brgy_logo'] ?>" alt="logo"  width="70">
     
                <div class="card-body">

                  <div class="pt-1 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="color: #012970;">Login to Your Account</h5>
                    <p class="text-center small" style="color: #444444;">Enter your username & password to login</p>
                  </div>

                   <?php
                if (isset($_SESSION['error']) && $_SESSION != '')
                  {
                   ?>
                       <div class="alert alert-danger text-center p-0 mb-0" id="hide">
                        <?php echo $_SESSION['error'];  ?>
                        <!-- <a href="contact">here</a> -->
                         
                    </div>
                      <?php
                      unset($_SESSION['error']);
                  }
                   
                ?>

                  <form action="loginFunction" method="post" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                      <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                        <input type="text" name="username" class="form-control" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username'];
                         unset($_SESSION['username']);  ?>" >
                        <div class="invalid-feedback">Please enter your username!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="pass1" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password'];
                         unset($_SESSION['password']);  ?>">
                      
                      <div class="invalid-feedback">Please enter your password!</div>
                     <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                    </div>

                        <!-- <p class="small mb-0 col-lg-6"><a href="home">Back to home</a></p> -->

                        <p class="small mb-0 "><a class="float-end" href="register">Register</a></p>
     

                  </form>

                </div>
              </div>
          
          </div>
        </div>
      </div>

    </section>

  </div>


<?php require "include/footer.php" ?>