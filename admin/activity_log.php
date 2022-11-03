<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Activity Log</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Activity Log</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card p-2">
                <div class="card-body py-3">
                  <div class="table-responsive">
                    <table class="table datatable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Fullname</th>
                          <th scope="col">Date</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                     <tbody>
                    <?php
                    $query = $conn->prepare("SELECT * FROM activity_log LEFT JOIN user ON activity_log.username = user.user_id LEFT JOIN resident ON activity_log.username = resident.resident_id ORDER BY activity_log_id DESC");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $row):
                     ?>
                 <tr>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo ucwords($row['fullname']); ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['date']; ?></td>
                  <td class="text-dark text-sm font-weight-bolder"><?php echo $row['action']; ?></td>


                    </tr>
  
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