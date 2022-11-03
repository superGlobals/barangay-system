<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 $resident_status = $_GET['status'];
 $query = $conn->prepare("SELECT * FROM resident WHERE resident_id= ? LIMIT 1");
 $query->bindParam(1, $id, PDO::PARAM_INT);
 $query->execute();
 $resident = $query->fetch(PDO::FETCH_ASSOC);

 // $resident_id = trim($resident['resident_id'].$resident['birthdate'].$resident['contact_no']);
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Update resident <?= ucfirst($resident['firstname']) ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item"><a href="residents.php">Residents</a></li>
          <li class="breadcrumb-item active">Update Residents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
 
    <section class="section profile">
   
      <div class="row">

        <!-- <div class="col-xl-3">

          <div class="card">
            
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

               <img src="<?= $resident['photo']; ?>" id="bobohaha" alt="Profile" class="rounded-circle">
              
               <h5 class="text-center mt-3">Resident Photo</h5>
              
        
            </div>
          </div>

        </div> -->

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#basic-info">Resident info</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#other-info">Other info</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#address">Address</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#resident-account">Account</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#blotter-records">Blotter records</button>
                </li>

              </ul>
                  <form action="function/residentFunction.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active basic-info pt-3 " id="basic-info">

                  <!-- Profile Edit Form -->
                   <!-- <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Resident ID:</label>
                      <div class="col-md-8 col-lg-9">
                        <input  class="form-control" value="<?= $resident_id ?>" readonly>

                    </div>
                  </div> -->

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" value="<?= ucfirst($resident['firstname']) ?>" required>
                        <div id="firstname" class="invalid-feedback">
                          First name is required!
                        </div>
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" type="text" class="form-control" value="<?= ucfirst($resident['middlename']) ?>">
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname" value="<?= ucfirst($resident['lastname']) ?>" required>
                        <div id="lastname" class="invalid-feedback">
                          Last name is required!
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Gender:</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="gender" class="form-select" aria-label="Default select example"  style="cursor: pointer;">
                          <option value="<?= $resident['gender']; ?>"><?= $resident['gender']; ?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Civil Status:</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="civil_status" class="form-select" aria-label="Default select example"  style="cursor: pointer;">
                          <option value="<?= $resident['civil_status']; ?>"><?= $resident['civil_status']; ?></option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Citizenship:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="citizenship" type="text" class="form-control" value="<?= ucfirst($resident['citizenship']) ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Religion:</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="religion" type="text" class="form-control" value="<?= ucfirst($resident['religion']) ?>">
                      </div>
                    </div>
                   </div>

                    <div class="tab-pane fade pt-3" id="other-info">

                     <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Birthdate:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="text" class="form-control" id="bdate" name="bdate" value="<?= $resident['birthdate'] ?>">
                          </div>
                        </div>

                         <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Age:</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" class="form-control" name="age" id="age" value="<?= $resident['age'] ?>" readonly/>
                          </div>
                        </div>

                         <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Birthplace:</label>
                          <div class="col-md-8 col-lg-9">
                           <input type="text" name="birthplace" class="form-control" value="<?= ucfirst($resident['birthplace']) ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Occupation:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="text" name="profession" class="form-control" value="<?= ucfirst($resident['profession_occupation']) ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Years Residency:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="number" name="years_residency" class="form-control" value="<?= $resident['years_of_residency'] ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Voters Status:</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="voters_status" class="form-select" aria-label="Default select example" style="cursor: pointer;">
                              <option value="<?= $resident['voters_status']; ?>"><?= $resident['voters_status']; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Contact Number:</label>
                          <div class="col-md-8 col-lg-9">
                             <input type="number" name="contact_number" class="form-control" value="<?= $resident['contact_no'] ?>">
                          </div>
                        </div>
                      </div>

                    <div class="tab-pane fade pt-4" id="address">

                     <div class="row mb-3">
                       <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Purok:</label>
                        <div class="col-md-8 col-lg-9">
                           <select class="form-select" aria-label="Default select example" name="purok" >
                            <option value="<?= $resident['purok'] ?>"><?= $resident['purok'] ?></option>

                                <?php
                                $purok = $conn->prepare("SELECT * FROM purok ORDER BY purok");
                                $purok->execute();
                                $purok = $purok->fetchAll(PDO::FETCH_ASSOC);

                                foreach($purok as $purok_row):
                            
                                ?>
                                  <option value="<?= $purok_row['purok']; ?>"><?= $purok_row['purok']; ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                      </div>

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Barangay:</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" name="brgy" class="form-control" value="<?= ucfirst($resident['brgy']) ?>">
                        </div>
                      </div>

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">City:</label>
                        <div class="col-md-8 col-lg-9">
                         <input type="text" name="city" class="form-control" value="<?= ucfirst($resident['city']) ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Province:</label>
                        <div class="col-md-8 col-lg-9">
                           <input type="text" name="province" class="form-control" value="<?= ucfirst($resident['province']) ?>">
                        </div>
                      </div>

                  </div>

                   <div class="tab-pane fade pt-4" id="resident-account">

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email:</label>
                        <div class="col-md-8 col-lg-9">
                         <input type="email" name="email" id="email" value="<?= ucfirst($resident['email']) ?>" class="form-control" onInput="checkEmail()"/>
                         <span id="check-email"></span>
                        </div>
                      </div>
                    
                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username:</label>
                        <div class="col-md-8 col-lg-9">
                         <input type="text" name="username" id="username" class="form-control" value="<?= $resident['username'] ?>" required onInput="checkUsername()"/>
                         <span id="check-username"></span>
                         <div id="username" class="invalid-feedback">
                          Username is required!
                        </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password:</label>
                        <div class="col-md-8 col-lg-9">
                           <input type="password" name="password" id="password" class="form-control">
                        </div>
                      </div>

                       <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Change resident photo:</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="file" value="<?= $resident['photo']; ?>" name="image" accept="image/*" id="prevImg" class="form-control form-control-sm mt-2">
                          <input type="hidden" name="current_image" value="<?= $resident['photo'] ?>">
                           </div>
                        </div>
                      
                       </div>
                        
                      
                        

                        <div class="tab-pane fade pt-3" id="blotter-records">
                          <div class="table-responsive">
                            <table class="table datatable">
                              <thead class="table-dark">
                                <tr>
                                  <th scope="col">Complainant</th>
                                  <th scope="col">Date of Filling</th>
                                  <th scope="col">Time of Filling</th>
                                  <th scope="col">Blotter Details</th>
                                  <th scope="col">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $query = $conn->prepare("SELECT * FROM blotter WHERE complained_resident = '$id' ORDER BY blotter_id DESC");
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row):
                                  date_default_timezone_set('Asia/Manila');
                                  $time = $row['time_of_filling'];
                                  $date = $row['date_of_filling']; 
                                  $date = new DateTime($date);
                                  $result = $date->format("F j, Y"); 
                                  $d=strtotime($time);
                                  $time_format = date("h:i:a", $d);
                                  $status = $row['status'];
                                 ?>
                                  <tr>
                                    <td><?= $row['complainant'] ?></td>
                                    <td><?= $result ?></td>
                                    <td><?= $time_format ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td>
                                      <?php
                                    
                                      if ($status == 'Pending') { ?>
                                       <a class="badge rounded-pill bg-warning"><b> 
                                        <?= $row['status']; ?></a></b>
                                     <?php }elseif ($status == 'Active') {?>
                                       <a class="badge rounded-pill bg-primary"><b>
                                        <?= $row['status']; ?></a></b>
                                   <?php }elseif ($status == 'Solve') {?>
                                    <a class="badge rounded-pill bg-success"><b>
                                        <?= $row['status']; ?></a></b>

                                   <?php } ?>                              
                                    </td>
                                  </tr>
              
                                <?php endforeach; ?>                 
                              </tbody>
                            </table>
                           </div>
                       </div>
                       
                    </div>
                 <button type="submit" class="col-12 btn btn-primary" name="update_resident">Update Resident</button>    
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