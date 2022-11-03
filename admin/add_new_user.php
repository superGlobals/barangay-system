<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add New Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="new_user.php">List of User</a></li>
          <li class="breadcrumb-item active">Add New User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

      <section class="section profile">
        
          <div class="row">

            <div class="col-xl-4">

              <div class="card" style="border-left: 4px solid #0d6efd;">

                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                  <img src="img/person.png" id="bobohaha" alt="Profile" class="rounded-circle">
                  
                </div>
              </div>

            </div>

            <div class="col-xl-8">

              <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#basic-info">Basic info</button>
                    </li>

                    <!-- <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#other-info">Other info</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#address">Address</button>
                    </li> -->

                 
                  </ul>
                  <form method="post" action="function/adminFunction.php" class="needs-validation" novalidate enctype="multipart/form-data">

                  <div class="tab-content pt-2">
                    <div class="col-sm errors">
          <ul class="text-dark" style="font-size: 14px;">
            <li id="length">Password must be at least 8 characters in length.</li>
            <li id="number">Password must include at least one number.</li>
          </ul>
                </div>

                    <div class="tab-pane fade show active basic-info pt-3 " id="basic-info">

                  <!-- Profile Edit Form -->
                 

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullname" type="text" class="form-control" value="<?php if(isset($_SESSION['fullname'])) echo $_SESSION['fullname']; unset($_SESSION['fullname']);  ?>" required>
                        <div id="firstname" class="invalid-feedback">
                           Fullname is required!
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username:</label>
                          <div class="col-md-8 col-lg-9">
                         <input type="text" name="username" id="user_username" class="form-control" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; unset($_SESSION['username']);  ?>" required onInput="checkUserUsername()"/>
                         <span id="check-username"></span>
                         <div id="username" class="invalid-feedback">
                          Username is required!
                        </div>
                        </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="password" class="form-control" id="pass1" onkeyup="return validate()" alt="password" name="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password']; unset($_SESSION['password']);  ?>" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style=" float: right; margin-left: -25px;margin-top: -25px;position: relative; z-index: 2; cursor: pointer;"></span>
                             <div class="invalid-feedback">
                                required!
                              </div>  
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Type:</label>
                          <div class="col-md-8 col-lg-9">
                             <select class="form-select" name="user_type" aria-label="Default select example" required>
                              <option value="">Select user type</option>
                              <option value="Admin"<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type']=="Admin") echo "selected"; ?>>Admin</option>
                              <option value="Secretary"<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type']=="Secretary") echo "selected"; ?>>Secretary</option>
                              <option value="Kagawad"<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type']=="Kagawad") echo "selected"; unset($_SESSION['user_type']); ?>>Kagawad</option>
                            </select> 
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Upload Photo:</label>
                          <div class="col-md-8 col-lg-9">
                             <input class="form-control form-control-sm" type="file" accept="image/*" name="image" id="prevImg" class="form-control">
                            
                          </div>
                          

                        </div>
  
                      </div>
                      <button type="submit" class="col-12 btn btn-primary" id="submit" name="addUser">Add User</button>

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