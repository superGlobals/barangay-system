
<!-- delete brgy official -->

<div class="modal fade" id="delete_offi<?php echo $brgy_official_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
       <h5 class="text-center">Are you sure you want to Delete</h5>
       <h5 class="text-center"><?php echo $row['position']; ?></h5>
        <h5 class="text-center"><?php echo $row['firstname'].' '.$row['lastname']; ?> ? </h5>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      <form action="function/brgyOfficialFunction.php" method="post">
        <input type="hidden" name="firstname" value="<?= $row['firstname'] ?>">
        <input type="hidden" name="lastname" value="<?= $row['lastname'] ?>">
            <button type="submit" class="btn btn-primary" name="delete_offi" value="<?= $brgy_official_id ?>">Yes</button>
        </form>
    </div>
  </div>
</div>
</div>

<!-- delete purok -->

<div class="modal fade" id="delete_purok<?php echo $purok_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
       <h5 class="text-center">Are you sure you want to Delete</h5>
       <h5 class="text-center"><?php echo $row['purok']; ?> ?</h5>
      
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
       <form action="function/purokFunction.php" method="post">
        <input type="hidden" name="purok_id" value="<?= $row['purok_id'] ?>">
        <input type="hidden" name="purok" value="<?= $row['purok'] ?>">
            <button type="submit" class="btn btn-primary" name="deletePurok" >Yes</button>
        </form>
            </div>
  </div>
</div>
</div>

<!-- delete brgy position -->

<div class="modal fade" id="delete_position<?php echo $position_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
       <h5 class="text-center">Are you sure you want to Delete</h5>
       <h5 class="text-center"><?php echo $row['position']; ?></h5>
      
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
       <form action="function/brgyPositionFunction.php" method="post">
          <input type="hidden" name="position" value="<?= $row['position'] ?>">
          <button type="submit" class="btn btn-primary" name="delete_position" value="<?= $position_id ?>">Yes</button>
       </form>
    </div>
  </div>
</div>
</div>

<!-- delete committee -->
<div class="modal fade" id="delete_chair<?php echo $chairmanship_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
       <h5 class="text-center">Are you sure you want to Delete</h5>
       <h5 class="text-center"><?php echo $row['chairmanship']; ?></h5>
      
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      <form action="function/brgyPositionFunction.php" method="post">
        <input type="hidden" name="committee" value="<?= $row['chairmanship'] ?>">
         <button type="submit" class="btn btn-primary" name="delete_commi" value="<?= $chairmanship_id ?>">Yes</button>
       </form>
            </div>
  </div>
</div>
</div>


<!-- delete blotter -->
<div class="modal fade" id="delete_blotter<?php echo $blotter_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
        <h5 class="text-center">Are you sure you want to Delete this record?</h5>
        </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <form action="function/blotterFunction.php" method="post">
          <input type="hidden" name="blotter_id" value="<?= $blotter_id ?>">
         <button type="submit" class="btn btn-primary" name="delete_commi" value="<?= $chairmanship_id ?>">Yes</button>
       </form>
        </div>
    </div>
  </div>
</div>

<!-- delete user -->

<div class="modal fade" id="delete_user<?php echo $user_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="fa-solid fa-circle-exclamation"></i></h5>
       <h5 class="text-center">Are you sure you want to Delete</h5>
       <h5 class="text-center"><?php echo $row['fullname']; ?>?</h5>
      
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      <form action="function/adminFunction.php" method="post">
          <input type="hidden" name="fullname" value="<?= $row['fullname'] ?>">
          <input type="hidden" name="photo" value="<?= $row['photo'] ?>">
          <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">

         <button type="submit" class="btn btn-primary" name="deleteAdmin" >Yes</button>
       </form>
      </div>
  </div>
</div>
</div>


<!-- delete completed request -->
<div class="modal fade" id="delete_completed<?php echo $brgy_clearance_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="fa-solid fa-circle-exclamation"></i></h5>
       <h5 class="text-center">Are you sure you want to Delete this?</h5>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      <a href="function/delete_completed_request.php?id=<?php echo $brgy_clearance_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>
  </div>
</div>
</div>

