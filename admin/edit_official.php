<?php 
require 'include/header.php'; 
require 'include/sidebar.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$query = $conn->prepare("SELECT * FROM brgy_official WHERE brgy_official_id =:id LIMIT 1");
$query->bindParam('id', $id, PDO::PARAM_INT);
$query->execute();
$official = $query->fetch(PDO::FETCH_ASSOC);


?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Barangay Officials</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="brgy_officials.php">List of Officials</a></li>
          <li class="breadcrumb-item active">Edit Barangay Officials</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

      <section class="section profile">
        
          <div class="row">

            <div class="col-xl-4">

              <div class="card">

                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                  <img src="<?= $official['picture'] ?>" id="bobohaha" alt="Profile" class="rounded-circle">
                  
                  <h5 class="text-center">Brgy. Official Photo</h5>
                  
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
                  <form method="post" action="function/brgyOfficialFunction.php" class="needs-validation" novalidate enctype="multipart/form-data">
                    <input type="hidden" value="<?= $official['brgy_official_id'] ?>" name="brgy_official_id">
                  <div class="tab-content pt-2">

                    <div class="tab-pane fade show active basic-info pt-3 " id="basic-info">

                  <!-- Profile Edit Form -->
                 

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" value="<?= $official['firstname'] ?>">
                        <div id="firstname" class="invalid-feedback">
                          First name is required!
                        </div>
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" type="text" class="form-control" value="<?= $official['middlename'] ?>">
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname" value="<?= $official['lastname'] ?>">
                        <div id="lastname" class="invalid-feedback">
                          Last name is required!
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Position:</label>
                          <div class="col-md-8 col-lg-9">
                           <select name="position" id="position" class="form-select" aria-label="Default select example" required style="cursor: pointer;">
                            <option value="<?= $official['position']; ?>"><?= $official['position']; ?></option>
                            <?php
                            $query = $conn->prepare("SELECT * FROM position ORDER BY position");
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row):
                            
                            ?>
                            <option value="<?= $row['position']; ?>"><?= $row['position']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Chairmanship:</label>
                          <div class="col-md-8 col-lg-9">
                             <select name="chairmanship" id="position" class="form-select" aria-label="Default select example" required style="cursor: pointer;">
                              <option value="<?= $official['chairmanship']; ?>"><?= $official['chairmanship']; ?></option>
                              
                            <?php
                              $query = $conn->prepare("SELECT * FROM chairmanship ORDER BY chairmanship");
                              $query->execute();
                              $result = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach($result as $row):
                                            
                            ?>
                            <option value="<?= $row['chairmanship']; ?>"><?= $row['chairmanship']; ?></option>

                            <?php endforeach; ?>
                            <option value="">No Chairmanship</option>
                          </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Start Term:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="date" id="start" name="start" class="form-control" value="<?= $official['start_term'] ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">End Term:</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="date" id="end" name="end" class="form-control" value="<?= $official['end_term'] ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Upload Photo:</label>
                          <div class="col-md-8 col-lg-9">
                             <input class="form-control" type="file" accept="image/*" name="image" id="prevImg">
                             <input type="hidden" name="current_image" value="<?= $official['picture'] ?>">
                            
                          </div>
                        </div>

                  
                   </div>

                       <button type="submit" class="col-12 btn btn-primary" id="submit" name="update">Update Brgy. Official</button>
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