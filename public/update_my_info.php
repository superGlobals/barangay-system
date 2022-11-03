<?php
if (!isset($_SESSION['unique_id'])) {
  header("location: home");
}
require "include/header.php";

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
                    <h5 class="card-title text-center pb-0 fs-4" style="color: #012970;">Update My Information</h5>
                    <!-- <p class="text-center small">Enter your personal details to create account</p> -->
                  </div>
                  <form class="row needs-validation" action="profileFunction.php" method="post" novalidate>
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">First name</label>
                        <input type="text" readonly class="form-control" value="<?= ucfirst($resident_query['firstname']) ?>" name="firstname" onkeyup="lettersOnly(this)" required style="background-color: #e9ecef; opacity: 1;" >
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Middle name</label>
                        <input type="text" readonly class="form-control" value="<?= ucfirst($resident_query['middlename']) ?>"  name="middlename" placeholder="(Optional)" onkeyup="lettersOnly(this)" style="background-color: #e9ecef; opacity: 1;">
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Last name</label>
                        <input type="text" readonly class="form-control" value="<?= ucfirst($resident_query['lastname']) ?>" name="lastname" onkeyup="lettersOnly(this)" required style="background-color: #e9ecef; opacity: 1;">
                      </div>
                      <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Purok</label>
                        <select class="form-select" name="purok" aria-label="Default select example" required>
                           <option value="<?= $resident_query['purok'] ?>"><?= $resident_query['purok'] ?></option>

                           <?php foreach($purok_result as $purok): ?>

                            <option value="<?= $purok['purok'] ?>"><?= $purok['purok'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Barangay</label>
                        <input type="text" readonly class="form-control" value="<?= ucwords($resident_query['brgy']) ?>" name="brgy" required style="background-color: #e9ecef; opacity: 1;">
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">City</label>
                        <input type="text" readonly class="form-control" value="<?= ucwords($resident_query['city']) ?>" name="city" required style="background-color: #e9ecef; opacity: 1;">
                      </div>
                      <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Province</label>
                        <input type="text" readonly class="form-control" value="<?= ucwords($resident_query['province']) ?>" name="province" required style="background-color: #e9ecef; opacity: 1;">
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Citizenship</label>
                        <input type="text" class="form-control" value="<?= ucfirst($resident_query['citizenship']) ?>" name="citizenship" required>
                      </div>
                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Religion</label>
                        <input type="text" class="form-control" value="<?= ucfirst($resident_query['religion']) ?>" name="religion" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example" name="gender" required>
                          <option value="<?= $resident_query['gender'] ?>"><?= $resident_query['gender'] ?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                          
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Birthdate</label>
                        <input class="form-control" value="<?= ucfirst($resident_query['birthdate']) ?>" id="bdate" name="bdate" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Age</label>
                        <input type="text" readonly class="form-control" value="<?= ucfirst($resident_query['age']) ?>" id="age" name="age" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Birthplace</label>
                        <input type="text" class="form-control" value="<?= ucwords($resident_query['birthplace']) ?>" name="birthplace" required>
                      </div>
                        <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Civil Status</label>
                        <select class="form-select" aria-label="Default select example" name="civil_status" required>
                          <option value="<?= $resident_query['civil_status'] ?>"><?= $resident_query['civil_status'] ?></option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Seperated">Seperated</option>
                          <option value="Divorced">Divorced</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Occupation</label>
                        <input type="text" class="form-control" value="<?= ucwords($resident_query['profession_occupation']) ?>" name="profession" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Years of Residency</label>
                        <input type="number" class="form-control" value="<?= ucfirst($resident_query['years_of_residency']) ?>" name="years_residency" required>
                      </div>
                       <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Voters Status</label>
                        <select class="form-select" aria-label="Default select example" name="voters_status" required>
                          <option value="<?= $resident_query['voters_status'] ?>"><?= $resident_query['voters_status'] ?></option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>

                        </select>
                      </div>
                       <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" value="<?= $resident_query['contact_no'] ?>" name="contact_number" required>
                      </div>
                      <!-- <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Username</label>
                        <input type="text" readonly class="form-control" value="<?= $resident_query['username'] ?>" name="username" required>
                      </div> -->

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="updateInfo">Update Info</button>
                    </div>

                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>

<?php require "include/footer.php" ?>