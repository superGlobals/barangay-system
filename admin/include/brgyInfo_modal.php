  <!-- barangay info modal -->
<div class="modal fade text-dark" id="brgy_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barangay Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="function/brgyInfoFunction.php" enctype="multipart/form-data">
            <?php
              $query = $conn->prepare("SELECT * FROM brgy_info");
              $query->execute();
              $result = $query->fetchAll(PDO::FETCH_ASSOC);

              foreach($result as $row):
              $brgy_info_id =  $row['brgy_info_id'];
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Province Name</label>
                                <input type="text" class="form-control" placeholder="Enter Province Name" name="province" value="<?php echo $row['province']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">City Name</label>
                                <input type="text" class="form-control" placeholder="Enter City Name" name="city" required value="<?php echo $row['city']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Barangay Name</label>
                                <input type="text" class="form-control" placeholder="Enter Barangay Name" name="brgy" required value="<?php echo $row['brgy']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input type="number" class="form-control" placeholder="Enter Contact Number" name="contact"  value="<?php echo $row['contact']; ?>">
                            </div>
                        </div>
                    </div>
                   <!--  <div class="form-group">
                        <label>Dashboard Text</label>
                        <textarea class="form-control" name="db_msg" required><?= $db_txt ?></textarea>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Municipality Logo</label><br>
                                <img src="<?php echo $row['city_logo']; ?>" class="img-fluid" width="120">
                                <input type="file" class='form-control' name="city_logo" accept="image/*">
                                <input type="hidden" class='form-control' name="current_city_logo" value="<?php echo $row['city_logo']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Barangay Logo</label><br>
                                <img src="<?php echo $row['brgy_logo']; ?>"  class="img-fluid" width="120">
                                <input type="file" class='form-control' name="brgy_logo"  accept="image/*">
                                <input type="hidden" class='form-control' name="current_brgy_logo" value="<?php echo $row['brgy_logo']; ?>" accept="image/*">
                            </div>
                        </div>
                    </div> 
                      <?php endforeach; ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="saveInfo" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
  </div>
</div>




<!-- change price for certificate -->
<div class="modal fade text-dark" id="price" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Updating the cost</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php
      $query = $conn->prepare("SELECT * FROM brgy_forms_price");
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      foreach($result as $row):
      $brgy_forms_price_id =  $row['brgy_forms_price_id'];
        ?>
      <div class="modal-body">
        <form method="post" action="function/certificateCostFunction.php">
          <input type="hidden" name="brgy_forms_price_id" value="<?php echo $brgy_forms_price_id ?>">
          <div class="row g-2">
            <div class="col">
              <label>Barangay Clearance Price</label>
              <input type="text" name="clearance" class="form-control" value="<?php echo $row['clearance_price'] ?>">
              </div>
              <div class="col">  
              <label>Barangay Indigency Price</label>  
              <input type="text" name="indigency" class="form-control" value="<?php echo $row['indigency_price'] ?>">
              </div>     
            </div>
            <div class="row g-2 mt-2">
            <div class="col">
              <label>Barangay Certificate Price</label>
              <input type="text" name="certificate" class="form-control" value="<?php echo $row['certificate_price'] ?>">
              </div>
              <div class="col">  
              <label>Barangay Residency Price</label>  
              <input type="text" name="residency" class="form-control" value="<?php echo $row['residency_price'] ?>">
              </div>     
            </div>
            <div class="row g-2 mt-2">
            <div class="col">
              <label>Building Clearance Price</label>
              <input type="text" name="building" class="form-control" value="<?php echo $row['building_price'] ?>">
              </div>
              <div class="col">  
              <label>Clearace(NAT'L ID) Price</label>  
              <input type="text" name="clearance_nat" class="form-control" value="<?php echo $row['clearance_nat_price'] ?>">
              </div>     
            </div>
            <div class="row g-2 mt-2">
            <div class="col">
              <label>Business Clearance Price</label>
              <input type="text" name="business" class="form-control" value="<?php echo $row['business_clearance_price'] ?>">
              </div>
              <div class="col">  
              <label>Demolished Price</label>  
              <input type="text" name="demolished" class="form-control" value="<?php echo $row['demolished_price'] ?>">
              </div>     
            </div>
            <div class="row g-2 mt-2">
            <div class="col">
              <label>Good Moral Price</label>
              <input type="text" name="good" class="form-control" value="<?php echo $row['goodmoral_price'] ?>">
              </div>
              <div class="col">  
              <label>D. A  Price</label>  
              <input type="text" name="da" class="form-control" value="<?php echo $row['da_price'] ?>">
              </div>     
            </div>
            <?php endforeach; ?> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updateCost" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>