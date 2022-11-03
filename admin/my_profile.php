<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
$query = $conn->prepare("SELECT * FROM user WHERE user_id =:id");
$query->bindParam('id', $_SESSION['id'], PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>My Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

      <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= $result['photo']; ?>" id="bobohaha" alt="Profile" class="rounded-circle">
              <h2><?= ucwords($result['fullname'])?></h2>
              <h3><?= $result['user_type']; ?></h3>
              <!-- <div class="social-links mt-2">
                <h6 class="text-success">Active</h6>
              </div> -->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit my profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="function/adminFunction.php" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $result['user_id'] ?>" name="user_id">
                    <input type="hidden" name="user_type" value="<?= $result['user_type'] ?>">
                      <label class="form-label">Fullname</label>
                      <input type="text" name="fullname" class="form-control" value="<?= $result['fullname'] ?>">
                     
                      <label class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" value="<?= $result['username'] ?>" >
                    
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">

                      <label class="form-label">Photo</label>
                      <input type="file" id="prevImg" name="image" class="form-control">
                      <input type="hidden" name="current_image" value="<?= $result['photo']?>">

                      <button type="submit" name="updateProfile" class="col-12 mt-3 btn btn-primary">Update</button>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

      </main><!-- End #main -->

  <?php require 'include/footer.php'; ?>

</body>

</html>