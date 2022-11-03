<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Barangay Position</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Barangay Position</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <section class="section profile">
      <div class="row">

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" onclick="set_tab(this.getAttribute('data-bs-target'))"  data-bs-toggle="tab" data-bs-target="#position" id="position-tab">Position</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" onclick="set_tab(this.getAttribute('data-bs-target'))" data-bs-toggle="tab" data-bs-target="#committe" id="committe-tab">Committee</button>
                </li>

              </ul>
               <form class="needs-validation" novalidate action="functions/add_new_resident_function.php" method="post" enctype="multipart/form-data">
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active position pt-3" id="position">

                  <a href="#add_position" data-bs-toggle="modal" class="btn btn-primary btn-sm mb-3" ><i class="bi bi-plus-lg"></i> New Position</a>
                 <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Position</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                     <tbody>
                    <?php
                    $query = $conn->prepare("SELECT * FROM position");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                    $position_id = $row['position_id'];

                     ?>
                 <tr>
                  <td class="text-dark text-sm font-weight-bolder"><?= $row['position']; ; ?></td>

                  <td width="180">
                   <a href="#edit_position<?= $position_id; ?>" data-bs-toggle="modal" class="btn btn-primary btn-sm rounded-pill"><i class="bi bi-pencil-square"></i></a>
                   <a href="#delete_position<?= $position_id; ?>"  data-bs-toggle="modal" id="delete"  class="btn btn-danger btn-sm rounded-pill" name=""><i class="bi bi-trash"></i></a>              
                 
                    </td>
                    </tr>
                    <?php 

                  require 'include/edit_modal.php';
                  require 'include/delete_modal.php'; ?>
                  <?php endforeach; ?>
                  </tbody>
                    </table>
                   </div>
                 
                   </div>

                    <div class="tab-pane fade pt-3" id="committe">
                      <a href="#add_chair" data-bs-toggle="modal" class="btn btn-primary btn-sm mb-3" ><i class="bi bi-plus-lg"></i> New Committee</a>

                     <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Committe</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                     <tbody>
                    <?php
                    $query = $conn->prepare("SELECT * FROM chairmanship");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                      $chairmanship_id = $row['chairmanship_id'];

                     ?>
                 <tr>
                  <td class="text-dark text-sm font-weight-bolder"><?= $row['chairmanship']; ; ?></td>

                  <td width="180">
                   <a href="#edit_chair<?= $chairmanship_id; ?>" data-bs-toggle="modal" class="btn btn-primary btn-sm rounded-pill"><i class="bi bi-pencil-square"></i></a>
                   <a href="#delete_chair<?= $chairmanship_id; ?>"  data-bs-toggle="modal" id="delete"  class="btn btn-danger btn-sm rounded-pill" name=""><i class="bi bi-trash"></i></a>              
                 
                    </td>
                    </tr>
                    <?php 

                  require 'include/edit_modal.php';
                  require 'include/delete_modal.php'; ?>
                  <?php endforeach; ?>
                  </tbody>
                    </table>
                   </div>

                     
                      </div>
              
                  </div><!-- End Bordered Tabs -->
                </form>

            </div>
          </div>

        </div>
      </div>
    </section>

      </main><!-- End #main -->
      <?php require 'include/add_modal.php'; ?>
  <?php require 'include/footer.php'; ?>

</body>

</html>