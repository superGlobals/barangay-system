<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Barangay Officials</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Barangay Officials</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="maangas card">
            <div class="card-header" style="border: none;">
                  <a href="add_brgy_official.php" class="btn btn-primary btn-sm float-end"><i class="bi bi-plus-lg"></i> New Officials</a>
                 </div>
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Picture</th>
                          <th scope="col">Name</th>
                          <th scope="col">Position</th>
                          <th scope="col">Chairmanship</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      $query = $conn->prepare("SELECT * FROM brgy_official order by brgy_official_id asc");
                      $query->execute();
                      $result = $query->fetchAll(PDO::FETCH_ASSOC);

                      foreach($result as $row):
                        $brgy_official_id =  $row['brgy_official_id'];
                        ?>
                    <tr>
                    <td width="100">
                      <img class="rounded-circle" src="<?= $row['picture'] ?>" height="50" width="50">
                    </td>
                    <td class="text-dark text-sm font-weight-bolder"><?= ucwords($row['firstname'] ." ". $row['middlename'] .". ". $row['lastname']); ?></td>
                    <td class="text-dark text-sm font-weight-bolder"><?= $row['position']; ?></td>
                    <td class="text-dark text-sm font-weight-bolder"><?= $row['chairmanship'];?></td>
                    <td>
                   <a href="edit_official.php?id=<?= $brgy_official_id; ?>" class="btn btn-primary btn-sm rounded-pill"><i class="bi bi-pencil-square"></i></a>
                    <a href="#delete_offi<?= $brgy_official_id; ?>" class="btn btn-danger btn-sm rounded-pill" data-bs-toggle="modal" id="delete" name=""><i class="bi bi-trash"></i></a>
                    </td>
                    </tr>
                  <?php 
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

      </main><!-- End #main -->

  <?php require 'include/footer.php'; ?>

</body>

</html>