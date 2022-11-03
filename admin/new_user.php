<?php 
require 'include/header.php'; 

require 'include/sidebar.php';
if ($_SESSION['role'] == 'Co-Admin') {
   header("location: add_new_user.php");
 }
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
                  <a href="add_new_user.php" class="btn btn-primary btn-sm float-end"><i class="bi bi-plus-lg"></i> New User</a>
                  
                 </div>
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Picture</th>
                          <th scope="col">Fullname</th>
                          <th scope="col">Username</th>
                          <th scope="col">User Type</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                     <tbody>
               

                  <?php
                    $query = $conn->prepare("SELECT * FROM user");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $user_id = $row['user_id'];
                     ?>
                 <tr>
                 <td class="text-dark text-sm font-weight-bolder" width="100">
                    <img class="rounded-circle"
                    src="<?= $row['photo'] ?>" height="60" width="60">
                  </td>
                  <td class="text-dark text-sm font-weight-bolder"><?= ucwords($row['fullname']);?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?= $row['username']; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?= $row['user_type']; ?></td>
                  <?php if (isset($_SESSION['id']) && $_SESSION['role'] == 'Admin'): ?>
                  <td width="180">
                   <a href="#edit_user<?= $user_id; ?>" data-bs-toggle="modal" class="btn btn-primary rounded-pill"><i class="bi bi-pencil-square"></i></a>
                   <a href="#delete_user<?= $user_id; ?>"  data-bs-toggle="modal" id="delete"  class="btn btn-danger rounded-pill" name=""><i class="bi bi-trash-fill"></i></a>              
                    </td>
                  <?php endif; ?>
                   
                    </tr>
                    <?php 
                    require 'include/edit_modal.php';
                    require 'include/delete_modal.php'; ?>
                  <?php endforeach; ?>
                  </tbody>
                    </table>
                   </div>
                </div>
              </div>
            </div>
          </div>
        </section>


  <?php require 'include/footer.php'; ?>

</body>

</html>