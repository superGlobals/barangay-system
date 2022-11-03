<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Purok</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Purok</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
                 <a href="#add_purok" data-bs-toggle="modal" class="btn btn-primary btn-sm float-end" ><i class="bi bi-plus-lg"></i> New Purok</a>
                 <?php  require 'include/modal.php'; ?>
                 </div>
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Purok</th>
                          <th scope="col">Details</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                     <tbody>
                    <?php
                    $query = $conn->prepare("SELECT * FROM purok");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $row):
                    $purok_id = $row['purok_id'];
                     ?>
                 <tr>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['purok']; ; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['details']; ?></td>

                  <td width="180">
                   <a href="#edit_purok<?php echo $purok_id; ?>" data-bs-toggle="modal" class="btn btn-primary btn-xs rounded-pill"><i class="bi bi-pencil-square"></i></a>
                   <a href="#delete_purok<?php echo $purok_id; ?>"  data-bs-toggle="modal" id="delete"  class="btn btn-danger btn-xs rounded-pill" name=""><i class="bi bi-trash"></i></a>              
                 
                    </td>
                    </tr>
                    <?php 

                  require 'include/edit_modal.php';
                  require 'include/delete_modal.php'; ?>
                  <?php endforeach;; ?>
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