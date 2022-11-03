<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Resident</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Resident</a></li>
          <li class="breadcrumb-item active">Add Resident</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card" style="border-left: 4px solid #0d6efd;">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

               <img src="img/default.png" id="bobohaha" alt="Profile" class="rounded-circle">
               <h5 class="text-center mt-3">Resident Photo</h5>
               
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#basic-info">Resident info</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#other-info">Other info</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#address">Address</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#resident-account">Resident Account</button>
                </li>

              </ul>
               <form class="needs-validation" novalidate action="function/residentFunction.php" method="post" enctype="multipart/form-data">
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active basic-info pt-3 " id="basic-info">

                  <!-- Profile Edit Form -->
                 

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname']; unset($_SESSION['firstname']);  ?>"  required>
                        <div id="firstname" class="invalid-feedback">
                          First name is required!
                        </div>
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" type="text" class="form-control" value="<?php if(isset($_SESSION['middlename'])) echo $_SESSION['middlename']; unset($_SESSION['middlename']);  ?>"  placeholder="(Optional)">
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname" value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname']; unset($_SESSION['lastname']);  ?>" required>
                        <div id="lastname" class="invalid-feedback">
                          Last name is required!
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Gender:</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="gender" class="form-select" aria-label="Default select example"  style="cursor: pointer;">
                          <option value="">Select Gender</option>
                          <option value="Male"<?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="Male") echo "selected"; ?>>Male</option>
                          <option value="Female"<?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="Female") echo "selected"; unset($_SESSION['gender']) ?>>Female</option>
                        </select>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Civil Status:</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="civil_status" class="form-select" aria-label="Default select example"  style="cursor: pointer;">
                          <option value="">Select Status</option>
                          <option value="Single"<?php if (isset($_SESSION['civilstatus']) && $_SESSION['civilstatus']=="Single") echo "selected"; ?>>Single</option>
                          <option value="Married"<?php if (isset($_SESSION['civilstatus']) && $_SESSION['civilstatus']=="Married") echo "selected"; unset($_SESSION['civilstatus']) ?>>Married</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Citizenship:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="citizenship" type="text" class="form-control" value="<?php if(isset($_SESSION['citizenship'])) echo $_SESSION['citizenship']; unset($_SESSION['citizenship']);  ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Religion:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="religion" type="text" class="form-control" value="<?php if(isset($_SESSION['religion'])) echo $_SESSION['religion']; unset($_SESSION['religion']);  ?>">
                      </div>
                    </div>
                   </div>

                    <div class="tab-pane fade pt-3" id="other-info">

                     <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Birthdate:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="text" class="form-control" id="bdate" name="bdate" value="<?php if(isset($_SESSION['bdate'])) echo $_SESSION['bdate']; unset($_SESSION['bdate']);  ?>">
                          </div>
                        </div>

                         <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Age:</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" class="form-control" name="age" value="<?php if(isset($_SESSION['age'])) echo $_SESSION['age']; unset($_SESSION['age']);  ?>" id="age" readonly/>
                          </div>
                        </div>

                         <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Birthplace:</label>
                          <div class="col-md-8 col-lg-9">
                           <input type="text" name="birthplace" class="form-control" value="<?php if(isset($_SESSION['birthplace'])) echo $_SESSION['birthplace']; unset($_SESSION['birthplace']);  ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Occupation:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="text" name="profession" class="form-control" value="<?php if(isset($_SESSION['profession'])) echo $_SESSION['profession']; unset($_SESSION['profession']);  ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Years Residency:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="text" name="years_residency" class="form-control" value="<?php if(isset($_SESSION['yearsresidency'])) echo $_SESSION['yearsresidency']; unset($_SESSION['yearsresidency']);  ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Voters Status:</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="voters_status" class="form-select" aria-label="Default select example" >
                              <option value="">Select Status</option>
                              <option value="Yes"<?php if (isset($_SESSION['voters_status']) && $_SESSION['voters_status']=="Yes") echo "selected"; ?>>Yes</option>
                          <option value="No"<?php if (isset($_SESSION['voters_status']) && $_SESSION['voters_status']=="No") echo "selected"; unset($_SESSION['voters_status']); ?>>No</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Contact Number:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="number" name="contact_number" onkeyup="return validate()" id="con" class="form-control" value="<?php if(isset($_SESSION['contactnumber'])) echo $_SESSION['contactnumber']; unset($_SESSION['contactnumber']);  ?>">
                            
                          </div>
                        </div>

                      </div>

                    <div class="tab-pane fade pt-4" id="address">

                     <div class="row mb-3">
                       <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Purok:</label>
                        <div class="col-md-8 col-lg-9">
                           <select class="form-select" aria-label="Default select example" name="purok" required>
                              <!-- <option value="">Select Purok</option> -->
                              <?php 
                                $query = $conn->prepare("SELECT * FROM purok ORDER BY purok ASC");
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                ?>

                                <?php foreach($result as $row): ?>

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
                      </div>

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Barangay:</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" name="brgy" class="form-control" value="<?php if(isset($_SESSION['brgy'])) echo $_SESSION['brgy']; unset($_SESSION['brgy']);  ?>" required>
                        </div>
                      </div>

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">City:</label>
                        <div class="col-md-8 col-lg-9">
                         <input type="text" name="city" class="form-control" value="<?php if(isset($_SESSION['city'])) echo $_SESSION['city']; unset($_SESSION['city']);  ?>" required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Province:</label>
                        <div class="col-md-8 col-lg-9">
                           <input type="text" name="province" class="form-control" value="<?php if(isset($_SESSION['province'])) echo $_SESSION['province']; unset($_SESSION['province']);  ?>" required>
                        </div>
                      </div>

                  </div>

                   <div class="tab-pane fade pt-4" id="resident-account">

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email:</label>
                        <div class="col-md-8 col-lg-9">
                         <input type="email" name="email" id="email" placeholder="(Optional)" class="form-control" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; unset($_SESSION['email']);  ?>" onInput="checkEmail()"/>
                         <span id="check-email"></span>
                        </div>
                      </div>

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username:</label>
                        <div class="col-md-8 col-lg-9">
                         <input type="text" name="username" id="username" class="form-control" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; unset($_SESSION['username']);  ?>" required onInput="checkUsername()"/>
                         <span id="check-username"></span>
                         <div id="username" class="invalid-feedback">
                          Username is required!
                        </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password:</label>
                        <div class="col-md-8 col-lg-9">
                           <input type="password" class="form-control" id="pass1" alt="password" name="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password']; unset($_SESSION['password']);  ?>" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style=" float: right; margin-left: -25px;margin-top: -25px;position: relative; z-index: 2; cursor: pointer;"></span>
                                    </div>
                      </div>


                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Upload Photo:</label>
                        <div class="col-md-8 col-lg-9">
                          <input class="form-control form-control-sm" type="file" accept="image/*" name="image" id="prevImg">
                        </div>
                      </div>
                     
        

                        <button type="submit" class="col-12 btn btn-primary" id="submit" name="add_resident">Save Resident</button>

                    </div>
              
                  </div><!-- End Bordered Tabs -->
                </form>

            </div>
          </div>

        </div>
      </div>
    </section>

      </main><!-- End #main -->

  <?php require 'include/footer.php'; ?>

</body>

</html>