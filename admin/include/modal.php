

<!-- add purok -->
<div class="modal fade text-dark" id="add_purok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Purok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="function/purokFunction.php" class="needs-validation" novalidate>
        <label>Purok</label>
             <input type="text" name="purok" class="form-control" placeholder="Purok" required>
             <div class="invalid-feedback">
                required!
              </div>
          <label>Details</label>
            <textarea name="details" class="form-control" placeholder="Optional!"></textarea>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addPurok" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>


<!-- add position -->
<div class="modal fade" id="add_position" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="functions/add_position.php" class="needs-validation" novalidate>
         <label class="form-label text-dark">Position</label>
           <input type="text" name="position" class="form-control" required>
           <div class="invalid-feedback">
              required!
            </div>
            <label class="form-label text-dark mt-2">Limit</label>
           <input type="number" name="limit" class="form-control" required>
           <div class="invalid-feedback">
              required!
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>


<!-- add chair -->
<div class="modal fade" id="add_chair" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Chairmanship</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="functions/add_brgy_chairmanship_function.php" class="needs-validation" novalidate>
        <label class="form-label">Committee</label>
             <input type="text" name="chairmanship" class="form-control" required>
             <div class="invalid-feedback">
                required!
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>



<!--add new user -->
<div class="modal fade" id="new_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Add new User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
        <form method="post" action="function/adminFunction.php" enctype="multipart/form-data" class="needs-validation" novalidate>
         <div class="col-sm errors">
          <ul class="text-dark" style="font-size: 14px;">
            <li id="length">Password must be at least 8 characters in length.</li>
            <li id="number">Password must include at least one number.</li>
          </ul>
                </div>
          <label class="text-dark">Full name</label>  
             <input type="text" name="fullname" class="form-control" value="<?php if(isset($_SESSION['fullname'])) echo $_SESSION['fullname']; unset($_SESSION['fullname']);  ?>" required>
             <div class="invalid-feedback">
                required!
              </div>
          <label class="text-dark mt-2">Username</label>
             <input type="text" name="username" class="form-control" id="username" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; unset($_SESSION['username']);  ?>" onInput="checkuser_admin()" required>
             <span id="check-admin"></span>
             <div class="invalid-feedback">
                required!
              </div>
           <label class="text-dark mt-2">Password</label>
           
            <input type="password" class="form-control" id="pass1" alt="password" name="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password']; unset($_SESSION['password']);  ?>" required>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style=" float: right; margin-left: -25px;margin-top: -25px;position: relative; z-index: 2; cursor: pointer;"></span>
             <div class="invalid-feedback">
                required!
              </div>   
              <label class="text-dark mt-2">Select user type</label>
              <select class="form-select" name="user_type" aria-label="Default select example" required>
              <option value="">Select user type</option>
              <option value="Admin"<?= !empty($_SESSION['user_type']) == 'Admin' ? ' selected' : ''; ?>>Admin</option>
              <option value="Secretary"<?= !empty($_SESSION['user_type']) == 'Secretary' ? ' selected' : ''; ?>>Secretary</option>
            </select>     
          <label class="text-dark mt-2">Upload User Photo</label>
    
             <input type="file" name="image" class="form-control form-control-sm">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="addUser" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- upload sql file -->
<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restore Database</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="../restore/restore.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                    <div class="form-group form-floating-label">
                        <label>Upload Sql file</label>
                        <input type="file" class="form-control" accept=".sql" name="backup_file" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Restore</button>
            </div>
            </form>
        </div>
    </div>
</div>