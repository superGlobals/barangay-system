<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
$query = $conn->prepare("SELECT * from resident");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Blotter</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Blotter</a></li>
          <li class="breadcrumb-item active">Add Blotter</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section py-4">
      
        <div class="row">
            <div class="col-12">
            <div class="card card-outline card-primary py-5">
              
              <!-- /.card-header -->
              <div class="card-body">
                   <form method="post" action="function/blotterFunction.php" class="needs-validation" novalidate >
            <div class="row g-2">
              <div class="col-sm mb-2">
                <label>Date of Filling</label>
                <input type="date" name="date" class="form-control" name="date" required>
                <div class="invalid-feedback">
                Date of filling is required!
                </div>
              </div>
              <div class="col-sm mb-2">
                <label>Time of Filling</label>
                <input type="time" name="time" class="form-control" required>
                <div class="invalid-feedback">
                Time of filling is required!
                </div>
              </div>
            </div>
              <div class="row g-2">
                <div class="col-sm">
                  <label>Complainant</label>
                  <select name="complainant" class="js-example-basic-multiple" style="width:100%;" required>
                   <option></option>
                    <?php

                        foreach($result as $row):
                          ?> 
                          <option value="<?php echo $row['firstname']." ". $row['middlename']." ". $row['lastname'] ; ?>"><?php echo $row['firstname']." ". $row['middlename']." ". $row['lastname'] ; ?></option> 
                        <?php endforeach;  ?>
                  
                </select>
                  <div class="invalid-feedback">
                Complainant is required!
                </div>
                </div>
                <div class="col-sm">
                  <label>Complained Resident</label>
                   <select name="complained[]" class="js-example-basic-multiples" multiple="multiple" style="width:100%;" required>
                    <?php

                        foreach($result as $row):
                          ?> 
                          <option value="<?php echo $row['resident_id']; ?>"><?php echo $row['firstname']." ". $row['middlename']." ". $row['lastname'] ; ?></option> 
                        <?php endforeach;  ?>
                </select>
                   <div class="invalid-feedback">
                Complained resident is required!
                </div>
                </div>
              </div>
                <div class="row mb-2">
                  
                  <div class="col-sm">
                    <label>Status</label>
                  <select class="form-select" name="status" aria-label="Default select example">
                    <option value="Pending">Pending</option>
                    <option value="Active">Active</option>
                    <option value="Solve">Solve</option>
                  </select>
                  </div>                 
                </div>
                <div class="row">
                  <div class="col-sm">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                    <div class="invalid-feedback">
                    Descriction is required!
                    </div>
                  </div>
                </div>
              </div>
   
              <div class="modal-footer">
                <a href="blotter.php" class="btn btn-secondary">Back</a>
                <button type="submit" name="add_blotter" class="btn btn-primary">Save</button>
              </div>
            </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
              </div>
        </section>

      </main><!-- End #main -->

  <?php require 'include/footer.php'; ?>

</body>

</html>