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
  margin-top: 80px;
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

            

              <div class="maangas card">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="color: #012970;">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row needs-validation" action="registerFunction.php" method="post" novalidate>
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">First name</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname']; unset($_SESSION['firstname']);  ?>" name="firstname" onkeyup="lettersOnly(this)" required>
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Middle name</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['middlename'])) echo $_SESSION['middlename']; unset($_SESSION['middlename']);  ?>"  name="middlename" placeholder="(Optional)" onkeyup="lettersOnly(this)">
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Last name</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname']; unset($_SESSION['lastname']);  ?>" name="lastname" onkeyup="lettersOnly(this)" required>
                      </div>
                      <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Purok</label>
                        <select class="form-select" name="purok" aria-label="Default select example" required>
                          <!-- <option value="">Select Purok</option> -->
                          <?php foreach($purok_result as $row): ?>

                           <?php if(isset($_SESSION['purok'])): ?>
                            <option value="<?= $_SESSION['purok'] ?>"><?= $_SESSION['purok'] ?></option>
                            <option value="<?= $row['purok'] ?>"><?= $row['purok'] ?></option>
                            <?php unset($_SESSION['purok']) ?>
                          <?php else: ?>
                         
                          <option value="<?= $row['purok'] ?>"><?= $row['purok'] ?></option>
                          
                          <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Barangay</label>
                        <input type="text" readonly class="form-control" value="<?= $brgy_info['brgy'] ?>" name="brgy" required>
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">City</label>
                        <input type="text" readonly class="form-control" value="<?= $brgy_info['city'] ?>" name="city" required>
                      </div>
                      <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Province</label>
                        <input type="text" readonly class="form-control" value="<?= $brgy_info['province'] ?>" name="province" required>
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Citizenship</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['citizenship'])) echo $_SESSION['citizenship']; unset($_SESSION['citizenship']);  ?>" name="citizenship" required>
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Religion</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['religion'])) echo $_SESSION['religion']; unset($_SESSION['religion']);  ?>" name="religion" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example" name="gender" required>
                          <option value="">-Select Gender-</option>
                          <option value="Male"<?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="Male") echo "selected"; ?>>Male</option>
                          <option value="Female"<?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="Female") echo "selected"; ?>>Female</option>
                          <option value="Other"<?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="Other") echo "selected"; unset($_SESSION['gender']) ?>>Other</option>
                          
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Birthdate</label>
                        <input class="form-control" value="<?php if(isset($_SESSION['bdate'])) echo $_SESSION['bdate']; unset($_SESSION['bdate']);  ?>" id="bdate" name="bdate" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Age</label>
                        <input type="text" readonly class="form-control" value="<?php if(isset($_SESSION['age'])) echo $_SESSION['age']; unset($_SESSION['age']);?>" id="age" name="age" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Birthplace</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['birthplace'])) echo $_SESSION['birthplace']; unset($_SESSION['birthplace']);  ?>" name="birthplace" required>
                      </div>
                        <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Civil Status</label>
                        <select class="form-select" aria-label="Default select example" name="civil_status" required>
                          <option value="">-Select status-</option>
                          <option value="Single"<?php if (isset($_SESSION['civilstatus']) && $_SESSION['civilstatus']=="Single") echo "selected"; ?>>Single</option>
                          <option value="Married"<?php if (isset($_SESSION['civilstatus']) && $_SESSION['civilstatus']=="Married") echo "selected"; ?>>Married</option>
                          <option value="Widowed"<?php if (isset($_SESSION['civilstatus']) && $_SESSION['civilstatus']=="Widowed") echo "selected"; ?>>Widowed</option>
                          <option value="Seperated"<?php if (isset($_SESSION['civilstatus']) && $_SESSION['civilstatus']=="Seperated") echo "selected";?>>Seperated</option>
                          <option value="Divorced"<?php if (isset($_SESSION['civilstatus']) && $_SESSION['civilstatus']=="Divorced") echo "selected"; unset($_SESSION['civilstatus']) ?>>Divorced</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Occupation</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['profession'])) echo $_SESSION['profession']; unset($_SESSION['profession']);  ?>" name="profession" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Years of Residency</label>
                        <input type="number" class="form-control" value="<?php if(isset($_SESSION['yearsresidency'])) echo $_SESSION['yearsresidency']; unset($_SESSION['yearsresidency']);  ?>" name="years_residency" required>
                      </div>
                       <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Voters Status</label>
                        <select class="form-select" aria-label="Default select example" name="voters_status" required>
                          <option value="">-Select status-</option>
                          <option value="Yes"<?php if (isset($_SESSION['voters_status']) && $_SESSION['voters_status']=="Yes") echo "selected"; ?>>Yes</option>
                          <option value="No"<?php if (isset($_SESSION['voters_status']) && $_SESSION['voters_status']=="No") echo "selected"; unset($_SESSION['voters_status']); ?>>No</option>

                        </select>
                      </div>
                       <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" value="<?php if(isset($_SESSION['contactnumber'])) echo $_SESSION['contactnumber']; unset($_SESSION['contactnumber']);  ?>" name="contact_number" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; unset($_SESSION['username']);  ?>" name="username" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Password</label>
                        <input type="password" class="form-control" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password']; unset($_SESSION['password']);  ?>" onkeyup="return validate()" name="password"  id="pass1" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                      </div>

                      <div class="col-sm errors">
                      <ul style="font-size: 12px">
                        <li id="length">Password must be at least 8 characters in length.</li>
                        <li id="number">Password must include at least one number.</li>
                      </ul>
                </div>
                      

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="register">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>


<?php require "include/footer.php"; ?>