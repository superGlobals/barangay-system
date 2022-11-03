<!-- edit purok -->
<div class="modal fade" id="edit_purok<?php echo $purok_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Purok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="function/purokFunction.php" class="needs-validation" novalidate>
          <input type="hidden" name="purok_id" value="<?php echo $row['purok_id'] ?>">
        <label>Purok</label>
             <input type="text" name="purok" class="form-control" value="<?php echo $row['purok'] ?>">
             <div class="invalid-feedback">
                required!
              </div>
          <label>Details</label>
            <input type="text" name="details" class="form-control" value="<?php echo $row['details'] ?>">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="updatePurok" class="btn btn-primary">Update</button>
              </div>

            </form>
          </div>
          
    </div>
  </div>
</div>


<!-- edit brgy position -->
<div class="modal fade" id="edit_position<?php echo $position_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Brgy Position</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="function/brgyPositionFunction.php" >
            <input type="hidden" name="position_id" value="<?php echo $row['position_id'] ?>">
            <label style="font-weight: bold;">Position</label>
            <input type="text" name="position" class="form-control" value="<?php echo $row['position'] ?>">
           
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="update_position" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- edit committee -->
<div class="modal fade" id="edit_chair<?php echo $chairmanship_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Chairmanship</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="function/brgyPositionFunction.php" >
            <input type="hidden" name="chairmanship_id" value="<?php echo $row['chairmanship_id'] ?>">
            <label style="font-weight: bold;">Chairmanship</label>
            <input type="text" name="chairmanship" class="form-control" value="<?php echo $row['chairmanship'] ?>">
           
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="update_commi" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!--edit system user -->
<div class="modal fade" id="edit_user<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
        <form method="post" action="function/adminFunction.php" enctype="multipart/form-data" class="needs-validation" novalidate>
          <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
        <label>Full name</label>  
             <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname'] ?>">
             <div class="invalid-feedback">
                required!
              </div>
          <label class="mt-2">Username</label>
             <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>">
             <div class="invalid-feedback">
                required!
              </div>
              <label class="mt-2">Password</label>
             <input type="password" name="password" class="form-control" id="pass1">

              <?php 
              if(isset($_SESSION['id']) && $_SESSION['role']=='Admin'): ?>
              <label class="text-dark mt-2">Update user type</label>
              <select class="form-select" name="user_type" aria-label="Default select example" required style="cursor: pointer;">
              <option value="<?= $row['user_type'] ?>"><?= $row['user_type'] ?></option>
              <option value="Admin">Admin</option>
              <option value="Co-Admin">Co-Admin</option>
              <option value="Secretary">Secretary</option>
              <option value="Kagawad">Kagawad</option>
             </select>     
              <?php endif; ?>
             <label class="mt-2">Update User Photo</label>
    
          <!-- <img src="<?php echo $row['photo'] ?>" width="100" height="100"> -->
    
             <input type="file" name="image" class="form-control" accept="image/*">
             <input type="hidden" name="current_image" value="<?php echo $row['photo']?> " class="form-control">
             <div class="valid-feedback">
                optional!
              </div>  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updateAdmin" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>