<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>To Verify</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">To Verify</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
            <div class="card-header" style="border: none;">
                 
                 </div>
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead style="background: #f6f6fe;">
                        <tr>
                          <th scope="col">Full name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                     <tbody>
                     <?php

                    $query = $conn->prepare("SELECT * FROM resident WHERE to_verify_status = '1' ORDER BY resident_id DESC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $row):
                    $resident_id = $row['resident_id'];
            
                      ?>
                 <tr>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo ucwords($row['firstname']." ". $row['middlename']." ".  $row['lastname']); ; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"> <a class="badge rounded-pill bg-warning"><b> 
                      <?php echo $row['verification_status']; ?></a></td>

                   <td><a href="#view_docu<?php echo $resident_id; ?>"  data-bs-toggle="modal" class="btn btn-primary btn-sm"><i class="bi bi-card-image"></i>  View</a>
                  </td>
                    </tr>
                    <?php 

                  require 'include/verify_modal.php'; ?>
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