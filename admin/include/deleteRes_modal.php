<!-- archive resident -->

<div class="modal fade" id="delete_res<?= $resident_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="function/residentFunction.php" method="post">  
          <div class="modal-body">
            <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
             <h5 class="text-center">Are you sure you want to Archive</h5>
             <h5 class="text-center">Resident</h5>
             <h5 class="text-center"><?= ucwords($row['firstname'].' '.$row['lastname']); ?>?</h5>
             <input type="hidden" name="photo" value="<?= $row['photo'] ?>">
             <input type="hidden" name="resident_id" value="<?= $row['resident_id'] ?>">
             <input type="hidden" name="name" value="<?= $row['firstname'].' '.$row['lastname'] ?>">
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
           <button type="submit" name="archive_resident" class="btn btn-primary" >Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- delete resident permanently -->

<div class="modal fade" id="deletePermanent<?php echo $resident_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="function/residentFunction.php" method="post">  
          <div class="modal-body">
            <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
             <h5 class="text-center">Are you sure you want to delete this resident's permanent record?</h5>
             <input type="hidden" name="photo" value="<?= $row['photo'] ?>">
             <input type="hidden" name="resident_id" value="<?= $row['resident_id'] ?>">
             <input type="hidden" name="name" value="<?= $row['firstname'].' '.$row['lastname'] ?>">
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
           <button type="submit" name="delete_resident" class="btn btn-primary" >Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- unarchive resident  -->

<div class="modal fade" id="unarchive<?php echo $resident_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="function/residentFunction.php" method="post">  
          <div class="modal-body">
            <h5 style="color:  #f0ad4e; font-size: 90px;" class="text-center"><i class="bi bi-exclamation-circle"></i></h5>
             <h5 class="text-center">Are you sure you want to unarchive this resident?</h5>
             <input type="hidden" name="photo" value="<?= $row['photo'] ?>">
             <input type="hidden" name="resident_id" value="<?= $row['resident_id'] ?>">
             <input type="hidden" name="name" value="<?= $row['firstname'].' '.$row['lastname'] ?>">
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
           <button type="submit" name="unarchive" class="btn btn-primary" >Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>
