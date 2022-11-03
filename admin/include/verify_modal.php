
<!-- verify modal  -->
<div class="modal fade" id="view_docu<?= $resident_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resident ID</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="text-center">

          <img src="<?= $row['image_verify'] ?>" width="100%">
          <div class="row">
            <h3 class="mt-3"><?= ucwords($row['firstname']." ".$row['middlename'].". ".$row['lastname']) ?></h3>
          </div>
        </div>
        </div>
      <div class="modal-footer">
        <form action="function/verifyModal.php" method="post">
        <input type="hidden" name="resident_id" value="<?= $resident_id; ?>">
        <input type="hidden" name="resident_name" value="<?= $row['firstname']." ".$row['lastname'] ?>">
        
        <button type="submit" name="approved" class="btn btn-primary">Approved</button>
        </form>
        <button class="btn btn-danger" data-bs-target="#decline<?= $resident_id ?>" data-bs-toggle="modal">Declined</button>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="decline<?= $resident_id ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="function/verifyModal.php">
        <input type="hidden" name="resident_id" value="<?= $resident_id; ?>">
        <input type="hidden" name="resident_name" value="<?= $row['firstname']." ".$row['lastname'] ?>">
        <label class="form-label">Reason for declining request</label>
        <textarea class="form-control" name="reason" placeholder="Add message here" required></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="declined">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>