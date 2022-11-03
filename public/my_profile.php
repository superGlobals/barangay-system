<?php
if (!isset($_SESSION['unique_id'])) {
  header("location: home");
}
require "include/header.php";

?>

  <main id="main">

    <?php if (isset($_SESSION['unique_id'])):?>
      <section id="my_profile" class="departments" style="background-color: #1977cc">
      <div class="container">
        <div class="card-haha maangas">
          <div class="section-title">
            <h5 class="h5-title text-center pb-0 fs-3">My Profile</h5>
           <!--  <p>Here is your request for all certificate records.</p> -->
          </div>

          <div class="row gy-4">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <a class="nav-link active show" onclick="set_tab(this.getAttribute('href'))" data-bs-toggle="tab" href="#profile" id="profile-tab">Profile</a>
                </li>
                <?php if($resident_query['verification_status'] != "Verified"): ?>
                 <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" onclick="set_tab(this.getAttribute('href'))" href="#verify" id="verify-tab">Verify my Account</a>
                </li>
                <?php endif; ?>

                 <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" onclick="set_tab(this.getAttribute('href'))" href="#change_pic" id="change_pic-tab">Change Profile Picture</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" onclick="set_tab(this.getAttribute('href'))" href="#change" id="change-tab">Change Password</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" onclick="set_tab(this.getAttribute('href'))" href="#update_profile" id="update_profile-tab">Update Profile</a>
                </li> -->
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                <div class="tab-pane active show" id="profile">
                  <div class="row gy-4">
                    <div class="col-lg-12">
                      <div class="doctors">             
                        <div class="col-lg-12">
                          <div class="member" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            
                               <div class="pro">
                                 <img src="admin/<?= $resident_query['photo'] ?>" class="rounded-circle" alt="My Profile" width="130" height="130">
                               </div>
                                <?php $verification_status = $resident_query['verification_status']; ?>
                              <div class="member-info">
                                  <?php if ($verification_status == 'Not Verified'): ?>
                                   <h6 class="text-sm">Account | <?php echo $resident_query['verification_status'] ?> <i class="bi bi-x-circle-fill text-danger"></i></h6>
                                <?php elseif($verification_status == 'Verified'): ?>
                                   <h6 class="text-sm">Account | <?php echo $resident_query['verification_status'] ?> <i class="bi bi-check-circle-fill text-primary"></i></i></i></h6>
                                 </h6>
                                <?php elseif ($verification_status == 'Decline'):?>
                                  <h6 class="text-sm text-dark text-center"><i class="fa-solid fa-xmark"></i> <?php echo $resident_query['verification_status'] ?>
                               <?php endif; ?></h6>
                                <h4><?= ucwords($resident_query['firstname']." ".$resident_query['middlename'].". ".$resident_query['lastname']) ?>, <?= $resident_query['age'] ?></h4>
                               Resident of
                                <p><?= ucwords($resident_query['purok'].", ".$resident_query['brgy'].", ".$resident_query['city'].", ".$resident_query['province']) ?></p>
                              </div>
                              
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="tab-pane" id="verify">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <div class="card-haha" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <h3>Attach Photo</h3>
                        <p class="fst-italic">Please attach a photo of any supporting documents. The photo must be clear.</p>
                        <p>School ID, Passport ID, Driver's License, National ID. etc...</p>
                        <form action="profileFunction.php" method="post" enctype="multipart/form-data">
                          <input type="file" class="form-control form-control-sm" name="image" id="prevImg" accept="image/*" required>
                          <input type="hidden" name="current_image" value="<?= $resident_query['image_verify']; ?>">
                          <button class="btn btn-primary mt-2" type="submit" name="uploadId">Submit</button>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="admin/<?= $resident_query['image_verify'] ?>" id="bobohaha" alt="Please upload any ID" width="100%">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="change_pic">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <div class="card-haha" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <h3>Change Profile</h3>
                        <p>*Note <br>2x2 Picture must taken with white background</p>
                        <form action="profileFunction.php" method="post" enctype="multipart/form-data">
                          <input type="file" class="form-control form-control-sm" name="image" id="prevImg" accept="image/*" required>
                          <input type="hidden" name="current_image" value="<?= $resident_query['photo']; ?>">
                          <button class="btn btn-primary mt-2" type="submit" name="chageProfile">Submit</button>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="admin/<?= $resident_query['photo'] ?>" alt="My Profile" id="bobohaha" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="change">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <div class="card-haha" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">
                        <h3>Change Password</h3>
                        <form action="profileFunction.php" method="post">
                          <label class="form-label">Current Password</label>
                          <input type="password" class="form-control form-control-sm" name="current_password" id="pass2" placeholder="Enter current password" value="<?php if(isset($_SESSION['current_pass'])) echo $_SESSION['current_pass']; unset($_SESSION['current_pass']);  ?>" required>
                          <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                          <label class="form-label mt-2">New Password</label>
                          <input type="password" class="form-control form-control-sm" onkeyup="return validate()" name="new_password" placeholder="Enter new password" value="<?php if(isset($_SESSION['new_pass'])) echo $_SESSION['new_pass']; unset($_SESSION['new_pass']);  ?>" id="pass1" required>
                          <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                          <input type="hidden" name="name" value="<?= $resident_query['firstname']." ".$resident_query['lastname'] ?>">
                          <button class="btn btn-primary mt-2" type="submit" name="change_pass">Submit</button>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-4 text-center mt-5 order-1 order-lg-2">
                      <div class="col-sm errors">
                        <ul class="text-sm" style="font-size: 13px;">
                          <li id="length">New Password must be at least 8 characters in length.</li>
                          <li id="number">New Password must include at least one number.</li>
                        </ul>
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
  <?php endif; ?>

   

  </main><!-- End #main -->

<?php require "include/footer.php" ?>