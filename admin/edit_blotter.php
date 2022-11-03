<?php 
require 'include/header.php'; 
require 'include/sidebar.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$query = $conn->prepare("SELECT * FROM blotter LEFT JOIN resident ON resident.resident_id = blotter.complained_resident WHERE blotter_id =:id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$blotter = $query->fetch(PDO::FETCH_ASSOC);
?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Blotter</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Blotter</a></li>
          <li class="breadcrumb-item active">Edit Blotter</li>
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
                    <input type="hidden" name="blotter_id" value="<?php echo $id ?>">
                    <input type="hidden" name="nirereklamo" value="<?= $blotter['complained_resident'] ?>">
            <div class="row g-2">
              <div class="col-sm mb-2">
                <label>Date of Filling</label>
                <input type="date" name="date" class="form-control" value="<?php echo $blotter['date_of_filling'] ?>">
                <div class="invalid-feedback">
                Date of filling is required!
                </div>
              </div>
              <div class="col-sm mb-2">
                <label>Time of Filling</label>
                <input type="time" name="time" class="form-control" value="<?php echo $blotter['time_of_filling'] ?>">
                <div class="invalid-feedback">
                Time of filling is required!
                </div>
              </div>
            </div>
              <div class="row g-2">
                <div class="col-sm">
                  <label>Complainant</label>
                  <select name="complainant" id="bobo" class="bobo form-control input-sm" style="width:100%;">
                    <option value="<?php echo $blotter['complainant'] ?>"><?php echo $blotter['complainant'] ?></option>
                    <?php
                    
                        $squery = $conn->prepare("SELECT * from resident");
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);

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
                   <select name="complained" id="bobo1" class="bobo1 form-control input-sm" style="width:100%;">
                    <option value="<?php echo $blotter['resident_id'] ?>"><?php echo $blotter['firstname']." ". $blotter['middlename']." ". $blotter['lastname'] ; ?></option>
                    <?php
                    
                       $squery = $conn->prepare("SELECT * from resident");
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);

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
                    <option value="<?php echo $blotter['status'] ?>"><?php echo $blotter['status'] ?></option>
                    <option value="Pending">Pending</option>
                    <option value="Active">Active</option>
                    <option value="Solve">Solve</option>
                  </select>
                  </div>                 
                </div>
                <div class="row">
                  <div class="col-sm">
                    <label>Description</label>
                    <textarea class="form-control" name="description"><?php echo $blotter['description'] ?></textarea>
                    <div class="invalid-feedback">
                    Descriction is required!
                    </div>
                  </div>
                </div>
              </div>
   
            
              <div class="modal-footer">
                <a href="blotter.php" class="btn btn-secondary">Back</a>
                <button type="submit" name="update_blotter" class="btn btn-primary">Update</button>
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